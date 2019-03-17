<?php
$db_host = 'localhost';
$db_name = 'camping';
$db_user = 'tingxi';
$db_pass = 'admin';

$dsn = "mysql:host={$db_host};dbname={$db_name}";


    $pdo = new PDO($dsn, $db_user, $db_pass, []);
    $pdo->query("SET NAMES utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(! isset($_SESSION)){
        session_start();
    }