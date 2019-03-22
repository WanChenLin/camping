<?php

//require __DIR__ . '/__cred.php';

require __DIR__ . '/__connect_db.php';

$page_name = 'host_list_edit';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM `host_infolist` WHERE `host_id`=$id";

$stmt = $pdo->query($sql);
if ($stmt->rowCount() == 0) {
    header('Location: host_list.php');
    exit;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php include __DIR__ . '/__html_head.php'; ?>
<?php include __DIR__ . '/__html_navbarLeft.php'; ?>

<style>
    .card-title {
        font-size: 30px;
        -webkit-text-stroke: 2px black;
        color: white;
        text-align: center;
    }

    label {
        font-weight: bold;
    }

    textarea {
        resize: none;
    }

    .host_password,
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
    <aside class="bg-warning">
        <nav aria-label="breadcrumb my-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./host_menu.php">營地主管理</a></li>
                <li class="breadcrumb-item"><a href="./host_list.php">營地主列表</a></li>
                <li class="breadcrumb-item active" aria-current="page">修改營地主資料</li>
            </ol>
        </nav>
    </aside>

    <div class="card">
        <div class="card-body">
            <div id="info_bar" class="alert alert" role="alert" style="display:none"></div>
            <h5 class="card-title">編輯基本資料</h5>
            <form name="form1" method="post" onsubmit="return checkForm();">
                <input type="hidden" name="checkme" value="check123">
                <input type="hidden" name="id" value="<?= $row['host_id'] ?>">
                <div class="form-group">
                    <label for="host_account">帳戶：</label>
                    <input type="text" class="form-control" id="host_account" name="host_account" placeholder="使用者名稱（登入帳戶）" value="<?= $row['host_account'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="host_password">密碼：</label><br>
                    <div class="host_password">
                        <input type="password" class="form-control" id="host_password" name="host_password" placeholder="使用者名稱（登入帳戶）" value="<?= $row['host_password'] ?>" disabled>
                        <!-- <a class="btn btn-secondary ml-2" href="./host_list.php" role="button" style="width: 300px;">修改密碼</a> -->
                    </div>
                </div>
                <div class="form-group">
                    <label for="host_parkName">營區名：</label>
                    <input type="text" class="form-control" id="host_parkName" name="host_parkName" placeholder="營區名稱" value="<?= $row['host_parkName'] ?>">
                    <small id="host_parkNameHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_tel">聯絡電話：</label>
                    <input type="text" class="form-control" id="host_tel" name="host_tel" placeholder="聯絡方式" value="<?= $row['host_tel'] ?>">
                    <small id="host_telHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_fax">傳真號碼：</label>
                    <input type="text" class="form-control" id="host_fax" name="host_fax" placeholder="傳真號碼" value="<?= $row['host_fax'] ?>">
                    <small id="host_faxHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_email">電子郵件：</label>
                    <input type="text" class="form-control" id="host_email" name="host_email" placeholder="example@gmail.com" value="<?= $row['host_email'] ?>">
                    <small id="host_emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_address">營區地址：</label>
                    <div id="zipcode" class="zipcode">
                        <div class="f1" data-role="county"></div>
                        <div class="f2" data-role="district"></div>
                        <input name="host_address" type="text" class="f3 address form-control" value="<?= $row['host_address'] ?>">
                    </div>
                    <small id="host_addressHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_intro">營區介紹：</label>
                    <textarea class="form-control" id="host_intro" name="host_intro" rows="5" placeholder="營區介紹"><?= $row['host_intro'] ?></textarea>
                    <small id="host_introHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_paymentType">收款方式：</label>
                    <div class="host_paymentType">
                        <select name="host_paymentType" class="form-control" id="host_paymentType" name="host_paymentType">
                            <option value="請選擇" selected>請選擇</option>
                            <option value="PayPal"> PayPal</option>
                            <option value="電匯"> 電匯</option>
                        </select>
                    </div>
                    <small id="host_paymentTypeHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_bankName">收款資訊─姓名：</label>
                    <input type="text" class="form-control" id="host_bankName" name="host_bankName" placeholder="收款人姓名" value="<?= $row['host_bankName'] ?>">
                    <small id="host_bankName" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_bankAddress">收款資訊─地址：</label>
                    <input type="text" class="form-control" id="host_bankAddress" name="host_bankAddress" placeholder="收款人地址" value="<?= $row['host_bankAddress'] ?>">
                    <small id="host_bankAddressHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_bankIBAN">收款資訊─IBAN碼：</label>
                    <input type="text" class="form-control" id="host_bankIBAN" name="host_bankIBAN" placeholder="收款人IBAN碼" value="<?= $row['host_bankIBAN'] ?>">
                    <small id="host_bankIBANHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="host_bankSWIFT">收款資訊─SWIFT碼：</label>
                    <input type="text" class="form-control" id="host_bankSWIFT" name="host_bankSWIFT" placeholder="收款人SWIFT碼" value="<?= $row['host_bankSWIFT'] ?>">
                    <small id="host_bankSWIFTHelp" class="form-text text-muted"></small>
                </div>
                <button id="submit_btn" type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
</main>

<script>
    const info_bar = document.querySelector('#info_bar');
    const submit_btn = document.querySelector('#submit_btn');

    const fields = [
        'host_parkName',
        'host_tel',
        'host_fax',
        'host_email',
        'city',
        'town',
        'zipcode',
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

        /*
        let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        let mobile_pattern = /^09\d{2}\-?\d{3}\-?\d{3}$/;
        let birthday_pattern = /^\d{4}\-?\d{2}\-?\d{2}$/;

        for (let v of fields) {
            fs[v].style.borderColor = '#ccc';
            document.querySelector('#' + v + 'Help').innerHTML = '';
        }

        if (fsv.name.length <= 2) {
            fs.name.style.backgroundColor = 'lavenderblush';
            document.querySelector('#nameHelp').innerHTML = '姓名長度不足';

            isPassed = false;
        }
        if (!email_pattern.test(fsv.email)) {
            fs.email.style.backgroundColor = 'lavenderblush';
            document.querySelector('#emailHelp').innerHTML = 'Email格式錯誤';
            isPassed = false;
        }

        if (!mobile_pattern.test(fsv.mobile)) {
            fs.mobile.style.backgroundColor = 'lavenderblush';
            document.querySelector('#mobileHelp').innerHTML = '手機號碼長度不足';
            isPassed = false;
        }

        if (!birthday_pattern.test(fsv.birthday)) {
            fs.birthday.style.backgroundColor = 'lavenderblush';
            document.querySelector('#birthdayHelp').innerHTML = '生日格式錯誤';
            isPassed = false;
        }

        if (fsv.address.length <= 2) {
            fs.address.style.backgroundColor = 'lavenderblush';
            document.querySelector('#addressHelp').innerHTML = '地址長度不足';
            isPassed = false;
        }
        */

        if (isPassed) {
            let form = new FormData(document.form1);

            submit_btn.style.display = 'none';

            fetch('host_list_edit_api.php', {
                    method: 'POST',
                    body: form
                })
                .then(response => response.json())
                .then(obj => {
                    console.log(obj);
                    info_bar.style.display = 'block';

                    if (obj.success) {
                        //info_bar.className = 'alert alert-success';
                        //info_bar.innerHTML = '資料編輯成功';
                        alert('編輯成功');
                        window.location = './host_list.php';
                    } else {
                        //info_bar.className = 'alert alert-danger';
                        //info_bar.innerHTML = obj.errorMsg;
                        alert(obj.errorMsg);
                    }
                    submit_btn.style.display = 'block';
                });
        }
        return false;
    };

    $("#zipcode").twzipcode({
        "zipcodeIntoDistrict": true,
        "css": ["city form-control", "town form-control"],
        "countyName": "city", // 指定城市 select name
        "districtName": "town" // 指定地區 select name
    });
</script>

<?php include __DIR__ . '/__html_foot.php';  ?> 