<?php
require '../__cred.php';
require '../__connect_db.php';

$sql_camp = "SELECT `camp_id`,`camp_name` FROM `campsite_list`";
$pdo_query_camp = $pdo->query($sql_camp);
$rows_camp = $pdo_query_camp->fetchAll(PDO::FETCH_ASSOC);

$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;

$sql = "SELECT * FROM `event_list` WHERE event_id=$event_id";
$pdo_query = $pdo->query($sql);
$row = $pdo_query->fetch(PDO::FETCH_ASSOC);
$aa = $row['camp_id'];

$sql_camp_name = "SELECT `camp_name` FROM `campsite_list` WHERE `camp_id` = $aa";
$pdo_query_camp_name = $pdo->query($sql_camp_name);
$row_camp_name = $pdo_query_camp_name->fetch(PDO::FETCH_ASSOC);

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [],
];

if (isset($_POST['event_name']) and isset($_POST['event_intro']) and isset($_POST['event_intro2']) and isset($_POST['event_intro3']) and isset($_POST['event_applyStart']) and isset($_POST['event_applyEnd']) and isset($_POST['event_dateStart']) and isset($_POST['event_dateEnd']) and isset($_POST['event_price']) and isset($_POST['camp_id']) and isset($_POST['event_upLimit']) and !empty($event_id)) {

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
    $event_upLimit = htmlentities($_POST['event_shelf']);
    $event_remark = htmlentities($_POST['event_remark']);

    if (empty($event_name) or empty($event_intro) or empty($event_applyStart) or empty($event_applyEnd) or empty($event_dateStart) or empty($event_dateEnd) or empty($event_price) or empty($camp_id) or empty($event_upLimit)) {
        $result['errorCode'] = 400;
        echo "資料不完整";
        exit;
    }
    $sql_edit = "UPDATE `event_list` SET 
    `event_name`=?,
    `event_intro`=?,
    `event_intro2`=?,
    `event_intro3`=?,
    `event_applyStart`=?,
    `event_applyEnd`=?,
    `event_dateStart`=?,
    `event_dateEnd`=?,
    `event_price`=?,
    `camp_id`=?,
    `event_upLimit`=?,
    `event_shelf`=?,
    `event_remark`= ?
    WHERE `event_id`=?";

    try {

        $edit_pdo_prepare = $pdo->prepare($sql_edit);
        $edit_pdo_prepare->execute([
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
            $_POST['event_shelf'],
            $_POST['event_remark'],
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
                'info' => '發生錯誤',
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
                    <li class="breadcrumb-item active" aria-current="page">活動修改</li>
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
                    <label class="col-md-2 " for="event_name">活動名稱</label>
                    <input class="form-control col-md-10" type="text" id="event_name" name="event_name" value="<?= $row['event_name'] ?>">
                    <small id="event_nameHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label class="col-md-2 " for="event_intro">活動內容一</label>
                    <textarea class="form-control  col-md-10" id="event_intro" name="event_intro" style="height:150px"> <?= $row['event_intro'] ?> </textarea>
                    <small id="event_introHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label class="col-md-2 " for="event_intro2">活動內容二</label>
                    <textarea class="form-control col-md-10" id="event_intro2" name="event_intro2" style="height:150px"> <?= $row['event_intro2'] ?> </textarea>
                    <small id="event_intro2Help" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label class="col-md-2 " for="event_intro3">活動內容三</label>
                    <textarea class="form-control  col-md-10" id="event_intro3" name="event_intro3" style="height:150px"> <?= $row['event_intro3'] ?> </textarea>
                    <small id="event_intro3Help" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label class="col-md-2 " for="camp_id">營地編號</label>
                    <select name="camp_id" id="camp_id" class="form-control col-md-10">
                        <option value="<?= $row['camp_id'] ?>" selected="selected">(<?= $row['camp_id'] ?>) <?= $row_camp_name['camp_name'] ?></option>
                        <?php foreach ($rows_camp as $row_camp) : ?>
                            <option value="<?= $row_camp['camp_id'] ?>">(<?= $row_camp['camp_id'] ?>) <?= $row_camp['camp_name'] ?> </option>
                        <?php endforeach ?>
                    </select>
                    <small id="camp_idHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <label class="col-md-4 " for="event_applyStart">報名開始日期</label>
                            <input type="date" class="form-control col-md-8" id="event_applyStart" name="event_applyStart" value="<?= $row['event_applyStart'] ?>">
                        </div>
                        <small id="event_applyStartHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <label class="col-md-4 " for="event_applyEnd">報名載止日期</label>
                            <input type="date" class="form-control col-md-8" id="event_applyEnd" name="event_applyEnd" value="<?= $row['event_applyEnd'] ?>">
                        </div>
                        <small id="event_applyStartHelp" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <label class="col-md-4 " for="event_dateStart">活動開始日期</label>
                            <input type="date" class="form-control col-md-8" id="event_dateStart" name="event_dateStart" value="<?= $row['event_dateStart'] ?>">
                            <small id="event_dateStartHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <label class="col-md-4 " for="event_dateEnd">活動結束日期</label>
                            <input type="date" class="form-control col-md-8" id="event_dateEnd" name="event_dateEnd" value="<?= $row['event_dateEnd'] ?>">
                            <small id="event_dateStartHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <div class="form-row">
                            <label class="col-md-4 " for="event_price">活動價格</label>
                            <input type="number" min=1 class="form-control col-md-8" id="event_price" name="event_price" value="<?= $row['event_price'] ?>">
                            <small id="event_priceHelp" class="form-text text-muted"></small>
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <div class="form-row">
                            <label class="col-md-4 " for="event_upLimit">人數上限</label>
                            <input type="number" min=1 class="form-control col-md-8" id="event_upLimit" name="event_upLimit" value="<?= $row['event_upLimit'] ?>">
                            <small id="event_upLimitHelp" class="form-text text-muted"></small>
                        </div>
                    </div>

                </div>
                <div class="form-group form-row">
                    <label class="col-md-2 " for="event_shelf">是否上架</label>
                    <select name="event_shelf" id="event_shelf" class="form-control col-md-10">
                        <option value="<?= $row['event_shelf'] ?>" selected="selected">
                            <?php $shelf = $row['event_shelf'];
                            switch ($shelf) {
                                case '0':
                                    echo '上架中';
                                    break;
                                case '1':
                                    echo '下架中';
                                    break;
                                case '3':
                                    echo '頁面預告';
                                    break;
                                default:
                                    echo '';
                            }
                            ?></option>

                        <option value="0">上架</option>
                        <option value="1">下架</option>
                        <option value="3">頁面預告</option>
                    </select>
                    <small id="camp_idHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group form-row">
                    <label for="event_remark" class="col-md-2">備註</label>
                    <textarea class="form-control col-md-10" id="event_remark" name="event_remark"> <?= $row['event_remark'] ?></textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">確定修改</button>
                </div>
            </form>
        </div>

        <script>
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