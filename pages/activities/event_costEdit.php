<?php
require '../../__cred.php';
require '../../__connect_db.php';

// $sql_camp = "SELECT `camp_id`,`camp_name` FROM `campsite_list`";
// $pdo_query_camp = $pdo->query($sql_camp);
// $rows_camp = $pdo_query_camp->fetchAll(PDO::FETCH_ASSOC);

$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;

$sql = "SELECT * FROM `event_list` WHERE event_id=$event_id";
$pdo_query = $pdo->query($sql);
$row = $pdo_query->fetch(PDO::FETCH_ASSOC);
// $aa = $row['camp_id'];

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [],
];

if (isset($_POST['event_campCost']) and isset($_POST['event_foodCost']) and isset($_POST['event_outsourcingCost']) and isset($_POST['event_insCost']) and isset($_POST['event_itemName']) and isset($_POST['event_itemCost']) and !empty($event_id)) {

    $event_campCost = htmlentities($_POST['event_campCost']);
    $event_foodCost = htmlentities($_POST['event_foodCost']);
    $event_outsourcingCost = htmlentities($_POST['event_outsourcingCost']);
    $event_insCost = htmlentities($_POST['event_insCost']);
    $event_itemName = htmlentities($_POST['event_itemName']);
    $event_itemCost = htmlentities($_POST['event_itemCost']);

    // if (empty($event_campCost) or empty($event_foodCost) or empty($event_outsourcingCost) or empty($event_insCost) or empty($event_itemName) or empty($event_itemCost)) {
    //     $result['errorCode'] = 400;
    //     echo "資料不完整";
    //     exit;
    // }
    $sql_edit = "UPDATE `event_list` SET 
    `event_campCost`=?,
    `event_foodCost`=?,
    `event_outsourcingCost`=?,
    `event_insCost`=?,
    `event_itemName`=?,
    `event_itemCost`=?
    WHERE `event_id`=?";

    try {

        $edit_pdo_prepare = $pdo->prepare($sql_edit);
        $edit_pdo_prepare->execute([
            $_POST['event_campCost'],
            $_POST['event_foodCost'],
            $_POST['event_outsourcingCost'],
            $_POST['event_insCost'],
            $_POST['event_itemName'],
            $_POST['event_itemCost'],
            $event_id
        ]);
        if ($edit_pdo_prepare->rowCount() == 1) {
            $msg = [
                'type' => 'success',
                'info' => '資料修改成功',
            ];
        } else {
            $msg = [
                'type' => 'danger',
                'info' => '資料未更新',
            ];
        }
    } catch (PDOException $ex) {
        echo "error2";
    }
}
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

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
                    <li class="breadcrumb-item"><a href="event_listCost.php">活動收益</a></li>
                    <li class="breadcrumb-item active" aria-current="page">活動費用修改</li>
                </ol>
            </nav>
        </aside>

        <?php if (isset($msg)) : ?>
            <div class="alert alert-<?= $msg['type'] ?>" role="alert">
                <?= $msg['info'] ?>
            </div>
        <?php endif ?>
        
        <div class="card container" style="max-width:960px; padding:0">
            <div class="card-header container text-center"  style="max-width:960px">
                <h5>活動名稱：<?= $row['event_name'] ?></h5>
                <p>活動日期：<?= $row['event_dateStart'] ?> 至<?= $row['event_dateEnd'] ?></p>
            </div>
            <!-- <form method="post" name="form1" onsubmit="return checkForm();"> -->
            <form method="post" name="form1" class="mt-5 pb-3 col-11">
                <input type="hidden" name="checkme">
                <div class="form-group form-row">
                    <label class="col-md-2 " for="event_campCost">場地費用</label>
                    <input class="form-control col-md-10" type="number" id="event_campCost" name="event_campCost" value="<?= $row['event_campCost'] ?>">
                    <small id="event_campCostHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label class="col-md-2 " for="event_foodCost">食材支出</label>
                    <input class="form-control  col-md-10" id="event_foodCost" name="event_foodCost" value="<?= $row['event_foodCost'] ?>"> 
                    <small id="event_foodCostHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label class="col-md-2 " for="event_outsourcingCost">外包費用</label>
                    <input class="form-control col-md-10" id="event_outsourcingCost" name="event_outsourcingCost" value="<?= $row['event_outsourcingCost'] ?>" >
                    <small id="event_outsourcingCostHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label class="col-md-2 " for="event_insCost">保險費用</label>
                    <input class="form-control  col-md-10" id="event_insCost" name="event_insCost" value="<?= $row['event_insCost'] ?>" >
                    <small id="event_insCostHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <label class="col-md-4 " for="event_itemName">其他支出項目</label>
                            <textarea type="text" class="form-control col-md-8" id="event_itemName" name="event_itemName"><?= $row['event_itemName'] ?></textarea>
                        </div>
                        <small id="event_itemNameHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <label class="col-md-4 " for="event_itemCost">其他支出金額</label>
                            <input type="" class="form-control col-md-8" id="event_itemCost" name="event_itemCost" value="<?= $row['event_itemCost'] ?>">
                        </div>
                        <small id="event_itemCostHelp" class="form-text text-muted"></small>
                    </div>
                </div>
               
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">確定修改</button>
                </div>
            </form>
        </div>

        <script>
            // const checkForm = () => {
            //     let isPassed = true;

            //     let event_name = document.form1.event_name.value;
            //     let event_price = document.form1.event_price.value;
            //     let event_upLimit = document.form1.event_upLimit.value;

            //     const fields = [
            //         'event_name',
            //         'event_price',
            //         'event_upLimit',
            //     ];

            //     let num_pattern = /^\d{n}$/;

            //     for (let k in fields) {
            //         document.querySelector('#' + fields[k] + 'Help').innerHTML = '';
            //     }

            //     if (event_price.length < 1) {
            //         document.querySelector('#event_priceHelp').innerHTML = '請輸入正確金額';
            //         isPassed = false;
            //     }
            //     if (event_upLimit.length < 1) {
            //         document.querySelector('#event_upLimitHelp').innerHTML = '請輸入正確人數';
            //         isPassed = false;
            //     }
            //     if (event_name.length < 1) {
            //         document.querySelector('#event_nameHelp').innerHTML = '請輸入活動名稱!';
            //         isPassed = false;
            //     }

            //     return isPassed;
            // }

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

<?php include '../../__index_foot.php'; ?>