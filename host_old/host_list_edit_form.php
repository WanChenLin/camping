<?php

require __DIR__ . '/__connect_db.php';

//獲取出來要編輯的數據
$id = $_GET['id'];

//準備sql語句（增加、刪除、修改、查詢 etc.） //select、update、insert、delete 
$sql = "SELECT * FROM host_infolist WHERE host_id = $id";

//發送sql語句
$obj = mysqli_query($link, $sql);

//處理結果集
$rows = mysqli_fetch_assoc($obj);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="post" action="host_list_edit_sent.php">
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        帳號：<input type="text" value="<?php echo $rows['host_account']; ?>" name="host_account"><br>
        密碼：<input type="text" value="<?php echo $rows['host_password']; ?>" name="host_password"><br>
        園區名：<input type="text" value="<?php echo $rows['host_parkName']; ?>" name="host_parkName"><br>
        連絡電話：<input type="text" value="<?php echo $rows['host_tel']; ?>" name="host_tel"><br>
        傳真號碼：<input type="text" value="<?php echo $rows['host_fax']; ?>" name="host_fax"><br>
        電子郵件：<input type="text" value="<?php echo $rows['host_email']; ?>" name="host_email"><br>
        所在城市：<input type="text" value="<?php echo $rows['city_id']; ?>" name="city_id"><br>
        所在地區：<input type="text" value="<?php echo $rows['dist_id']; ?>" name="dist_id"><br>
        詳細地址：<input type="text" value="<?php echo $rows['host_address']; ?>" name="host_address"><br>
        園區介紹：<input type="text" value="<?php echo $rows['host_intro']; ?>" name="host_intro"><br>
        收款方式：<input type="text" value="<?php echo $rows['host_paymentTypeId']; ?>" name="host_paymentTypeId"><br>
        收款地址：<input type="text" value="<?php echo $rows['host_paymentAddress']; ?>" name="host_paymentAddress"><br>
        銀行IBAN碼：<input type="text" value="<?php echo $rows['host_bankIBAN']; ?>" name="host_bankIBAN"><br>
        銀行SWIFT碼：<input type="text" value="<?php echo $rows['host_bankSWIFT']; ?>" name="host_bankSWIFT"><br>
        <input type="submit" value="執行修改">

    </form>
</body>

</html> 