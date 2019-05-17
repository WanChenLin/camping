<?php

include '../../__connect_db.php';

$per_page = 10;

$result = [
    'success' => false,
    'page' => 0,
    'perPage' => $per_page,
    'totalRows' => 0,
    'totalPages' => 0,
    'data' => [],
    'errorCode' => 0,
    'errorMsg' => ''
];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

if (isset($_POST['searchdb'])) {

    // 抓到關鍵字和篩選條件
    $search = htmlentities($_POST['search']);

    // 沒有輸入關鍵字
    if (empty($search)) {
        $result['errorCode'] = 412;
        $result['errorMsg'] = '請輸入關鍵字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 總筆數
    $total_sql = "SELECT COUNT(1) FROM `host_list`
                WHERE (`host_acc` LIKE '%" . $search . "%'
                OR `host_incName` LIKE '%" . $search . "%' 
                OR `host_incVat` LIKE '%" . $search . "%'
                OR `host_incTel` LIKE '%" . $search . "%' 
                OR `host_incFax` LIKE '%" . $search . "%' 
                OR `host_incEmail` LIKE '%" . $search . "%' 
                OR `host_incAdd` LIKE '%" . $search . "%' 
                OR `host_bankName` LIKE '%" . $search . "%' 
                OR `host_bankAcc` LIKE '%" . $search . "%')";
    $total_stmt = $pdo->query($total_sql);
    $total_rows = $total_stmt->fetch(PDO::FETCH_NUM)[0];
    $result['totalRows'] = $total_rows;

    // 調整頁數
    $total_pages = ceil($total_rows / $per_page);
    $result['totalPages'] = $total_pages;
    if ($page < 1) {
        $page = 1;
    }
    if ($page > $total_pages) {
        $page = $total_pages;
    }
    $result['page'] = $page;

    // 從資料庫找到指定資料
    $page_start = ($page - 1) * $per_page;
    $sql = sprintf("SELECT * FROM host_list
            WHERE (host_acc LIKE :search 
            OR host_incName LIKE :search 
            OR host_incVat LIKE :search 
            OR host_incTel LIKE :search 
            OR host_incFax LIKE :search 
            OR host_incEmail LIKE :search 
            OR host_incAdd LIKE :search 
            OR host_bankName LIKE :search 
            OR host_bankAcc LIKE :search)
            ");

    try {
        // 抓出指定資料
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() != 0) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '已搜尋完畢';
            $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result['errorCode'] = 413;
            $result['errorMsg'] = '查無資料';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 414;
        $result['errorMsg'] = '???';
    }
} else {
    // 總筆數
    $total_sql = "SELECT COUNT(1) FROM host_list";
    $total_stmt = $pdo->query($total_sql);
    $total_rows = $total_stmt->fetch(PDO::FETCH_NUM)[0];
    $result['totalRows'] = $total_rows;

    // 調整頁數
    $total_pages = ceil($total_rows / $per_page);
    $result['totalPages'] = $total_pages;
    if ($page < 1) {
        $page = 1;
    }
    if ($page > $total_pages) {
        $page = $total_pages;
    }
    $result['page'] = $page;


    // 將資料庫中的資料讀出
    $sql = sprintf("SELECT * FROM host_list ORDER BY host_id DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
    $stmt = $pdo->query($sql);

    // 抓出指定資料
    $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['success'] = true;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
