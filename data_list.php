<?php

    include __DIR__. '/__connect_db.php';

    $per_page = 10;

?>

<?php include __DIR__. '/html_head.php'; ?>
<?php include __DIR__. '/html_header.php'; ?>
<?php include __DIR__. '/html_navbar.php'; ?>

<main class="col-9 bg-white">

<aside class="bg-warning">
    <span>麵包屑 區域</span>
    <p>會員管理 / 訂單管理 / 收藏管理</p>
</aside>

<section>

    <table class="table table-hover table-responsive">
    <caption>List of members</caption>
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">帳號</th>
        <th scope="col">密碼</th>
        <th scope="col">大頭貼</th>
        <th scope="col">姓名</th>
        <th scope="col">暱稱</th>
        <th scope="col">性別</th>
        <th scope="col">生日</th>
        <th scope="col">手機</th>
        <th scope="col">信箱</th>
        <th scope="col">狀態</th>
        <th scope="col">註冊日期</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">id</th>
        <td>account</td>
        <td>password</td>
        <td>avatar</td>
        <td>name</td>
        <td>nickname</td>
        <td>gender</td>
        <td>birthday</td>
        <td>mobile</td>
        <td>email</td>
        <td>status</td>
        <td>signUpDate</td>
        </tr>
    </tbody>
    </table>

</section>

</main>

<?php include __DIR__. '/html_foot.php'; ?>