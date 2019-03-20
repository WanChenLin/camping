<?php

include __DIR__ . '/__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '',
    'post' => []
];

$mem_id = isset($_POST['mem_id']) ? intval($_POST['mem_id']) : 0 ;

if (isset($_POST['account']) and !empty($mem_id)) {

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

    $s_sql = "SELECT * FROM `member_list` WHERE `mem_id`=? OR `mem_account`=?";
    $s_stmt = $pdo->prepare($s_sql);
    $s_stmt->execute([$mem_id, $_POST['account']]);

    switch($s_stmt->rowCount()){
        case 0:
            $result['errorCode'] = 407;
            $result['errorMsg'] = '該筆資料不存在';
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
            //break;
        case 2:
            $result['errorCode'] = 408;
            $result['errorMsg'] = '帳號已被使用';
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
        case 1:
            $row = $s_stmt->fetch(PDO::FETCH_ASSOC);
            if($row['mem_id']!=$mem_id){
                $result['errorCode'] = 409;
                $result['errorMsg'] = '該筆資料不存在';
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
                exit;
            }
    }

    $folder = "avatar_pictures/"; 
    $file = sha1($_FILES['my_file']['name']); 
    $full_path = $folder.$file; 

    $sql = "UPDATE `member_list`
            SET `mem_account`=?, `mem_password`=?, `mem_name`=?, `mem_nickname`=?, `mem_gender`=?, `mem_birthday`=?, `mem_mobile`=?, `mem_email`=?, `mem_avatar`=?
            WHERE `mem_id`=?";

    try {
        $stmt = $pdo->prepare($sql);

        if (move_uploaded_file($_FILES['my_file']['tmp_name'], $full_path)) {
            $result['success'] = true;
            $result['errorCode'] = 202;
            $result['errorMsg'] = '大頭貼新增成功';
        } else {
            $result['errorCode'] = 411;
            $result['errorMsg'] = '大頭貼暫存檔無法搬移';
        }

        $stmt->execute([
            $_POST['account'],
            $_POST['password'],
            $_POST['name'],
            $_POST['nickname'],
            $_POST['gender'],
            $_POST['birthday'],
            $_POST['mobile'],
            $_POST['email'],
            $full_path,
            $mem_id
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
