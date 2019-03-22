<?php

require __DIR__ . '/__connect_db.php';

//獲取出來要編輯的數據
$id = $_POST['id'];
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
$sql = "UPDATE host_infolist SET host_account='$account',host_password='$password',host_parkName='$name',host_tel='$tel',host_fax='$fax',
        host_email='$email',city_id='$city',dist_id='$dist',host_address='$address',host_intro='$intro',
        host_paymentTypeId='$paymentType',host_paymentAddress='$paymentAddress',host_bankIBAN='$bankIBAN',host_bankSWIFT='$bankSWIFT' WHERE host_id = $id";

//發送sql語句
$res = mysqli_query($link, $sql);

//處理結果集
if ($res && mysqli_affected_rows($link)) {
    echo '修改成功';
    echo '<br>';
    echo '<a href="host_list.php">返回</a>';
} else {
    echo '修改失敗';
}

//關閉資料庫（釋放資源）
mysqli_close($link);
