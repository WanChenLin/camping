<?php

include '../__connect_db.php';

$mem_id = isset($_GET['mem_id']) ? intval($_GET['mem_id']) : 0;

$pdo->query("DELETE FROM member_list WHERE `mem_id`=$mem_id");

// $goto = "member_list.php";

if(isset($_SERVER['HTTP_REFERER'])){ 
    $goto = $_SERVER['HTTP_REFERER'];
}
header("Location: $goto");