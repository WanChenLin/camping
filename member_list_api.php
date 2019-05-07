<?php

include __DIR__ . '/__connect_db.php';

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
    $filter_gender = htmlentities($_POST['filter_gender']);

    // 沒有輸入關鍵字
    if (empty($search)) {
        $result['errorCode'] = 412;
        $result['errorMsg'] = '請輸入關鍵字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 總筆數
    $total_sql = "SELECT COUNT(1) FROM `member_list`
                WHERE (`mem_account` LIKE '%" . $search . "%'
                OR `mem_name` LIKE '%" . $search . "%' 
                OR `mem_nickname` LIKE '%" . $search . "%'
                OR `mem_mobile` LIKE '%" . $search . "%' 
                OR `mem_email` LIKE '%" . $search . "%' 
                OR `mem_address` LIKE '%" . $search . "%')";
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
    $sql = sprintf("SELECT *, (SELECT level_title FROM member_level WHERE mem_level=memLevel_id ) AS level_title FROM member_list 
            WHERE (mem_account LIKE :search 
            OR mem_name LIKE :search 
            OR mem_nickname LIKE :search 
            OR mem_mobile LIKE :search 
            OR mem_email LIKE :search 
            OR mem_address LIKE :search)
            ");
    // 根據篩選條件調整指定資料
    if ($filter_gender != 'all') {
        $sql .= " AND mem_gender = '$filter_gender' ORDER BY mem_id DESC LIMIT $page_start, $per_page";
    } else {
        $sql .= " ORDER BY mem_id DESC LIMIT $page_start, $per_page";
    }

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
    // (預設:沒有輸入關鍵字) 所有資料一次抓出來

    // 總筆數
    $total_sql = "SELECT COUNT(1) FROM member_list";
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
    $sql = sprintf("SELECT *, (SELECT level_title FROM member_level WHERE mem_level=memLevel_id ) AS level_title
                    FROM member_list ORDER BY mem_id DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
    $stmt = $pdo->query($sql);

    // 抓出指定資料
    $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result['success'] = true;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
