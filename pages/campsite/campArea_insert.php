<?php require '../../__connect_db.php'; ?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<style>
    .form-group small {
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
                <li class="breadcrumb-item"><a href="./campArea_list.php">營地分區清單</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增營地分區資料</li>
            </ol>
        </nav>
    </aside>

    <div class="container">

        <div class="card" style="border:none">
            <div class="card-body">
                <div id="info_bar" class="alert alert-success" role="alert" style="display:none"></div>
                <h5 class="card-title text-center col-sm-10">新增營地分區資料</h5>
                <form name="form" method="post" onsubmit="return checkForm()" class="">
                    <input type="hidden" name="checkme" value="check123">

                    <div class="form-group row">
                        <label for="camp_name" class="col-sm-2 col-form-label text-right">營地名稱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder="" value="">
                            <small id="camp_nameHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_area" class="col-sm-2 col-form-label text-right">營位名稱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="camp_area" name="camp_area" placeholder="" value="">
                            <small id="camp_areaHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_information" class="col-sm-2 col-form-label text-right">營位資訊</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="camp_information" name="camp_information" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="camp_type" class="col-sm-2 col-form-label text-right">營區類型</label>
                        <div class="col-sm-2">
                            <select class="custom-select" name="camp_type" id="camp_type" value=" ">
                                <option value="0">請選擇</option>
                                <option value="草皮">草皮</option>
                                <option value="棧板">棧板</option>
                                <option value="碎石">碎石</option>
                                <option value="雨棚">雨棚</option>
                                <option value="泥土">泥土</option>
                                <option value="水泥">水泥</option>
                            </select>
                        </div>
                        <label for="camp_number" class="col-form-label text-right">帳數</label>
                        <div class="col-sm-1">
                            <input type="number" class="form-control" id="camp_number" name="camp_number" placeholder="" value="">
                            <small id="camp_numberHelp" class="form-text text-muted"></small>
                        </div>
                        <label for="camp_size" class="col-form-label text-right">營區尺寸</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="camp_size" name="camp_size" placeholder="" value="">
                            <small id="camp_typeHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_pricew" class="col-sm-2 col-form-label text-right">平日價格</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" id="camp_pricew" name="camp_pricew" placeholder="" value="">
                            <small id="camp_pricewHelp" class="form-text text-muted"></small>
                        </div>
                        <label for="camp_priceh" class=" col-form-label text-right">假日價格</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" id="camp_priceh" name="camp_priceh" placeholder="" value="">
                            <small id="camp_pricehHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="camp_areapic" class="col-sm-2 col-form-label text-right">圖片</label>
                        <div class="col-sm-6">
                            <input type="hidden" id="camp_areapic" name="camp_areapic" value="">
                            <img id="myimg" src="./<?= $row['camp_areapic'] ?>" alt="" width="400px">
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

    const field_image = [
        'camp_areapic',
        'camp_name',
        'camp_area',
        'camp_type',
        'camp_size',
        'camp_number',
        'camp_pricew',
        'camp_priceh',
        'camp_information',
    ];

    const add_success = () => {
        Swal.fire({
            type: 'success',
            title: '資料修改成功',
            showConfirmButton: false,
            timer: 1500
        })
    }
    const add_error = () => {
        Swal.fire({
            type: 'error',
            title: '資料修改失敗',
            showConfirmButton: false,
            timer: 1500
        })
    }

    const ts = {};
    for (let v of field_image) {
        ts[v] = document.form[v];
    }

    const checkForm = () => {
        let ispassed = true;

        if (ispassed) {
            let form = new FormData(document.form);
            submit_btn.style.display = 'none';
            fetch('campArea_insert_api.php', {
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
                camp_areapic.setAttribute('value', 'upload/' + obj.filename);
                //err.innerHTML = obj.info;
            })
    })
</script>

<?php include '../../__index_foot.php'; ?>