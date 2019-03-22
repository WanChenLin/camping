<?php
require __DIR__ . '/__connect_acDB.php';

$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;

$sql_1 = "SELECT * FROM `event_list` WHERE event_id=$event_id";
$sql_1_query = $pdo->query($sql_1);
$rows = $sql_1_query->fetch(PDO::FETCH_ASSOC);


// $event_id = '';
$mem_account = '';
$apply_num = '';
$apply_date = '';
$apply_amount = '';

$nowTime = date("Y-m-d");

if (isset($_POST['checkme'])) {

    // $event_id = $_POST['event_id'];
    $mem_account = $_POST['mem_account'];
    $apply_num = $_POST['apply_num'];
    $apply_date = $_POST['apply_date'];
    $apply_amount = $_POST['apply_amount'];

    $sql = "INSERT INTO `event_applyorder`(
    `event_id`, `mem_account`, `apply_num`,`apply_date`,`apply_amount`
    ) VALUES (
        $event_id,?,?,?,?
        )";

    try {
        $pdo_pre = $pdo->prepare($sql);
        $pdo_pre->execute([
            // $_POST['event_id'],
            $_POST['mem_account'],
            $_POST['apply_num'],
            $_POST['apply_date'],
            $_POST['apply_amount'],
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

?>

<?php include __DIR__ . '/__head.php'; ?>
<style>
    .form-group small {
        color: red !important;
    }
</style>

<h3>新增報名</h3>
<?php if (isset($msg)) : ?>
<div class="alert alert-<?= $msg['type'] ?>" role="alert">
    <?= $msg['info'] ?>
</div>
<?php endif ?>
<div class="card">
    <div class="card-header">
        活動內容
    </div>
    <table class="table table-bordered">
            <tr>
                <th scope="row" style="width:150px">活動名稱</th>
                <td><?= $rows['event_name'] ?></td>
            </tr>
            <tr>
                <th scope="row">活動介紹</th>
                <td><?= $rows['event_intro'] ?></td>

            </tr>
            <tr>
                <th scope="row">活動日期</th>
                <td colspan="2"><?= $rows['event_dateStart'] ?> ~ <?= $rows['event_dateEnd'] ?></td>
            </tr>
            <tr id="price">
                <th scope="row">活動價格</th>
                <td colspan="2" id="event_price" value="<?= $rows['event_price'] ?>"><?= $rows['event_price'] ?></td>
                <!-- <td colspan="2" id="event_price" value="<?= $rows['event_price'] ?>"><?= $rows['event_price'] ?></td> -->
            </tr>
    </table>
</div>
<div class="card m-2">
    <div class="card-body p-4">
        <!-- <form method="post" name="form1" onsubmit="return checkForm();"> -->
        <form method="post" name="form1">
            <input type="hidden" name="checkme">
            <!-- <div class="form-group container d-flex">
                <label for="mem_account" style="width:100px">報名編號：</label>
                <input type="text" class="form-control" id="mem_account" name="mem_account">
                <small id="mem_accountHelp" class="form-text text-muted"></small>
            </div> -->
            <div class="form-group container d-flex">
                <label for="event_id" style="width:100px">活動編號：</label>
                <!-- <input class="form-control" id="event_id" name="event_id" value="<?= $event_id ?>"> -->
                <div class="form-control" id="event_id" name="event_id" style="border:none"><?= $event_id ?></div>
                <small id="event_idHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group container d-flex">
                <label for="mem_account" style="width:100px">會員id</label>
                <input type="text" class="form-control" id="mem_account" name="mem_account">
                <small id="mem_accountHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group container d-flex">
                <label for="apply_num" style="width:100px">報名人數：</label>
                <input type="text" class="form-control" id="apply_num" name="apply_num">
                <small id="apply_numHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group container d-flex">
                <label for="apply_date" style="width:100px">報名日期：</label>
                <input class="form-control" id="apply_date" name="apply_date" value="<?= $nowTime ?>">
                <!-- <input class="form-control" id="apply_date" name="apply_date"> -->
                <small id="apply_dateHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group container d-flex">
                <label for="apply_amount" style="width:100px">訂單金額：</label>
                <input class="form-control disable" id="apply_amount" name="apply_amount" style="border:none">
                <small id="apply_amountHelp" class="form-text text-muted"></small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="event_list.php" role="button">回活動列表頁</a>


        </form>
    </div>
</div>


<?php include __DIR__ . '/__md.php'; ?>
<script>
    
    document.addEventListener("input", function() {

        var price = <?= $rows['event_price'] ?>;
        const memNum = document.querySelector("#apply_num").value;
        const countAmount = () => {
            let cost = Number(price);
            let amount = Number(memNum) * cost ;
            document.querySelector("#apply_amount").value = amount;
            document.querySelector("#apply_amount").innerHTML = amount;
        }
        countAmount();
    });

    // const checkForm = () => {
    //     let isPassed = true;
    //     if (document.form1.event_id.value.length < 3) {
    //         document.querySelector('#event_idHelp').innerHTML = '資料不完整';
    //         isPassed = false;
    //     }
    //     if (document.form1.mem_account.value.length < 3) {
    //         document.querySelector('#mem_accountHelp').innerHTML = '資料不完整';
    //         isPassed = false;
    //     }
    //     if (document.form1.apply_num.value.length < 3) {
    //         document.querySelector('#apply_numHelp').innerHTML = '資料不完整';
    //         isPassed = false;
    //     }
    //     if (document.form1.apply_date.value.length < 3) {
    //         document.querySelector('#apply_dateHelp').innerHTML = '資料不完整';
    //         isPassed = false;
    //     }
    //     if (document.form1.apply_amount.value.length < 3) {
    //         document.querySelector('#apply_amountHelp').innerHTML = '資料不完整';
    //         isPassed = false;
    //     }
    //     return isPassed;
    // }
</script>
<?php include __DIR__ . '/__footer.php'; ?> 