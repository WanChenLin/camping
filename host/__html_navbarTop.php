<style>
    .nav {
        margin: 10px 0;
    }
</style>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link <?= $page_name == 'host_list' ? 'active' : '' ?>" href="host_list.php">營地主列表</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $page_name == 'host_list_insert' ? 'active' : '' ?>" href="host_list_insert.php">新增營地主</a>
    </li>
</ul> 