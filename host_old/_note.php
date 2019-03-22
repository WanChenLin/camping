<?php

//連接資料庫
$link = mysqli_connect(
    'localhost',
    'jennifer',
    'admin'
);

//判斷是否連接成功
if (!$link) {
    exit('資料庫鏈接失敗');
}

//設置字符集
mysqli_set_charset($link, 'utf8');

//選擇資料庫
mysqli_select_db($link, 'go_camping');

//準備sql語句（增加、刪除、修改、查詢 etc.） //select、update、insert、delete 
$sql = "select * from host_infolist";

//發送sql語句
$res = mysqli_query($link, $sql);

//處理結果集（P35-2）
$result = mysqli_fetch_assoc($res);

//關閉資料庫（釋放資源）
mysqli_close($link);