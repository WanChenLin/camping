<?php include __DIR__ . '/__connect_db.php'; ?>
<?php include __DIR__ . '/html_head.php'; ?>
<?php include __DIR__ . '/html_header.php'; ?>
<?php include __DIR__ . '/html_navbar.php'; ?>
<style>
    .add_member {
        color: white;
        font-size: 16px;
    }

    .add_member:hover {
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

    <aside class="my-2">
        <nav class="bread" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="member_list.php">會員</a></li>
                <li class="breadcrumb-item active bread_list">會員清單</li>
            </ol>
        </nav>
    </aside>

    <section class="postition-relative">

        <div class="d-flex justify-content-between align-items-center my-3">
            <div>
                <a href="member_insert.php" class="add_member">
                    <button class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> 新增會員
                    </button>
                </a>
            </div>
            <div>
                <form name="formSearch" id="formSearch" class="form-inline" onsubmit="return false">
                    <input type="hidden" name="searchdb" value="check">
                    <input class="form-control mr-sm-2" type="search" name="search" class="search_input" placeholder="搜尋會員資料" aria-label="Search" value="">
                    <select class="form-control mr-sm-2" name="filter_gender" id="filter_gender">
                        <option value="all">性別</option>
                        <option value="male">男</option>
                        <option value="female">女</option>
                    </select>
                    <button class="btn btn-primary" type="submit" id="search_btn"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm">

                </ul>
            </nav>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <!-- <caption>List of members</caption> -->
                <thead>
                    <tr style="white-space:nowrap">
                        <th scope=" col">#員編</th>
                        <th scope=" col">帳號</th>
                        <!-- <th scope=" col">密碼</th> -->
                        <!-- <th scope=" col">大頭貼</th> -->
                        <th scope=" col">姓名</th>
                        <!-- <th scope=" col">暱稱</th> -->
                        <th scope=" col">性別</th>
                        <th scope=" col">生日</th>
                        <th scope=" col">手機</th>
                        <th scope=" col">信箱</th>
                        <!-- <th scope=" col">地址</th> -->
                        <th scope=" col">等級</th>
                        <th scope=" col">狀態</th>
                        <th scope=" col">註冊日期</th>
                        <th scope=" col" colspan="2">操作</th>
                        <!-- <th scope=" col"><i class="far fa-edit"></i></th> -->
                        <!-- <th scope=" col"><i class="far fa-trash-alt"></i></th> -->
                    </tr>
                </thead>
                <tbody class="data_body">

                </tbody>
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
                        <td><%= mem_id %></td>
                        <td><%= mem_account %></td>
                        <td><%= mem_name %></td>
                        <td><%= mem_gender %></td>
                        <td><%= mem_birthday %></td>
                        <td><%= mem_mobile %></td>
                        <td><%= mem_email %></td>
                        <td><%= level_title %></td>
                        <td><%= mem_status %></td>
                        <td><%= mem_signUpDate %></td>
                        <td style="font-size: 18px;">
                            <div class="d-flex">
                                <a href="#" class="d-block member_card mx-1 p-1"
                                    data-mem-id="<%= mem_id %>" 
                                    data-mem-account="<%= mem_account %>" 
                                    data-mem-avatar="<%= mem_avatar %>" 
                                    data-mem-name="<%= mem_name %>" 
                                    data-mem-nickname="<%= mem_nickname %>" 
                                    data-mem-gender="<%= mem_gender %>" 
                                    data-mem-birthday="<%= mem_birthday %>" 
                                    data-mem-mobile="<%= mem_mobile %>" 
                                    data-mem-email="<%= mem_email %>" 
                                    data-mem-address="<%= mem_address %>" 
                                    data-mem-level="<%= level_title %>" 
                                    data-mem-status="<%= mem_status %>" 
                                    data-mem-signup="<%= mem_signUpDate %>">
                                    <i class="fas fa-user-circle"></i>
                                </a>
                                <a href="member_edit.php?mem_id=<%= mem_id %>" class="d-block mx-1 p-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript: delete_row(<%= mem_id %>)" class="d-block mx-1 p-1">
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

    const myHashChange = () => {
        let h = location.hash.slice(1);
        // 頁碼切換
        page = parseInt(h);
        if (isNaN(page)) {
            page = 1;
        }
        ul_pagi.innerHTML = page;

        fetch('member_list_api.php?page=' + page)
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

    // (預設:沒有輸入關鍵字) 抓出所有會員資料
    window.addEventListener('hashchange', myHashChange);
    myHashChange();

    // 輸入關鍵字及選擇篩選條件後，按下搜尋或Enter鍵(keycode是13)
    search_btn.addEventListener('mousedown', searching);
    $("body").on('keydown', function() {
        let keycode = event.which;
        if (keycode == 13) { searching(); }
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

        fetch('member_list_api.php?page=' + page, {
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
        let list_li = `<li class="breadcrumb-item active bread_list"><a href="member_list.php">會員清單</a></li>`;
        let search_li = `<li class="breadcrumb-item active">搜尋會員</li>`;
        if ($(".bread li").length == 2) {
            $(".bread_list").css("display", "none");
            $(".bread ol").append(list_li);
            $(".bread ol").append(search_li);
        }
    }

    function delete_row(mem_id) {
        $.confirm.show({
            "message": '確定要刪除 #會員編號(' + mem_id + ') 的資料嗎?', // 顯示內容
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
                        location.href = 'member_delete.php?mem_id=' + mem_id;
                    }
                })
            }
        })
    }

    $(".data_body").on("click", ".member_card", function() {
        let mem_id = $(this).data("memId");
        let mem_account = $(this).data("memAccount");
        let mem_avatar = $(this).data("memAvatar");
        let mem_name = $(this).data("memName");
        let mem_nickname = $(this).data("memNickname");
        let mem_gender = $(this).data("memGender");
        let mem_birthday = $(this).data("memBirthday");
        let mem_mobile = $(this).data("memMobile");
        let mem_email = $(this).data("memEmail");
        let mem_address = $(this).data("memAddress");
        let level_title = $(this).data("memLevel");
        let mem_status = $(this).data("memStatus");
        let mem_signUpDate = $(this).data("memSignup");
        swalWithBootstrapButtons.fire({
            title: `#${mem_id} 會員詳細資料`,
            html: `<div class="card my-3 p-2">
                    <div class="row no-gutters position-relative">
                        <div class="col-md-3 d-flex align-items-center">
                            <img src="./${mem_avatar}" class="card-img">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <div class="">
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">帳號</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${mem_account}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">姓名</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${mem_name}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">暱稱</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${mem_nickname}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">性別</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${mem_gender}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">生日</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${mem_birthday}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">手機</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${mem_mobile}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">信箱</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center">&nbsp;${mem_email}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">地址</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center text-left">&nbsp;${mem_address}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">等級</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center">&nbsp;${level_title}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-2 p-0 d-flex align-items-center text-primary">狀態</div>
                                        <div class="col-lg-10 p-0 d-flex align-items-center">&nbsp;${mem_status}</div>
                                    </div>
                                </div>
                                <p class="card-text"><small class="text-muted">註冊日期：${mem_signUpDate}</small></p>
                            </div>
                        </div>
                    </div>
                </div>`,
            showCloseButton: true,
            confirmButtonText: 'OK',
        })
    })
</script>

<?php include __DIR__ . '/html_foot.php'; ?>