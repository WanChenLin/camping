<?php

//require __DIR__ . '/__cred.php';

require __DIR__ . '/__connect_db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$pdo->query("DELETE FROM `host_infolist` WHERE `host_id`=$id");


$goto = 'host_list.php'; // 預設值

if (isset($_SERVER['HTTP_REFERER'])) {
    $goto = $_SERVER['HTTP_REFERER'];
}

header("Location: $goto");
