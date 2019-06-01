<?php
require '../../__connect_db.php';

header('Content-Type:application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [],
];

if (isset($_POST['checkme'])) {

    $camp_image = $_POST['camp_image'];
    $camp_name = $_POST['camp_name'];
    $campImg_name = $_POST['campImg_name'];
    $campImg_file = $_POST['campImg_file'];

    $result['post'] = $_POST; //做echo檢查

    //name,email,mobile若有一個為空值，則回傳錯誤
    if (empty($campImg_name) or empty($camp_name)) {
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = "INSERT INTO `campsite_image`(
        `camp_image`, `camp_name`, `campImg_name`, `campImg_file`
       ) VALUES ( ?,?,?,? )";

    try {
        //準備執行
        $stmt = $pdo->prepare($sql);

        //執行$stmt，回傳陣列內容
        $stmt->execute([
            $_POST['camp_image'],
            $_POST['camp_name'],
            $_POST['campImg_name'],
            $_POST['campImg_file'],
        ]);
        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料重複輸入';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 403;
        $result['errorMsg'] = '資料更新發生錯誤';
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
