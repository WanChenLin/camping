<style>
    ul.navbar-nav>li.nav-item.active {
        background-color: #FFCE00;
        border-radius: 10px;
    }

    a img {
        width: 120px;
        height: 60px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="image/jennifer.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $page_name == 'index' ? 'active' : '' ?>">
                    <a class="nav-link" href="__html_index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?= $page_name == 'host_list' ? 'active' : '' ?>">
                    <a class="nav-link" href="host_list.php">基本資料</a>
                </li>
                <li class="nav-item <?= $page_name == 'host_list' ? 'active' : '' ?>">
                    <a class="nav-link" href="host_list.php">付款方式</a>
                </li>
            </ul>
        </div>
    </div>
</nav> 