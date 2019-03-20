<?php
require __DIR__.'/__salepage_connect_db.php';

$per_page = 10;

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

$salepage = isset($_GET['page']) ? intval($_GET['page']) : 1;

$tsale_sql = "SELECT COUNT(1) FROM salepage";
$tsale_stmt = $pdo->query($tsale_sql);
$salet_rows = $tsale_stmt->fetch(PDO::FETCH_NUM)[0];
$result['totalRows'] = intval($salet_rows);

$salet_pages = ceil($salet_rows/$per_page);
$result['totalPages'] = $salet_pages;


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
                    FROM salepage ORDER BY salepage_id LIMIT %s, %s", ($salepage-1)*$per_page, $per_page);
$stmt = $pdo->query($salesql);

$result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result['success'] = true;

// 將陣列轉換成 json 字串
echo json_encode($result, JSON_UNESCAPED_UNICODE); 



    
