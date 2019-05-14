<?php
require '../__cred.php';
require '../__connect_db.php';

$applyList_id = isset($_GET['applyList_id']) ? intval($_GET['applyList_id']) : 0;

$sql = "SELECT * FROM `event_applylist` WHERE applyList_id=$applyList_id";
$pdo_query = $pdo->query($sql);
$row = $pdo_query->fetch(PDO::FETCH_ASSOC);

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [],

];

if (isset($_POST['applyList_mobile']) and isset($_POST['applyList_email']) and isset($_POST['applyList_emg']) and isset($_POST['applyList_emgMobile']) and !empty($applyList_id)) {

    $applyList_mobile = htmlentities($_POST['applyList_mobile']);
    $applyList_email = htmlentities($_POST['applyList_email']);
    $applyList_emg = htmlentities($_POST['applyList_emg']);
    $applyList_emgMobile = htmlentities($_POST['applyList_emgMobile']);
    $applyList_remark = htmlentities($_POST['applyList_remark']);

    if (empty($applyList_mobile) or empty($applyList_emg) or empty($applyList_emgMobile)) {
        $result['errorCode'] = 400;
        echo "資料不完整";
        exit;
    }
    $sql_edit = "UPDATE `event_applylist` SET 
    `applyList_mobile`=?,
    `applyList_email`=?,
    `applyList_emg`=?,
    `applyList_emgMobile`=?,
    `applyList_remark`=?
    WHERE `applyList_id`=?";

    try {

        $edit_pdo_prepare = $pdo->prepare($sql_edit);
        $edit_pdo_prepare->execute([
            $_POST['applyList_mobile'],
            $_POST['applyList_email'],
            $_POST['applyList_emg'],
            $_POST['applyList_emgMobile'],
            $_POST['applyList_remark'],
            $applyList_id
        ]);
        if ($edit_pdo_prepare->rowCount() == 1) {
            $msg = [
                'type' => 'success',
                'info' => '資料修改成功',
            ];
        } else {
            $msg = [
                'type' => 'danger',
                'info' => '資料未修改',
            ];
        }
    } catch (PDOException $ex) {
        echo "error2";
    }
}
?>

<?php include '../__index_head.php'; ?>
<?php include '../__index_header.php'; ?>
<?php include '../__index_navbar.php'; ?>

<main class="col-md-10 bg-white">
    <section>

        <style>
            .form-group small {
                color: red !important;
            }

            @media (min-width:768px) {
                label {
                    text-align: right;
                }
            }
        </style>

        <aside class="bg-warning">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-2">
                    <li class="breadcrumb-item">主題活動</li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="event_list_search.php">活動列表</a></li>
                    <li class="breadcrumb-item active" aria-current="page">報名資訊</li>
                    <li class="breadcrumb-item active" aria-current="page">報名名單</li>
                    <li class="breadcrumb-item active" aria-current="page">名單修改</li>
                </ol>
            </nav>
        </aside>

        <?php if (isset($msg)) : ?>
            <div class="alert alert-<?= $msg['type'] ?>" role="alert">
                <?= $msg['info'] ?>
            </div>
        <?php endif ?>

        <div class="card-body container">

            <form method="post" name="form1" onsubmit="return checkForm();">
                <input type="hidden" name="checkme">
                <div class="form-group form-row">
                    <label for="applyList_name" class="col-sm-6 col-md-2 ">參加人姓名 </label>
                    <div id="applyList_name" name="applyList_name" class="col-sm-6 col-md-10"><?= $row['applyList_name'] ?></div>
                </div>
                <div class="form-group form-row">
                    <label for="applyList_idn" class="col-md-2 col-sm-6 ">參加人身分證字號 </label>
                    <div id="applyList_idn" name="applyList_idn" class="col-md-10 col-sm-6"><?= $row['applyList_idn'] ?></div>
                </div>
                <div class="form-group form-row">
                    <label for="applyList_mobile" class="col-md-2 ">參加人mobile </label>
                    <input type="text" class="form-control col-md-10" id="applyList_mobile" name="applyList_mobile" value="<?= $row['applyList_mobile'] ?>">
                    <small id="applyList_mobileHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label for="applyList_email" class="col-md-2 ">參加人email </label>
                    <input class="form-control col-md-10" id="applyList_email" name="applyList_email" value="<?= $row['applyList_email'] ?>">
                    <small id="applyList_emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label for="applyList_emg" class="col-md-2 ">緊急連絡人 </label>
                    <input class="form-control col-md-10" id="applyList_emg" name="applyList_emg" value="<?= $row['applyList_emg'] ?>">
                    <small id="applyList_emgHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label for="applyList_emgMobile" class="col-md-2 ">緊急連絡人電話 </label>
                    <input class="form-control col-md-10" id="applyList_emgMobile" name="applyList_emgMobile" value="<?= $row['applyList_emgMobile'] ?>">
                    <small id="applyList_emgMobileHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label for="applyList_remark" class="col-md-2 ">備註 </label>
                    <textarea type="text" class="form-control col-md-10" id="applyList_remark" name="applyList_remark" style="height:150px"><?= $row['applyList_remark'] ?></textarea>
                    <small id="applyList_remarkHelp" class="form-text text-muted"></small>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">確定修改</button>
                    <a class="btn btn-outline-primary ml-2" href="apply_memberList.php?apply_id=<?= $row['apply_id'] ?>" role="button">回上一頁</a>
                </div>
            </form>
        </div>

        <script>
            const fields = [
                'applyList_mobile',
                'applyList_email',
                'applyList_emg',
                'applyList_emgMobile',
            ];

            const fs = {};
            for (let v of fields) {
                fs[v] = document.form1[v];
            }

            const checkForm = () => {
                let isPassed = true;

                const fsv = {};
                for (let v of fields) {
                    fsv[v] = fs[v].value;
                }

                let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                let mobile_pattern = /^09\d{2}\-?\d{3}\-?\d{3}$/;

                for (let v of fields) {
                    document.querySelector('#' + v + 'Help').innerHTML = '';
                }

                if (fsv.applyList_emg.length < 2) {
                    document.querySelector('#applyList_emgHelp').innerHTML = '請填寫正確的姓名!';

                    isPassed = false;
                }
                if (!email_pattern.test(fsv.applyList_email)) {
                    document.querySelector('#applyList_emailHelp').innerHTML = '請填寫正確的 Email!';
                    isPassed = false;
                }
                if (!mobile_pattern.test(fsv.applyList_mobile)) {
                    document.querySelector('#applyList_mobileHelp').innerHTML = '請填寫正確的手機號碼!';
                    isPassed = false;
                }
                if (!mobile_pattern.test(fsv.applyList_emgMobile)) {
                    document.querySelector('#applyList_emgMobileHelp').innerHTML = '請填寫正確的手機號碼!';
                    isPassed = false;
                }

                return isPassed;
            };
            $(window).resize(function() {
                var windowWidth = $(this).width();
                if (windowWidth <= 768) {
                    $("label").removeClass("text-right");
                    $("label").addClass("text-left");
                } else {
                    $("label").removeClass("text-left");
                    $("label").addClass("text-right");
                }
            });
        </script>

    </section>
</main>

<?php include '../__index_foot.php'; ?>