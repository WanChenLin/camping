<?php

//require __DIR__ . '/__cred.php';

require __DIR__ . '/__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      

];

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if (!empty($id)) {
    $host_parkName = htmlentities($_POST['host_parkName']);
    $host_tel = htmlentities($_POST['host_tel']);
    $host_fax = htmlentities($_POST['host_fax']);
    $host_email = htmlentities($_POST['host_email']);
    $host_address = htmlentities($_POST['host_address']);
    $host_intro = htmlentities($_POST['host_intro']);
    $host_paymentType = htmlentities($_POST['host_paymentType']);
    $host_bankName = htmlentities($_POST['host_bankName']);
    $host_bankAddress = htmlentities($_POST['host_bankAddress']);
    $host_bankIBAN = htmlentities($_POST['host_bankIBAN']);
    $host_bankSWIFT = htmlentities($_POST['host_bankSWIFT']);

    $result['post'] = $_POST;  // 做 echo 檢查

    if (
        empty($host_parkName)
        or empty($host_tel) or empty($host_address)
        or empty($host_paymentType) or empty($host_bankAddress)
    ) {
        $result['errorCode'] = 400;
        $result['errorMsg'] = '資料不完整';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 檢查 email 格式
    if (!filter_var($host_email, FILTER_VALIDATE_EMAIL)) {
        $result['errorCode'] = 401;
        $result['errorMsg'] = 'Email格式不正確';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = "UPDATE `host_infolist` SET
                    `host_parkName`=?,
                    `host_tel`=?,
                    `host_fax`=?, 
                    `host_email`=?, 
                    `city`=?, 
                    `town`=?, 
                    `zipcode`=?, 
                    `host_address`=?, 
                    `host_intro`=?, 
                    `host_paymentType`=?, 
                    `host_bankName`=?,
                    `host_bankAddress`=?, 
                    `host_bankIBAN`=?, 
                    `host_bankSWIFT`=? 
                    WHERE `host_id`=?";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['host_parkName'],
            $_POST['host_tel'],
            $_POST['host_fax'],
            $_POST['host_email'],
            $_POST['city'],
            $_POST['town'],
            $_POST['zipcode'],
            $_POST['host_address'],
            $_POST['host_intro'],
            $_POST['host_paymentType'],
            $_POST['host_bankName'],
            $_POST['host_bankAddress'],
            $_POST['host_bankIBAN'],
            $_POST['host_bankSWIFT'],
            $id
        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 401;
            $result['errorMsg'] = '資料沒有修改';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 402;
        $result['errorMsg'] = '資料更新發生錯誤';
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
