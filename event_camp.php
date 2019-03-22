<?php
require __DIR__ . '/__connect_acDB.php';

$camp_id = isset($_GET['camp_id']) ? intval($_GET['camp_id']) : 0;

$sql = "SELECT * FROM `campsite_list` WHERE camp_id=$camp_id";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__ . '/__head.php'; ?>

<table class="table table-bordered">
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <th scope="row" style="width:150px">營區名稱</th>
            <td><?= $row['camp_name'] ?></td>
        </tr>
        <tr>
            <th scope="row" style="width:150px">地址</th>
            <td><?= $row['camp_address'] ?></td>
        </tr>
        <tr>
            <th scope="row" style="width:150px">聯絡人</th>
            <td><?= $row['camp_ownerName'] ?></td>
        </tr>
        <tr>
            <th scope="row" style="width:150px">聯絡電話</th>
            <td><?= $row['camp_tel'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<a class="btn btn-primary" href="event_list.php" role="button">回活動列表頁</a>


<?php include __DIR__ . '/__md.php'; ?>
<?php include __DIR__ . '/__footer.php' ?> 