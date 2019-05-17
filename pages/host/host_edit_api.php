<?php

include '../../__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '',
    'post' => []
];

$host_id = isset($_POST['host_id']) ? intval($_POST['host_id']) : 0;

if (isset($_POST['account']) and !empty($host_id)) {

    $account = htmlentities($_POST['account']);
    $password = htmlentities($_POST['password']);
    $name = htmlentities($_POST['name']);
    $tel = htmlentities($_POST['tel']);
    $email = htmlentities($_POST['email']);
    $address = htmlentities(implode("", $_POST['address']));
    $bankname = htmlentities($_POST['bankname']);
    $bankaccount = htmlentities($_POST['bankaccount']);

    $result['post'] = $_POST;

    if (empty($account) or empty($password) or empty($name) or empty($tel) or empty($email) or empty($address) or empty($bankname) or empty($bankaccount)) {
        $result['errorCode'] = 400;
        $result['errorMsg'] = '資料輸入不完全';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $s_sql = "SELECT * FROM `host_list` WHERE `host_id`=? OR `host_acc`=?";
    $s_stmt = $pdo->prepare($s_sql);
    $s_stmt->execute([$host_id, $_POST['account']]);

    switch ($s_stmt->rowCount()) {
        case 0:
            $result['errorCode'] = 407;
            $result['errorMsg'] = '該筆資料不存在';
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
        case 2:
            $result['errorCode'] = 408;
            $result['errorMsg'] = '帳號已被使用';
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
        case 1:
            $row = $s_stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['host_id'] != $host_id) {
                $result['errorCode'] = 409;
                $result['errorMsg'] = '該筆資料不存在';
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
                exit;
            }
    }

    $sql = "UPDATE `host_list`
            SET `host_acc`=?, `host_pwd`=?, `host_incName`=?, `host_incVat`=?, `host_incTel`=?, `host_incFax`=?, `host_incEmail`=?, `host_incAdd`=?, `host_bankName`=?, `host_bankAcc`=?
            WHERE `host_id`=?";

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
            $_POST['bankaccount'],
            $host_id
        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 201;
            $result['errorMsg'] = '資料修改成功';
        } else {
            $result['errorCode'] = 405;
            $result['errorMsg'] = '資料沒有修改';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 406;
        $result['errorMsg'] = '資料更新發生錯誤';
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
