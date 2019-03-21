<?php
require __DIR__. '/__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      
        
];

if(isset($_POST['checkme'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];

    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($name) or empty($email) or empty($mobile)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // TODO: 檢查 name 長度

    // 檢查 email 格式
    if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result['errorCode'] = 405;
        $result['errorMsg'] = 'Email 格式不正確';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }



    // TODO: 檢查 mobile 格式

    $sql = "INSERT INTO `address_book`(
            `name`, `email`, `mobile`, `birthday`, `address`
            ) VALUES (
              ?, ?, ?, ?, ?
            )";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['mobile'],
            $_POST['birthday'],
            $_POST['address'],
        ]);

        if($stmt->rowCount()==1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料新增錯誤';
        }
    } catch(PDOException $ex){
        $result['errorCode'] = 403;
        $result['errorMsg'] = 'Email 重複輸入';
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);

