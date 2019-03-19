<?php
require __DIR__.'/__salepage_connect_db.php';

$salepage_id = isset($_GET['salepage_id']) ? intval($_GET['salepage_id']) : 0;

$pdo = $pdo->query(" DELETE FROM `SalePage` WHERE `salepage_id` = $salepage_id");

$goto = 'salepage_list.php';
if(isset($_SERVER['HTML_REFERER']))
{
    $goto = $_SERVER['HTML_REFERER'];
}

header("Location: $goto");

