<?php
require __DIR__ . '/__connect.php';

$camp_id = isset($_GET['camp_id']) ? intval($_GET['camp_id']) : 0; //intval將字串轉換成整數值
$pdo->query("DELETE FROM `campsite_list` WHERE `camp_id`= $camp_id");
$goto = 'campsite_list.php';

if (isset($_SERVER['HTTP_REFERER'])) {
    $goto = $_SERVER['HTTP_REFERER'];
}

header("Location:$goto");
