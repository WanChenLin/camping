<?php
require __DIR__ . '/__connect_acDB.php';

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

    $applyList_mobile = $_POST['applyList_mobile'];
    $applyList_email = $_POST['applyList_email'];
    $applyList_emg = $_POST['applyList_emg'];
    $applyList_emgMobile = $_POST['applyList_emgMobile'];
    $applyList_remark = $_POST['applyList_remark'];

    if(empty($applyList_mobile) or empty($applyList_emg) or empty($applyList_emgMobile)){
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
                'info' => '資料修改錯誤',
            ];
        }
    } catch (PDOException $ex) {
        echo "error2";
    }
} //else {
//     $result['errorCode'] = 403;
//         $result['errorMsg'] = '資料更新發生錯誤';
//         echo "資料更新發生錯誤";
// }


?>

<?php include __DIR__ . '/__head.php'; ?>
<style>
    .form-group small {
        color: red !important;
    }
</style>

<h3>參加人資料修改</h3>
<?php if (isset($msg)) : ?>
<div class="alert alert-<?= $msg['type'] ?>" role="alert">
    <?= $msg['info'] ?>
</div>
<?php endif ?>

<div class="card m-2">
    <div class="card-body p-4">

        <form method="post" name="form1" onsubmit="return checkForm();">
            <input type="hidden" name="checkme">
            <div class="form-group container d-flex">
                <label for="applyList_name" style="width:160px">參加人姓名：</label>
                <div id="applyList_name" name="applyList_name"><?= $row['applyList_name'] ?></div>
                <!-- <small id="applyList_nameHelp" class="form-text text-muted"></small> -->
            </div>
            <div class="form-group container d-flex">
                <label for="applyList_idn" style="width:160px">參加人身分證字號：</label>
                <div id="applyList_idn" name="applyList_idn"><?= $row['applyList_idn'] ?></div>
                <!-- <small id="applyList_idnHelp" class="form-text text-muted"></small> -->
            </div>
            <div class="form-group container d-flex">
                <label for="applyList_mobile" style="width:160px">參加人mobile：</label>
                <input type="text" class="form-control" id="applyList_mobile" name="applyList_mobile" value="<?= $row['applyList_mobile'] ?>">
                <small id="applyList_mobileHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group container d-flex">
                <label for="applyList_email" style="width:160px">參加人email：</label>
                <input class="form-control" id="applyList_email" name="applyList_email" value="<?= $row['applyList_email'] ?>">  
                <small id="applyList_emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group container d-flex">
                <label for="applyList_emg" style="width:160px">緊急連絡人：</label>
                <input class="form-control" id="applyList_emg" name="applyList_emg" value="<?= $row['applyList_emg'] ?>">  
                <!-- <small id="applyList_email2Help" class="form-text text-muted"></small> -->
            </div>
            <div class="form-group container d-flex">
                <label for="applyList_emgMobile" style="width:160px">緊急連絡人電話：</label>
                <input class="form-control" id="applyList_emgMobile" name="applyList_emgMobile" value="<?= $row['applyList_emgMobile'] ?>" > 
                <!-- <small id="applyList_email3Help" class="form-text text-muted"></small> -->
            </div>
            <div class="form-group container d-flex">
                <label for="applyList_remark" style="width:160px">備註：</label>
                <textarea type="text" class="form-control" id="applyList_remark" name="applyList_remark" style="height:150px"><?= $row['applyList_remark'] ?></textarea>
                <small id="camp_idHelp" class="form-text text-muted"></small>
            </div>
            
            <button type="submit" class="btn btn-primary">確定修改</button>
            <a class="btn btn-primary" href="apply_memberList.php?apply_id=<?= $row['apply_id'] ?>" role="button">回列表頁</a>
        </form>
    </div>
</div>


<?php include __DIR__ . '/__md.php'; ?>
<script>
    const checkForm = () => {
        let isPassed = true;

        let applyList_mobile = document.form1.applyList_mobile.value;
        let applyList_email = document.form1.applyList_email.value;
        let applyList_emgMobile = document.form1.applyList_emgMobile.value;
        let applyList_emg = document.form1.applyList_emg.value;

        const fiels = [
            'applyList_mobile',
            'applyList_email',
            'applyList_emg',
            'applyList_emgMobile',
        ];


        let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        let mobile_pattern = /^09\d{2}\-?\d{3}\-?\d{3}$/;

        for(let k in fields){
            document.querySelector('#'+ fields[k] + 'Help').innerHTML = '';
        }

        if (mobile_pattern.test(applyList_mobile)) {
            document.querySelector('#applyList_mobileHelp').innerHTML = '請填寫正確的手機號碼';
            isPassed = false;
        }
        if (email_pattern.test(applyList_email)) {
            document.querySelector('#applyList_emailHelp').innerHTML = '請填寫正確的EMAIL';
            isPassed = false;
        }
        if (mobile_pattern.test(applyList_emgMobile)) {
            document.querySelector('#applyList_emgMobileHelp').innerHTML = '請填寫正確的手機號碼';
            isPassed = false;
        }
        if (applyList_emg.lenght < 1)) {
            document.querySelector('#applyList_emgHelp').innerHTML = '請填寫正確的姓名';
            isPassed = false;
        }
        return isPassed;
    }
    
</script>
<?php include __DIR__ . '/__footer.php'; ?> 