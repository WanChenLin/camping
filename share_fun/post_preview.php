<?php
require __DIR__ . '/__connect_db.php';
$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;
$sql = "SELECT post_id, post_title, post_content FROM share_post WHERE post_id=$post_id";
$stmt = $pdo->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include __DIR__ . '/__html_head.php';  ?>

<style>
    img {
        max-width: 100% !important;
        height: auto !important;
    }

    .fas {
        font-size: 2.5rem;
        color: #aaaaaa;
    }
</style>

<?php include __DIR__ . '/__style_start.html';  ?>





<div class="container bg-white preview">
    <input type="hidden" name="post_id" value="<?= $row['post_id'] ?>">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10 d-flex justify-content-end">
            <a href="post_list.php"><i class="fas fa-times-circle"></i></a>
        </div>
        <div class="col-lg-9">
            <h2 class="py-3"><b><?= $row['post_title'] ?></b></h2>
        </div>
        <div class="col-lg-9 article">
            <?= $row['post_content'] ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/__style_end.html';  ?> 