<?php
require __DIR__ . '/__connect_acDB.php';

$event_name = '';
$event_intro = '';
$event_intro2 = '';
$event_intro3 = '';
$event_applyStart = '';
$event_applyEnd = '';
$event_dateStart = '';
$event_dateEnd = '';
$event_price = '';
$camp_id = '';
$event_upLimit = '';
$event_remark = '';

if (isset($_POST['checkme'])) {

    $event_name = htmlentities($_POST['event_name']);
    $event_intro = htmlentities($_POST['event_intro']);
    $event_intro2 = htmlentities($_POST['event_intro2']);
    $event_intro3 = htmlentities($_POST['event_intro3']);
    $event_applyStart = htmlentities($_POST['event_applyStart']);
    $event_applyEnd = htmlentities($_POST['event_applyEnd']);
    $event_dateStart = htmlentities($_POST['event_dateStart']);
    $event_dateEnd = htmlentities($_POST['event_dateEnd']);
    $event_price = htmlentities($_POST['event_price']);
    $camp_id = htmlentities($_POST['camp_id']);
    $event_upLimit = htmlentities($_POST['event_upLimit']);
    $event_remark = htmlentities($_POST['event_remark']);

    if (empty($event_name) or empty($event_intro) or empty($event_applyStart) or empty($event_applyEnd) or empty($event_dateStart) or empty($event_dateEnd) or empty($event_price) or empty($camp_id) or empty($event_upLimit)) {
        $result['errorCode'] = 400;
        echo "資料不完整";
        exit;
    }

    $sql = "INSERT INTO `event_list`(
    `event_name`, `event_intro`,`event_intro2`,`event_intro3`, `event_applyStart`, `event_applyEnd`,`event_dateStart`,`event_dateEnd`, `event_price`, `camp_id`, `event_upLimit`, `event_remark`
    ) VALUES (
        ?,?,?,?,?,?,?,?,?,?,?,?
        )";

    try {
        $pdo_pre = $pdo->prepare($sql);
        $pdo_pre->execute([
            $_POST['event_name'],
            $_POST['event_intro'],
            $_POST['event_intro2'],
            $_POST['event_intro3'],
            $_POST['event_applyStart'],
            $_POST['event_applyEnd'],
            $_POST['event_dateStart'],
            $_POST['event_dateEnd'],
            $_POST['event_price'],
            $_POST['camp_id'],
            $_POST['event_upLimit'],
            $_POST['event_remark'],
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

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="#">
            <h5>新增活動</h5>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="event_list.php">
            <h5>活動列表</h5>
        </a>
    </li>
</ul>
<?php if (isset($msg)) : ?>
<div class="alert alert-<?= $msg['type'] ?>" role="alert">
    <?= $msg['info'] ?>
</div>
<?php endif ?>

<!-- <div class="card m-2"> -->
<div class="card-body p-4 container">
    <form name="form1" method="post" onsubmit="return checkForm();">
        <input type="hidden" name="checkme" value="checkme">
        <div class="form-group">
            <img id="myimg" src="" alt="" width="200px">
            <br>
            <label for="my_file" style="width:130px">圖片上傳：</label>
            <input type="file" name="my_file" id="my_file">
        </div>
        <div class="form-group  d-flex">
            <label for="event_name" style="width:130px">活動名稱：</label>
            <input type="text" class="form-control" id="event_name" name="event_name" value="<?= $event_name ?>">
            <small id="event_nameHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group  d-flex">
            <label for="event_intro" style="width:130px">活動內容一：</label>
            <textarea class="form-control" id="event_intro" name="event_intro" style="height:150px"></textarea>
            <small id="event_introHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group  d-flex">
            <label for="event_intro2" style="width:130px">活動內容二：</label>
            <textarea class="form-control" id="event_intro2" name="event_intro2" style="height:150px"></textarea>
            <small id="event_intro2Help" class="form-text text-muted"></small>
        </div>
        <div class="form-group  d-flex">
            <label for="event_intro3" style="width:130px">活動內容三：</label>
            <textarea class="form-control" id="event_intro3" name="event_intro3" style="height:150px"></textarea>
            <small id="event_intro3Help" class="form-text text-muted"></small>
        </div>
        <div class="form-group  d-flex">
            <label for="camp_id" style="width:130px">營地編號：</label>
            <input type="text" class="form-control" id="camp_id" name="camp_id">
            <small id="camp_idHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="event_applyStart" class=" col-md-3">開始報名日期：</label>
                    <!-- <input type="text" class="form-control col-md-9" id="event_applyStart" name="event_applyStart"> -->
                    <input type="date" class="form-control col-md-9" id="event_applyStart" name="event_applyStart">
                </div>
                <small id="event_applyStartHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="event_applyEnd" class="col-md-3">截止報名日期：</label>
                    <input type="date" class="form-control col-md-9" id="event_applyEnd" name="event_applyEnd">
                </div>
                <small id="event_applyEndHelp" class="form-text text-muted"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="event_dateStart" class=" col-md-3">活動開始日期：</label>
                    <input type="date" class="form-control col-md-9" id="event_dateStart" name="event_dateStart">
                </div>
                <small id="event_dateStarttHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="event_dateEnd" class="col-md-3">活動結束日期：</label>
                    <input type="date" class="form-control col-md-9" id="event_dateEnd" name="event_dateEnd">
                </div>
                <small id="event_dateEndHelp" class="form-text text-muted"></small>
            </div>
        </div>
        <div class="form-group  d-flex">
            <label for="event_price" style="width:130px">活動價格：</label>
            <input type="text" class="form-control" id="event_price" name="event_price" value="<?= $event_price ?>">
            <small id="event_priceHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group  d-flex">
            <label for="event_upLimit" style="width:130px">人數上限：</label>
            <input type="text" class="form-control" id="event_upLimit" name="event_upLimit" value="<?= $event_upLimit ?>">
            <small id="event_upLimitHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group ">
            <label for="event_remark" style="width:100px">備註</label>
            <textarea class="form-control" id="event_remark" name="event_remark" style="height:100px"></textarea>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>
<!-- </div> -->

<?php include __DIR__ . '/__md.php'; ?>




<script>
    const myimg = document.querySelector('#myimg');
    const my_file = document.querySelector('#my_file');

    my_file.addEventListener('change', event => {
        const fd = new FormData();

        fd.append('my_file', my_file.files[0]);

        fetch('event_upload.php', {
                method: 'POST',
                body: fd
            })
            .then(response => response.json())
            .then(obj => {
                console.log(obj);
                myimg.setAttribute('src', 'uploads/' + obj.filename);
            });
    });

    const checkForm = () => {
        let isPassed = true;

        let event_name = document.form1.event_name.value;
        let event_price = document.form1.event_price.value;
        let event_upLimit = document.form1.event_upLimit.value;

        const fields = [
            'event_name',
            'event_price',
            'event_upLimit',
        ];

        let num_pattern = /^\d{n}$/;

        for (let k in fields) {
            document.querySelector('#' + fields[k] + 'Help').innerHTML = '';
        }

        // if (!num_pattern.test(event_price)) {
        //     document.querySelector('#event_priceHelp').innerHTML = '請輸入正確金額';
        //     isPassed = false;
        // }
        if (event_price.length < 1) {
            document.querySelector('#event_priceHelp').innerHTML = '請輸入正確金額';
            isPassed = false;
        }
        if (event_upLimit.length < 1) {
            document.querySelector('#event_upLimitHelp').innerHTML = '請輸入正確人數';
            isPassed = false;
        }
        if (event_name.length < 1) {
            document.querySelector('#event_nameHelp').innerHTML = '請輸入活動名稱!';
            isPassed = false;
        }

        return isPassed;
    }
</script>
<?php include __DIR__ . '/__footer.php'; ?> 