<?php
require __DIR__.'/__salepage_connect_db.php';
$page_name = 'salepage_list2.php';

$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//total rows
$t_sql = "SELECT COUNT(1) FROM salepage";
$t_stmt = $pdo->query($t_sql);
$t_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

//total pages
$total_pages = ceil($t_rows/$per_page);
if($page < 1) $page = 1;
if($page >  $total_pages) $page = $total_pages;

$sql = sprintf(" SELECT * FROM salepage ORDER BY salepage_id LIMIT %s, %s", ($page-1)*$per_page, $per_page);
$stmt = $pdo->query($sql);

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include __DIR__.'/__html_dbhead.php';?>
<?php include __DIR__.'/__html_dbnavbar.php';?>

<div class="container table-responsive" >
<div><?= $page. " / ". $total_pages ?></div>
    <div class="row">
        <div class="col-lg-12">
            <nav>
                <ul class="pagination pagination-sm">
                    <li class="page-item <?= $page<=1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page-1 ?>">&lt;</a>
                    </li>
                    <?php for($i=1; $i<=$total_pages; $i++): ?>
                    <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor ?>
                    <li class="page-item <?= $page>=$total_pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>">&gt;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered table-hove">
                <thead>
                <tr>
                    <th scope="col"><i class="fas fa-edit"></i></th>
                    <!-- <th scope="col">商品主圖</th> -->
                    <th scope="col">商品頁序號</th>
                    <th scope="col">產品名稱</th>
                    <th scope="col">商品數量</th>
                    <th scope="col">建議售價</th>
                    <th scope="col">售價</th>
                    <th scope="col">成本</th>
                    <th scope="col">顯示設定</th>
                    <th scope="col">商品特色</th>
                    <th scope="col">詳細說明</th>
                    <th scope="col">商品規格</th>
                    <th scope="col">付款方式</th>
                    <th scope="col">配送方式</th>
                    <th scope="col">商品分類流水號</th>
                    <th scope="col"><i class="fas fa-trash-alt"></i></th>
                </tr>
                </thead>
                <tbody >
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td>
                            <a href="salepage_edit.php?sid=<?= $row['salepage_id'] ?>">
                            <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td><?= $row['salepage_id'] ?></td>
                        <td><?= $row['salepage_name'] ?></td>
                        <td><?= $row['salepage_quility'] ?></td>
                        <td><?= $row['salepage_suggestprice'] ?></td>
                        <td><?= $row['salepage_price'] ?></td>
                        <td><?= $row['salepage_cost'] ?></td>
                        <td><?= $row['salepage_state'] ?></td>
                        <td><?= $row['salepage_feature'] ?></td>
                        <td><?= $row['salepage_proddetails'] ?></td>
                        <td><?= $row['salepage_specification'] ?></td>
                        <td><?= $row['salepage_paymenttype'] ?></td>
                        <td><?= $row['salepage_deliverytype'] ?></td>
                        <td><?= $row['salepage_salecateid'] ?></td>
                        <td>
                            <a href="javascript: delete_it(<?= $row['salepage_id'] ?>)">
                            <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
        function delete_it(salepage_id){
            if(confirm(`確定要刪除編號為 ${salepage_id} 的資料嗎?`)){
                location.href = 'salepage_delete.php?salepage_id=' + salepage_id;
            }
        }
</script>


<?php include __DIR__.'/__html_dbfoot.php';?>