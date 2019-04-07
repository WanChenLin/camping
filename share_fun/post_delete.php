<?php
// require __DIR__. '/__cred.php';
require __DIR__. '/__connect_db.php';

$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;
$post_title = $_GET['post_title'];

$pdo->query("DELETE FROM `share_post` WHERE `post_id`=$post_id");


$goto = 'data_list.php'; // 預設值

if(isset($_SERVER['HTTP_REFERER'])){
    $goto = $_SERVER['HTTP_REFERER'];
}

header("Location: $goto");
