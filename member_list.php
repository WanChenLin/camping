<?php

include __DIR__ . '/__connect_db.php';

$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$total_sql = "SELECT COUNT(1) FROM member_list";
$total_stmt = $pdo->query($total_sql);
$total_rows = $total_stmt->fetch(PDO::FETCH_NUM)[0];

$total_pages = ceil($total_rows / $per_page);
if ($page < 1) {
    $page = 1;
}
if ($page > $total_pages) {
    $page = $total_pages;
}

$sql = sprintf("SELECT * FROM member_list ORDER BY mem_id DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include __DIR__ . '/html_head.php'; ?>
<?php include __DIR__ . '/html_header.php'; ?>
<?php include __DIR__ . '/html_navbar.php'; ?>
<style>
    section .table th {
        border-top: 0;
    }
</style>


<main class=" col-10 bg-white">

    <aside class="my-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="member_list.php">會員資料清單</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="member_insert.php">新增資料</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="member_insert2.php">新增資料</a>
            </li>
        </ul>
    </aside>

    <section>
        <table class="table table-hover table-responsive">
            <caption>List of members</caption>
            <thead>
                <tr>
                    <th scop e=" col">#</th>
                    <th scop e=" col">帳號</th>
                    <th scop e=" col">密碼</th>
                    <th scop e=" col">大頭貼</th>
                    <th scop e=" col">姓名</th>
                    <th scop e=" col">暱稱</th>
                    <th scop e=" col">性別</th>
                    <th scop e=" col">生日</th>
                    <th scop e=" col">手機</th>
                    <th scop e=" col">信箱</th>
                    <th scop e=" col">狀態</th>
                    <th scop e=" col">註冊日期</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                <tr>
                    <th scop e=" row"><?= $row['mem_id'] ?></th>
                    <td><?= $row['mem_account'] ?></td>
                    <td><?= $row['mem_password'] ?></td>
                    <td><?= $row['mem_avatar'] ?></td>
                    <td><?= $row['mem_name'] ?></td>
                    <td><?= $row['mem_nickname'] ?></td>
                    <td><?= $row['mem_gender'] ?></td>
                    <td><?= $row['mem_birthday'] ?></td>
                    <td><?= $row['mem_mobile'] ?></td>
                    <td><?= $row['mem_email'] ?></td>
                    <td><?= $row['mem_status'] ?></td>
                    <td><?= $row['mem_signUpDate'] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page == 1 ?>" tabindex="-1" aria-disabled="true">&lt;&lt;</a>
                </li>
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1" aria-disabled="true">&lt;</a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>" aria-current="page">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
                <?php endfor ?>
                <li class="page-item <?= $page == $total_pages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
                </li>
                <li class="page-item <?= $page == $total_pages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page = $total_pages ?>">&gt;&gt;</a>
                </li>
            </ul>
        </nav>
    </section>

</main>

<?php include __DIR__ . '/html_foot.php'; ?> 