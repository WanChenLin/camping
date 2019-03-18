<?php

include __DIR__ . '/__connect_db.php';

$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$total_sql = "SELECT COUNT(1) FROM member_list";
$total_stmt = $pdo->query($total_sql);
$total_rows = $total_stmt->fetch(PDO::FETCH_NUM)[0];

$total_pages = ceil($total_rows / $per_page);
if($page<1){$page=1;}
if($page>$total_pages){$page=$total_pages;}

$sql = sprintf("SELECT * FROM member_list ORDER BY mem_id DESC LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">新增會員資料</h5>
            
            <form>
                <div class="form-group row">
                    <label for="account" class="col-sm-2 col-form-label">帳號名稱</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="account" name="account" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">密碼</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_check" class="col-sm-2 col-form-label">再次確認密碼</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_check" name="password_check" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">大頭貼</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="avatar" name="avatar" placeholder="大頭貼上傳">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">姓名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nickname" class="col-sm-2 col-form-label">暱稱</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="">
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
                        <input type="text" class="form-control" id="birthday" name="birthday" placeholder="YYYY-MM-DD">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-sm-2 col-form-label">手機</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="格式: 0912345678">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">信箱</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="必填">
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
