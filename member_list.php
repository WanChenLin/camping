<?php

include __DIR__ . '/__connect_db.php';

$per_page = 10;
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

$sql = sprintf("SELECT *, (SELECT level_title FROM member_level WHERE mem_level=memLevel_id ) AS level_title
                FROM member_list ORDER BY mem_id DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
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
    .user_book {
        top: 100px;
        left: 20%;
    }
</style>


<main class="col-10 bg-white">

    <aside class="my-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="member_list.php">會員資料清單</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member_insert.php">新增資料</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member_search.php">搜尋會員</a>
            </li>
        </ul>
    </aside>

    <section class="postition-relative">
        <table class="table table-hover table-responsive">
            <!-- <caption>List of members</caption> -->
            <thead>
                <tr style="white-space:nowrap">
                    <th scope=" col">#會員編號</th>
                    <th scope=" col">帳號</th>
                    <!-- <th scope=" col">密碼</th> -->
                    <!-- <th scope=" col">大頭貼</th> -->
                    <th scope=" col">姓名</th>
                    <!-- <th scope=" col">暱稱</th> -->
                    <th scope=" col">性別</th>
                    <th scope=" col">生日</th>
                    <th scope=" col">手機</th>
                    <th scope=" col">信箱</th>
                    <!-- <th scope=" col">地址</th> -->
                    <th scope=" col">等級</th>
                    <th scope=" col">狀態</th>
                    <th scope=" col">註冊日期</th>
                    <th scope=" col" colspan="2">操作</th>
                    <!-- <th scope=" col"><i class="far fa-edit"></i></th> -->
                    <!-- <th scope=" col"><i class="far fa-trash-alt"></i></th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row['mem_id'] ?></th>
                    <td><?= $row['mem_account'] ?></td>
                    <!-- <td><?= $row['mem_password'] ?></td> -->
                    <!-- <td>
                        <img src="./<?= $row['mem_avatar'] ?>" alt="" height="50">
                    </td> -->
                    <td><?= $row['mem_name'] ?></td>
                    <!-- <td><?= $row['mem_nickname'] ?></td> -->
                    <td><?= $row['mem_gender'] ?></td>
                    <td><?= $row['mem_birthday'] ?></td>
                    <td><?= $row['mem_mobile'] ?></td>
                    <td><?= $row['mem_email'] ?></td>
                    <!-- <td><?= $row['mem_address'] ?></td> -->
                    <td><?= $row['level_title'] ?></td>
                    <td><?= $row['mem_status'] ?></td>
                    <td><?= $row['mem_signUpDate'] ?></td>
                    <td class="d-flex">
                        <a href="" class="d-block mx-1"><i class="fas fa-user-circle"></i></a>
                        <!-- <a href="" class="d-block mx-1"><i class="fas fa-address-card"></i></a> -->
                        <a href="member_edit.php?mem_id=<?= $row['mem_id']?>" class="d-block mx-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="javascript: delete_row(<?= $row['mem_id']?>)" class="d-block mx-1">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        
                    </td>
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

        <!-- <div class="user_book position-absolute">
            <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div> -->
    </section>

</main>

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-secondary mx-1',
            cancelButton: 'btn btn-primary mx-1'
        },
        buttonsStyling: false,
    })

    function delete_row(mem_id){
        swalWithBootstrapButtons.fire({
            title: '警告',
            html: '<h5>確定要刪除第 '+mem_id+' 筆會員資料嗎?</h5><span style="color:red">注意：刪除後將無法復原</span>',
            type: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: '確認刪除',
            confirmButtonColor: '#aaa',
            cancelButtonText: '取消',
            cancelButtonColor: '#3085d6',
            focusCancel: true,
        }).then((result) => {
            if (result.value) {
                swalWithBootstrapButtons.fire({
                    title: '刪除成功',
                    html: '已刪除該筆會員資料',
                    type: 'success',
                    timer: 1000,
                    onBeforeOpen: () => {
                        timerInterval = setInterval(() => {}, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                        location.href = 'member_delete.php?mem_id='+ mem_id ;
                    }
                })
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: '取消刪除',
                    html: '尚未刪除該筆會員資料',
                    type: 'info'
                })
            }
        })
    }
    
</script>

<?php include __DIR__ . '/html_foot.php'; ?> 