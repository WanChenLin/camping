<?php

include '../../__connect_db.php';

$host_id = isset($_GET['host_id']) ? intval($_GET['host_id']) : 0;

$pdo->query("DELETE FROM host_list WHERE `host_id`=$host_id");

// $goto = "member_list.php";

if(isset($_SERVER['HTTP_REFERER'])){ 
    $goto = $_SERVER['HTTP_REFERER'];
}
header("Location: $goto");