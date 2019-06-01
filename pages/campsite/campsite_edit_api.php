<?php
//require __DIR__.'/__cred.php';
require '../../__connect_db.php';

header('Content-Type:application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [],
];

$camp_id = isset($_POST['camp_id']) ? intval($_POST['camp_id']) : 0;

if (isset($_POST['camp_name']) and !empty($camp_id)) {

    $name = $_POST['camp_name'];
    $address = $_POST['camp_address'];
    $location = $_POST['camp_location'];
    $tel = $_POST['camp_tel'];
    $fax = $_POST['camp_fax'];
    $email = $_POST['camp_email'];
    $ownerName = $_POST['camp_ownerName'];
    $openTime = $_POST['camp_openTime'];
    $target = $_POST['camp_target'];
    $dist = $_POST['dist'];
    $city = $_POST['city'];
    $intro = $_POST['camp_intro'];
    $notice = $_POST['camp_notice'];
    $detail = $_POST['camp_detail'];
    $device = $_POST['camp_device'];
    $service = $_POST['camp_service'];

    $result['post'] = $_POST;

    if (empty($name) or empty($address) or empty($email) or empty($tel)) {
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result['errorCode'] = 405;
        $result['errorMsg'] = 'email格式錯誤';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = "UPDATE `campsite_list` SET 
            `camp_name`=?,
            `camp_address`=?, 
            `camp_location`=?, 
            `camp_tel`=?, 
            `camp_fax`=?, 
            `camp_email`=?, 
            `camp_ownerName`=?, 
            `camp_openTime`=?, 
            `camp_target`=?,
            `city`=?, 
            `dist`=?,  
            `camp_intro`=?,
            `camp_detail`=?,
            `camp_device`=?,
            `camp_notice`=?,
            `camp_service`=?
            WHERE `camp_id`=? ";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['camp_name'],
            $_POST['camp_address'],
            $_POST['camp_location'],
            $_POST['camp_tel'],
            $_POST['camp_fax'],
            $_POST['camp_email'],
            $_POST['camp_ownerName'],
            $_POST['camp_openTime'],
            $_POST['camp_target'],
            $_POST['city'],
            $_POST['dist'],
            $_POST['camp_intro'],
            $_POST['camp_detail'],
            $_POST['camp_device'],
            $_POST['camp_notice'],
            $_POST['camp_service'],
            $camp_id
        ]);
        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料沒有修改';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 403;
        $result['errorMsg'] = '資料更新發生錯誤';
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
