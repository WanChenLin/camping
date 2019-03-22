<?php

require __DIR__ . '/__connect_db.php';

//獲取出來要刪除的數據
$id = $_GET['id'];

//準備sql語句（增加、刪除、修改、查詢 etc.） //select、update、insert、delete 
$sql = "DELETE FROM host_infolist WHERE host_id = $id";

//發送sql語句
$bool = mysqli_query($link, $sql);

//處理結果集
if ($bool && mysqli_affected_rows($link)) {
    echo '刪除成功';
    echo '<br>';
    echo '<a href="host_list.php">返回</a>';
} else {
    echo '刪除失敗';
}

//關閉資料庫（釋放資源）
mysqli_close($link);
