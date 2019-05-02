<?php
require __DIR__.'/__salepage_connect_db.php';

$per_page = 5;

$result = [
    'success' => false,
    'page' => 0,
    'totalRows' => 0,
    'per_page' => $per_page,
    'totalPages' => 0,
    'data' => [],
    'errorCode' => 0,
    'errorMsg' => '',
];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$where_sql = " WHERE 1 = 1 ";
if(isset($_POST["query"]) && strlen($_POST["query"]) > 0)
{
    $q = $_POST["query"];
    $where_sql .= sprintf(" AND salepage_name LIKE '%%%s%%' ", $q);
}

if(isset($_POST["cate"]) && strlen($_POST["cate"]) > 0)
{
    $c = $_POST["cate"];
    $where_sql .= sprintf(" AND salepage_salecateid = %s ", $c);
}

// 算總筆數
$t_sql = sprintf("SELECT COUNT(1) FROM salepage
                    %s", $where_sql);
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
$result['totalRows'] = intval($total_rows);

// 總頁數
$total_pages = $total_rows > 0 ? ceil($total_rows/$per_page) : 1;
$result['totalPages'] = $total_pages;

if($page < 1) $page = 1;
if($page > $total_pages) $page = $total_pages;
$result['page'] = $page;    

$salesql = sprintf(" SELECT 
salepage_id,
salepage_name, 
salepage_quility, 
salepage_suggestprice, 
salepage_price, 
salepage_cost, 
salepage_state, 
salepage_feature, 
salepage_proddetails, 
salepage_specification, 
salepage_paymenttype, 
salepage_deliverytype, 
-- 括號裡是一個 statemen, 用 AS 給他一個欄位名稱                    
(SELECT salecate_name FROM salecategory WHERE salecate_id = salepage_salecateid) AS salecate_name,
salepage_image
FROM salepage 
%s
ORDER BY salepage_id DESC LIMIT %s, %s", $where_sql, ($page-1)*$per_page, $per_page);    

$stmt = $pdo->query($salesql);

$result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result['success'] = true;

// 將陣列轉換成 json 字串
echo json_encode($result, JSON_UNESCAPED_UNICODE); 



    
