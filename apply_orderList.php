<?php
require __DIR__ . '/__connect_acDB.php';



$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 1;


//$sql = "SELECT * FROM `event_applyorder` WHERE `event_id`=$event_id";
$sql = "SELECT * FROM  `event_applyorder` JOIN `event_list` ON `event_applyorder`.`event_id`=`event_list`.`event_id` WHERE `event_applyorder`.`event_id`=$event_id";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);


$apply_sql = "SELECT COUNT(1) FROM `event_applylist` WHERE `event_id`=$event_id";
$apply_pdo_query = $pdo->query($apply_sql);
$total_apply_rows = $apply_pdo_query->fetch(PDO::FETCH_NUM)[0];


// $sql_mem = "SELECT `apply_id` FROM  `event_applylist`WHERE `event_id`=$event_id";
// $pdo_query = $pdo->query($sql);
// $rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

// $applyMem_sql = "SELECT COUNT(1) FROM `event_applylist` WHERE `apply_id`=$apply_id";
// $applyMem_pdo_query = $pdo->query($applyMem_sql);
// $total_applyMem_rows = $applyMem_pdo_query->fetch(PDO::FETCH_NUM)[0];


?>


<?php include __DIR__ . '/__head.php'; ?>
<table class="table">
<h3>已報名人數：<?= $total_apply_rows ?></h3>
<!-- <h3>已報名人數：<?= $total_applyMem_rows ?></h3> -->
    <thead>
        <tr style="font-size:14px">
            <th scope="col">報名編號</th>
            <th scope="col">活動編號</th>
            <th scope="col">活動名稱</th>
            <th scope="col">會員帳號</th>
            <th scope="col">報名人數</th>
            <th scope="col">報名日期</th>
            <th scope="col">付款狀態</th>
            <th scope="col">訂單狀態</th>
            <th scope="col">訂單金額</th>
            <th scope="col">
                <i class="fas fa-trash-alt"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <td><?= $row['apply_id'] ?></td>
            <td><?= $row['event_id'] ?></td>
            <td><?= $row['event_name'] ?></td>
            <td><?= $row['mem_account'] ?></td>
            <td><?= $row['apply_num'] ?><br><a href="apply_memberList.php?apply_id=<?= $row['apply_id'] ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" style="font-size:12px">明細</a><a href="apply_memberInsert.php?apply_id=<?= $row['apply_id'] ?>" class="btn btn-outline-primary ml-2" role="button" aria-pressed="true" style="font-size:12px">輸入名單</a></td>
            <td><?= $row['apply_date'] ?></td>
            <td><?= $row['apply_pay'] == 1 ? '已付款' : '未付款' ?><br><a class="nav-link" href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>"><i class="fas fa-edit"></i></a></td>
            <td><?= $row['apply_order'] == 1 ? '取消訂單' : '' ?><a class="nav-link" href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>"><i class="fas fa-edit"></i></a></td>
            <td><?= $row['apply_amount'] ?></td>
            <td>
                <a href="javascript: delete_it(<?= $row['apply_id'] ?>)">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a class="btn btn-primary" href="event_list.php" role="button">回活動列表頁</a>


<?php include __DIR__ . '/__md.php'; ?>
<script>
    function delete_it(apply_id) {
        if (confirm(`確定要刪除編號 ${apply_id}的資料嗎?`)) {
            location.href = 'apply_orderDelete.php?apply_id=' + apply_id;
        }
    }
</script>
<?php include __DIR__ . '/__footer.php'; ?> 