<?php

$db_host = 'localhost';
$db_name = 'mytest';
$db_user = 'shinder';
$db_pass = 'admin';


$dsn = "mysql:host={$db_host};dbname={$db_name}";

try{

    $pdo = new PDO($dsn, $db_user, $db_pass);

    $pdo->query("SET NAMES utf8");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $ex){
    echo 'Error: '. $ex->getMessage();
}

if(! isset($_SESSION)){
    session_start();
}







