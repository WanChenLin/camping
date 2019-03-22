<?php
require __DIR__ . '/__connect_acDB.php';

// try{
//     $sql = "SELECT * FROM `event_memberList`";
//     $pdo_query = $pdo->query($sql);
//     $rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);
// }catch(PDOException $ex){
//     echo $ex->getMessage();
// }


// $per_page = 5;
// $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//$t_sql = "SELECT COUNT(1) FROM `event_applylist`";
$t_sql = "SELECT COUNT(1) FROM `event_applylist` JOIN `event_list` ON `event_applylist`.`event_id`=`event_list`.`event_id";
try {
    $t_pdo_query = $pdo->query($t_sql);
    $total_rows = $t_pdo_query->fetch(PDO::FETCH_NUM)[0];
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

echo $total_rows;

// $total_page = ceil($total_rows / $per_page);
 