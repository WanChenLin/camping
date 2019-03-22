<?php
require __DIR__ . '/__connect_acDB.php';


$per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_sql = "SELECT COUNT(1) FROM `event_list`";
$t_pdo_query = $pdo->query($t_sql);
$total_rows = $t_pdo_query->fetch(PDO::FETCH_NUM)[0];

$total_page = ceil($total_rows / $per_page);

$sql = sprintf("SELECT * FROM `event_list` ORDER BY event_id DESC LIMIT %s,%s", ($page - 1) * $per_page, $per_page);
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

// print_r($rows);


$sql_countMem = "SELECT event_id, COUNT(event_id) num FROM event_applylist GROUP BY event_id";
$pdo_query_countMem = $pdo->query($sql_countMem);
$rows_countMem = $pdo_query_countMem->fetchAll(PDO::FETCH_ASSOC);

// echo print_r($rows_countMem);

$num_data = [];
foreach ($rows_countMem as $v) {
    $num_data[$v['event_id']] = $v['num'];
}
// echo print_r($num_data);

?>
<?php include __DIR__ . '/__head.php'; ?>


<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="event_insert.php">
            <h5>新增活動</h5>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  active" href="event_list.php">
            <h5>活動列表</h5>
        </a>
    </li>
</ul>

<ul class="nav nav-pills mt-2 justify-content-end">
    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= $page - 1 ?>">&lt;</a>
    </li>
    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
    <li class="nav-item">
        <a class="nav-link  <?= $i == $page ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
    </li>
    <?php endfor; ?>
    <li class="page-item <?= $page >= $total_page ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
    </li>
</ul>

<?php foreach ($rows as $row) : ?>
<div class="card m-2">
    <ul class="nav flex-row-reverse p-2">
        <li class="nav-item p-2">
            <a href="javascript: delete_it(<?= $row['event_id'] ?>)">
                <i class="fas fa-trash-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="event_edit.php?event_id=<?= $row['event_id'] ?>"><i class="fas fa-edit"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="event_intro.php?event_id=<?= $row['event_id'] ?>">活動內容</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="apply_orderInsert.php?event_id=<?= $row['event_id'] ?>">新增報名</a>
        </li>
    </ul>
    <table class="table">
        <thead>
            <tr style="font-size:14px">
                <th scope="col" style="width:12vw">活動名稱( <?= $row['event_id'] ?> )</th>
                <th scope="col">報名日期</th>
                <th scope="col">活動日期</th>
                <th scope="col">營地編號</th>
                <th scope="col">價格</th>
                <th scope="col">人數上限</th>
                <th scope="col">已報名人數</th>
                <th scope="col" style="width:15vw">備註</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $row['event_name'] ?></td>
                <td><?= $row['event_applyStart'] ?> 至<br><?= $row['event_applyEnd'] ?></td>
                <td><?= $row['event_dateStart'] ?> 至<br><?= $row['event_dateEnd'] ?></td>
                <td><?= $row['camp_id'] ?><br><a href="event_camp.php?camp_id=<?= $row['camp_id'] ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" style="font-size:12px">明細</a></td>
                <td><?= $row['event_price'] ?></td>
                <td><?= $row['event_upLimit'] ?></td>
                <td>
                    <?= isset($num_data[$row['event_id']])?$num_data[$row['event_id']]:0 ?><br><a href="apply_orderlist.php?event_id=<?= $row['event_id'] ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" style="font-size:12px">明細</a>
                </td>
                <td><?= $row['event_remark'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php endforeach; ?>

<ul class="nav nav-pills  mt-2 justify-content-center">
    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= $page - 1 ?>">&lt;</a>
    </li>
    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
    <li class="nav-item">
        <a class="nav-link  <?= $i == $page ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
    </li>
    <?php endfor; ?>
    <li class="page-item <?= $page >= $total_page ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
    </li>
</ul>

<?php include __DIR__ . '/__md.php'; ?>
<script>
    function delete_it(event_id) {
        if (confirm(`確定要刪除編號 ${event_id}的資料嗎?`)) {
            location.href = 'event_delete.php?event_id=' + event_id;
        }
    }
</script>

<?php include __DIR__ . '/__footer.php'; ?> 