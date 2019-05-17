<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="./DataTables/datatables.css" />
    <link rel="stylesheet" href="./DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css">
    <script type="text/javascript" src="./DataTables/datatables.js"></script>
    <script src="./DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="./DataTables/Buttons-1.5.6/js/buttons.print.js"></script>
    <!-- Tiny Nice Confirmation -->
    <link rel="stylesheet" href="./css/H-confirm-alert.css">
    <script src="./js/H-confirm-alert.js"></script>
    <!-- ui toggle -->
    <link rel="stylesheet" href="./css/ui-toggle.css">
    <link rel="stylesheet" href="./css/bootstrap-toggle.min.css">
    <script src="./js/bootstrap-toggle.min.js"></script>
    <script src="./js/jquery.toggler.js"></script>

    <title>Document</title>
    <style>
        body {
            font-family: Arial, "微軟正黑體";
        }
    </style>

</head>

<body>

    <style>
        .white {
            color: white;
        }

        .dark {
            color: #4b4b4b;
        }

        .box {
            width: 150px;
            height: 150px;
            margin: 10px;
        }

        .asterisk {
            color: red;
        }
    </style>

    <header class="bg-dark">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-6 mt-2">
                    <h1 class=" text-white text-center">
                        GO CAMPING 後台
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <div class="bg-white py-3">
        <div class="container-fluid">
            <div class="row d-flex">
                <nav class="col-2">
                    <div class="accordion" id="accordionExample">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
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
                                <a class="card-body ml-2 d-flex" href="..\event\event_insert.php">
                                    新增活動
                                </a>
                                <a class="card-body ml-2 d-flex" href="..\event\event_list.php">
                                    活動列表
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
                                <a class="card-body ml-2 d-flex" href="../SalePage/salepage_list.php">
                                    商品清單
                                </a>
                                <a class="card-body ml-2 d-flex" href="../SalePage/salepage_creat.php">
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
                                <a class="card-body ml-2 d-flex" href="">
                                    營地列表
                                </a>
                                <a class="card-body ml-2 d-flex" href="../host_menu.php">
                                    營地主管理
                                </a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                        行銷
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#accordionExample">
                                <a class="card-body ml-2 d-flex" href="promo_list.php">
                                    優惠方案管理
                                </a>
                                <a class="card-body ml-2 d-flex" href="promo_apply_list.php">
                                    優惠方案參加紀錄管理
                                </a>
                                <a class="card-body ml-2 d-flex" href="coupon_genre_list.php">
                                    優惠券管理
                                </a>
                                <a class="card-body ml-2 d-flex" href="coupon_gain_list.php">
                                    優惠券獲取紀錄管理
                                </a>
                            </div>
                        </div>

                    </div>
                </nav>

                <main class="col-10 bg-white">

                    <aside class="">
                        <span></span>
                        <p></p>
                    </aside>

                    <section>
                        <span></span>
                        <div alt="顏色" class="">
                            <div class="d-flex">
                                <div style="background: #BFDD87" class="box">
                                    <p class="dark p-2">apple banana coconut durian grapes kiwi lemon melon orange papaya</p>
                                </div>
                                <div style="background: #027252" class="box">
                                    <p class="white p-2">apple banana coconut durian grapes kiwi lemon melon orange papaya</p>
                                </div>
                                <div style="background: #F2CE63" class="box">
                                    <p class="dark p-2">apple banana coconut durian grapes kiwi lemon melon orange papaya</p>
                                </div>
                                <div style="background: #BA7438" class="box">
                                    <p class="white p-2">apple banana coconut durian grapes kiwi lemon melon orange papaya</p>
                                </div>
                                <div style="background: #693D31" class="box">
                                    <p class="white p-2">apple banana coconut durian grapes kiwi lemon melon orange papaya</p>
                                </div>
                            </div>
                            <p>
                                /* Color Theme Swatches in Hex */ <br>
                                .Go-Camping-1-hex { color: #BFDD87; } <br>
                                .Go-Camping-2-hex { color: #027252; } <br>
                                .Go-Camping-3-hex { color: #F2CE63; } <br>
                                .Go-Camping-4-hex { color: #BA7438; } <br>
                                .Go-Camping-5-hex { color: #693D31; } <br>
                                <br>
                                /* Color Theme Swatches in RGBA */ <br>
                                .Go-Camping-1-rgba { color: rgba(191, 221, 135, 1); } <br>
                                .Go-Camping-2-rgba { color: rgba(2, 114, 82, 1); } <br>
                                .Go-Camping-3-rgba { color: rgba(242, 206, 99, 1); } <br>
                                .Go-Camping-4-rgba { color: rgba(186, 116, 56, 1); } <br>
                                .Go-Camping-5-rgba { color: rgba(105, 61, 49, 1); } <br>
                                <br>
                                /* Color Theme Swatches in HSLA */ <br>
                                .Go-Camping-1-hsla { color: hsla(80, 55, 69, 1); } <br>
                                .Go-Camping-2-hsla { color: hsla(162, 96, 22, 1); } <br>
                                .Go-Camping-3-hsla { color: hsla(44, 84, 66, 1); } <br>
                                .Go-Camping-4-hsla { color: hsla(27, 53, 47, 1); } <br>
                                .Go-Camping-5-hsla { color: hsla(12, 36, 30, 1); }
                            </p>
                        </div>

                    </section>

                </main>

            </div>
        </div>
    </div>
</body>

</html>