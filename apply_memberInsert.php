<?php
require __DIR__ . '/__connect_acDB.php';

$apply_id = isset($_GET['apply_id']) ? intval($_GET['apply_id']) : 0;


$sql3 = "SELECT * FROM `event_applyorder` WHERE`event_applyorder`.`apply_id`=$apply_id ";
$pdo_query3 = $pdo->query($sql3);
$rows2 = $pdo_query3->fetch(PDO::FETCH_OBJ);


// $apply_id = '';
$event_id = '';
$applyList_name = '';
$applyList_idn = '';
$applyList_mobile = '';
$applyList_email = '';
$applyList_emg = '';
$applyList_emgMobile = '';
$applyList_remark = '';


if (isset($_POST['checkme'])) {

    // $apply_id = htmlentities($_POST['apply_id']);
    $event_id = htmlentities($_POST['event_id']);
    $applyList_name = htmlentities($_POST['applyList_name']);
    $applyList_idn = htmlentities($_POST['applyList_idn']);
    $applyList_mobile = htmlentities($_POST['applyList_mobile']);
    $applyList_email = htmlentities($_POST['applyList_email']);
    $applyList_emg = htmlentities($_POST['applyList_emg']);
    $applyList_emgMobile = htmlentities($_POST['applyList_emgMobile']);
    $applyList_remark = htmlentities($_POST['applyList_remark']);

    for ($i = 1; $i <= ($rows2->apply_num); $i++) {

        $sql = "INSERT INTO `event_applylist`(
            `apply_id`, `event_id`, `applyList_name`, `applyList_idn`,`applyList_mobile`,`applyList_email`, `applyList_emg`, `applyList_emgMobile`, `applyList_remark`
            ) VALUES (
                ?,?,?,?,?,?,?,?,?
                )";

        try {
            $pdo_pre = $pdo->prepare($sql);
            $pdo_pre->execute([
                $_POST['apply_id'],
                $_POST['event_id'],
                $_POST['applyList_name'],
                $_POST['applyList_idn'],
                $_POST['applyList_mobile'],
                $_POST['applyList_email'],
                $_POST['applyList_emg'],
                $_POST['applyList_emgMobile'],
                $_POST['applyList_remark'],
            ]);

            if ($pdo_pre->rowCount() == 1) {
                //$success = true;
                $msg = [
                    'type' => 'success',
                    'info' => '資料新增成功',
                ];
            } else {
                $msg = [
                    'type' => 'danger',
                    'info' => '資料新增錯誤',
                ];
            }
        } catch (PDOException $ex) {
            echo $ex->getmessage();
        }
    }
}


?>

<?php include __DIR__ . '/__head.php'; ?>
<style>
    .form-group small {
        color: red !important;
    }
</style>

<h3>新增報名名單</h3>
<?php if (isset($msg)) : ?>
<div class="alert alert-<?= $msg['type'] ?>" role="alert">
    <?= $msg['info'] ?>
</div>
<?php endif ?>



<!-- <form method="post" name="form1" onsubmit="return checkForm();"> -->
<form method="post" name="form1">
    <?php for ($i = 1; $i <= $rows2->apply_num; $i++) : ?>
    <div class="card m-2">
        <div class="card-body p-4">
            <input type="hidden" name="checkme">
            <div class="mb-3">
                <h4>參加人 <?= $i ?>：</h4>
            </div>
            <div class="d-flex">
                <div class="form-group container d-flex">
                    <label for="apply_id" style="width:230px">報名編號：</label>
                    <input type="text" class="form-control" id="apply_id" name="apply_id" value="<?= $apply_id ?>" style="border:none">
                    <small id="apply_idHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group container d-flex">
                    <label for="event_id" style="width:230px">活動編號：</label>
                    <input class="form-control" id="event_id" name="event_id" value="<?= $rows2->event_id ?>" style="border:none">
                    <small id="event_idHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group container d-flex">
                    <label for="applyList_name" style="width:230px">參加人姓名：</label>
                    <input type="text" class="form-control" id="applyList_name" name="applyList_name">
                    <!-- <small id="applyList_nameHelp" class="form-text text-muted"></small> -->
                </div>
                <div class="form-group container d-flex">
                    <label for="applyList_idn" style="width:230px">參加人身份證字號：</label>
                    <input type="text" class="form-control" id="applyList_idn" name="applyList_idn">
                    <!-- <small id="applyList_nameHelp" class="form-text text-muted"></small> -->
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group container d-flex">
                    <label for="applyList_mobile" style="width:230px">參加人mobile：</label>
                    <input type="text" class="form-control" id="applyList_mobile" name="applyList_mobile">
                    <!-- <small id="applyList_mobileHelp" class="form-text text-muted"></small> -->
                </div>
                <div class="form-group container d-flex">
                    <label for="applyList_email" style="width:230px">參加人email：</label>
                    <input type="text" class="form-control" id="applyList_email" name="applyList_email">
                    <!-- <small id="applyList_mobileHelp" class="form-text text-muted"></small> -->
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group container d-flex">
                    <label for="applyList_emg" style="width:230px">緊急連絡人：</label>
                    <input type="text" class="form-control" id="applyList_emg" name="applyList_emg">
                    <small id="applyList_emgHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group container d-flex">
                    <label for="applyList_emgMobile" style="width:230px">緊急連絡人Mobile：</label>
                    <input type="text" class="form-control" id="applyList_emgMobile" name="applyList_emgMobile">
                    <small id="applyList_emgMobileHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-groupr">
                <label for="applyList_remark" style="width:130px">備註：</label>
                <textarea type="text" class="form-control" id="applyList_remark" name="applyList_remark"></textarea>
                <small id="applyList_remarkHelp" class="form-text text-muted"></small>
            </div>

        </div>
    </div>
    <?php endfor ?>

    <div class="container">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary" href="event_list.php" role="button">回活動列表頁</a>
        <a class="btn btn-primary" href="apply_memberList.php?apply_id=<?= $apply_id ?>" role="button">回名單列表</a>
        <!-- <a class="btn btn-primary" href="apply_orderList.php?event_id=<?= $event_id ?>" role="button">回報名資料列表</a> -->
    </div>
</form>



<?php include __DIR__ . '/__md.php'; ?>
<!-- <script>

    const checkForm = () => {
        let isPassed = true;
        if (document.form1.apply_id.value.length < 3) {
            document.querySelector('#apply_idHelp').innerHTML = '資料不完整';
            isPassed = false;
        }
        if (document.form1.event_id.value.length < 3) {
            document.querySelector('#event_idHelp').innerHTML = '資料不完整';
            isPassed = false;
        }
        if (document.form1.applyList_emgMobile.value.length < 3) {
            document.querySelector('#applyList_emgMobileHelp').innerHTML = '資料不完整';
            isPassed = false;
        }
        // if (document.form1.applyList_name.value.length < 3) {
        //     document.querySelector('#applyList_nameHelp').innerHTML = '資料不完整';
        //     isPassed = false;
        // }
        // if (document.form1.applyList_idn.value.length < 3) {
        //     document.querySelector('#applyList_idnHelp').innerHTML = '資料不完整';
        //     isPassed = false;
        // }
        // if (document.form1.applyList_mobile.value.length < 3) {
        //     document.querySelector('#applyList_mobileHelp').innerHTML = '資料不完整';
        //     isPassed = false;
        // }
        // if (document.form1.applyList_email.value.length < 3) {
        //     document.querySelector('#applyList_emailHelp').innerHTML = '資料不完整';
        //     isPassed = false;
        // }
        if (document.form1.applyList_emg.value.length < 3) {
            document.querySelector('#applyList_emgHelp').innerHTML = '資料不完整';
            isPassed = false;
        }
        if (document.form1.applyList_remark.value.length < 1) {
            document.querySelector('#applyList_remarkHelp').innerHTML = '資料不完整';
            isPassed = false;
        }
    return isPassed; 
    }

</script> -->
<?php include __DIR__ . '/__footer.php'; ?> 