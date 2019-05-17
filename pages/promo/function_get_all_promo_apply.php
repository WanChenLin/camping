<?php
include '../../__connect_db.php';

function get_all_promo_apply($pdo, $promo_type_condition = "")
{
    $sql = "SELECT * FROM `promo_apply`" . " " . $promo_type_condition;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $stmt->rowCount();
}