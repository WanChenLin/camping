<?php
require '../../__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '',
    'post' => [], // 做 echo 檢查

];

if (isset($_POST['coupon_record_id'])) {
    $gain_record_id = htmlentities($_POST['coupon_record_id']);
    $coupon_valid = $_POST['coupon_valid'];
    $result['post'] = $_POST; // 做 echo 檢查

    // TODO: 檢查

    $sql = "UPDATE `coupon_gain` SET
              `coupon_valid`=?
              WHERE  `gain_record_id`=?";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $coupon_valid,
            $gain_record_id,
        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '修改錯誤';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 403;
        $result['errorMsg'] = $ex->getMessage();
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
