<?php
require __DIR__.'/__salepage_connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      
        
];

// if(isset($_POST['checksale'])){
    $name = $_POST['salepage_name'];
    $sutprice = $_POST['salepage_suggestprice'];
    $price = $_POST['salepage_price'];
    $cost= $_POST['salepage_cost'];
    $feature = $_POST['salepage_feature'];
    $state = $_POST['salepage_state'];
    //ckeditor
    $details = $_POST['salepage_proddetails'];

    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($name) or empty($price)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // TODO: 檢查 name 長度

    $sql = "INSERT INTO `SalePage`(
            `salepage_name`, `salepage_suggestprice`, 
            `salepage_price`, `salepage_cost`, 
            `salepage_feature`, `salepage_state`,
            `salepage_proddetails`
            ) VALUES (
              ?, ?, ?, ?, ?, ?, ?
            )";

    //SaleCategorycate
    // $catesql = "SELECT * FROM `SaleCategory`;
    // $catestmt = $pdo->prepare($catesql);

    // $catestmt->execute([
    //     $_POST['salecate_id']]
    //     );

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['salepage_name'],
            $_POST['salepage_suggestprice'],
            $_POST['salepage_price'],
            $_POST['salepage_cost'],
            $_POST['salepage_feature'],
            $_POST['salepage_state'],
            $_POST['salepage_proddetails']
        ]);

        if($stmt->rowCount()==1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料新增錯誤';
        }
// }

echo json_encode($result, JSON_UNESCAPED_UNICODE);

