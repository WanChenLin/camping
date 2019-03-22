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

