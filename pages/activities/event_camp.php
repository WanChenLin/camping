<?php
require '../../__cred.php';
require '../../__connect_db.php';

$camp_id = isset($_GET['camp_id']) ? intval($_GET['camp_id']) : 0;

$sql = "SELECT * FROM `campsite_list` WHERE camp_id=$camp_id";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<main class="col-md-10 bg-white">
    <section>

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

    </section>
</main>

<?php include '../../__index_foot.php'; ?>