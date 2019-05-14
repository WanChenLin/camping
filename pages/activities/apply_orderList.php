<?php
require '../../__cred.php';
require '../../__connect_db.php';

$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 1;

$sql = "SELECT * FROM  `event_applyorder` JOIN `event_list` ON `event_applyorder`.`event_id`=`event_list`.`event_id`  WHERE `event_applyorder`.`event_id`=$event_id ORDER BY apply_date DESC";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

$apply_sql = "SELECT COUNT(1) FROM `event_applylist` WHERE `event_id`=$event_id";
$apply_pdo_query = $pdo->query($apply_sql);
$total_apply_rows = $apply_pdo_query->fetch(PDO::FETCH_NUM)[0];

$sql2 = "SELECT event_name FROM event_list WHERE event_id=$event_id";
$pdo_query2 = $pdo->query($sql2);
$rows2 = $pdo_query2->fetch(PDO::FETCH_OBJ);
$event_name = $rows2->event_name;
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<main class="col-md-10 bg-white">
    <section>
        
        <style>
            @media (max-width:768px) {
                .orderList_large {
                    display: none;
                }
            }

            @media (min-width:768px) {
                .orderList_small {
                    display: none;
                }

                label {
                    text-align: right;
                }
            }
        </style>

        <aside class="bg-warning">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-2">
                    <li class="breadcrumb-item">主題活動</li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="event_list_search.php">活動列表</a></li>
                    <li class="breadcrumb-item active" aria-current="page">報名資訊</li>
                </ol>
            </nav>
        </aside>

        <div class="row justify-content-between m-2">
            <div class="alert-light my-3">
                <h4>活動名稱：<?= $event_name ?></h4>
                <h6>已報名人數：<?= $total_apply_rows ?></h6>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <input id="myInput" type="text" placeholder="Search.." class="form-control mr-sm-2">
                <i class="fas fa-search"></i>
            </form>
        </div>

        <?php foreach ($rows as $row) : ?>

            <div class="card m-2 orderList_small">
                <div class="card-body">
                    <div class="row">
                        <h6 class="card-subtitle mb-2 text-muted col-md-6">報名編號：<?= $row['apply_id'] ?> ( <a href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>"><?= $row['apply_order'] == 1 ? '取消訂單' : '訂單成立' ?></a> )</h6>
                        <p class="card-subtitle mb-2 text-muted col-md-6">報名日期：<?= $row['apply_date'] ?></p>
                    </div>
                    <h5 class="card-title">
                        <a href="member_applyOrder.php?mem_account=<?= $row['mem_account'] ?>">會員帳號：<?= $row['mem_account'] ?>
                        </a>
                    </h5>
                    <p class="card-text">
                        <a href="apply_memberList.php?apply_id=<?= $row['apply_id'] ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" style="font-size:12px">報名人數： <?= $row['apply_num'] ?> 人
                        </a>
                        ( <font size="3" color="red">$ <?= $row['apply_amount'] ?></font> /
                        <a href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>"><?= $row['apply_pay'] == 1 ? '已付款' : '未付款' ?>
                        </a> )
                    </p>
                </div>
            </div>

        <?php endforeach ?>

        <table class="table table-striped table-bordered orderList_large">
            <thead>
                <tr style="font-size:14px" id="theader">
                    <th>報名編號</th>
                    <th>會員帳號</th>
                    <th>報名人數</th>
                    <th>報名日期</th>
                    <th>付款方式</th>
                    <th>付款狀態</th>
                    <th>訂單狀態</th>
                    <th>訂單金額</th>
                    <th>
                        <i class="fas fa-trash-alt"></i>
                    </th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row['apply_id'] ?></td>
                        <td>
                            <a href="member_applyOrder.php?mem_account=<?= $row['mem_account'] ?>">
                                <?= $row['mem_account'] ?>
                            </a>
                        </td>
                        <td><?= $row['apply_num'] ?> <a href="apply_memberList.php?apply_id=<?= $row['apply_id'] ?>" class="" target="_blank"><i class="fas fa-info-circle"></i></a></td>
                        <td><?= $row['apply_date'] ?></td>
                        <td><?php $payment = $row['apply_payment'];
                            switch ($payment) {
                                case '0':
                                    echo '信用卡';
                                    break;
                                case '1':
                                    echo 'ATM';
                                    break;
                                case '3':
                                    echo 'ibon';
                                    break;
                                default:
                                    echo '';
                            }
                            ?></td>
                        <td class="">
                            <?= $row['apply_pay'] == 1 ? '已付款' : '未付款' ?>
                            <a href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="">
                            <?= $row['apply_order'] == 1 ? '取消訂單' : '訂單成立' ?>
                            <a class="" href="apply_orderEdit.php?apply_id=<?= $row['apply_id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td><?= $row['apply_amount'] ?></td>
                        <td>
                            <a href="javascript: delete_it('<?= $row['apply_id'] ?>')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-2">
            <a class="btn btn-primary" href="event_list_search.php" role="button">回活動列表頁</a>
        </div>

        <script>
            function delete_it(apply_id) {
                if (confirm(`確定要刪除編號 ${apply_id}的資料嗎?`)) {
                    location.href = `apply_orderDelete.php?apply_id=${apply_id}`;
                    console.log(apply_id);
                }

            }
            $(window).resize(function() {
                var windowWidth = $(this).width();
                if (windowWidth <= 768) {
                    $("label").removeClass("text-right");
                    $("label").addClass("text-left");
                } else {
                    $("label").removeClass("text-left");
                    $("label").addClass("text-right");
                }
            });

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

<?php include '../../__index_foot.php'; ?>