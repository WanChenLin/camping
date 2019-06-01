<?php require '../../__connect_db.php'; ?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<style>
    .form-group small {
        color: red !important;
    }

    span {
        color: red !important;
    }

    #myimg {
        margin-bottom: 20px;
    }
</style>

<main class="col-10 bg-white">

    <aside class="bg-warning">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./camp_list.php">營地列表</a></li>
                <li class="breadcrumb-item"><a href="./campsite_list.php">營地清單</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增營地資料</li>
            </ol>
        </nav>
    </aside>

    <div class="container">
        <div class="card" style="border:none">
            <div class="card-body">
                <div id="info_bar" class="alert alert-success" role="alert" style="display:none"></div>
                <h5 class="card-title text-center col-sm-10">新增營地資料
                    <span style="font-size:12px">*為必填欄位</span>
                </h5>
                <form name="form" method="post" onsubmit="return checkForm()">
                    <input type="hidden" name="checkme" value="check123">
                    <div class="form-group row">
                        <label for="camp_name" class="col-sm-2 col-form-label text-right"><span>*</span>營區名稱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder="" value="">
                        </div>
                        <small id="camp_nameHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-sm-2 col-form-label text-right"><span>*</span>地址</label>
                        <div class="d-flex col-sm-6">
                            <input type="text" class="form-control col-2" id="city" name="city" placeholder="縣/市" value="">
                            <label for="dis" class="col-form-label text-right"></label>
                            <input type="text" class="form-control col-2" id="dist" name="dist" placeholder="鄉/鎮/市" value="">
                            <label for="camp_address" class=" col-form-label text-right"></label>
                            <input type="text" class="form-control col-8" id="camp_address" name="camp_address" placeholder="地址" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_location" class="col-sm-2 col-form-label text-right">經緯度</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_location" name="camp_location" placeholder="" value="">
                            <small id="camp_locationHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_intro" class="col-sm-2 col-form-label text-right">簡介</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="camp_intro" name="camp_intro" cols="30" rows="3"></textarea>
                            <small id="camp_introHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_detail" class="col-sm-2 col-form-label text-right">營地須知</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="camp_detail" name="camp_detail" cols="30" rows="5"></textarea>
                            <small id="camp_detailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_notice" class="col-sm-2 col-form-label text-right">注意事項</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="camp_notice" name="camp_notice" cols="30" rows="5"></textarea>
                            <small id="camp_noticeHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_device" class="col-sm-2 col-form-label text-right">提供設備</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_device" name="camp_device" placeholder="" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_service" class="col-sm-2 col-form-label text-right">附屬服務</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_service" name="camp_service" placeholder="" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_tel" class="col-sm-2 col-form-label text-right"><span>*</span>聯絡電話</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_tel" name="camp_tel" placeholder="" value="">
                            <small id="camp_telHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_fax" class="col-sm-2 col-form-label text-right">傳真</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_fax" name="camp_fax" placeholder="" value="">
                            <small id="camp_faxHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_email" class="col-sm-2 col-form-label text-right"><span>*</span>電子郵件</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_email" name="camp_email" placeholder="" value="">
                            <small id="camp_emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_ownerName" class="col-sm-2 col-form-label text-right">聯絡人</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_ownerName" name="camp_ownerName" placeholder="" value="">
                            <small id="camp_ownerNameHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_openTime" class="col-sm-2 col-form-label text-right">開放時間</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="camp_openTime" name="camp_openTime" cols="30" rows="3"></textarea>
                            <small id="camp_openTimeHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_target" class="col-sm-2 col-form-label text-right">適合對象</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_target" name="camp_target" placeholder="" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="picture" class="col-sm-2 col-form-label text-right">圖片</label><br>
                        <div class="col-sm-6">
                            <input type="hidden" id="camp_img" name="camp_img" value="">
                            <img id="myimg" src="" alt="" width="400px">
                            <br>
                            <input type="file" id="my_file" name="my_file"><br>
                        </div>
                    </div>
                    <div id="submit_btn" class="form-group row after_sub text-center">
                        <div class="col-sm-10">
                            <button id="submit_btn" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    const info_bar = document.querySelector('#info_bar');
    const submit_btn = document.querySelector('#submit_btn');

    const field = [
        'camp_name',
        'camp_address',
        'camp_location',
        'camp_tel',
        'camp_fax',
        'camp_email',
        'camp_ownerName',
        'camp_openTime',
        'camp_target',
        'city',
        'dist',
        'camp_intro',
        'camp_detail',
        'camp_device',
        'camp_notice',
        'camp_service'
    ];

    const add_success = () => {
        Swal.fire({
            type: 'success',
            title: '資料新增成功',
            showConfirmButton: false,
            timer: 1500
        })
    }
    const add_error = () => {
        Swal.fire({
            type: 'error',
            title: '資料新增失敗',
            showConfirmButton: false,
            timer: 1500
        })
    }

    const ts = {};
    for (let v of field) {
        ts[v] = document.form[v];
    }

    const checkForm = () => {
        let ispassed = true;

        if (ispassed) {
            let form = new FormData(document.form);
            submit_btn.style.display = 'none';
            fetch('campsite_insert_api.php', {
                    method: 'POST',
                    body: form
                })
                .then(response => response.json())
                .then(obj => {

                    info_bar.style.display = 'block';

                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '資料新增成功';
                        add_success();
                    } else {
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                        add_error();
                    }

                    submit_btn.style.display = 'block';
                    submit_btn.style = 'btn-primary';
                })
        }
        return false;
    }

    const myimg = document.querySelector('#myimg');
    const my_file = document.querySelector('#my_file');

    my_file.addEventListener('change', event => {
        const fd = new FormData();
        fd.append('my_file', my_file.files[0]);
        fetch('image_upload_api.php', {
                method: 'POST',
                body: fd
            })
            .then(response => {
                return response.json();
            })
            .then(obj => {
                myimg.setAttribute('src', 'upload/' + obj.filename);
                camp_img.setAttribute('value', 'upload/' + obj.filename);
                err.innerHTML = obj.info;
            })
    })
</script>

<?php include '../../__index_foot.php'; ?>