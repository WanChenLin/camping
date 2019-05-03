<?php
//require __DIR__.'/__cred.php';
require __DIR__.'/__connect.php';

//GET取得的值會顯示在URL上
$campArea_id=isset($_GET['campArea_id'])?intval($_GET['campArea_id']):0;//intval將字串轉換成整數值
 $pdo->query("DELETE FROM `campsite_type` WHERE `campArea_id`= $campArea_id");
 $goto='campArea_list.php';

if(isset($_SERVER['HTTP_REFERER'])){
    $goto=$_SERVER['HTTP_REFERER'];
}

header("Location:$goto");