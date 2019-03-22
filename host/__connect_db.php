<?php

$db_host = 'localhost';
$db_name = 'go_camping';
$db_user = 'jennifer';
$db_password = 'admin';

$dsn = "mysql:host={$db_host};dbname={$db_name}";

try {

    $pdo = new PDO($dsn, $db_user, $db_password);
    // 讓中文能正常顯示
    $pdo->query("SET NAMES utf8");
    // 除錯機制
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error: ' . $ex->getMessage();
}

if (!isset($_SESSION)) {
    session_start();
}
