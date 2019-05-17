<?php
include '../../__connect_db.php';

$salepage_id = isset($_GET['salepage_id']) ? intval($_GET['salepage_id']) : 0;

$sql = "DELETE FROM `SalePage` WHERE `salepage_id` = ?";    

$stmt = $pdo->prepare($sql);

        $stmt->execute([
            $salepage_id
        ]);

        if($stmt->rowCount()==1) {
            // $result['success'] = true;
            // $result['errorCode'] = 200;
            // $result['errorMsg'] = '';

        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料刪除錯誤';
        }

    if(isset($_SERVER['HTTP_REFERER'])){ 
        $goto = $_SERVER['HTTP_REFERER'];
    }
    header("Location: $goto");
    
// echo json_encode($result, JSON_UNESCAPED_UNICODE);
//

