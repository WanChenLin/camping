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

$nowTime = date("Y-m-d H:i:s");

// $applyList_name = '';
// $applyList_idn = '';
// $applyList_mobile = '';
// $applyList_email = '';
// $applyList_emg = '';
// $applyList_emgMobile = '';
// $applyList_remark = '';

if (isset($_POST['checkme'])) {

    // $event_id = $_POST['event_id'];
    $mem_account = htmlentities($_POST['mem_account']);
    $apply_num = htmlentities($_POST['apply_num']);
    $apply_date = htmlentities($_POST['apply_date']);
    $apply_amount = htmlentities($_POST['apply_amount']);

    $sql = "INSERT INTO `event_applyorder`(
    `apply_id`,`event_id`, `mem_account`, `apply_num`,`apply_date`,`apply_amount`
    ) VALUES (
        ?,$event_id,?,?,?,?
        )";
    try {
        $pdo_pre = $pdo->prepare($sql);
        $pdo_pre->execute([
            // $_POST['event_id'],
            $_POST['apply_id'],
            $_POST['mem_account'],
            $_POST['apply_num'],
            $_POST['apply_date'],
            $_POST['apply_amount'],

        ]);

        // if ($pdo_pre->rowCount() == 1) {
        //     $success = true;
        //     $msg = [
        //         'type' => 'success',
        //         'info' => '資料新增成功',
        //     ];
        // } else {
        //     $msg = [
        //         'type' => 'danger',
        //         'info' => '資料新增錯誤',
        //     ];
        // }
    } catch (PDOException $ex) {
        echo $ex->getmessage();
    }
    $apply_id = $_POST['apply_id'];
    $applyList_name_arr = $_POST['applyList_name'];
    $applyList_idn_arr = $_POST['applyList_idn'];
    $applyList_mobile_arr = $_POST['applyList_mobile'];
    $applyList_email_arr = $_POST['applyList_email'];
    $applyList_emg_arr = $_POST['applyList_emg'];
    $applyList_emgMobile_arr = $_POST['applyList_emgMobile'];
    $applyList_remark_arr = $_POST['applyList_remark'];

    // echo is_array($applyList_name_arr) ? "yes" : "no";
    // echo print_r($applyList_name_arr);

    for ($i = 0; $i <= count($applyList_name_arr) - 1; $i++) {
        $sql2 = "INSERT INTO `event_applylist`(
    `apply_id`, `event_id`, `applyList_name`, `applyList_idn`,`applyList_mobile`,`applyList_email`, `applyList_emg`, `applyList_emgMobile`, `applyList_remark`
    ) VALUES (
                '$apply_id','$event_id','$applyList_name_arr[$i]','$applyList_idn_arr[$i]','$applyList_mobile_arr[$i]','$applyList_email_arr[$i]','$applyList_emg_arr[$i]','$applyList_emgMobile_arr[$i]','$applyList_remark_arr[$i]'
                )";

        try {
            $pdo_pre2 = $pdo->query($sql2);

            if ($pdo_pre2->rowCount() == 1) {
                //$success = true;
                $msg = [
                    'type' => 'success',
                    'info' => '報名完成',
                    'css' => 'd-none',
                    'id' => $apply_id,
                ];
            } else {
                $msg = [
                    'type' => 'danger',
                    'info' => '報名未完成',
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

<!-- <ul class="nav nav-tabs">
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
            <h5>活動報名</h5>
        </a>
    </li>
</ul> -->

<aside class="bg-warning">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-2">
            <li class="breadcrumb-item">主題活動</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="event_list_search.php">活動列表</a></li>
            <li class="breadcrumb-item active" aria-current="page">活動報名</li>
        </ol>
    </nav>
</aside>

<?php if (isset($msg)) : ?>
<div class="form-row justify-content-center m-2" role="alert">
    <div class="card" style="width: 18rem;" id="apply_finished">
        <div class="text-center p-3">
            <h5 class="card-title"><?= $msg['info'] ?></h5>
            <h1 class="text-primary"><i class="far fa-check-circle"></i></h1>
        </div>
        <div class="card-body">
            <p class="card-text">報名編號：<span id="order_num"><?= $msg['id'] ?></span></p>
            <!-- <p class="card-text">訂單金額：<span id="order_amount"></span></p> -->
            <div class="form-row justify-content-center">
                <a class="btn btn-primary" href="event_list_search.php" role="button">回活動列表頁</a>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- <div class="card"> -->
<div id="event_info" class="container <?php if (isset($msg)) echo  $msg['css'] ?>">
    <div class="card-header">
        活動內容
    </div>
    <table class="table table-bordered table-striped">
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
            <!-- <td colspan="2" id="event_price" value="<?= $rows['event_price'] ?>"><?= $rows['event_price'] ?> /人</td> -->
            <td colspan="2">$ <span id="event_price"><?= $rows['event_price'] ?></span> /人</td>
        
        </tr>
    </table>
</div>
<!-- <form method="post" name="form1"> -->
<form method="post" name="form1" onsubmit="return checkForm();">
    <div class="<?php if (isset($msg)) echo  $msg['css'] ?>" id="apply_box">
        <div class="card card-body container p-4" id="info_box">

            <input type="hidden" name="checkme">
            <div class="form-group  d-flex" style="display:none">
                <label for="apply_id" style="width:130px">報名編號：</label>
                <input type="text" class="form-control" id="apply_id" name="apply_id" value="<?php

                function guid()
                {
                    mt_srand((double)microtime() * 10000);
                    $charid = strtoupper(md5(uniqid(rand(), true)));
                    $uuid = substr($charid, 0, 8)
                        . substr($charid, 8, 4);
                        // . substr($charid, 12, 4)
                        // . substr($charid, 16, 4)
                        // . substr($charid, 20, 12);
                    return $uuid;
                }
                echo guid();
                ?>
                
                " readonly>

                <small id="apply_idHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group  d-flex" style="display:none">
                <label for="event_id" style="width:130px">活動編號：</label>
                <input class="form-control" id="event_id" name="event_id" readonly value="<?= $event_id ?>">
                <small id="event_idHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group  d-flex">
                <label for="mem_account" style="width:130px">會員id</label>
                <input type="text" class="form-control" id="mem_account" name="mem_account">
                <small id="mem_accountHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group  d-flex">
                <label for="apply_num" style="width:130px">報名人數：</label>
                <input type="number" min=1 class="form-control" id="apply_num" name="apply_num">
                <small id="apply_numHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group  d-flex">
                <label for="apply_date" style="width:130px">報名日期：</label>
                <input class="form-control" id="apply_date" name="apply_date" value="<?= $nowTime ?>" readonly>
                <small id="apply_dateHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group  d-flex">
                <label for="apply_amount" style="width:130px">訂單金額：</label>
                <input class="form-control" id="apply_amount" name="apply_amount" readonly>
                <small id="apply_amountHelp" class="form-text text-muted"></small>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <a class="btn btn-primary" id="next" style="color:#fff">下一步，填寫參加人資料</a>
        </div>
    </div>
    

    <div class="" id="memberInsertBox">
       
    </div>
    <div class="form-row justify-content-center mt-2 d-none" id="submit_btns" >
        <button type="submit" class="btn btn-primary mr-2" id="submit" >確定報名</button>
        <a class="btn btn-outline-primary" id="back" style="color:blue">回上一頁</a>
    </div>
</form>

<!-- </div> -->



<?php include __DIR__ . '/__md.php'; ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    // document.addEventListener("input", function() {

    //     var price = <?= $rows['event_price'] ?>;
    //     const memNum = document.querySelector("#apply_num").value;
    //     const countAmount = () => {
    //         let cost = Number(price);
    //         let amount = Number(memNum) * cost;
    //         document.querySelector("#apply_amount").value = amount;
    //     }
    //     countAmount();
    // });

    $("#apply_num").on("change keyup",function(){
        // console.log("keyup");
        let price=$("#event_price").text();
        let memNum=$(this).val();
        let amount = Number(price) * Number(memNum);
        console.log(amount);
        $("#apply_amount").val(amount);
        // $("#apply_amount").text(amount);

    });

    $("#next").click(function(){
        $("#submit_btns").removeClass("d-none");
        $(this).addClass("d-none");
        $("#info_box").addClass("d-none");
        $("#event_info").addClass("d-none");
        

        let  apply_num = $("#apply_num").val();
        console.log(apply_num);
        for(let i=1; i<=apply_num; i++){
            let apply_box= `<div class="card m-2 memberInsert" id="">
            <div class="card-header">
                <div class="container d-flex justify-content-between">
                    <h5>參加人${i}：</h5>
                </div>
            </div>
            <div class="card-body container p-4">
                <input type="hidden" name="checkme">

                <div class="form-row">
                    <div class="form-group  form-row col-md-6">
                        <label for="applyList_name" class="col-md-4">姓名：</label>
                        <input type="text" class="form-control col-md-8" id="applyList_name" name="applyList_name[]">
                        <small id="applyList_nameHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group  form-row col-md-6">
                        <label for="applyList_idn" class="col-md-4 pl-md-4">身份證字號：</label>
                        <input type="text" class="form-control col-md-8" id="applyList_idn" name="applyList_idn[]">
                        <small id="applyList_idnHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group  form-row col-md-6">
                        <label for="applyList_mobile" class="col-md-4">mobile：</label>
                        <input type="tel" class="form-control col-md-8" id="applyList_mobile" name="applyList_mobile[]">
                        <small id="applyList_mobileHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group  form-row col-md-6">
                        <label for="applyList_email" class="col-md-4 pl-md-4">email：</label>
                        <input type="email" class="form-control col-md-8" id="applyList_email" name="applyList_email[]">
                        <small id="aapplyList_emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group  form-row col-md-6">
                        <label for="applyList_emg" class="col-md-4">緊急連絡人：</label>
                        <input type="text" class="form-control col-md-8" id="applyList_emg" name="applyList_emg[]">
                        <small id="applyList_emgHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group  form-row col-md-6">
                        <label for="applyList_emgMobile" class="col-md-4 pl-md-4">緊急連絡人電話：</label>
                        <input type="tel" class="form-control col-md-8" id="applyList_emgMobile" name="applyList_emgMobile[]">
                        <small id="applyList_emgMobileHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form-groupr form-row">
                    <label for="applyList_remark" class="col-md-2">備註：</label>
                    <textarea type="text" class="form-control col-md-10" id="applyList_remark" name="applyList_remark[]"></textarea>
                    <small id="applyList_remarkHelp" class="form-text text-muted"></small>
                </div>
            </div>
        </div>`;
            $("#memberInsertBox").append(apply_box);
        }
        $(window).scrollTop(0);
        
    });
   
    $("#back").click(function(){
        $("#event_info").removeClass("d-none");
        $("#submit_btns").addClass("d-none");
        $("#next").removeClass("d-none");
        // $("#memberInsertBox").addClass("d-none");
        $("#info_box").removeClass("d-none");
        $(".memberInsert").remove();
    });

    // let apply_id = $("#apply_id").val();
    // console.log(apply_id);
    // $("#submit").click(function(){   
    //     $("#order_num").text(apply_id);
    // });
    
    
</script>
<?php include __DIR__ . '/__footer.php'; ?> 