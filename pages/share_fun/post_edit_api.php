<?php
 // require __DIR__. '/__cred.php';
require '../../__connect_db.php';

header('Content-Type: application/json');
date_default_timezone_set('Asia/Taipei');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查 
];
$post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

if (isset($_POST['post_title']) and !empty($post_id)) {
    // $slct = array('文章分類', '露營裝備', '帳篷選擇', '天氣對策');
    $post_cate = $_POST['post_cate'];
    $post_title = strip_tags($_POST['post_title']);
    $post_content = html_entity_decode($_POST['post_content']);
    $post_editTime = date("Y-m-d H:i:s");
    $post_visible = $_POST['post_visible'];

    $result['post'] = $_POST;  // 做 echo 檢查

    if (empty($post_title)) {
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $s_sql = "SELECT * FROM `share_post` WHERE `post_id`=?";
    $s_stmt = $pdo->prepare($s_sql);
    $s_stmt->execute([$post_id]);

    switch ($s_stmt->rowCount()) {
        case 0:
            $result['errorCode'] = 410;
            $result['errorMsg'] = '這篇文章不存在';
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
    }

    $sql = "UPDATE `share_post` SET 
                `post_cate`=?,
                `post_title`=?,
                `post_content`=?,
                `post_editTime`=?,
                `post_visible`=?
            WHERE `post_id`=?";

    // try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $post_cate,
            $post_title,
            $post_content,
            $post_editTime,
            $post_visible,
            $post_id
        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料沒有修改';
        }
    // } catch (PDOException $ex) {
    //     $result['errorCode'] = 403;
    //     $result['error'] = $ex->getMessage();
    //     $result['errorMsg'] = '資料更新發生錯誤';
    // }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
