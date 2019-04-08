<?php
 // require __DIR__ . '/__cred.php';
require __DIR__ . '/__connect_acDB.php';



$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 1;

//$sql = "SELECT * FROM `event_applyorder` WHERE `event_id`=$event_id";
$sql = "SELECT * FROM  `event_applyorder` JOIN `event_list` ON `event_applyorder`.`event_id`=`event_list`.`event_id`  WHERE `event_applyorder`.`event_id`=$event_id ORDER BY apply_date DESC";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);


$apply_sql = "SELECT COUNT(1) FROM `event_applylist` WHERE `event_id`=$event_id";
$apply_pdo_query = $pdo->query($apply_sql);
$total_apply_rows = $apply_pdo_query->fetch(PDO::FETCH_NUM)[0];

// echo $event_id;

$sql2 = "SELECT event_name FROM event_list WHERE event_id=$event_id";
$pdo_query2 = $pdo->query($sql2);
$rows2 = $pdo_query2->fetch(PDO::FETCH_OBJ);
$event_name = $rows2->event_name;

?>


<?php include __DIR__ . '/__head.php'; ?>
<style>
    @media (max-width:768px) {
        .orderList_large {
            display: none;
        }
    }

    @media (min-width:768px) {
        .orderList_smaill {
            display: none;
        }
    }
</style>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="event_insert.php">
            <h5>新增活動</h5>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="event_list.php">
            <h5>活動列表</h5>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">
            <h5>報名狀態</h5>
        </a>
    </li>
</ul>

<div class="alert-light pl-md-4  pt-md-4">
    <h4>活動名稱：<?= $event_name ?></h4>
</div>
<div class="pl-md-4">
    已報名人數：<?= $total_apply_rows ?>
</div>

<?php foreach ($rows as $row) : ?>

<div class="card m-2 orderList_smaill">
    <div class="card-body">
        <div class="row">
            <h6 class="card-subtitle mb-2 text-muted col-md-6">報名編號：<?= $row['apply_id'] ?> ( <a href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>"><?= $row['apply_order'] == 1 ? '取消訂單' : '訂單成立' ?></a> )</h6>
            <p class="card-subtitle mb-2 text-muted col-md-6">報名日期：<?= $row['apply_date'] ?></p>
        </div>
        <h5 class="card-title">
            <a href="member_applyOrder.php?mem_account=<?= $row['mem_account'] ?>">會員帳號：<?= $row['mem_account'] ?>
            </a>
        </h5>             
        <p class="card-text">
            <a href="apply_memberList.php?apply_id=<?= $row['apply_id'] ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" style="font-size:12px">報名人數： <?= $row['apply_num'] ?> 人 
            </a> 
            ( <font size="3" color="red">$ <?= $row['apply_amount'] ?></font> / 
            <a href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>"><?= $row['apply_pay'] == 1 ? '已付款' : '未付款' ?>
            </a> )
        </p>
    </div>
</div>

<?php endforeach ?>

<table class="table orderList_large">
    <thead>
        <tr style="font-size:14px">
            <th scope="col">報名編號</th>
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
            <td>
                <a href="member_applyOrder.php?mem_account=<?= $row['mem_account'] ?>">
                    <?= $row['mem_account'] ?>
                </a>
            </td>
            <td><?= $row['apply_num'] ?><br><a href="apply_memberList.php?apply_id=<?= $row['apply_id'] ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" style="font-size:12px">明細</a></td>
            <!-- <a href="apply_memberInsert.php?apply_id=<?= $row['apply_id'] ?>" class="btn btn-outline-primary ml-2" role="button" aria-pressed="true" style="font-size:12px">輸入名單</a> -->
            <td><?= $row['apply_date'] ?></td>
            <td><?= $row['apply_pay'] == 1 ? '已付款' : '未付款' ?><br><a class="nav-link" href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>"><i class="fas fa-edit"></i></a></td>
            <td><?= $row['apply_order'] == 1 ? '取消訂單' : '訂單成立' ?><a class="nav-link" href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>"><i class="fas fa-edit"></i></a></td>
            <td><?= $row['apply_amount'] ?></td>
            <td>
                <a href="javascript: delete_it('<?= $row['apply_id'] ?>')">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-center mt-2">
    <a class="btn btn-primary" href="event_list.php" role="button">回活動列表頁</a>
</div>



<?php include __DIR__ . '/__md.php'; ?>
<script>
    function delete_it(apply_id) {
        if (confirm(`確定要刪除編號 ${apply_id}的資料嗎?`)) {
            // location.href = 'apply_orderDelete.php?apply_id='+apply_id;
            location.href = `apply_orderDelete.php?apply_id=${apply_id}`;
        console.log(apply_id);    
        }
        
    }
</script>
<?php include __DIR__ . '/__footer.php'; ?> 