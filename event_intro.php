<?php
require __DIR__ . '/__connect_acDB.php';

$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;

$sql = "SELECT * FROM `event_list` WHERE event_id=$event_id";
$pdo_query = $pdo->query($sql);
$row = $pdo_query->fetch(PDO::FETCH_ASSOC);


?>

<?php include __DIR__ . '/__head.php'; ?>


<h3>活動內容</h3>


<div class="card m-2">
    <div class="card-body p-4">

        <form method="post" name="form1">
            <input type="hidden" name="checkme">
            <div class="form-group container d-flex">
                <label for="event_name" style="width:120px">活動名稱：</label>
                <div class="form-control" id="event_name" name="event_name"> <?= $row['event_name'] ?></div>
                <small id="event_nameHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group container d-flex">
                <label for="event_intro" style="width:120px">活動內容一：</label>
                <div class="form-control" id="event_intro" name="event_intro" style="height:150px"> <?= $row['event_intro'] ?> </div>
                <small id="event_introHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group container d-flex">
                <label for="event_intro2" style="width:120px">活動內容二：</label>
                <div class="form-control" id="event_intro2" name="event_intro2" style="height:150px"> <?= $row['event_intro2'] ?> </div>
                <small id="event_intro2Help" class="form-text text-muted"></small>
            </div>
            <div class="form-group container d-flex">
                <label for="event_intro3" style="width:120px">活動內容三：</label>
                <div class="form-control" id="event_intro3" name="event_intro3" style="height:150px"> <?= $row['event_intro3'] ?> </div>
                <small id="event_intro3Help" class="form-text text-muted"></small>
            </div>
            
            <a class="btn btn-primary" href="event_edit.php?event_id=<?= $row['event_id'] ?>" role="button">修改內容</a>
            <a class="btn btn-primary" href="event_list.php" role="button">回列表頁</a>
        </form>
    </div>
</div>



<?php include __DIR__ . '/__footer.php'; ?> 