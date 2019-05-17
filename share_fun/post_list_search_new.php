<?php
// require __DIR__. '/__cred.php';
require __DIR__ . '/__connect_db.php';
@$search = $_GET['search'];
$page_name = 'data_list';

$per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


// 算總筆數
$t_sql = "SELECT COUNT(*) FROM share_post
WHERE (`post_title` LIKE '%" . $search . "%') OR (`post_content` LIKE '%" . $search . "%')";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

// 總頁數
$total_pages = ceil($total_rows / $per_page);

if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;

$p_start = ($page - 1) * $per_page;

$sql = "SELECT * FROM share_post LEFT JOIN share_category
ON share_post.post_cate = share_category.cate_id
WHERE (`post_title` LIKE '%" . $search . "%') OR (`post_content` LIKE '%" . $search . "%')
ORDER BY post_id DESC LIMIT $p_start, $per_page";


//echo $sql;exit;
$stmt = $pdo->query($sql);

// 所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__ . '/__html_head.php';  ?>
<style>
    /* html {
        position: relative;
    } */

    .table td {
        height: 3rem;
        overflow: hidden;
    }

    /* .edit i {
        font-size: 20px;
    } */

    .preview {
        width: 100vw;
        overflow-y: scroll;
        background: rgba(0, 0, 0, .8);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 20;
        height: 100%;
        visibility: hidden;
    }

    .preview.active {
        visibility: visible;
    }

    .article {
        min-width: 50vw;
        min-height: 100vh;
    }

    .preview img {
        max-width: 100% !important;
        height: auto !important;
    }

    .fa-times-circle {
        font-size: 2.5rem;
        color: #aaaaaa;
    }
</style>
<?php include __DIR__ . '/__style_start.html';  ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between mb-3">
            <div>
                <a class="<?= $page_name == 'data_insert' ? 'active' : '' ?>" href="new_post_jq.php"><button type="button" class="btn btn-primary">新增文章</button></a>
            </div>
            <div>
                <!-- <<<<<<< HEAD
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="搜尋文章" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
======= -->
                <form class="form-inline my-2 my-lg-0" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="搜尋文章" aria-label="Search" name="search" value="<?= $search ?>">
                    <input class="btn btn-outline-primary my-2 my-sm-0" type="submit" value="搜尋">
                    <!-- >>>>>>> c63b19d33d86a395236a73690ba72bff53bb57bb -->
                </form>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end">
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
                        <th scope="col">文章標籤</th> -->
                        <th scope="col">文章開關</th>
                        <th scope="col">操作</i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td class="post_id" data-postid="<?= $row['post_id'] ?>"><?= htmlentities($row['post_id']) ?></td>
                            <!-- <td><?= htmlentities($row['mem_nickname']) ?></td> -->
                            <td><?= htmlentities($row['cate_name']) ?></td>
                            <td class="post_title" data-title="<?= htmlentities($row['post_title']) ?>">
                                <a class="to_preview" href=""><?= htmlentities($row['post_title']) ?></a>
                                <div class="preview">
                                    <!-- <input type="hidden" name="post_id" value="<?= $row['post_id'] ?>"> -->
                                    <div class="d-flex justify-content-center">
                                        <div class="to_close col-lg-2"></div>
                                        <div class="article col-lg-8 bg-white p-5 ">
                                            <div class="d-flex justify-content-end">
                                                <a href="" id="close_pre"><i class="fas fa-times-circle"></i></a>
                                            </div>
                                            <div class="px-5">
                                                <h2 class="py-3 px-5 text-left"><?= $row['post_title'] ?></h2>
                                                <div class="px-5"><?= $row['post_content'] ?></div>
                                            </div>
                                        </div>
                                        <div class="to_close col-lg-2"></div>
                                    </div>
                                </div>

                            </td>
                            <td><?= htmlentities($row['post_time']) ?></td>
                            <td><?= htmlentities($row['post_editTime']) ?></td>
                            <!-- <td><?= html_entity_decode($row['post_content']) ?></td>
                                                                            <td><?= htmlentities($row['browse_num']) ?></td>
                                                                            <td><?= htmlentities($row['share_num']) ?></td>
                                                                            <td><?= htmlentities($row['cmt_num']) ?></td>
                                                                            <td><?= htmlentities($row['post_tag']) ?></td> -->
                            <td><?= htmlentities($row['post_visible']) ?></td>
                            <td class="edit">
                                <a class="to_preview mx-1 p-1" href="">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="mx-1 p-1" href="javascript: delete_it(<?= $row['post_id'] ?>)">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a class="mx-1 p-1" href="post_edit_jq.php?post_id=<?= $row['post_id'] ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
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
    // $(window).ready();

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
    });


    $("table").on("click", ".to_preview", function() {
        $(this).closest("tr").find(".preview").addClass("active");
        return false;
    });
    $(".preview").on("click", "#close_pre", function() {
        $(this).closest("td").find(".preview").removeClass("active");
        return false;
    });
    $("html").on("click", ".to_close", function(event) {
        event.preventDefault();
        event.stopPropagation();
        if ($(this) !== $(".article")) {

            $(this).closest("td").find(".preview").removeClass("active");
            return false;
        }
    })
</script>
<?php include __DIR__ . '/__html_foot.php';  ?>