<?php
// require __DIR__. '/__cred.php';
require __DIR__. '/__connect_db.php';
$page_name = 'data_insert';


$name = '';
$email = '';
$mobile = '';
$birthday = '';
$address = '';

if(isset($_POST['checkme'])){
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $mobile = htmlentities($_POST['mobile']);
    $birthday = htmlentities($_POST['birthday']);
    $address = htmlentities($_POST['address']);


    $sql = "INSERT INTO `address_book`(
            `name`, `email`, `mobile`, `birthday`, `address`
            ) VALUES (
              ?, ?, ?, ?, ?
            )";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['mobile'],
            $_POST['birthday'],
            $_POST['address'],
        ]);

        if($stmt->rowCount()==1) {
            $success = true;
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
    } catch(PDOException $ex){
        $msg = [
            'type' => 'danger',
            'info' => 'Email 重複輸入',
        ];
    }





    /*
    $sql = sprintf("INSERT INTO `address_book`(
            `name`, `email`, `mobile`, `birthday`, `address`
            ) VALUES (
              %s, %s, %s, %s, %s
            )",
        $pdo->quote($_POST['name']),
        $pdo->quote($_POST['email']),
        $pdo->quote($_POST['mobile']),
        $pdo->quote($_POST['birthday']),
        $pdo->quote($_POST['address'])
        );

    // echo $sql; exit; // 測試 SQL 長什麼樣子


    $stmt = $pdo->query($sql);

    */

}

?>
<?php include __DIR__. '/__html_head.php';  ?>
<?php include __DIR__. '/__navbar.php';  ?>
    <style>
        .form-group small {
            color: red !important;
        }

    </style>
<div class="container">

    <div class="row">
        <div class="col-lg-6">
            <?php if(isset($msg)): ?>
                <div class="alert alert-<?= $msg['type'] ?>" role="alert">
                    <?= $msg['info'] ?>
                </div>
            <?php endif ?>
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">新增資料
                    </h5>

                    <form name="form1" method="post" onsubmit="return checkForm();">
                        <input type="hidden" name="checkme" value="check123">
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                   value="<?= $name ?>">
                            <small id="nameHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">電郵</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder=""
                                   value="<?= $email ?>">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder=""
                                   value="<?= $mobile ?>">
                            <small id="mobileHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="YYYY-MM-DD"
                                   value="<?= $birthday ?>">
                            <small id="birthdayHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="3"><?= $address ?></textarea>
                            <small id="addressHelp" class="form-text text-muted"></small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>




</div>
    <script>
        const fields = [
            'name',
            'email',
            'mobile',
            'birthday',
            'address',
        ];

        // 拿到每個欄位的參照
        const fs = {};
        for(let v of fields){
            fs[v] = document.form1[v];
        }
        console.log(fs);
        console.log('fs.name:', fs.name);


        const checkForm = ()=>{
            let isPassed = true;

            // 拿到每個欄位的值
            const fsv = {};
            for(let v of fields){
                fsv[v] = fs[v].value;
            }
            console.log(fsv);


            let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            let mobile_pattern = /^09\d{2}\-?\d{3}\-?\d{3}$/;

            for(let v of fields){
                fs[v].style.borderColor = '#cccccc';
                document.querySelector('#' + v + 'Help').innerHTML = '';
            }

            if(fsv.name.length < 2){
                fs.name.style.borderColor = 'red';
                document.querySelector('#nameHelp').innerHTML = '請填寫正確的姓名!';

                isPassed = false;
            }
            if(! email_pattern.test(fsv.email)){
                fs.email.style.borderColor = 'red';
                document.querySelector('#emailHelp').innerHTML = '請填寫正確的 Email!';
                isPassed = false;
            }
            if(! mobile_pattern.test(fsv.mobile)){
                fs.mobile.style.borderColor = 'red';
                document.querySelector('#mobileHelp').innerHTML = '請填寫正確的手機號碼!';
                isPassed = false;
            }

            return isPassed;
        };

    </script>
<?php include __DIR__. '/__html_foot.php';  ?>