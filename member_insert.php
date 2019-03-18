<?php

include __DIR__ . '/__connect_db.php';

$account = '';
$password = '';
$name = '';
$nickname = '';
$gender = '';
$birthday = '';
$mobile = '';
$email = '';

if(isset($_POST['gotodb'])){

    $account = ($_POST['account']);
    $password = ($_POST['password']);
    $name = ($_POST['name']);
    $nickname = ($_POST['nickname']);
    $gender = ($_POST['gender']);
    $birthday = ($_POST['birthday']);
    $mobile = ($_POST['mobile']);
    $email = ($_POST['email']);

    $sql = "INSERT INTO `member_list`
        (`mem_account`, `mem_password`, `mem_name`, `mem_nickname`, `mem_gender`, `mem_birthday`, `mem_mobile`, `mem_email`) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?)";
    try{
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['account'],
            $_POST['password'],
            $_POST['name'],
            $_POST['nickname'],
            $_POST['gender'],
            $_POST['birthday'],
            $_POST['mobile'],
            $_POST['email']
        ]);

        if($stmt->rowCount()==1){
            $success=true;
            $msg=[
                'type' => 'success',
                'info' => '資料新增成功'
            ];
            $account = '';
            $password = '';
            $name = '';
            $nickname = '';
            $gender = '';
            $birthday = '';
            $mobile = '';
            $email = '';
        } else {
            $msg=[
                'type' => 'danger',
                'info' => '資料新增錯誤'
            ];
        }
    } catch(PDOException $ex){
        $msg=[
            'type' => 'danger',
            'info' => 'Email重複輸入'
        ];
    }

}

?>

<?php include __DIR__. '/html_head.php'; ?>
<?php include __DIR__. '/html_header.php'; ?>
<?php include __DIR__. '/html_navbar.php'; ?>

<main class=" col-9 bg-white">

<aside class= "my-2">
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="member_list.php">會員資料清單</a>
    </li>
    <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </li> -->
    <li class="nav-item">
        <a class="nav-link active" href="member_insert.php">新增資料</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
    </ul>
</aside>

<section class="">

    <?php if(isset($msg)): ?>
        <div class="alert alert-<?= $msg['type'] ?>" role="alert">
            <?= $msg['info'] ?>
        </div>
    <?php endif ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">新增會員資料
                <?php 
                    if(isset($stmt)){
                        echo $stmt->rowCount();
                    }
                ?>
            </h5>
            
            <form name="formInsert" method="POST" onSubmit="">
                <input type="hidden" name="gotodb" value="check">
                <div class="form-group row">
                    <label for="account" class="col-sm-2 col-form-label">帳號名稱</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="account" name="account" placeholder="" value="<?= $account ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">密碼</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="" value="<?= $password ?>">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="password_check" class="col-sm-2 col-form-label">再次確認密碼</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_check" name="password_check" placeholder="">
                    </div>
                </div> -->
                <!-- <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">大頭貼</label>
                    <div class="col-sm-10">
                        <div></div>
                        <button class="btn btn-primary">選擇檔案</button>
                        <input type="text" class="form-control" id="avatar" name="avatar" placeholder="大頭貼上傳">
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">姓名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= $name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nickname" class="col-sm-2 col-form-label">暱稱</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="" value="<?= $nickname ?>">
                    </div>
                    <div class="col-sm-2">
                        <small>將使用於分享樂</small>
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">性別</legend>
                        <div class="col-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
                                <label class="form-check-label" for="genderM">男 Male</label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="genderF" value="female">
                                <label class="form-check-label" for="genderF">女 Female</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="birthday" class="col-sm-2 col-form-label">生日</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="birthday" name="birthday" placeholder="YYYY-MM-DD" value="<?= $birthday ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-sm-2 col-form-label">手機</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="格式: 0912345678" value="<?= $mobile ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">信箱</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="必填" value="<?= $email ?>">
                    </div>
                </div>
                <div class="form-group row text-center">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</main>

<?php include __DIR__. '/html_foot.php'; ?>
