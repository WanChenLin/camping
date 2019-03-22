<?php

//require __DIR__.'/__cred.php';

$page_name = 'host_menu';

?>

<?php include __DIR__ . '/__html_head.php'; ?>
<?php include __DIR__ . '/__html_navbarLeft.php'; ?>

<main class="col-10 bg-white">
    <?php include __DIR__ . '/__html_navbarTop.php'; ?>
    <aside class="bg-warning">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">營地主管理</li>
            </ol>
        </nav>
    </aside>
    <div class="list-group">
        <a href="./host_list.php" class="list-group-item list-group-item-action list-group-item-info">營地主列表</a>
    </div>
    <div class="list-group">
        <a href="./host_list.php" class="list-group-item list-group-item-action list-group-item-success">新增營地主</a>
    </div>
</main>

<?php include __DIR__ . '/__html_foot.php'; ?> 