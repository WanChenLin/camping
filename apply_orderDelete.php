<?php
require __DIR__.'/__connect_acDB.php';


$apply_id = isset($_GET['apply_id']) ? intval($_GET['apply_id']) : 0;

$pdo->query("DELETE FROM `event_applyorder` WHERE `apply_id`=$apply_id");


$goto = 'apply_orderList.php'; // 預設值

if(isset($_SERVER['HTTP_REFERER'])){
    $goto = $_SERVER['HTTP_REFERER'];
}

header("Location: $goto");


?>