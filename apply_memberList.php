<?php
require __DIR__ . '/__connect_acDB.php';

$apply_id = isset($_GET['apply_id']) ? intval($_GET['apply_id']) : 0;

$sql = "SELECT * FROM `event_applylist` JOIN `event_applyorder` ON `event_applylist`.`apply_id`=`event_applyorder`.`apply_id` WHERE `event_applylist`.`apply_id`=$apply_id";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);


$sth = $pdo->prepare("SELECT event_id FROM event_applyorder WHERE apply_id=$apply_id");
$sth->execute();
$result = $sth->fetchColumn();
// print("event_id = $result\n");
$aa = "$result\n";
// echo $aa;

$sql2="SELECT event_name FROM event_list WHERE event_id=$aa";
$pdo_query2 = $pdo->query($sql2);
$rows2 = $pdo_query2->fetch(PDO::FETCH_OBJ);
$event_name=$rows2->event_name;
// echo $event_name;
// echo $rows2->event_name;
// print_r($rows2);
?>

<?php include __DIR__ . '/__head.php'; ?>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" >
            <h5>報名名單</h5>
        </a>
    </li>
</ul>
<div class="alert alert-light" role="alert">
 活動名稱：<?= $event_name ?>
</div>
<table class="table">
        <thead>
            <tr style="font-size:14px">
                <th><i class="fas fa-trash-alt"></i></th>
                <th scope="col" >報名編號</th>
                <th scope="col">活動編號</th>
                <th scope="col">參加人姓名</th>
                <th scope="col">參加人id</th>
                <th scope="col">參加人mobile</th>
                <th scope="col">參加人email</th>
                <th scope="col">參加人emg</th>
                <th scope="col">參加人emgMobile</th>
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
                <td><?= $row['apply_id'] ?></td>
                <td><?= $row['event_id'] ?></td>
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
   <a class="btn btn-primary" href="apply_orderList.php?event_id=<?= $row['event_id'] ?>" role="button">回報名資料列表頁</a>
   <a class="btn btn-primary" href="event_list.php" role="button">回活動列表頁</a>


<?php include __DIR__ . '/__md.php'; ?>

<script>
    function delete_it(applyList_id) {
        if (confirm(`確定要刪除編號 ${applyList_id}的資料嗎?`)) {
            location.href = 'apply_memberDelete.php?applyList_id=' + applyList_id;
        }
    }
</script>

<?php include __DIR__ . '/__footer.php'; ?> 