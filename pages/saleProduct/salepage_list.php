<?php
require '../../__connect_db.php';
$page_name = 'salepage_list.php';
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<style>
    .table-hidden tbody {
        overflow-y: auto;
        /*設定卷軸 auto 是有超過我的高度的時候才會出現卷軸*/
        height: 100%;
        /*自己設定*/
    }

    .table-hidden tr {
        width: 100%;
        /* display: inline-table; */
    }

    .fa-edit {
        font-size: 16px;
        margin: 5px;
    }

    .fa-info-circle {
        font-size: 16px;
        margin: 5px;
    }

    .salepage_creat {
        color: white;
        font-size: 16px;
    }

    .salepage_creat:hover {
        color: white;
        font-size: 16px;
        text-decoration: none;
    }

    .table-hidden thead th[data-th="其他"] {
        width: 400px;
    }

    /*因為 tbody 多了卷軸 尺寸多了 17px*/
    .table-hidden tbody td[data-th="其他"] {
        width: 383px;
    }
</style>

<main class="col-10 bg-white ">
    <!--取消原本的改為麵包屑 -->
    <aside class="my-2">
        <nav class="bread" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="salepage_list.php">商品管理</a></li>
                <li class="breadcrumb-item active bread_list">商品清單</li>
            </ol>
        </nav>
    </aside>

    <div id="saleinfo_bar" class="alert alert-success " role="alert" style="display:none; "></div>

    <section class="postition-relative">
        <!--搜尋&新增商品的區塊-->
        <div class="d-flex justify-content-between align-items-center my-3">
            <div>
                <a href="salepage_creat.php" class="salepage_creat">
                    <button class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> 新增商品
                    </button>
                </a>
            </div>
            <form name="formSearch" id="formSearch" class="form-inline" onsubmit="return false">
                <input type="text" class="form-control mr-sm-2" id="search_name" name="search_name" placeholder="請輸入商品名稱" value="">
                <select id="salecateid" name="salecateid" class="form-control mr-sm-2" ">
                                    <option value="" selected>請選擇商品分類</option>
                                    <option value=" 1">冷凍食品</option>
                    <option value="2">冷藏食品</option>
                    <option value="3">生鮮食材</option>
                    <option value="4">素料理專區</option>
                </select>
                <button id="search_btn" type="submit" class="btn btn-primary "> <i class="fas fa-search"></i> </button>
            </form>
        </div>

        <!-- 分頁 -->
        <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm"></ul>
            </nav>
        </div>

        <!-- 顯示清單 -->
        <div class="row table-responsive ">
            <table class="table table-striped table-bordered table-hove table-hidden ">
                <thead>
                    <tr style=" white-space:nowrap;">
                        <!--  加就不自動換行了style=" white-space:nowrap" -->
                        <th scope="col" style="width:20px;">商品頁序號</th>
                        <th scope="col" style="width:100px;">商品主圖</th>
                        <th scope="col" style="width:100px;">品牌</th>
                        <th style="height:100px; width:100px; overflow:hidden; " scope="col">產品名稱</th>
                        <th scope="col">商品數量</th>
                        <th scope="col">建議售價</th>
                        <th scope="col">售價</th>
                        <th scope="col">成本</th>
                        <th scope="col">顯示設定</th>
                        <th scope="col">商品特色</th>
                        <th scope="col">商品分類名稱</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody id="data_body" style="font-size:14px;">
                </tbody>
            </table>
        </div>

        <div class="userbook_wrap position-absolute"></div>
    </section>

</main>

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- Tiny Nice Confirmation -->
<script src="//code.jquery.com/jquery.min.js"></script>
<link rel="stylesheet" href="HPCF/H-confirm-alert.css">
<script src="HPCF/H-confirm-alert.js"></script>

<script>
    let page = 1;
    let ori_data;
    const ul_pagi = document.querySelector('.pagination');
    const data_body = document.querySelector('#data_body');

    const tr_str = `<tr>  
                            <td><%= salepage_id %></td>
                            <td><img src="<%= salepage_image %>" width="60px"></td>
                            <td><%= salebrand_name %></td>
                            <td><%= salepage_name %></td>
                            <td><%= salepage_quility %></td>
                            <td><%= salepage_suggestprice %></td>
                            <td><%= salepage_price %></td>
                            <td><%= salepage_cost %></td>
                            <td><%= salepage_state == 1 ? "顯示" : "不顯示" %></td>
                            <td><%= salepage_feature %></td>
                            <td><%= salecate_name %></td>

                            <td style="font-size: 18px;">
                                <div class="d-flex">
                                    <a href="#" class="d-block salepage_card mx-1 p-1"
                                    data-sale-id="<%= salepage_id %>"
                                    data-sale-image="<%= salepage_image %>" 
                                    data-sale-brand="<%= salebrand_name %>"
                                    data-sale-name="<%= salepage_name %>"
                                    data-sale-feature="<%= salepage_feature %>"
                                    data-sale-details="<%= salepage_proddetails %>">
                                    <i class="fas fa-info-circle" class="d-block mx-1 p-1"></i>
                                    </a>
                                    <a href="salepage_edit.php?salepage_id=<%= salepage_id %>" class="d-block mx-1 p-1"><i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript: saledelete(<%= salepage_id %>)" class="d-block mx-1 p-1"><i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>`;
    const tr_func = _.template(tr_str);

    const pagi_str = `<li class="page-item <%= active %>">
                            <a class="page-link" href="#<%= page %>"><%= page %></a>
                        </li>`;
    const pagi_func = _.template(pagi_str);

    //用sweet alert顯示詳細資料
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-secondary mx-1',
            cancelButton: 'btn btn-primary mx-1'
        },
        buttonsStyling: false,
    })

    $("#data_body").on("click", ".salepage_card", function() {
        let salepage_id = $(this).data("saleId");
        let salepage_image = $(this).data("saleImage");
        let salebrand_name = $(this).data("saleBrand");
        let salepage_name = $(this).data("saleName");
        let salepage_feature = $(this).data("saleFeature");
        let salepage_proddetails = $(this).data("saleDetails");
        swalWithBootstrapButtons.fire({
            title: `#${salepage_id} 商品詳細資料`,
            html: `<div class="card my-3 p-2" style="font-size: 16px;">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="">
                                                    <div class="row px-3 py-1 my-1 border-bottom">
                                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">品牌</div>
                                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${salebrand_name}</div>
                                                    </div>
                                                    <div class="row px-3 py-1 my-1 border-bottom">
                                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">商品名稱</div>
                                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${salepage_name}</div>
                                                    </div>
                                                    <div class="row px-3 py-1 my-1 border-bottom">
                                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">商品特色</div>
                                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${salepage_feature}</div>
                                                    </div>
                                                    <div class="row px-3 py-1 my-1 border-bottom">
                                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">詳細資料</div>
                                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${salepage_proddetails}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`,
            showCloseButton: true,
            confirmButtonText: 'OK',
        })
    })

    //用jQuery search    
    function load_data(query, cate) {
        $.ajax({
            url: "salepage_search_api.php?page=" + page,
            method: "POST",
            dataType: "json",
            data: {
                query: query,
                cate: cate
            },
            success: function(data) {
                ori_data = data;

                let str = '';
                for (let v of ori_data.data) {
                    str += tr_func(v);
                }
                data_body.innerHTML = str;

                str = '';
                for (let i = 1; i <= ori_data.totalPages; i++) {
                    let active = ori_data.page === i ? 'active' : '';

                    str += pagi_func({
                        active: active,
                        page: i
                    });
                }
                ul_pagi.innerHTML = str;
            }
        });
    }

    $("#search_btn").click(function() {
        var search = $("#search_name").val();
        var search_cate = $("#salecateid").val();
        load_data(search, search_cate);
    });

    //list 顯示全部資料
    const myHashChange = () => {
        let h = location.hash.slice(1);
        page = parseInt(h);
        if (isNaN(page)) {
            page = 1;
        }

        $.ajax({
            method: "POST",
            url: "salepage_search_api.php?page=" + page,
            dataType: "json"
        }).done(function(data) {
            ori_data = data;

            let str = '';
            for (let v of ori_data.data) {
                str += tr_func(v);
            }
            data_body.innerHTML = str;

            str = '';
            for (let i = 1; i <= ori_data.totalPages; i++) {
                let active = ori_data.page === i ? 'active' : '';

                str += pagi_func({
                    active: active,
                    page: i
                });
            }
            ul_pagi.innerHTML = str;
        }).fail(function() {
            alert("error");
        });
    }

    window.addEventListener("hashchange", myHashChange);
    myHashChange();

    //tiny做確定是否刪除
    function saledelete(salepage_id) {
        $.confirm.show({
            "message": '確定要刪除 #編號(' + salepage_id + ') 的資料嗎?', // 顯示內容
            "type": "danger", //標題顏色類型  success:綠色  danger:紅色  warning:橘色  default:藍色
            "yesText": "確定", // 「確認」按鈕文字
            "noText": "取消", // 「取消」按鈕文字
            "yes": function() { // 確認按鈕觸發方法 function(){}
                $.confirm.show({
                    "message": "注意：刪除後將無法復原",
                    "type": "success",
                    "yesText": "確認刪除",
                    "noText": "返回",
                    "yes": function() {
                        location.href = 'salepage_delete.php?salepage_id=' + salepage_id;
                    }
                })
            }
        })
    }
</script>

<?php include '../../__index_foot.php'; ?>