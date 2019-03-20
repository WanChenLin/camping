<?php
    // require __DIR__. '/__cred.php';
require __DIR__ . '/__connect_db.php';
$page_name = 'data_list';

$per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


// 算總筆數
$t_sql = "SELECT COUNT(1) FROM share_post";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

// 總頁數
$total_pages = ceil($total_rows / $per_page);

if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;


$sql = sprintf("SELECT `share_post`.`post_id`,
                    `share_post`.`post_cate`,
                    `share_post`.`post_title`,
                    `share_post`.`post_time`,
                    `share_post`.`post_editTime`
                FROM `share_post` LEFT JOIN `share_category`
                ON `share_post`.`post_cate` = `share_category`.`post_cate`
                LIMIT %s, %s", ($page - 1) * $per_page, $per_page);

//echo $sql;exit;
$stmt = $pdo->query($sql);

// 所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__ . '/__html_head.php';  ?>
<style>
    .table td {
        height: 3rem;
        overflow: hidden;
    }
</style>
<?php include __DIR__ . '/__style_start.html';  ?>
<?php include __DIR__ . '/__navbar.php';  ?>
<div class="container-fluid">
    <div><?= $page . " / " . $total_pages ?></div>

    <div class="row">
        <div class="col-lg-12">
            <nav>
                <ul class="pagination pagination-sm">
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
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">編號</th>
                        <!-- <th scope="col">文章作者</th> -->
                        <th scope="col">分類</th>
                        <th scope="col">標題</th>
                        <th scope="col">發布時間</th>
                        <th scope="col">修改時間</th>
                        <!-- <th scope="col">內容</th>
                        <th scope="col">瀏覽人數</th>
                        <th scope="col">分享人數</th>
                        <th scope="col">評論人數</th>
                        <th scope="col">文章標籤</th>
                        <th scope="col">文章開關</th> -->
                        <th scope="col"><i class="fas fa-trash-alt"></i></th>
                        <th scope="col"><i class="fas fa-edit"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= htmlentities($row['post_id']) ?></td>
                        <!-- <td><?= htmlentities($row['mem_nickname']) ?></td> -->
                        <td><?= htmlentities($row['post_cate']) ?></td>
                        <td><?= htmlentities($row['post_title']) ?></td>
                        <td><?= htmlentities($row['post_time']) ?></td>
                        <td><?= htmlentities($row['post_editTime']) ?></td>
                        <!-- <td><?= html_entity_decode($row['post_content']) ?></td>
                        <td><?= htmlentities($row['browse_num']) ?></td>
                        <td><?= htmlentities($row['share_num']) ?></td>
                        <td><?= htmlentities($row['cmt_num']) ?></td>
                        <td><?= htmlentities($row['post_tag']) ?></td>
                        <td><?= htmlentities($row['post_visible']) ?></td> -->
                        <td><a href="javascript: delete_it(<?= $row['post_id'] ?>)">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td>
                            <a href="data_edit.php?post_id=<?= $row['post_id'] ?>"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php include __DIR__ . '/__style_end.html';  ?>

</div>
<script>
    function delete_it(post_id) {
        if (confirm(`確定要刪除這篇文章嗎?`)) {
            location.href = 'data_delete.php?post_id=' + post_id;
        }
    }
</script>
<?php include __DIR__ . '/__html_foot.php';  ?> 