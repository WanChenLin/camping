<?php
require '../__cred.php';
require '../__connect_db.php';

$apply_id = isset($_GET['apply_id']) ? substr($_GET['apply_id'], 0) : 0;

$sql = "SELECT * FROM `event_applylist` JOIN `event_applyorder` ON `event_applylist`.`apply_id`=`event_applyorder`.`apply_id` WHERE `event_applylist`.`apply_id`='$apply_id'";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

$sth = $pdo->prepare("SELECT event_id FROM event_applyorder WHERE apply_id='$apply_id'");
$sth->execute();
$result = $sth->fetchColumn();
$aa = "$result\n";

$sql2 = "SELECT event_name FROM event_list WHERE event_id=$aa";
$pdo_query2 = $pdo->query($sql2);
$rows2 = $pdo_query2->fetch(PDO::FETCH_OBJ);
$event_name = $rows2->event_name;
?>

<?php include '../__index_head.php'; ?>
<?php include '../__index_header.php'; ?>
<?php include '../__index_navbar.php'; ?>

<main class="col-md-10 bg-white">
    <section>

        <style>
            @media (max-width:768px) {
                .applyMemberList_large {
                    display: none;
                }
            }

            @media (min-width:768px) {
                .applyMemberList_small {
                    display: none;
                }
            }
        </style>

        <aside class="bg-warning">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-2">
                    <li class="breadcrumb-item">主題活動</li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="event_list_search.php">活動列表</a></li>
                    <li class="breadcrumb-item active" aria-current="page">報名資訊</li>
                    <li class="breadcrumb-item active" aria-current="page">報名名單</li>
                </ol>
            </nav>
        </aside>

        <div class="row justify-content-between m-2">
            <div class="alert-light">
                <h4>活動名稱：<?= $event_name ?></h4>
                <h6>報名編號：<?= $apply_id ?></h6>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <input id="myInput" type="text" placeholder="Search.." class="form-control mr-sm-2">
                <i class="fas fa-search"></i>
            </form>
        </div>

        <?php foreach ($rows as $row) : ?>
            <div class="card m-2 applyMemberList_small">
                <div class="card-header text-right" style="padding:0">
                    <a class="p-2" href="apply_memberEdit.php?applyList_id=<?= $row['applyList_id'] ?>">
                        <i class="fas fa-edit m-2"></i>
                    </a>
                    <a class="p-2" href="javascript: delete_it(<?= $row['applyList_id'] ?>)">
                        <i class="fas fa-trash-alt m-2"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title col-md-6">姓名：<?= $row['applyList_name'] ?></h5>
                        <h5 class="card-title col-md-6">身份證字號：<?= $row['applyList_idn'] ?></h5>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6" style="margin:0">手機：<?= $row['applyList_mobile'] ?></p>
                        <p class="card-text col-md-6" style="margin:0">email：<?= $row['applyList_email'] ?></p>
                    </div>
                    <div class="row">
                        <p class="card-text col-md-6" style="margin:0">緊急連絡人：<?= $row['applyList_mobile'] ?></p>
                        <p class="card-text col-md-6" style="margin:0">緊急連絡人電話：<?= $row['applyList_emgMobile'] ?></p>
                    </div>
                    <p class="card-text" style="margin:0">備註：<?= $row['applyList_remark'] ?></p>
                </div>
            </div>
        <?php endforeach ?>

        <table class="table table-striped table-bordered applyMemberList_large">
            <thead>
                <tr style="font-size:14px">

                    <th scope="col">參加人姓名</th>
                    <th scope="col">參加人id</th>
                    <th scope="col">參加人mobile</th>
                    <th scope="col">參加人email</th>
                    <th scope="col">緊急連絡人</th>
                    <th scope="col">緊急連絡人電話</th>
                    <th scope="col">訂單狀態</th>
                    <th scope="col">備註</th>
                    <th colspan="">操作</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row['applyList_name'] ?></td>
                        <td><?= $row['applyList_idn'] ?></td>
                        <td><?= $row['applyList_mobile'] ?></td>
                        <td><?= $row['applyList_email'] ?></td>
                        <td><?= $row['applyList_emg'] ?></td>
                        <td><?= $row['applyList_emgMobile'] ?></td>
                        <td><?= $row['apply_order'] == 1 ? '取消訂單' : '訂單成立' ?></td>
                        <td><?= $row['applyList_remark'] ?></td>
                        <td>
                            <a href="apply_memberEdit.php?applyList_id=<?= $row['applyList_id'] ?>"><i class="fas fa-edit mx-1 p-1"></i></a>
                            <a href="javascript: delete_it(<?= $row['applyList_id'] ?>)"><i class="fas fa-trash-alt mx-1 p-1"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            <a class="btn btn-primary" href="apply_orderList.php?event_id=<?= $row['event_id'] ?>" role="button">回上一頁</a>
            <a class="btn btn-outline-primary ml-2" href="event_list_search.php" role="button">回活動列表頁</a>
        </div>

        <script>
            function delete_it(applyList_id) {
                if (confirm(`確定要刪除編號 ${applyList_id}的資料嗎?`)) {
                    location.href = 'apply_memberDelete.php?applyList_id=' + applyList_id;
                }
            }

            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

    </section>
</main>

<?php include '../__index_foot.php'; ?>