<?php
require '../__cred.php';
require '../__connect_db.php';

$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;

$pdo->query("DELETE FROM `event_list` WHERE `event_id`=$event_id");

$goto = 'event_list.php'; // 預設值

if(isset($_SERVER['HTTP_REFERER'])){
    $goto = $_SERVER['HTTP_REFERER'];
}

header("Location: $goto");

?>