<?php
//require __DIR__.'/__cred.php';
require '../../__connect_db.php';
$page_name = 'campsite_search';
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<style>
    section {
        overflow: auto;
    }

    .inset_bottom {
        position: absolute;
        right: 10px;
    }
</style>

<main class="col-10 bg-white">

    <aside class="bg-warning">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./camp_list.php">營地列表</a></li>
                <li class="breadcrumb-item active" aria-current="page">營地清單</li>
            </ol>
        </nav>
    </aside>

    <section>
        <div class="my-3">
            <!-- <div class="container-fluid"> -->
            <nav class="navbar navbar-light bg-light">
                <!-- <form name="formSearch" class="form-inline" method="POST" onsubmit="return gosearch();"> -->
                <form name="formSearch" id="formSearch" class="form-inline" method="POST" onsubmit="return false">
                    <input type="hidden" name="searchdb" value="check">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="搜尋營地資料" aria-label="Search" value="">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit" id="submit">Search</button>
                </form>
            </nav>
            <!-- </div> -->
        </div>
        <div id="info_bar" role="alert"></div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>營區名稱</th>
                    <th>城市</th>
                    <th>地區</th>
                    <th>地址</th>
                    <th>經緯度</th>
                    <th>聯絡電話</th>
                    <th>傳真</th>
                    <th>電子郵件</th>
                    <th>聯絡人</th>
                    <th>開放時間</th>
                    <th>適合對象</th>
                    <th><i class="fas fa-edit"></i></th>
                    <th><i class="fas fa-trash-alt"></i></th>
                </tr>
            </thead>
            <tbody class="data_body"></tbody>
        </table>
        </div>
    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    const info_bar = document.querySelector('#info_bar');
    const formSearch = document.querySelector('#formSearch');
    const submit = document.querySelector('#submit');
    const data_body = document.querySelector('.data_body');
    const tr_str = `<tr>
                        <td><%= camp_id %></td>
                        <td><%= camp_name %></td>
                        <td><%= city %></td>
                        <td><%= dist %></td>
                        <td><%= camp_address %></td>
                        <td><%= camp_location %></td>
                        <td><%= camp_tel %></td>
                        <td><%= camp_fax %></td>
                        <td><%= camp_email %></td>
                        <td><%= camp_ownerName %></td>
                        <td><%= camp_openTime %></td>
                        <td><%= camp_target %></td>
                        <td>
                            <a href="campsite_edit.php?camp_id=<%= camp_id %>"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="javascript: delete_it(<%= camp_id %>)"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>`;
    const tr_func = _.template(tr_str);

    submit.addEventListener('mousedown', function(event) {
        let form = new FormData(document.formSearch)
        fetch('campsite_search_api.php', {
                method: 'POST',
                body: form
            })
            .then(response => {
                return response.json();
            })
            .then(obj => {
                ori_data = obj; // 讓ori_data的內容為SQL的資料
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

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1',
            cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false,
    })

    function delete_it(camp_id) {
        swalWithBootstrapButtons.fire({
            title: '警告',
            html: '<h5>確定要刪除第 ' + camp_id + ' 筆營地資料嗎?</h5>',
            type: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: '刪除',
            confirmButtonColor: '#ccc',
            cancelButtonText: '取消',
            cancelButtonColor: '#ff0000',
            focusCancel: true,
        }).then((result) => {
            if (result.value) {
                swalWithBootstrapButtons.fire({
                    title: '刪除成功',
                    html: '已刪除該筆會員資料',
                    type: 'success',
                    timer: 1000,
                    onBeforeOpen: () => {
                        timerInterval = setInterval(() => {}, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                        location.href = 'campsite_delete.php?camp_id=' + camp_id;
                    }
                })
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: '取消刪除',
                    html: '尚未刪除該筆會員資料',
                    type: 'info'
                })
            }
        })
    }
</script>

<?php include '../../__index_foot.php'; ?>