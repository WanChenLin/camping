<?php
//require __DIR__.'/__cred.php';
$page_name = 'index_';
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<main class="col-10 bg-white">

  <aside class="bg-warning">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">營地列表</li>
      </ol>
    </nav>
  </aside>

  <div class="list-group">
    <a href="./campsite_list.php" class="list-group-item list-group-item-action">
      營地清單
    </a>
    <a href="./campImg_list.php" class="list-group-item list-group-item-action">圖片清單</a>
    <a href="./campArea_list.php" class="list-group-item list-group-item-action">營地區域清單</a>
    <!-- <a href="#" class="list-group-item list-group-item-action">分類清單</a>
    <a href="#" class="list-group-item list-group-item-action">價格清單</a> -->
  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<?php include '../../__index_foot.php'; ?>