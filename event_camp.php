<?php
// require __DIR__.'/__cred.php';
require __DIR__ . '/__connect_acDB.php';

$camp_id = isset($_GET['camp_id']) ? intval($_GET['camp_id']) : 0;

$sql = "SELECT * FROM `campsite_list` WHERE camp_id=$camp_id";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__ . '/__head.php'; ?>
<!-- <ul class="nav nav-tabs">
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
            <h5>營地資訊</h5>
        </a>
    </li>
</ul> -->

<aside class="bg-warning">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-2">
            <li class="breadcrumb-item">主題活動</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="event_list_search.php">活動列表</a></li>
            <li class="breadcrumb-item active" aria-current="page">營地資訊</li>
        </ol>
    </nav>
</aside>

<table class="table table-striped table-bordered">
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
                <th scope="row" style="width:150px">經緯度</th>
                <td><?= $row['camp_location'] ?></td>
            </tr>
            <tr>
                <th scope="row" style="width:150px">聯絡人</th>
                <td><?= $row['camp_ownerName'] ?></td>
            </tr>
            <tr>
                <th scope="row" style="width:150px">聯絡電話</th>
                <td><?= $row['camp_tel'] ?></td>
            </tr>
            <tr>
                <th scope="row" style="width:150px">傳真</th>
                <td><?= $row['camp_fax'] ?></td>
            </tr>
            <tr>
                <th scope="row" style="width:150px">電子郵件</th>
                <td><?= $row['camp_email'] ?></td>
            </tr>
            <tr>
                <th scope="row" style="width:150px">適合對象</th>
                <td><?= $row['camp_target'] ?></td>
            </tr>
            <tr>
                <th scope="row" style="width:150px">開放時間</th>
                <td><?= $row['camp_openTime'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div class="d-flex justify-content-center">
    <a class="btn btn-primary" href="event_list_search.php" role="button">回活動列表頁</a>
</div>


<?php include __DIR__ . '/__md.php'; ?>
<?php include __DIR__ . '/__footer.php' ?>