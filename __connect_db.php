<?php
// 宛臻的電腦
$db_host = '192.168.27.37';
$db_name = 'go_camping';
$db_user = 'sammie';
$db_password = 'admin';

// localhost配資料庫(目前帳號是佩珊的電腦)
// $db_host = 'localhost';
// $db_name = 'gocamping_all';
// $db_user = 'sammie0804';
// $db_password = 'admin';

$dsn = "mysql:host={$db_host};dbname={$db_name}";

try {
    $pdo = new PDO($dsn, $db_user, $db_password, []);
    $pdo->query("SET NAMES utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error: ' . $ex->getMessage();
}
