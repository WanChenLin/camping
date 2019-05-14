<?php
require '../__cred.php';
require '../__connect_db.php';

$mem_account = isset($_GET['mem_account']) ? substr($_GET['mem_account'], 0) : 0;

$sql = "SELECT * FROM `event_applyorder` JOIN `event_list` ON `event_applyorder`.`event_id`=`event_list`.`event_id` WHERE mem_account='$mem_account'";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include '../__index_head.php'; ?>
<?php include '../__index_header.php'; ?>
<?php include '../__index_navbar.php'; ?>

<main class="col-md-10 bg-white">

    <section>

        <?php foreach ($rows as $row) : ?>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="uploads\<?= $row['event_img'] ?> ?>" class="" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <p class="card-text">訂單編號<?= $row['apply_id'] ?></p>
                            <h5 class="card-title">活動名稱：<?= $row['event_name'] ?></h5>
                            <p class="card-text">
                                <a href="apply_memberList.php?apply_id=<?= $row['apply_id'] ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" style="font-size:12px">
                                    報名 <?= $row['apply_num'] ?> 人</a>，共 <font size="3" color="red">$ <?= $row['apply_amount'] ?></font> (<?php
                                                                                                                                            if ($row['apply_pay'] == 1) {
                                                                                                                                                echo '已付款';
                                                                                                                                            } else {
                                                                                                                                                echo '尚未付款';
                                                                                                                                            }
                                                                                                                                            ?>)
                            </p>
                            <p class="card-text"><small class="text-muted">活動日期：<?= $row['event_dateStart'] ?> 至 <?= $row['event_dateEnd'] ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <ul class="nav nav-pills justify-content-center">
            <li><a class="btn btn-primary" href="event_list_search.php" role="button">回活動列表頁</a></li>
        </ul>
    </section>

</main>

<?php include '../__index_foot.php'; ?>