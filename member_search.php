<?php

include __DIR__ . '/__connect_db.php';

?>

<?php include __DIR__ . '/html_head.php'; ?>
<?php include __DIR__ . '/html_header.php'; ?>
<?php include __DIR__ . '/html_navbar.php'; ?>

<style>
    .btn-top {
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
                        <button class="btn btn-primary my-2 my-sm-0" type="submit" id="submit">Search</button>
                    </form>
                </nav>
            <!-- </div> -->
        </div>

        <div>

            <div id="info_bar" role="alert"></div>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr style="white-space:nowrap">
                        <th scope=" col"><i class="far fa-edit"></i></th>
                        <th scope=" col">#會員編號</th>
                        <th scope=" col">帳號</th>
                        <!-- <th scope=" col">密碼</th> -->
                        <th scope=" col">大頭貼</th>
                        <th scope=" col">姓名</th>
                        <th scope=" col">暱稱</th>
                        <th scope=" col">性別</th>
                        <th scope=" col">生日</th>
                        <th scope=" col">手機</th>
                        <th scope=" col">信箱</th>
                        <th scope=" col">地址</th>
                        <th scope=" col">等級</th>
                        <th scope=" col">狀態</th>
                        <th scope=" col">註冊日期</th>
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

        <button class="btn btn-primary position-fixed btn-top" id="goTop" >Top</button>
    </section>

</main>

<script>
    const info_bar = document.querySelector('#info_bar');
    const formSearch = document.querySelector('#formSearch');
    const submit = document.querySelector('#submit');
    const data_body = document.querySelector('.data_body');
    const tr_str = `<tr>
                        <td>
                            <a href="member_edit.php?mem_id=<%= mem_id %>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td><%= mem_id %></td>
                        <td><%= mem_account %></td>
                        <td><img src="./<%= mem_avatar %>" alt="" height="50"></td>
                        <td><%= mem_name %></td>
                        <td><%= mem_nickname %></td>
                        <td><%= mem_gender %></td>
                        <td><%= mem_birthday %></td>
                        <td><%= mem_mobile %></td>
                        <td><%= mem_email %></td>
                        <td><%= mem_address %></td>
                        <td><%= memLevel_id %></td>
                        <td><%= mem_status %></td>
                        <td><%= mem_signUpDate %></td>
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
    
    
</script>

<?php include __DIR__ . '/html_foot.php'; ?> 