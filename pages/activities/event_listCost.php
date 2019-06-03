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
// echo print_r($num_data);


// $sql_countGender = "SELECT event_id, COUNT(applyList_gender) num FROM event_applylist WHERE `applyList_gender`=1 GROUP BY event_id ";
// $pdo_query_countGender = $pdo->query($sql_countGender);
// $rows_countGender = $pdo_query_countGender->fetchAll(PDO::FETCH_ASSOC);
// $gender_data = [];
// foreach ($rows_countGender as $v) {
//     $gender_data[$v['event_id']] = $v['num'];
// }
// echo print_r($gender_data);

// $keyword = '';
// $per_page = 5;
// $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// if (@$_POST['keyword'] != '') {
//     $keyword = $_POST['keyword'];

//     $sql_search = "SELECT * FROM `event_list` JOIN `campsite_list` WHERE `campsite_list`.`camp_id`=`event_list`.`camp_id` and `event_name` like '%$keyword%' ORDER BY event_id  DESC ";

//     $t_sql = "SELECT COUNT(1) FROM `event_list` JOIN `campsite_list` WHERE `campsite_list`.`camp_id`=`event_list`.`camp_id` and `event_name` like '%$keyword%'";
//     $t_pdo_query = $pdo->query($t_sql);
//     $total_rows = $t_pdo_query->fetch(PDO::FETCH_NUM)[0];
// } else {
$sql = "SELECT * FROM `event_list`";

// $t_sql = "SELECT COUNT(1) FROM `event_list`";
// $t_pdo_query = $pdo->query($t_sql);
// $total_rows = $t_pdo_query->fetch(PDO::FETCH_NUM)[0];
// }
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

// $total_page = ceil($total_rows / $per_page);
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<main class="col-md-10 bg-white">
    <section>

        <style>

        </style>

        <aside class="bg-warning">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-2">
                    <li class="breadcrumb-item">主題活動</li>
                    <li class="breadcrumb-item active" aria-current="page">活動收益</a></li>
                </ol>
            </nav>
        </aside>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">活動編號</th>
                    <th scope="col">活動名稱</th>
                    <th scope="col">活動狀態</th>
                    <th scope="col">總報名人數</th>
                    <th scope="col">總收入</th>
                    <th scope="col">總費用</th>
                    <th scope="col">毛利</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td scope="row"><?= $row['event_id'] ?></td>
                        <td><?= $row['event_name'] ?></td>
                        <td><?php $shelf = $row['event_shelf'];
                                    switch ($shelf) {
                                        case '0':
                                            echo '上架中';
                                            break;
                                        case '1':
                                            echo '下架中';
                                            break;
                                        case '2':
                                            echo '活動結束下架';
                                            break;
                                        case '3':
                                            echo '頁面預告中';
                                            break;
                                        case '4':
                                            echo '活動取消(未達基本人數)';
                                            break;
                                        case '5':
                                            echo '活動取消(不可抗力因素)';
                                            break;
                                        default:
                                            echo '';
                                        }
                                    ?></td>
                        <td><?= $Num = isset($num_data[$row['event_id']]) ? $num_data[$row['event_id']]: 0; ?></td>
                        <td><?php $earn = $row['event_price'] * $Num;
                            echo $earn ?></td>
                        <td><?php $cost = $row['event_campCost'] + $row['event_foodCost'] + $row['event_outsourcingCost'] + $row['event_insCost'] + $row['event_itemCost'];
                            echo $cost ?></td>
                        <td><a class="cost_a" href="event_detailCost.php?event_id=<?= $row['event_id'] ?>"><?= $earn - $cost ?></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <script>
          
        </script>
    </section>
</main>

<?php include '../../__index_foot.php'; ?>