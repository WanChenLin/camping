<?php
include '../../__connect_db.php';

function get_total_all_records($pdo, $date_condition = "")
{
    $sql = "SELECT * FROM coupon_genre";
    $sql .= " " . $date_condition;
    // return $sql;

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $stmt->rowCount();
}