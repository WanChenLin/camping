<?php

include __DIR__ . '/__connect_db.php';

?>

<?php include __DIR__ . '/html_head.php'; ?>
<?php include __DIR__ . '/html_header.php'; ?>
<?php include __DIR__ . '/html_navbar.php'; ?>

<style>
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
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="member_list.php">會員資料清單</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member_insert.php">新增資料</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="member_search.php">搜尋會員</a>
            </li>
        </ul>
    </aside>

    <section>

        <div class="my-3">
            <!-- <div class="container-fluid"> -->
                <nav class="navbar navbar-light bg-light">
                    <!-- <form name="formSearch" class="form-inline" method="POST" onsubmit="return gosearch();"> -->
                    <form name="formSearch" id="formSearch" class="form-inline" method="POST" onsubmit="return false">
                        <input type="hidden" name="searchdb" value="check">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="搜尋會員資料" aria-label="Search" value="">
                        <select class="form-control mr-sm-2" name="filter_gender" id="filter_gender">
                            <option value="all">性別</option>
                            <option value="male">男</option>
                            <option value="female">女</option>
                        </select>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit" id="submit">Search</button>
                    </form>
                </nav>
            <!-- </div> -->
        </div>

        <div>

            <div id="info_bar" role="alert"></div>

            <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="white-space:nowrap">
                        <th scope=" col"><i class="fas fa-user-circle"></i></th>
                        <th scope=" col">#員編</th>
                        <th scope=" col">帳號</th>
                        <!-- <th scope=" col">密碼</th> -->
                        <!-- <th scope=" col">大頭貼</th> -->
                        <th scope=" col">姓名</th>
                        <th scope=" col">暱稱</th>
                        <th scope=" col">性別</th>
                        <th scope=" col">生日</th>
                        <th scope=" col">手機</th>
                        <th scope=" col">信箱</th>
                        <th scope=" col">地址</th>
                        <th scope=" col">等級</th>
                        <th scope=" col">狀態</th>
                        <!-- <th scope=" col">註冊日期</th> -->
                    </tr>
                </thead>
                <tbody class="data_body">
                    <?php  /*
                    <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td>
                            <a href="member_edit.php?mem_id=<?= $row['mem_id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td><?= $row['mem_id'] ?></th>
                        <td><?= $row['mem_account'] ?></td>
                        <td><?= $row['mem_password'] ?></td>
                        <td>
                            <img src="./<?= $row['mem_avatar'] ?>" alt="" height="50">
                        </td>
                        <td><?= $row['mem_name'] ?></td>
                        <td><?= $row['mem_nickname'] ?></td>
                        <td><?= $row['mem_gender'] ?></td>
                        <td><?= $row['mem_birthday'] ?></td>
                        <td><?= $row['mem_mobile'] ?></td>
                        <td><?= $row['mem_email'] ?></td>
                        <td><?= $row['level_title'] ?></td>
                        <td><?= $row['mem_status'] ?></td>
                        <td><?= $row['mem_signUpDate'] ?></td>

                    </tr>
                    <?php endforeach ?>
                    */ ?>
                </tbody>
            </table>
            </div>
        </div>

        <button class="btn position-fixed btn-top" id="goTop" ><i class="fas fa-chevron-up"></i></button>
    </section>

</main>

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-secondary mx-1',
            cancelButton: 'btn btn-primary mx-1'
        },
        buttonsStyling: false,
    })
    const info_bar = document.querySelector('#info_bar');
    const formSearch = document.querySelector('#formSearch');
    const submit = document.querySelector('#submit');
    const data_body = document.querySelector('.data_body');
    const tr_str = `<tr>
                        <td class="d-flex">
                            <a href="#" class="d-block member_card"
                                data-mem-id="<%= mem_id %>" 
                                data-mem-account="<%= mem_account %>" 
                                data-mem-password="<%= mem_password %>" 
                                data-mem-avatar="<%= mem_avatar %>" 
                                data-mem-name="<%= mem_name %>" 
                                data-mem-nickname="<%= mem_nickname %>" 
                                data-mem-gender="<%= mem_gender %>" 
                                data-mem-birthday="<%= mem_birthday %>" 
                                data-mem-mobile="<%= mem_mobile %>" 
                                data-mem-email="<%= mem_email %>" 
                                data-mem-address="<%= mem_address %>" 
                                data-mem-level="<%= memLevel_id %>" 
                                data-mem-status="<%= mem_status %>" 
                                data-mem-signup="<%= mem_signUpDate %>">
                                <i class="fas fa-user-circle"></i>
                            </a>
                        </td>
                        <td><%= mem_id %></td>
                        <td><%= mem_account %></td>
                        <td><%= mem_name %></td>
                        <td><%= mem_nickname %></td>
                        <td><%= mem_gender %></td>
                        <td><%= mem_birthday %></td>
                        <td><%= mem_mobile %></td>
                        <td><%= mem_email %></td>
                        <td><%= mem_address %></td>
                        <td><%= memLevel_id %></td>
                        <td><%= mem_status %></td>
                    </tr>`;
    const tr_func = _.template(tr_str);
    
    submit.addEventListener('mousedown', function(event){
        let form = new FormData(document.formSearch)
        fetch('member_search_api.php', {
                method: 'POST',
                body: form
            })
            .then(response => {
                    return response.json();
                })
            .then(obj => {
                    console.log(obj);
                    ori_data = obj; // 讓ori_data的內容為SQL的資料
                    console.log(ori_data);
                    info_bar.style.display = 'block';

                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '搜尋到的資料如下';
                    } else {
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                    }    

                    //  資料內的表格
                    let str = '';
                    for (let s in ori_data.data) {
                        str += tr_func(ori_data.data[s]);
                    }
                    data_body.innerHTML = str;
                })
    });

    $("#goTop").click(function(){
        $("html").animate({ 
            scrollTop: 0
        }, 500)
    })
    
    $(".data_body").on("click", ".member_card", function(){
        let mem_id = $(this).data("memId");
        let mem_account = $(this).data("memAccount");
        let mem_password = $(this).data("memPassword");
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
                                    <div class="col-lg-2 p-0 d-flex align-items-center text-primary">密碼</div>
                                    <div class="col-lg-10 p-0 d-flex align-items-center ">&nbsp;${mem_password}</div>
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