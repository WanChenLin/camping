<?php
include '../../__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '',
    'post' => [],
    'data' => []
];

if (isset($_POST['searchdb'])) {
    $search = htmlentities($_POST['search']);
    $result['post'] = $_POST;
    if (empty($search)) {
        $result['errorCode'] = 412;
        $result['errorMsg'] = '請輸入關鍵字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = " SELECT * FROM campsite_list 
            WHERE camp_name LIKE :search 
            OR camp_address LIKE :search 
            OR camp_tel LIKE :search 
            OR camp_email LIKE :search 
            ORDER BY camp_id DESC";

    try {
        $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':search',$search,PDO::PARAM_STR);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        // $stmt->execute([
        //     $_POST['account'],
        // ]);
        $stmt->execute();
        if ($stmt->rowCount() != 0) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '搜尋資料如下';
            $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result['errorCode'] = 413;
            $result['errorMsg'] = '查無資料';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 414;
        $result['errorMsg'] = '???';
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
