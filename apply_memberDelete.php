<?php
// require __DIR__.'/__cred.php';
require __DIR__.'/__connect_acDB.php';


$applyList_id = isset($_GET['applyList_id']) ? intval($_GET['applyList_id']) : 0;

$pdo->query("DELETE FROM `event_applylist` WHERE `applyList_id`=$applyList_id");


$goto = 'apply_memberList.php'; // 預設值

if(isset($_SERVER['HTTP_REFERER'])){
    $goto = $_SERVER['HTTP_REFERER'];
}

header("Location: $goto");



?>