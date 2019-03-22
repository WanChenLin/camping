<?php
// $db_host = 'localhost';
// $db_name = 'gocamping';
// $db_user = 'su';
// $db_psw = '0000';

$db_host = '192.168.27.37';
$db_name = 'go_camping';
$db_user = 'sammie';
$db_psw = 'admin';

$dsn = "mysql:host={$db_host};dbname={$db_name}";

try{
    $pdo = new PDO($dsn, $db_user, $db_psw, []);
    $pdo->query("SET NAMES utf8");
}catch(PDOException $ex){
    echo $ex->getMessage();
}


?>


