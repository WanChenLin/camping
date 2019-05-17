<?php
include '../../__connect_db.php';

function get_all_plan($pdo, $promo_table)
{
    $sql = "SELECT * FROM $promo_table";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $stmt->rowCount();
}