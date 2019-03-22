<?php 

//require __DIR__.'/__cred.php';

require __DIR__ . '/__connect_db.php';

$page_name = 'host_list';

// 每頁欲顯示的筆數
$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//算總筆數
$t_sql = "SELECT COUNT(1) FROM host_infolist";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

//算總頁數
$total_pages = ceil($total_rows / $per_page);

// 讓頁數限定在某一範圍內
if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;

// LIMIT是讓畫面僅顯示部分筆數
$sql = sprintf("SELECT * FROM host_infolist ORDER BY host_id DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);

// 所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include __DIR__ . '/__html_head.php'; ?>
<?php include __DIR__ . '/__html_navbarLeft.php'; ?>

<style>

</style>

<main class="col-10 bg-white">
    <?php include __DIR__ . '/__html_navbarTop.php'; ?>
    <aside class="bg-warning">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-2">
                <li class="breadcrumb-item"><a href="./host_menu.php">營地主管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">營地主列表</li>
            </ol>
        </nav>
    </aside>

    <section>
        <div class="">總筆數：共<?= $total_rows ?>筆</div>
        <div class="row">
            <div class="col-lg-12 my-2" style="height: 30px;">
                <nav>
                    <ul class="pagination pagination-sm">
                        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=1">&lt;&lt;</a>
                        </li>
                        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page - 1 ?>">&lt;</a>
                        </li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?php endfor ?>
                        <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
                        </li>
                        <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $total_pages ?>">&gt;&gt;</a>
                        </li>
                        <br>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- <div class="add_host my-1">
            <a class="btn btn-success" href="host_list_insert.php" role="button">新增營地主</a>
        </div> -->

        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table class="table table-striped table-bordered text-center text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">編輯</th>
                            <th scope="col">帳戶</th>
                            <th scope="col">密碼</th>
                            <th scope="col">營區名</th>
                            <th scope="col">聯絡電話</th>
                            <th scope="col">傳真號碼</th>
                            <th scope="col">電子郵件</th>
                            <th scope="col">縣市</th>
                            <th scope="col">鄉鎮</th>
                            <th scope="col">郵遞區號</th>
                            <th scope="col">營區地址</th>
                            <th scope="col">營區介紹</th>
                            <th scope="col">收款方式</th>
                            <th scope="col">收款資訊─姓名</th>
                            <th scope="col">收款資訊─地址</th>
                            <th scope="col">收款資訊─IBAN碼</th>
                            <th scope="col">收款資訊─SWIFT碼</th>
                            <th scope="col">查看營地列表</th>
                            <th scope="col">刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?= $row['host_id'] ?></td>
                            <td>
                                <a href="host_list_edit.php?id=<?= $row['host_id'] ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <!-- strip_tags()與htmlentities()是避免遭受Cross Site Script Attack（XSS攻擊） -->
                            <!-- 備註：strip_tags()是遭受到標籤攻擊，輸出時會將標籤拿掉；而htmlentities會完整保留使用者輸入的文字 -->
                            <td><?= htmlentities($row['host_account']) ?></td>
                            <td><?= sha1($row['host_password']) ?></td>
                            <td><?= htmlentities($row['host_parkName']) ?></td>
                            <td><?= htmlentities($row['host_tel']) ?></td>
                            <td><?= htmlentities($row['host_fax']) ?></td>
                            <td><?= htmlentities($row['host_email']) ?></td>
                            <td><?= htmlentities($row['city']) ?></td>
                            <td><?= htmlentities($row['town']) ?></td>
                            <td><?= htmlentities($row['zipcode']) ?></td>
                            <td><?= htmlentities($row['host_address']) ?></td>
                            <td><?= htmlentities($row['host_intro']) ?></td>
                            <td><?= htmlentities($row['host_paymentType']) ?></td>
                            <td><?= htmlentities($row['host_bankName']) ?></td>
                            <td><?= htmlentities($row['host_bankAddress']) ?></td>
                            <td><?= htmlentities($row['host_bankIBAN']) ?></td>
                            <td><?= htmlentities($row['host_bankSWIFT']) ?></td>
                            <td>
                                <a href="http://localhost/camping/campsite/campsite_list.php">查看</a>
                            </td>
                            <td>
                                <a href="javascript: delete_it(<?= $row['host_id'] ?>)">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<script>
    function delete_it(host_id) {
        if (confirm(`確定要刪除編號為 ${host_id} 的資料嗎?`)) {
            location.href = 'host_list_delete.php?id=' + host_id;
        }
    }
</script>

<?php include __DIR__ . '/__html_foot.php';  ?> 