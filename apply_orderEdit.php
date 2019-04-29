<?php
// require __DIR__.'/__cred.php';
require __DIR__ . '/__connect_acDB.php';

$apply_id = isset($_GET['apply_id']) ? substr($_GET['apply_id'],0) : 0;
// echo $apply_id;

$sql = "SELECT * FROM `event_applyorder` WHERE apply_id='$apply_id'";
$pdo_query = $pdo->query($sql);
$row = $pdo_query->fetch(PDO::FETCH_ASSOC);
// echo $row['event_id'];
// echo $row['apply_id'];

if (isset($_POST['apply_pay'])) {

    $apply_pay = htmlentities($_POST['apply_pay']);
    $apply_order = htmlentities($_POST['apply_order']);

    $sql_edit = "UPDATE `event_applyorder` SET 
    `apply_pay`=?,
    `apply_order`= ?
    WHERE `apply_id`=?";

    try {

        $edit_pdo_prepare = $pdo->prepare($sql_edit);
        $edit_pdo_prepare->execute([

            $_POST['apply_pay'],
            $_POST['apply_order'],
            $apply_id
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
//     $result['errorMsg'] = '資料更新發生錯誤';
//     echo "資料更新發生錯誤";
// }

?>

<?php include __DIR__ . '/__head.php'; ?>

<!-- <style>
    .form-group small {
        color: red !important;
    }
</style> -->
<!-- 
<ul class="nav nav-tabs">
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
            <h5>訂單修改</h5>
        </a>
    </li>
</ul> -->

<aside class="bg-warning">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-2">
            <li class="breadcrumb-item">主題活動</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="event_list_search.php">活動列表</a></li>
            <li class="breadcrumb-item active" aria-current="page">報名資訊</li>
            <li class="breadcrumb-item active" aria-current="page">訂單修改</li>
        </ol>
    </nav>
</aside>

<!-- <div class="card m-2"> -->
    <?php if (isset($msg)) : ?>
    <div class="alert alert-<?= $msg['type'] ?>" role="alert">
        <?= $msg['info'] ?>
    </div>
    <?php endif ?>
    <div class="card-body container">
        <form method="post" name="form1" onsubmit="return checkForm();">
            <input type="hidden" name="checkme" value="update">
            <!-- <div class="form-group form-row">
                <label for="applyList_name" class="col-sm-6 col-md-2 ">參加人姓名 </label>
                <div id="applyList_name" name="applyList_name" class="col-sm-6 col-md-10"><?= $row['applyList_name'] ?></div>
            </div> -->
            <div class="form-group form-row">
                <label for="apply_pay" class="col-sm-4 col-md-2 ">付款狀態 </label>
                <input type="text" class="form-control col-sm-4 col-md-6" id="apply_pay" name="apply_pay" value="<?= $row['apply_pay'] ?>">
                <small id="apply_payHelp" class="form-text col-sm-4 col-md-4">1=>已付款；空值=>未付款</small>
            </div>
            <div class="form-group form-row">
                <label for="apply_order" class="col-sm-4 col-md-2 ">取消訂單 </label>
                <input class="form-control col-sm-4 col-md-6" id="apply_order" name="apply_order" value="<?= $row['apply_order'] ?>">
                <small id="apply_orderHelp" class="form-text col-sm-4 col-md-4" >1=>取消訂單</small>
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">確定修改</button>
            <a class="btn btn-outline-primary ml-2" href="apply_orderList.php?event_id=<?= $row['event_id']?>" role="button">回上一頁</a>
            </div>
        </form>

    </div>
<!-- </div> -->


<?php include __DIR__ . '/__md.php'; ?>
<script>
    const checkForm = () => {
        let isPassed = true;
        if (document.form1.apply_pay.value.length > 1) {
            document.querySelector('#apply_payHelp').innerHTML = '輸入錯誤';
            isPassed = false;
        }
        if (document.form1.apply_order.value.length > 1) {
            document.querySelector('#apply_orderHelp').innerHTML = '輸入錯誤';
            isPassed = false;
        }

        return isPassed;
    }
    var windowWidth=$(window).width();      
        console.log(windowWidth);
        if(windowWidth<=768){
            $("label").removeClass("text-right");
            $("label").addClass("text-left");
        }else{
            $("label").removeClass("text-left");
            $("label").addClass("text-right");
        }
</script>
<?php include __DIR__ . '/__footer.php'; ?> 