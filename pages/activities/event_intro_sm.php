<?php
require '../../__cred.php';
require '../../__connect_db.php';

$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;

$sql = "SELECT * FROM `event_list` WHERE event_id=$event_id";
$pdo_query = $pdo->query($sql);
$row = $pdo_query->fetch(PDO::FETCH_ASSOC);
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<main class="col-md-10 bg-white">
    <section>

        <h3>活動內容</h3>

        <div class="card m-2">
            <div class="card-body p-4">

                <form method="post" name="form1">
                    <input type="hidden" name="checkme">
                    <div class="form-group ">
                        <label for="event_name" style="width:120px">活動名稱：</label>
                        <div class="form-control" id="event_name" name="event_name"> <?= $row['event_name'] ?></div>
                    </div>
                    <div class="form-group ">
                        <label for="event_intro" style="width:120px">活動內容一：</label>
                        <div class="form-control" id="event_intro" name="event_intro" style="height:150px"> <?= $row['event_intro'] ?> </div>
                    </div>
                    <div class="form-group ">
                        <label for="event_intro2" style="width:120px">活動內容二：</label>
                        <div class="form-control" id="event_intro2" name="event_intro2" style="height:150px"> <?= $row['event_intro2'] ?> </div>
                    </div>
                    <div class="form-group ">
                        <label for="event_intro3" style="width:120px">活動內容三：</label>
                        <div class="form-control" id="event_intro3" name="event_intro3" style="height:150px"> <?= $row['event_intro3'] ?> </div>
                    </div>
                    <div class="form-group ">
                        <label for="event_remark" style="width:120px">備註：</label>
                        <div class="form-control" id="event_remark" name="event_remark" style="height:150px"> <?= $row['event_remark'] ?> </div>
                    </div>
                    <ul class="nav nav-pills justify-content-center">
                        <li><a class="btn btn-primary mr-2" href="event_edit.php?event_id=<?= $row['event_id'] ?>" role="button">修改內容</a></li>
                        <li><a class="btn btn-primary" href="event_list.php" role="button">回列表頁</a></li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include '../../__index_foot.php'; ?>