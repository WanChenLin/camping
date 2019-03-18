<?php
// require __DIR__. '/__cred.php';
require __DIR__. '/__connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$pdo->query("DELETE FROM `address_book` WHERE `sid`=$sid");


$goto = 'data_list.php'; // 預設值

if(isset($_SERVER['HTTP_REFERER'])){
    $goto = $_SERVER['HTTP_REFERER'];
}

header("Location: $goto");
