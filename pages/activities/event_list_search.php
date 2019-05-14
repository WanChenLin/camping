<?php
require '../../__cred.php';
require '../../__connect_db.php';

$sql_countMem = "SELECT event_id, COUNT(event_id) num FROM event_applylist WHERE `apply_order`=0 GROUP BY event_id ";
$pdo_query_countMem = $pdo->query($sql_countMem);
$rows_countMem = $pdo_query_countMem->fetchAll(PDO::FETCH_ASSOC);

$num_data = [];
foreach ($rows_countMem as $v) {
    $num_data[$v['event_id']] = $v['num'];
}

$keyword = '';
$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

if (@$_POST['keyword'] != '') {
    $keyword = $_POST['keyword'];

    $sql_search = "SELECT * FROM `event_list` JOIN `campsite_list` WHERE `campsite_list`.`camp_id`=`event_list`.`camp_id` and `event_name` like '%$keyword%' ORDER BY event_id  DESC ";

    $t_sql = "SELECT COUNT(1) FROM `event_list` JOIN `campsite_list` WHERE `campsite_list`.`camp_id`=`event_list`.`camp_id` and `event_name` like '%$keyword%'";
    $t_pdo_query = $pdo->query($t_sql);
    $total_rows = $t_pdo_query->fetch(PDO::FETCH_NUM)[0];
} else {
    $sql_search = sprintf("SELECT * FROM `event_list` JOIN `campsite_list` WHERE `campsite_list`.`camp_id`=`event_list`.`camp_id` ORDER BY event_id DESC LIMIT %s,%s", ($page - 1) * $per_page, $per_page);

    $t_sql = "SELECT COUNT(1) FROM `event_list`";
    $t_pdo_query = $pdo->query($t_sql);
    $total_rows = $t_pdo_query->fetch(PDO::FETCH_NUM)[0];
}
$pdoSearch_query = $pdo->query($sql_search);
$rows_search = $pdoSearch_query->fetchAll(PDO::FETCH_ASSOC);

$total_page = ceil($total_rows / $per_page);
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<main class="col-md-10 bg-white">
    <section>

        <style>
            @media (max-width:768px) {

                .list_large,
                #searchBar {
                    display: none;
                }
            }

            @media (min-width:768px) {
                .list_smaill {
                    display: none;
                }
            }

            .event_info {
                background: rgba(0, 0, 0, .7);
                width: 100vw;
                height: 100vh;
                z-index: 5;
                top: 0;
                left: 0;
            }

            .info_box {
                width: 60%;
                background: #fff;
            }
        </style>

        <aside class="bg-warning">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-2">
                    <li class="breadcrumb-item">主題活動</li>
                    <li class="breadcrumb-item active" aria-current="page">活動列表</a></li>
                </ol>
            </nav>
        </aside>

        <ul class="nav nav-pills mt-2 justify-content-between" id="searchBar">
            <li>
                <h3><a class="nav-link" href="event_insert.php"><i class="fas fa-plus-circle"></i></a></h3>
            </li>
            <li>
                <form name="form1" id="form1" method="post" class="form-inline my-2 my-lg-0">
                    <input name="keyword" id="myInput" type="text" placeholder="Search.." class="form-control mr-sm-2" value="<?= $keyword ?>">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </form>
            </li>
        </ul>
        <ul class="nav nav-pills mt-2 justify-content-end">
            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>">&lt;</a>
            </li>
            <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                <li class="nav-item">
                    <a class="nav-link  <?= $i == $page ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?= $page >= $total_page ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
            </li>
        </ul>

        <!-- =================== start search =============================== -->
        <?php foreach ($rows_search as $row_search) : ?>
            <div id="myTable">
                <div class="card m-2 list_large">
                    <ul class="nav d-flex justify-content-between">
                        <li class="nav-item p-2">
                            <a href="javascript: delete_it(<?= $row_search['event_id'] ?>)">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </li>
                        <li>
                            <ul class="list-unstyled d-flex justify-content-between">

                                <li class="text-primary nav-link check_info" style="cursor:pointer">查看內容</li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php
                                                                $count_num = isset($num_data[$row_search['event_id']]) ? $num_data[$row_search['event_id']] : 0;

                                                                if ((int)$count_num >= (int)$row_search['event_upLimit']) {
                                                                    echo '';
                                                                } else {
                                                                    echo 'apply_insert2.php?event_id=' . $row_search['event_id'];
                                                                }
                                                                ?>
                                                                        ">
                                        <?php

                                        $count_num = isset($num_data[$row_search['event_id']]) ? $num_data[$row_search['event_id']] : 0;

                                        if ((int)$count_num >= (int)$row_search['event_upLimit']) {
                                            echo '已額滿';
                                        } else {
                                            echo '新增報名';
                                        }

                                        ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="event_edit.php?event_id=<?= $row_search['event_id'] ?>"><i class="fas fa-edit"></i></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <table class="table">
                        <thead>
                            <tr style="font-size:14px">
                                <th scope="col" style="width:12vw">活動名稱( <?= $row_search['event_id'] ?> )</th>
                                <th scope="col">報名日期</th>
                                <th scope="col">活動日期</th>
                                <th scope="col">營地名稱(編號)</th>
                                <th scope="col">活動價格</th>
                                <th scope="col">人數上限</th>
                                <th scope="col">已報名人數</th>
                                <th scope="col">上/下架</th>
                                <th scope="col" style="width:15vw">備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $row_search['event_name'] ?></td>
                                <td><?= $row_search['event_applyStart'] ?> 至<br><?= $row_search['event_applyEnd'] ?></td>
                                <td><?= $row_search['event_dateStart'] ?> 至<br><?= $row_search['event_dateEnd'] ?></td>
                                <td><?= $row_search['camp_name'] ?>(<?= $row_search['camp_id'] ?>)<br><a href="event_camp.php?camp_id=<?= $row_search['camp_id'] ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" style="font-size:12px" target="_blank">營地資訊</a></td>
                                <td>$ <?= $row_search['event_price'] ?> /人</td>
                                <td><?= $row_search['event_upLimit'] ?></td>
                                <td>
                                    <?= isset($num_data[$row_search['event_id']]) ? $num_data[$row_search['event_id']] : 0 ?><br><a href="apply_orderList.php?event_id=<?= $row_search['event_id'] ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" style="font-size:12px" target="_blank">報名資訊</a>
                                </td>
                                <td><?php $shelf = $row_search['event_shelf'];
                                    switch ($shelf) {
                                        case '0':
                                            echo '上架中';
                                            break;
                                        case '1':
                                            echo '下架中';
                                            break;
                                        case '3':
                                            echo '頁面預告';
                                            break;
                                        default:
                                            echo '';
                                    }
                                    ?></td>
                                <td><?= $row_search['event_remark'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card event_info d-none position-fixed">
                        <div class="card-body p-4 container info_box">
                            <h2 class="text-right cross"><i class="far fa-times-circle" style="cursor:pointer"></i></h2>
                            <div class="form-group container d-flex">
                                <label for="event_name" style="width:120px">活動名稱：</label>
                                <div class="form-control" id="event_name" name="event_name"> <?= $row_search['event_name'] ?></div>
                                <small id="event_nameHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group container d-flex">
                                <label for="event_intro" style="width:120px">活動內容一：</label>
                                <div class="form-control" id="event_intro" name="event_intro" style="height:150px"> <?= $row_search['event_intro'] ?> </div>
                                <small id="event_introHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group container d-flex">
                                <label for="event_intro2" style="width:120px">活動內容二：</label>
                                <div class="form-control" id="event_intro2" name="event_intro2" style="height:150px"> <?= $row_search['event_intro2'] ?> </div>
                                <small id="event_intro2Help" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group container d-flex">
                                <label for="event_intro3" style="width:120px">活動內容三：</label>
                                <div class="form-control" id="event_intro3" name="event_intro3" style="height:150px"> <?= $row_search['event_intro3'] ?> </div>
                                <small id="event_intro3Help" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        <!-- =================== end search =============================== -->

        <?php foreach ($rows_search as $row) : ?>

            <div class="card container list_smaill mb-2" style="padding:0">
                <ul class="nav d-flex justify-content-between">
                    <li class="nav-item p-2">
                        <a href="javascript: delete_it(<?= $row['event_id'] ?>)">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </li>
                    <li>
                        <ul class="d-flex justify-content-between list-unstyled">

                            <li class="nav-item">
                                <a class="nav-link" href="event_intro_sm.php?event_id=<?= $row['event_id'] ?>">查看內容</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="
                                                                        <?php
                                                                        $count_num = isset($num_data[$row['event_id']]) ? $num_data[$row['event_id']] : 0;

                                                                        if ((int)$count_num >= (int)$row['event_upLimit']) {
                                                                            echo '';
                                                                        } else {
                                                                            echo 'apply_insert2.php?event_id=' . $row['event_id'];
                                                                        }
                                                                        ?>
                                                                        ">
                                    <?php

                                    $count_num = isset($num_data[$row['event_id']]) ? $num_data[$row['event_id']] : 0;

                                    if ((int)$count_num >= (int)$row['event_upLimit']) {
                                        echo '已額滿';
                                    } else {
                                        echo '新增報名';
                                    }

                                    ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="event_edit.php?event_id=<?= $row['event_id'] ?>"><i class="fas fa-edit"></i></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="row" style="margin:0">
                    <div class="col-3" style="padding:5px">
                        <img src="uploads\<?= $row['event_img'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-9" style="padding:5px">
                        <h5 class="card-title"><?= $row['event_name'] ?></h5>
                        <p class="card-text" style="margin:0">
                            <font size="3"><?= $row['event_dateStart'] ?> 起至 <?= $row['event_dateEnd'] ?></font>
                        </p>
                        <div class="row justify-content-between" style="margin:0; line-height: 1rem">
                            <div class="col-6" style="padding:5px">
                                <p class="card-text">在<a href="event_camp.php?camp_id=<?= $row['camp_id'] ?>"><?= $row['camp_name'] ?>(<?= $row['camp_id'] ?>)</a>
                                </p>
                            </div>
                            <div class="col-6" style="padding:5px" style="margin:0">
                                <p class="card-text">
                                    <font size="3">可容納 <?= $row['event_upLimit'] ?> 人</font>
                                </p>
                            </div>
                        </div>
                        <div class="row justify-content-between" style="margin:0; line-height: 1rem">
                            <div class="col-6" style="padding:5px">
                                <p class="card-text">
                                    <font size="3" color="red">$
                                        <?= $row['event_price'] ?></font> /人
                                </p>
                            </div>
                            <div class="col-6" style="padding:5px">
                                <p class="card-text">
                                    <font size="3" color="gray"><a href="apply_orderlist.php?event_id=<?= $row['event_id'] ?>">已有 <?= isset($num_data[$row['event_id']]) ? $num_data[$row['event_id']] : 0 ?>人報名</a></font>
                                </p>
                            </div>
                        </div>
                        <p class="card-text">
                            <font size="2" color="">報名期間：<?= $row['event_applyStart'] ?> 至 <?= $row['event_applyEnd'] ?></font>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <ul class="nav nav-pills  mt-2 justify-content-center">
            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>">&lt;</a>
            </li>
            <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                <li class="nav-item">
                    <a class="nav-link  <?= $i == $page ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?= $page >= $total_page ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
            </li>
        </ul>
        </div>
        </div>

        <script>
            function delete_it(event_id) {
                if (confirm(`確定要刪除編號 ${event_id}的資料嗎?`)) {
                    location.href = 'event_delete.php?event_id=' + event_id;
                }
            }

            $(".check_info").click(function() {
                $(this).closest(".card").find(".event_info").removeClass("d-none");
            });
            $(".cross").click(function() {
                $(".event_info").addClass("d-none");
            });
        </script>
    </section>
</main>

<?php include '../../__index_foot.php'; ?>