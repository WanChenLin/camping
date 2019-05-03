<?php

include __DIR__ . '/__connect_db.php';

$per_page = 10;

$result = [
    'success' => false ,
    'page'=> 0 ,
    'perPage' => $per_page ,
    'totalRows' => 0 ,
    'totalPages' => 0 ,
    'data' => [] ,
    'errorCode' => 0 ,
    'errorMsg' => ''
];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$total_sql = "SELECT COUNT(1) FROM member_list";
$total_stmt = $pdo->query($total_sql);
$total_rows = $total_stmt->fetch(PDO::FETCH_NUM)[0];
$result['totalRows'] = $total_rows;

$total_pages = ceil($total_rows / $per_page);
$result['totalPages'] = $total_pages;
if ($page < 1) {
    $page = 1;
}
if ($page > $total_pages) {
    $page = $total_pages;
}
$result['page'] = $page;

$sql = sprintf("SELECT *, (SELECT level_title FROM member_level WHERE mem_level=memLevel_id ) AS level_title
                FROM member_list ORDER BY mem_id DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);


$result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result['success'] = true;

echo json_encode($result, JSON_UNESCAPED_UNICODE);