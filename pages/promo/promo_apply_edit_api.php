<?php
require '../../__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '',
    'post' => [], // 做 echo 檢查

];

if (isset($_POST['promo_apply_id'])) {
    $promo_apply_id = htmlentities($_POST['promo_apply_id']);
    $promo_type = $_POST['promo_type'];
    $apply_valid = $_POST['apply_valid'];
    $result['post'] = $_POST; // 做 echo 檢查

    // TODO: 檢查

    $sql = "UPDATE `promo_apply` SET
              `promo_type`=?,
              `apply_valid`=?
              WHERE  `promo_apply_id`=?";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $promo_type,
            $apply_valid,
            $promo_apply_id,
        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '修改未修改';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 403;
        $result['errorMsg'] = $ex->getMessage();
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);