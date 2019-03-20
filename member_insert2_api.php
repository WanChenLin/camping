<?php

include __DIR__ . '/__connect_db.php';

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
    $nickname = htmlentities($_POST['nickname']);
    $birthday = htmlentities($_POST['birthday']);
    $mobile = htmlentities($_POST['mobile']);
    $email = htmlentities($_POST['email']);

    $result['post'] = $_POST;

    if (empty($account) or empty($password) or empty($name) or empty($mobile) or empty($email)) {
        $result['errorCode'] = 400;
        $result['errorMsg'] = '資料輸入不完全';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $filename = $_FILES['my_file']['name'];
    $file = "/uploads/" . $filename;

    $sql = "INSERT INTO `member_list`
        (`mem_account`, `mem_password`, `mem_name`, `mem_nickname`, `mem_gender`, `mem_birthday`, `mem_mobile`, `mem_email`, `memLevel_id`, `mem_avatar`) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['account'],
            $_POST['password'],
            $_POST['name'],
            $_POST['nickname'],
            $_POST['gender'],
            $_POST['birthday'],
            $_POST['mobile'],
            $_POST['email'],
            $_POST['level'],
            $file
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
