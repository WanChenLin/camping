<?php

//require __DIR__ . '/__cred.php';

require __DIR__ . '/__connect_db.php';

$page_name = 'host_list_insert';

$host_account = '';
$host_password = '';
$host_parkName = '';
$host_tel = '';
$host_fax = '';
$host_email = '';
$host_address = '';
$host_intro = '';
$host_paymentType = '';
$host_bankName = '';
$host_bankAddress = '';
$host_bankIBAN = '';
$host_bankSWIFT = '';

//檢查變數是否設置
if (isset($_POST['checkme'])) {
    $host_account = htmlentities($_POST['host_account']);
    $host_password = htmlentities($_POST['host_password']);
    $host_parkName = htmlentities($_POST['host_parkName']);
    $host_tel = htmlentities($_POST['host_tel']);
    $host_fax = htmlentities($_POST['host_fax']);
    $host_email = htmlentities($_POST['host_email']);
    $host_address = htmlentities($_POST['host_address']);
    $host_intro = htmlentities($_POST['host_intro']);
    $host_paymentType = htmlentities($_POST['host_paymentType']);
    $host_bankName = htmlentities($_POST['host_bankName']);
    $host_bankAddress = htmlentities($_POST['host_bankAddress']);
    $host_bankIBAN = htmlentities($_POST['host_bankIBAN']);
    $host_bankSWIFT = htmlentities($_POST['host_bankSWIFT']);
}

if (isset($_POST['checkme'])) {
    $sql = "INSERT INTO `host_infolist`(
                `host_account`, `host_password`, `host_parkName`, `host_tel`, `host_fax`,
                `host_email`, `city`, `town`, `zipcode`, `host_address`, `host_intro`,
                `host_paymentType`, `host_bankName`, `host_bankAddress`, `host_bankIBAN`, `host_bankSWIFT`
                ) VALUES (
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )";

    try {
        //準備執行
        $stmt = $pdo->prepare($sql);

        //執行stmt，並回傳陣列內容
        $stmt->execute([
            $_POST['host_account'],
            $_POST['host_password'],
            $_POST['host_parkName'],
            $_POST['host_tel'],
            $_POST['host_fax'],
            $_POST['host_email'],
            $_POST['city'],
            $_POST['town'],
            $_POST['zipcode'],
            $_POST['host_address'],
            $_POST['host_intro'],
            $_POST['host_paymentType'],
            $_POST['host_bankName'],
            $_POST['host_bankAddress'],
            $_POST['host_bankIBAN'],
            $_POST['host_bankSWIFT'],
        ]);

        if ($stmt->rowCount() == 1) {
            $success = true;
            $msg = [
                'type' => 'success',
                'info' => '資料新增成功',
            ];
            echo "<script>alert('新增成功'); location.href = './host_list.php';</script>";
        } else {
            $msg = [
                'type' => 'danger',
                'info' => '資料新增失敗',
            ];
            echo "<script>alert('新增失敗');</script>";
        }
    } catch (PDOException $ex) {
        $msg = [
            'type' => 'danger',
            'info' => '帳號重複',
        ];
        echo "<script>alert('帳號重複');</script>";
    }
}
?>

<?php include __DIR__ . '/__html_head.php';  ?>
<?php include __DIR__ . '/__html_navbarLeft.php';  ?>

<style>
    .card-title {
        font-size: 30px;
        -webkit-text-stroke: 2px black;
        color: white;
        text-align: center;
    }

    textarea {
        resize: none;
    }

    .zipcode {
        display: flex;
    }

    .f1 {
        width: 150px;
    }

    .f2 {
        width: 200px;
    }

    .form-group small {
        color: red !important;
    }
</style>

<main class="col-10 bg-white">
    <?php include __DIR__ . '/__html_navbarTop.php'; ?>
    <aside class="bg-warning">
        <nav aria-label="breadcrumb my-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./host_menu.php">營地主管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增營地主</li>
            </ol>
        </nav>
    </aside>

    <div class="card">
        <div class="card-body">
            <?php if (isset($msg)) : ?>
            <div class="alert alert-<?= $msg['type'] ?>" role="alert">
                <?= $msg['info'] ?>
            </div>
            <?php endif ?>
            <h5 class="card-title">新增營地主</h5>
            <form name="form1" method="post" onsubmit="return checkForm();">
                <input type="hidden" name="checkme" value="check123">
                <div class="form-group">
                    <label for="host_account">帳戶：</label>
                    <input type="text" class="form-control" id="host_account" name="host_account" placeholder="使用者名稱（登入帳戶）" value="<?= $host_account ?>">
                    <small id="host_accountHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_password">密碼：</label>
                    <input type="password" class="form-control" id="host_password" name="host_password" placeholder="密碼（最大長度為20個字元）" maxlength="20">
                    <small id="host_passwordHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_parkName">營區名：</label>
                    <input type="text" class="form-control" id="host_parkName" name="host_parkName" placeholder="營區名稱" value="<?= $host_parkName ?>">
                    <small id="host_parkNameHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_tel">聯絡電話：</label>
                    <input type="text" class="form-control" id="host_tel" name="host_tel" placeholder="聯絡方式" value="<?= $host_tel ?>">
                    <small id="host_telHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_fax">傳真號碼：</label>
                    <input type="text" class="form-control" id="host_fax" name="host_fax" placeholder="傳真號碼" value="<?= $host_fax ?>">
                    <small id="host_faxHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_email">電子郵件：</label>
                    <input type="text" class="form-control" id="host_email" name="host_email" placeholder="example@gmail.com" value="<?= $host_email ?>">
                    <small id="host_emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_address">營區地址：</label>
                    <div id="zipcode" class="zipcode">
                        <div class="f1" data-role="county"></div>
                        <div class="f2" data-role="district"></div>
                        <input name="host_address" type="text" class="f3 address form-control">
                    </div>
                    <small id="host_addressHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_intro">營區介紹：</label>
                    <textarea class="form-control" id="host_intro" name="host_intro" rows="5" placeholder="營區介紹"><?= $host_intro ?></textarea>
                    <small id="host_introHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_paymentType">收款方式：</label>
                    <div class="host_paymentType">
                        <select name="host_paymentType" class="form-control" id="host_paymentType" name="host_paymentType" value="<?= $host_paymentType ?>">
                            <option value="0" selected>請選擇</option>
                            <option value="PayPal">PayPal</option>
                            <option value="電匯">電匯</option>
                        </select>
                    </div>
                    <small id="host_paymentTypeHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_bankName">收款資訊─姓名：</label>
                    <input type="text" class="form-control" id="host_bankName" name="host_bankName" placeholder="收款人姓名" value="<?= $host_bankName ?>">
                    <small id="host_bankName" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_bankAddress">收款資訊─地址：</label>
                    <input type="text" class="form-control" id="host_bankAddress" name="host_bankAddress" placeholder="收款人地址" value="<?= $host_bankAddress ?>">
                    <small id="host_bankAddressHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_bankIBAN">收款資訊─IBAN碼：</label>
                    <input type="text" class="form-control" id="host_bankIBAN" name="host_bankIBAN" placeholder="收款人IBAN碼" value="<?= $host_bankIBAN ?>">
                    <small id="host_bankIBANHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_bankSWIFT">收款資訊─SWIFT碼：</label>
                    <input type="text" class="form-control" id="host_bankSWIFT" name="host_bankSWIFT" placeholder="收款人SWIFT碼" value="<?= $host_bankSWIFT ?>">
                    <small id="host_bankSWIFTHelp" class="form-text text-muted"></small>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
</main>

<script type="module">

    import TextVerify from "./js/TextVerify.js";

    const fields = [
        'host_account',
        'host_password',
        'host_parkName',
        'host_tel',
        'host_fax',
        'host_email',
        'host_address',
        'host_intro',
        'host_paymentType',
        'host_bankName',
        'host_bankAddress',
        'host_bankIBAN',
        'host_bankSWIFT',
    ];

    // 拿到每個欄位的參照
    const checkForm = () => {
        let isPassed = true;
        info_bar.style.display = 'none';

        const fs = {};
        for (let v of fields) {
            fs[v] = document.form1[v];
        }
        console.log(fs);
        console.log('fs.host_account:', fs.host_account);


        // 拿到每個欄位的值
        const fsv = {};
        for (let v of fields) {
            console.log(v);
            fsv[v] = fs[v].value;
        }
        console.log(fsv);

        //let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        //let mobile_pattern = /^09\d{2}\-?\d{3}\-?\d{3}$/;
        //let birthday_pattern = /^\d{4}\-?\d{2}\-?\d{2}$/;

        for (let v of fields) {
            fs[v].style.borderColor = '#ccc';
            document.querySelector('#' + v + 'Help').innerHTML = '';
        }

        if (!TextVerify.ForbidEmpty(fsv.host_account)) {
            fs.host_account.style.backgroundColor = 'lavenderblush';
            document.querySelector('#host_accountHelp').innerHTML = '姓名長度不足';
            isPassed = false;
        }

        // if (!email_pattern.test(fsv.email)) {
        //     fs.email.style.backgroundColor = 'lavenderblush';
        //     document.querySelector('#emailHelp').innerHTML = 'Email格式錯誤';
        //     isPassed = false;
        // }

        // if (fsv.host_parkName.length <= 2) {
        //     fs.host_parkName.style.backgroundColor = 'lavenderblush';
        //     document.querySelector('#host_parkNameHelp').innerHTML = '地址長度不足';
        //     isPassed = false;
        // }

        return isPassed;
    };

    $("#zipcode").twzipcode({
        "zipcodeIntoDistrict": true,
        "css": ["city form-control", "town form-control"],
        "countyName": "city", // 指定城市 select name
        "districtName": "town" // 指定地區 select name
    });
</script>

<?php include __DIR__ . '/__html_foot.php';  ?> 