<?php
 // require __DIR__. '/__cred.php';
require __DIR__ . '/__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      

];

if (isset($_POST['post_title'])) {
    $slct = array('文章分類', '露營裝備', '帳篷選擇', '天氣對策');
    $post_cate = $_POST['post_cate'];
    $post_title = strip_tags($_POST['post_title']);
    $post_content = html_entity_decode($_POST['post_content']);
    $post_time = date("Y-m-d h:i:s");

    $result['post'] = $_POST;

    if (empty($post_title)) {
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = "INSERT INTO `share_post`(
       `post_cate`, `post_title`, `post_content`, `post_time`
    ) VALUES (
        ?, ?, ?, ?
    )";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $post_cate,
        $post_title,
        $post_content,
        $post_time,
    ]);

    if ($stmt->rowCount() == 1) {
        $result['success'] = true;
        $result['errorCode'] = 200;
        $result['errorMsg'] = '';
    } else {
        $result['errorCode'] = 402;
        $result['errorMsg'] = '資料新增錯誤';
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
