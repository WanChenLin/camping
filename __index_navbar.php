<!-- 全站左方導覽列 -->
<!-- 連結必須使用絕對路徑(完整網址)，不能用相對路徑，否則URL會有誤 -->

<div class="bg-white py-3">
    <div class="container-fluid">
        <div class="row d-flex">

            <nav class="col-2">
                <div class="accordion" id="accordionExample">

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    會員
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/member/member_list.php">
                                會員清單
                            </a>
                            <a class="card-body ml-2 d-flex" href="#">
                                會員等級
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
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/activities/event_insert.php">
                                新增活動
                            </a>
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/activities/event_list_search.php">
                                活動列表
                            </a>
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/activities/event_feedback.php">
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
                            <a class="card-body ml-2 d-flex" href="">
                                新手指南
                            </a>
                            <a class="card-body ml-2 d-flex" href="">
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
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/saleProduct/salepage_list.php">
                                商品清單
                            </a>
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/saleProduct/salepage_creat.php">
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
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/host/host_list.php">
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
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/promo/promo_list.php">
                                優惠方案管理
                            </a>
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/promo/promo_apply_list.php">
                                優惠方案參加紀錄管理
                            </a>
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/coupon/coupon_genre_list.php">
                                優惠券管理
                            </a>
                            <a class="card-body ml-2 d-flex" href="http://localhost/camping-master/pages/coupon/coupon_gain_list.php">
                                優惠券獲取紀錄管理
                            </a>
                        </div>
                    </div>

                </div>
            </nav>