<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <script src="./js/jquery-3.3.1.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.js"></script>

    <title>Go Camping</title>
</head>

<style>
    body {
        font-family: Arial, "微軟正黑體";
    }

    .menu_box_sm {
        color: #fff;
        font-size: 1.5rem;
        /* line-height:56px; */
    }

    @media (max-width:768px) {
        .menu_box_lg {
            display: none;
        }
        .nav_content{
            display: none;
        }
    }

    @media (min-width:768px) {
        .menu_box_sm {
            display: none;
        }
        .nav_cross{
            display: none;
        }

    }
</style>

<body>

    <header class="bg-dark">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 mt-2">
                    <div class="menu_box_lg">
                        <h1 class=" text-white text-center">
                            GO CAMPING 後台
                        </h1>
                    </div>

                    <div class="menu_box_sm">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>GO CAMPING</li>
                            <li id="menu"><i class="fas fa-bars"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="bg-white py-3">
        <div class="container-fluid">
            <div class="row d-flex">

                <nav class="col-md-2 nav_content">
                    <div class="accordion" id="accordionExample">
                        <h3 class="text-right nav_cross m-2"><i class="fas fa-times"></i></h3>
                        
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        會員
                                    </button>
                                </h2>
                            </div>
    
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <a class="card-body ml-2 d-flex" href="..\member\member_list.php">
                                    會員清單
                                </a>
                                <a class="card-body ml-2 d-flex" href="#">
                                    會員等級
                                </a>
                                <a class="card-body ml-2 d-flex" href="#">
                                    收藏管理
                                </a>
                                <a class="card-body ml-2 d-flex" href="#">
                                    勳章管理
                                </a>
                                <a class="card-body ml-2 d-flex" href="#">
                                    活動管理
                                </a>
                                <a class="card-body ml-2 d-flex" href="#">
                                    訂單管理
                                </a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        主題活動
                                    </button>
                                </h2>
                            </div>
    
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <!-- <a class="card-body ml-2 d-flex" href="..\event\event_insert.php">
                                    新增活動
                                </a> -->
                                <a class="card-body ml-2 d-flex" href="event_insert.php">
                                    新增活動
                                </a>
                                <!-- <a class="card-body ml-2 d-flex" href="..\event\event_list_search.php">
                                    活動列表
                                </a> -->
                                <a class="card-body ml-2 d-flex" href="event_list_search.php">
                                    活動列表
                                </a>
                                <!-- <a class="card-body ml-2 d-flex" href="..\event\event_feedback.php">
                                    活動列表
                                </a> -->
                                <a class="card-body ml-2 d-flex" href="event_feedback.php">
                                    活動回饋
                                </a>
                            </div>
                        </div>
    
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        分享樂
                                    </button>
                                </h2>
                            </div>
    
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <a class="card-body ml-2 d-flex" href="..\share_fun\post_list.php">
                                    新手指南
                                </a>
                                <a class="card-body ml-2 d-flex" href="#">
                                    達人帶路
                                </a>
                            </div>
                        </div>
    
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        商品管理
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <a class="card-body ml-2 d-flex" href="..\SalePage\salepage_list.php">
                                    商品清單
                                </a>
                                <a class="card-body ml-2 d-flex" href="..\SalePage\salepage_creat.php">
                                    建立商品頁
                                </a>
                            </div>
                        </div>
    
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        營地主
                                    </button>
                                </h2>
                            </div>
    
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <a class="card-body ml-2 d-flex" href="..\campsite\campsite_list.php">
                                    營地列表
                                </a>
                                <a class="card-body ml-2 d-flex" href="..\host_new\host_menu.php">
                                    營地主管理
                                </a>
                            </div>
                        </div>
    
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        行銷
                                    </button>
                                </h2>
                            </div>
    
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                <a class="card-body ml-2 d-flex" href="..\marketing\_plan_list.php">
                                    行銷方案管理
                                </a>
                                <a class="card-body ml-2 d-flex" href="..\marketing\_list_coupon.php">
                                    Coupon管理
                                </a>
                            </div>
                        </div>
                        <div class="card"><a href="logout.php" class="btn btn-info">登出</a></div>

                    </div>
                </nav>

                <main class="col-md-10 bg-white">

                    <!-- <aside class="bg-warning">
                        <span>麵包屑 區域</span>
                        <p>會員管理 / 訂單管理 / 收藏管理</p>
                    </aside> -->

                    <section>
                        <!-- <span>主要頁面 區域</span>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente laudantium aspernatur debitis rem sequi quaerat ullam at. Incidunt ipsum cum quis perferendis natus aspernatur molestias adipisci pariatur, at quas corrupti!</p>  --> 