<?php
 // require __DIR__.'/__cred.php';
require __DIR__ . '/__connect_acDB.php';

$apply_id = isset($_GET['apply_id']) ? substr($_GET['apply_id'], 0) : 0;

// echo $apply_id;

$sql = "SELECT * FROM `event_applylist` JOIN `event_applyorder` ON `event_applylist`.`apply_id`=`event_applyorder`.`apply_id` WHERE `event_applylist`.`apply_id`='$apply_id'";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);


$sth = $pdo->prepare("SELECT event_id FROM event_applyorder WHERE apply_id='$apply_id'");
$sth->execute();
$result = $sth->fetchColumn();
// print("event_id = $result\n");
$aa = "$result\n";
// echo $aa;

$sql2 = "SELECT event_name FROM event_list WHERE event_id=$aa";
$pdo_query2 = $pdo->query($sql2);
$rows2 = $pdo_query2->fetch(PDO::FETCH_OBJ);
$event_name = $rows2->event_name;
// echo $event_name;
// echo $rows2->event_name;
// print_r($rows2);
?>

<?php include __DIR__ . '/__head.php'; ?>
<style>
    @media (max-width:768px) {
        .applyMemberList_large {
            display: none;
        }
    }

    @media (min-width:768px) {
        .applyMemberList_smaill {
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
            <h5>報名名單</h5>
        </a>
    </li>
</ul>

<div class="alert-light pl-md-4  pt-md-4">
    <h4>活動名稱：<?= $event_name ?></h4>
</div>
<div class="pl-md-4">
    報名編號：<?= $apply_id ?>
</div>
<?php foreach ($rows as $row) : ?>
<div class="card m-2 applyMemberList_smaill">
    <div class="card-header text-right" style="padding:0">
        <a class="p-2" href="apply_memberEdit.php?applyList_id=<?= $row['applyList_id'] ?>">
            <i class="fas fa-edit m-2"></i>
        </a>
        <a class="p-2" href="javascript: delete_it(<?= $row['applyList_id'] ?>)">
            <i class="fas fa-trash-alt m-2"></i>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <h5 class="card-title col-md-6">姓名：<?= $row['applyList_name'] ?></h5>
            <h5 class="card-title col-md-6">身份證字號：<?= $row['applyList_idn'] ?></h5>
        </div>
        <div class="row">
            <p class="card-text col-md-6" style="margin:0">手機：<?= $row['applyList_mobile'] ?></p>
            <p class="card-text col-md-6" style="margin:0">email：<?= $row['applyList_email'] ?></p>
        </div>
        <div class="row">
            <p class="card-text col-md-6" style="margin:0">緊急連絡人：<?= $row['applyList_mobile'] ?></p>
            <p class="card-text col-md-6" style="margin:0">緊急連絡人電話：<?= $row['applyList_emgMobile'] ?></p>
        </div>
        <p class="card-text" style="margin:0">備註：<?= $row['applyList_remark'] ?></p>
    </div>
</div>
<?php endforeach ?>

<table class="table applyMemberList_large">
    <thead>
        <tr style="font-size:14px">
            <th><i class="fas fa-trash-alt"></i></th>
            <th scope="col">參加人姓名</th>
            <th scope="col">參加人id</th>
            <th scope="col">參加人mobile</th>
            <th scope="col">參加人email</th>
            <th scope="col">緊急連絡人</th>
            <th scope="col">緊急連絡人電話</th>
            <th scope="col">備註</th>
            <th scope="col"><i class="fas fa-edit"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <td><a href="javascript: delete_it(<?= $row['applyList_id'] ?>)">
                    <i class="fas fa-trash-alt"></i>
                </a></td>
            <td><?= $row['applyList_name'] ?></td>
            <td><?= $row['applyList_idn'] ?></td>
            <td><?= $row['applyList_mobile'] ?></td>
            <td><?= $row['applyList_email'] ?></td>
            <td><?= $row['applyList_emg'] ?></td>
            <td><?= $row['applyList_emgMobile'] ?></td>
            <td><?= $row['applyList_remark'] ?></td>
            <td><a href="apply_memberEdit.php?applyList_id=<?= $row['applyList_id'] ?>"><i class="fas fa-edit"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-center">
    <a class="btn btn-primary" href="apply_orderList.php?event_id=<?= $row['event_id'] ?>" role="button">回上一頁</a>
    <a class="btn btn-outline-primary ml-2" href="event_list.php" role="button">回活動列表頁</a>
</div>


<?php include __DIR__ . '/__md.php'; ?>

<script>
    function delete_it(applyList_id) {
        if (confirm(`確定要刪除編號 ${applyList_id}的資料嗎?`)) {
            location.href = 'apply_memberDelete.php?applyList_id=' + applyList_id;
        }
    }
</script>

<?php include __DIR__ . '/__footer.php'; ?> 