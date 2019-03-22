<?php

require __DIR__ . '/__connect_db.php';

//獲取出來要添加的數據
$account = $_POST['host_account'];
$password = $_POST['host_password'];
$name = $_POST['host_parkName'];
$tel = $_POST['host_tel'];
$fax = $_POST['host_fax'];
$email = $_POST['host_email'];
$city = $_POST['city_id'];
$dist = $_POST['dist_id'];
$address = $_POST['host_address'];
$intro = $_POST['host_intro'];
$paymentType = $_POST['host_paymentTypeId'];
$paymentAddress = $_POST['host_paymentAddress'];
$bankIBAN = $_POST['host_bankIBAN'];
$bankSWIFT = $_POST['host_bankSWIFT'];

//準備sql語句（增加、刪除、修改、查詢 etc.） //select、update、insert、delete 
$sql = "INSERT INTO host_infolist(host_account, host_password, host_parkName, host_tel, host_fax, host_email, city_id, dist_id, host_address, host_intro, host_paymentTypeId, host_paymentAddress, host_bankIBAN, host_bankSWIFT) 
        VALUES ($account,$password,$name,$tel,$fax,$email,$city,$dist,$address,$intro,$paymentType,$paymentAddress,$bankIBAN,$bankSWIFT)";

//發送sql語句
$res = mysqli_query($link, $sql);
$id = mysqli_insert_id($link);

//處理結果集
if ($id) {
    echo '添加成功';
    echo '<br>';
    echo '<a href="host_list.php">返回</a>';
} else {
    echo '添加失敗';
}

//關閉資料庫（釋放資源）
mysqli_close($link);

