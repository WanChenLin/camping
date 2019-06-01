<?php
// require __DIR__. '/__cred.php';
require '../../__connect_db.php';
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

$sql = sprintf("SELECT * FROM share_post LEFT JOIN share_category
ON share_post.post_cate = share_category.cate_id
ORDER BY post_id DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);

//echo $sql;exit;
$stmt = $pdo->query($sql);

// 所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/adapters/jquery.js"></script>
<script src="ckfinder/ckfinder.js"></script>

<style>
    .table td {
        height: 3rem;
        overflow: hidden;
    }
</style>

<main class="col-10 bg-white">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">分享樂</a></li>
            <li class="breadcrumb-item"><a href="#">新手指南</a></li>
            <li class="breadcrumb-item active" aria-current="page">文章列表</li>
        </ol>
    </nav>

    <style>
        ul.navbar-nav>li.nav-item.active {
            background-color: #e0d011;
        }
    </style>

    <ul class="nav nav-tabs pt-3">
        <li class="nav-item">
            <a class="nav-link <?= $page_name == 'data_list' ? 'active' : '' ?>" href="post_list_pre.php">文章列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $page_name == 'data_insert' ? 'active' : '' ?>" href="new_post_jq.php">新增文章</a>
        </li>
    </ul>
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
                            <th scope="col">分類</th>
                            <th scope="col">標題</th>
                            <th scope="col">發布時間</th>
                            <th scope="col">修改時間</th>
                            <th scope="col">文章開關</th>
                            <th scope="col">編輯</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) : ?>
                            <tr>
                                <td class="post_id" data-postid="<?= $row['post_id'] ?>">
                                    <?= htmlentities($row['post_id']) ?>
                                </td>
                                <td><?= htmlentities($row['cate_name']) ?></td>
                                <td class="post_title" data-title="<?= htmlentities($row['post_title']) ?>">
                                    <a href="post_preview.php?post_id=<?= $row['post_id'] ?>">
                                        <?= htmlentities($row['post_title']) ?>
                                    </a>
                                </td>
                                <td><?= htmlentities($row['post_time']) ?></td>
                                <td><?= htmlentities($row['post_editTime']) ?></td>
                                <td><?= htmlentities($row['post_visible']) ?></td>
                                <td class="delete">
                                    <a class="delete_it" data-delete="<?= $row['post_id'] ?>" href="#">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a href="post_edit_jq.php?post_id=<?= $row['post_id'] ?>"><i class="fas fa-edit"></i></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Tiny Nice Confirmation -->
<link rel="stylesheet" href="HPCF/H-confirm-alert.css" />
<script type="text/javascript" src="HPCF/H-confirm-alert.js"></script>

<script>
    $("table").on("click", ".delete", function delete_it(post_id) {
        let post_title = $(this).closest("tr").find(".post_title").data("title");
        let delete_it = $(this).find(".delete_it").data("delete");

        $.confirm.show({
            "message": `確定要刪除【${post_title}】這篇文章嗎？`,
            "yesText": "刪啦刪啦",
            "noText": "不要好了",

            "yes": function() {
                // fired once you click on the confirm button
                location.href = 'post_delete.php?post_id=' + delete_it;
            },
            "no": function() {
                // fired once you click on the cancel button
            },
        })
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha256-jGAkJO3hvqIDc4nIY1sfh/FPbV+UK+1N+xJJg6zzr7A=" crossorigin="anonymous"></script>

<?php include '../../__index_foot.php'; ?>