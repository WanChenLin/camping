<?php

include '../../__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '',
    'post' => []
];


if (isset($_POST['gotodb'])) {
    $account = htmlentities($_POST['account']);
    $password = htmlentities($_POST['password']);
    $name = htmlentities($_POST['name']);
    $tel = htmlentities($_POST['tel']);
    $email = htmlentities($_POST['email']);
    $address = htmlentities(implode("", $_POST['address']));
    $bankname = htmlentities($_POST['bankname']);
    $bankaccount = htmlentities($_POST['bankaccount']);

    $result['post'] = $_POST;
    
// 檢查使用者是否有輸入資料
    if (empty($account) or empty($password) or empty($name) or empty($tel) or empty($email) or empty($address) or empty($bankname) or empty($bankaccount)) {
        $result['errorCode'] = 400;
        $result['errorMsg'] = '資料輸入不完全';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = "INSERT INTO `host_list`
        (`host_acc`,
         `host_pwd`, 
         `host_incName`, 
         `host_incVat`, 
         `host_incTel`, 
         `host_incFax`, 
         `host_incEmail`, 
         `host_incAdd`, 
         `host_bankName`, 
         `host_bankAcc`) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['account'],
            $_POST['password'],
            $_POST['name'],
            $_POST['vatnum'],
            $_POST['tel'],
            $_POST['fax'],
            $_POST['email'],
            implode("", $_POST['address']),
            $_POST['bankname'],
            $_POST['bankaccount']
        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '資料新增成功';
        } else {
            $result['errorCode'] = 401;
            $result['errorMsg'] = '資料新增錯誤';
        }

    } catch (PDOException $ex) {
        $result['errorCode'] = 402;
        $result['errorMsg'] = '帳號重複輸入';
    }

}

echo json_encode($result, JSON_UNESCAPED_UNICODE);