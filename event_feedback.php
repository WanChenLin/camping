<?php
require __DIR__ . '/__cred.php';
require __DIR__ . '/__connect_acDB.php';


$sql = "SELECT * FROM  `event_feedback` JOIN `event_list` ON `event_feedback`.`event_id`=`event_list`.`event_id` ORDER BY eventFB_id DESC";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

?>


<?php include __DIR__ . '/__head.php'; ?>
<style>
   
</style>


<aside class="bg-warning">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-2">
            <li class="breadcrumb-item">主題活動</li>
            <li class="breadcrumb-item active" aria-current="page">活動回饋</li>
            
        </ol>
    </nav>
</aside>

<?php foreach ($rows as $row) : ?>

<div class="card">
  <div class="card-header">
    活動名稱：<?= $row['event_name'] ?><small> ( 活動日期：<?= $row['event_dateStart'] ?> ~ <?= $row['event_dateEnd'] ?> )</small>
  </div>
  <div class="card-body row">
    <h5 class="card-title col-2">會員帳號：<?= $row['member_id'] ?></h5>
    <p class="card-text col-10"><?= $row['eventFB_comment'] ?></p>
  </div>
</div>

<?php endforeach ?>





<?php include __DIR__ . '/__md.php'; ?>
<script>
    function delete_it(apply_id) {
        if (confirm(`確定要刪除編號 ${apply_id}的資料嗎?`)) {
            location.href = `apply_orderDelete.php?apply_id=${apply_id}`;
            console.log(apply_id);
        }

    }
    $(window).resize(function() {
        var windowWidth = $(this).width();
        // console.log(windowWidth);
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
<?php include __DIR__ . '/__footer.php'; ?>