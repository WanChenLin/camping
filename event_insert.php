<?php
require __DIR__.'/__cred.php';
require __DIR__ . '/__connect_acDB.php';

$sql_camp = "SELECT `camp_id` ,`camp_name`FROM `campsite_list`";
$pdo_query = $pdo->query($sql_camp);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);
// echo print_r($rows);

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
$event_shelf = '';
$event_img = '';


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
    $event_shelf = htmlentities($_POST['event_shelf']);
    $event_remark = htmlentities($_POST['event_remark']);
    $event_img = htmlentities($_POST['event_img']);
      

    if (empty($event_name) or empty($event_intro) or empty($event_applyStart) or empty($event_applyEnd) or empty($event_dateStart) or empty($event_dateEnd) or empty($event_price) or empty($camp_id) or empty($event_upLimit)) {
        $result['errorCode'] = 400;
        echo "資料不完整";
        exit;
    }

        $sql = "INSERT INTO `event_list`(
            `event_name`, `event_intro`,`event_intro2`,`event_intro3`, `event_applyStart`, `event_applyEnd`,`event_dateStart`,`event_dateEnd`, `event_price`, `camp_id`, `event_upLimit`, `event_remark`,`event_img`,`event_shelf`
            ) VALUES (
                ?,?,?,?,?,?,?,?,?,?,?,?,?,?
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
            $_POST['event_img'],
            $_POST['event_shelf'],
        ]);

        if ($pdo_pre->rowCount() == 1) {
            //$success = true;
            $msg = [
                'type' => 'success',
                'info' => '活動已新增至列表',
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
    /* @media (max-width:768px) {
        label{}
    } */

    @media (min-width:768px) {
        /* .menu_box_sm {
            display: none;
        }
        .nav_cross{
            display: none;
        } */
        label{
            text-align: right;
        }
    }
</style>
<!-- 
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
</ul> -->

<aside class="bg-warning">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-2">
            <li class="breadcrumb-item">主題活動</li>
            <li class="breadcrumb-item active" aria-current="page">新增活動</a></li>
        </ol>
    </nav>
</aside>


<?php if (isset($msg)) : ?>
<div class="alert alert-<?= $msg['type'] ?>" role="alert">
    <?= $msg['info'] ?>
</div>
<?php endif ?>

<!-- <div class="card m-2"> -->
<div class="card-body container">
    <form name="form1" method="post" onsubmit="return checkForm();">
        <input type="hidden" name="checkme" value="checkme">
        <div class="form-group">
            <div class="form-row mb-2">
                <label for="my_file" class="col-md-2"></label>
                <div class="col-md-10"><img class="" id="myimg" src="" alt="" width="200px"></div>
            </div>
            <div class="form-row">
                <label for="my_file" class="col-md-2 ">圖片上傳</label>
                <input class="col-md-10" type="file" name="my_file" id="my_file">
            </div>
            <div class="form-row d-none">
                <label for="event_img" class="col-md-2 "></label>
                <input class="form-control col-md-10" type="text" name="event_img" id="event_img" value="<?= $event_img ?>">
            </div>
        </div>
        <div class="form-group form-row">
            <label for="event_name" class="col-md-2 ">活動名稱</label>
            <input type="text" class="form-control col-md-10" id="event_name" name="event_name" value="<?= $event_name ?>">
            <small id="event_nameHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group  form-row">
            <label for="event_intro" class="col-md-2 ">活動內容一</label>
            <textarea class="form-control col-md-10" id="event_intro" name="event_intro" style="height:150px"></textarea>
            <small id="event_introHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group  form-row">
            <label for="event_intro2" class="col-md-2 ">活動內容二</label>
            <textarea class="form-control col-md-10" id="event_intro2" name="event_intro2" style="height:150px"></textarea>
            <small id="event_intro2Help" class="form-text text-muted"></small>
        </div>
        <div class="form-group  form-row">
            <label for="event_intro3" class="col-md-2 ">活動內容三</label>
            <textarea class="form-control col-md-10" id="event_intro3" name="event_intro3" style="height:150px"></textarea>
            <small id="event_intro3Help" class="form-text text-muted"></small>
        </div>
        <div class="form-group  form-row">
            <label for="camp_id" class="col-md-2 ">營地(編號)名稱</label>
            <!-- <input type="text" class="form-control" id="camp_id" name="camp_id"> -->
            <select name="camp_id" id="camp_id" class="form-control col-md-10">
                <?php foreach ($rows as $row) : ?>
                <option value="<?= $row['camp_id'] ?>">(<?= $row['camp_id'] ?>) <?= $row['camp_name'] ?></option>
                <?php endforeach ?>
            </select>
            <small id="camp_idHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="event_applyStart" class=" col-md-4 ">開始報名日期</label>
                    <input type="date" class="form-control col-md-8" id="event_applyStart" name="event_applyStart">
                </div>
                <small id="event_applyStartHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="event_applyEnd" class="col-md-4  ">截止報名日期</label>
                    <input type="date" class="form-control col-md-8" id="event_applyEnd" name="event_applyEnd">
                </div>
                <small id="event_applyEndHelp" class="form-text text-muted"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="event_dateStart" class=" col-md-4 ">活動開始日期</label>
                    <input type="date" class="form-control col-md-8" id="event_dateStart" name="event_dateStart">
                </div>
                <small id="event_dateStarttHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="event_dateEnd" class="col-md-4  ">活動結束日期</label>
                    <input type="date" class="form-control col-md-8" id="event_dateEnd" name="event_dateEnd">
                </div>
                <small id="event_dateEndHelp" class="form-text text-muted"></small>
            </div>
        </div>
        <div class="form-group form-row form-row">
            <label for="event_price" class="col-md-2 ">活動價格</label>
            <input type="number" min=1 class="form-control col-md-10" id="event_price" name="event_price" value="<?= $event_price ?>">
            <small id="event_priceHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group  form-row">
            <label for="event_upLimit" class="col-md-2 ">人數上限</label>
            <input type="number" min=1 class="form-control col-md-10" id="event_upLimit" name="event_upLimit" value="<?= $event_upLimit ?>">
            <small id="event_upLimitHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group form-row">
            <label class="col-md-2 " for="event_shelf">是否上架</label>
            <select name="event_shelf" id="event_shelf" class="form-control col-md-10">
                <option value="0">上架</option>
                <option value="1">下架</option>
                <option value="3">頁面預告</option>
            </select>
            <small id="camp_idHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group form-row">
            <label for="event_remark" class="col-md-2 ">備註</label>
            <textarea class="form-control col-md-10" id="event_remark" name="event_remark"></textarea>
        </div>
        <div class="form-row justify-content-center">
            <button type="submit" class="btn btn-primary">新增</button>
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
                let name = obj['filename'];
                console.log(name);
                $("#event_img").val(name);
            });
    });

    
    // var windowWidth=$(window).width();      
    //     console.log(windowWidth);
    //     if(windowWidth<=768){
    //         $("label").removeClass("text-right");
    //         $("label").addClass("text-left");
    //     }else{
    //         $("label").removeClass("text-left");
    //         $("label").addClass("text-right");
    //     }

    $(window).resize(function(){
        var windowWidth=$(this).width();
        // console.log(windowWidth);
        if(windowWidth<=768){
            $("label").removeClass("text-right");
            $("label").addClass("text-left");
        }else{
            $("label").removeClass("text-left");
            $("label").addClass("text-right");
        }
    });


</script>
<?php include __DIR__ . '/__footer.php'; ?> 