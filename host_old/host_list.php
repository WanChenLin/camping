<?php

require __DIR__ . '/__connect_db.php';

$page_name = 'host_list';

$page = empty($_GET['page']) ? 1 : $_GET['page'];

/*---------------分頁開始---------------*/

//求出總條數
$sql = "SELECT COUNT(*) AS COUNT FROM host_infolist";
$result = mysqli_query($link, $sql);
$pageRes = mysqli_fetch_assoc($result);
$count = $pageRes['COUNT'];
//每頁顯示的數據量
$num = 10;
//根據每頁顯示數可以求出來總頁數
$pageCount = ceil($count / $num);
//根據總頁數求出來的偏移量
$offset = ($page - 1) * $num;

/*---------------分頁結束---------------*/

//準備sql語句（增加、刪除、修改、查詢 etc.） //select、update、insert、delete 
$sql = "SELECT * FROM host_infolist limit " . $offset . ',' . $num;

//發送sql語句
$obj = mysqli_query($link, $sql);

//處理結果集
echo '<table border="1">';
echo '<a href="host_list_add_form.php">新增營地主</a>';
echo '
        <th>流水號</th>
        <th>帳號</th>
        <th>密碼</th>
        <th>園區名</th>
        <th>連絡電話</th>
        <th>傳真號碼</th>
        <th>電子郵件</th>
        <th>所在城市</th>
        <th>所在地區</th>
        <th>詳細地址</th>
        <th>園區介紹</th>
        <th>收款方式</th>
        <th>收款地址</th>
        <th>銀行IBAN碼</th>
        <th>銀行SWIFT碼</th>
        <th>資料操作</th>';
while ($rows = mysqli_fetch_assoc($obj)) {
    echo '<tr>';
    echo '<td>' . $rows['host_id'] . '</td>';
    echo '<td>' . $rows['host_account'] . '</td>';
    echo '<td>' . $rows['host_password'] . '</td>';
    echo '<td>' . $rows['host_parkName'] . '</td>';
    echo '<td>' . $rows['host_tel'] . '</td>';
    echo '<td>' . $rows['host_fax'] . '</td>';
    echo '<td>' . $rows['host_email'] . '</td>';
    echo '<td>' . $rows['city_id'] . '</td>';
    echo '<td>' . $rows['dist_id'] . '</td>';
    echo '<td>' . $rows['host_address'] . '</td>';
    echo '<td>' . $rows['host_intro'] . '</td>';
    echo '<td>' . $rows['host_paymentTypeId'] . '</td>';
    echo '<td>' . $rows['host_paymentAddress'] . '</td>';
    echo '<td>' . $rows['host_bankIBAN'] . '</td>';
    echo '<td>' . $rows['host_bankSWIFT'] . '</td>';
    echo '<td><a href="host_list_delete.php?id=' . $rows['host_id'] . '">刪除</a>
                / <a href="host_list_edit_form.php?id=' . $rows['host_id'] . '">修改</a>
                / <a href="">查看營地</a></td>';
    echo '</tr>';
}
echo '</table>';

$next = $page + 1;
$prev = $page - 1;

if ($prev < 1) {
    $prev = 1;
}
if ($next > $pageCount) {
    $next = $pageCount;
}

//關閉資料庫（釋放資源）
mysqli_close($link);
?>

<a href="host_list.php?page=1">首頁</a>&nbsp;&nbsp;&nbsp;
<a href="host_list.php?page=<?= $prev; ?>">上一頁</a>&nbsp;&nbsp;&nbsp;
<a href="host_list.php?page=<?= $next; ?>">下一頁</a>&nbsp;&nbsp;&nbsp;
<a href="host_list.php?page=<?= $pageCount; ?>">尾頁</a>&nbsp;&nbsp;&nbsp; 