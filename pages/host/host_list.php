<?php include '../../__connect_db.php'; ?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>
<style>
    .add_host {
        color: white;
        font-size: 16px;
    }

    .add_host:hover {
        color: white;
        font-size: 16px;
        text-decoration: none;
    }

    .userbook_wrap {
        top: 100px;
        left: calc(50% - 300px);
        z-index: 50;
    }

    .userbook_wrap .col-lg-2 {
        width: 45px;
    }

    .userbook_close {
        top: 0;
        right: 0;
    }

    .close_btn {
        font-size: 20px;
    }

    .btn-top {
        background: rgba(150, 150, 150, .7);
        color: white;
        border-radius: 50%;
        bottom: 20px;
        right: 20px;
    }
</style>


<main class="col-10 bg-white">
    <!-- 麵包屑 -->
    <aside class="my-2">
        <nav class="bread" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="host_list.php">營地主管理</a></li>
                <li class="breadcrumb-item active bread_list">營地主列表</li>
            </ol>
        </nav>
    </aside>

    <section class="postition-relative">
        <div class="d-flex justify-content-between align-items-center my-3">
            <!-- 新增按鈕     -->
            <div>
                <a href="host_insert.php" class="add_host">
                    <button class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> 新增營地主
                    </button>
                </a>
            </div>
            <!-- 搜尋列 -->
            <div>
                <form name="formSearch" id="formSearch" class="form-inline" onsubmit="return false">
                    <input type="hidden" name="searchdb" value="check">
                    <input class="form-control mr-sm-2" type="search" name="search" class="search_input" placeholder="搜尋營地主資料" aria-label="Search" value="">
                    <button class="btn btn-primary" type="submit" id="search_btn"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <!-- 頁碼 -->
        <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm"></ul>
            </nav>
        </div>
        <!-- 內容 -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="white-space:nowrap">
                        <th scope=" col">編號</th>
                        <th scope=" col">帳號</th>
                        <th scope=" col">公司名稱</th>
                        <th scope=" col">公司統編</th>
                        <th scope=" col">公司電話</th>
                        <th scope=" col">公司地址</th>
                        <th scope=" col" colspan="2">操作</th>
                    </tr>
                </thead>
                <tbody class="data_body"></tbody>
            </table>
        </div>
        <div id="info_bar" role="alert"></div>

        <div class="userbook_wrap position-absolute"></div>
    </section>

</main>

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- Tiny Nice Confirmation -->
<link rel="stylesheet" href="HPCF/H-confirm-alert.css" />
<script type="text/javascript" src="HPCF/H-confirm-alert.js"></script>

<script>
    let page = 1;
    let ori_data;
    const ul_pagi = document.querySelector('.pagination');
    const data_body = document.querySelector('.data_body');
    const info_bar = document.querySelector('#info_bar');
    const formSearch = document.querySelector('#formSearch');
    const search_btn = document.querySelector('#search_btn');

    const tr_str = `<tr>
                        <td><%= host_id %></td>
                        <td><%= host_acc %></td>
                        <td><%= host_incName %></td>
                        <td><%= host_incVat %></td>
                        <td><%= host_incTel %></td>
                        <td><%= host_incAdd %></td>
                        <td style="font-size: 18px;">
                            <div class="d-flex">
                                <a href="#" class="d-block host_card mx-1 p-1"
                                    data-host-id="<%= host_id %>" 
                                    data-host-account="<%= host_acc %>" 
                                    data-host-name="<%= host_incName %>" 
                                    data-host-vat="<%= host_incVat %>" 
                                    data-host-tel="<%= host_incTel %>" 
                                    data-host-fax="<%= host_incFax %>" 
                                    data-host-email="<%= host_incEmail %>" 
                                    data-host-address="<%= host_incAdd %>" 
                                    data-host-bankname="<%= host_bankName %>" 
                                    data-host-bankacc="<%= host_bankAcc %>">
                                    <i class="fas fa-user-circle"></i>
                                </a>
                                <a href="host_edit.php?host_id=<%= host_id %>" class="d-block mx-1 p-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript: delete_row(<%= host_id %>)" class="d-block mx-1 p-1">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>`;

    const tr_func = _.template(tr_str);

    const pagi_str = `<li class="page-item <%= active %>">
                        <a class="page-link" href="#<%= page %>"><%= page %></a>
                    </li>`;
    const pagi_func = _.template(pagi_str);

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-secondary mx-1',
            cancelButton: 'btn btn-primary mx-1'
        },
        buttonsStyling: false,
    })

    // 檢視時的視窗
    $(".data_body").on("click", ".host_card", function() {
        // data("hostId")的hostId是來自data-host-id（dash後面的字母要變大寫），其他的以此類推
        let host_id = $(this).data("hostId");
        let host_acc = $(this).data("hostAccount");
        let host_incName = $(this).data("hostName");
        let host_incVat = $(this).data("hostVat");
        let host_incTel = $(this).data("hostTel");
        let host_incFax = $(this).data("hostFax");
        let host_incEmail = $(this).data("hostEmail");
        let host_incAdd = $(this).data("hostAddress");
        let host_bankName = $(this).data("hostBankname");
        let host_bankAcc = $(this).data("hostBankacc");
        swalWithBootstrapButtons.fire({
            title: `#${host_id} 營地主詳細資料`,
            html: `<div class="card my-3 p-2">
                    <div class="row no-gutters position-relative">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="">
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-3 p-0 d-flex align-items-center text-primary">登入帳號</div>
                                        <div class="col-lg-9 p-0 d-flex align-items-center ">&nbsp;${host_acc}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-3 p-0 d-flex align-items-center text-primary">公司名稱</div>
                                        <div class="col-lg-9 p-0 d-flex align-items-center ">&nbsp;${host_incName}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-3 p-0 d-flex align-items-center text-primary">公司統編</div>
                                        <div class="col-lg-9 p-0 d-flex align-items-center ">&nbsp;${host_incVat}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-3 p-0 d-flex align-items-center text-primary">公司電話</div>
                                        <div class="col-lg-9 p-0 d-flex align-items-center ">&nbsp;${host_incTel}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-3 p-0 d-flex align-items-center text-primary">公司傳真</div>
                                        <div class="col-lg-9 p-0 d-flex align-items-center ">&nbsp;${host_incFax}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-3 p-0 d-flex align-items-center text-primary">公司信箱</div>
                                        <div class="col-lg-9 p-0 d-flex align-items-center ">&nbsp;${host_incEmail}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-3 p-0 d-flex align-items-center text-primary">公司地址</div>
                                        <div class="col-lg-9 p-0 d-flex align-items-center ">&nbsp;${host_incAdd}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-3 p-0 d-flex align-items-center text-primary">銀行戶名</div>
                                        <div class="col-lg-9 p-0 d-flex align-items-center ">&nbsp;${host_bankName}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-3 p-0 d-flex align-items-center text-primary">銀行帳號</div>
                                        <div class="col-lg-9 p-0 d-flex align-items-center ">&nbsp;${host_bankAcc}</div>
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

    const myHashChange = () => {
        let h = location.hash.slice(1);
        // 頁碼切換
        page = parseInt(h);
        if (isNaN(page)) {
            page = 1;
        }
        ul_pagi.innerHTML = page;

        fetch('host_list_api.php?page=' + page)
            .then(response => {
                return response.json();
            })
            .then(json => {
                ori_data = json;

                //  資料內的表格
                let str = '';
                for (let s in ori_data.data) {
                    str += tr_func(ori_data.data[s]);
                }
                data_body.innerHTML = str;

                // 頁碼
                str = '';
                for (let i = 1; i <= ori_data.totalPages; i++) {
                    let active = ori_data.page === i ? 'active' : '';

                    str += pagi_func({
                        active: active,
                        page: i
                    });
                }
                ul_pagi.innerHTML = str;
            });
    };

    // (預設:沒有輸入關鍵字) 抓出所有資料
    window.addEventListener('hashchange', myHashChange);
    myHashChange();

    // 輸入關鍵字及選擇篩選條件後，按下搜尋或Enter鍵(keycode是13)
    search_btn.addEventListener('mousedown', searching);
    $("body").on('keydown', function() {
        let keycode = event.which;
        if (keycode == 13) {
            searching();
        }
    });

    function searching(event) {
        let fd = new FormData(document.formSearch)
        let h = location.hash.slice(1);
        // 頁碼切換
        page = parseInt(h);
        if (isNaN(page)) {
            page = 1;
        }
        ul_pagi.innerHTML = page;

        fetch('host_list_api.php?page=' + page, {
                method: "POST",
                body: fd
            })
            .then(response => {
                return response.json();
            })
            .then(obj => {
                ori_data = obj; // 讓ori_data的內容為SQL的資料
                info_bar.style.display = 'block';

                if (obj.success) {
                    info_bar.className = 'alert alert-light text-center';
                    info_bar.innerHTML = '';
                } else {
                    info_bar.className = 'alert alert-danger text-center';
                    info_bar.innerHTML = obj.errorMsg;
                }

                //  資料內的表格
                let str = '';
                for (let s in ori_data.data) {
                    str += tr_func(ori_data.data[s]);
                }
                data_body.innerHTML = str;

                // 頁碼
                str = '';
                for (let i = 1; i <= ori_data.totalPages; i++) {
                    let active = ori_data.page === i ? 'active' : '';

                    str += pagi_func({
                        active: active,
                        page: i
                    });
                }
                ul_pagi.innerHTML = str;
            });

        // 改變麵包屑
        let list_li = `<li class="breadcrumb-item active bread_list"><a href="host_list.php">營地主列表</a></li>`;
        let search_li = `<li class="breadcrumb-item active">搜尋營地主</li>`;
        if ($(".bread li").length == 2) {
            $(".bread_list").css("display", "none");
            $(".bread ol").append(list_li);
            $(".bread ol").append(search_li);
        }
    }

    function delete_row(host_id) {
        $.confirm.show({
            "message": '確定要刪除 #營地主編號(' + host_id + ') 的資料嗎?', // 顯示內容
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
                        location.href = 'host_delete.php?host_id=' + host_id;
                    }
                })
            }
        })
    }
</script>

<?php include '../../__index_foot.php'; ?>