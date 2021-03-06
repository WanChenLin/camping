<?php include '../../__connect_db.php'; ?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<style>
    .asterisk {
        color: red;
    }

    .avatar_upload {
        color: red;
    }
</style>

<main class="col-10 bg-white">

    <aside class="my-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="member_list.php">會員</a></li>
                <li class="breadcrumb-item"><a href="member_list.php">會員清單</a></li>
                <li class="breadcrumb-item active">新增會員</li>
            </ol>
        </nav>
    </aside>

    <section class="">

        <div class="container">
            <div id="info_bar" role="alert"></div>

            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-8">
                        <h5 class="card-title text-center">新增會員資料</h5>
                    </div>
                </div>

                <form name="formInsert" method="POST" onsubmit="return checkForm()">
                    <input type="hidden" name="gotodb" value="check">
                    <div class="form-group row d-flex justify-content-center">
                        <label for="account" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>帳號名稱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="account" name="account" placeholder="" value="">
                            <small id="accountHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="password" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>密碼</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password" placeholder="" value="">
                            <small id="passwordHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="password_check" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>確認密碼</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password_check" name="password_check" placeholder="" value="">
                            <small id="password_checkHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="avatar" class="col-sm-2 col-form-label text-right rwd-text">大頭貼</label>
                        <div class="col-sm-6">
                            <input type="hidden" id="avatar_pictures" name="avatar_pictures" value="">
                            <img id="myimg" src="" height="100px" width="" />
                            <input type="file" name="my_file" id="my_file" accept="image/*">
                            <span class="avatar_upload d-block" id="err"></span>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="name" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>姓名</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="">
                            <small id="nameHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="nickname" class="col-sm-2 col-form-label text-right rwd-text">暱稱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="此暱稱將同步用於分享樂" value="">
                            <small id="nicknameHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row d-flex justify-content-center">
                            <label class="col-form-label col-sm-2 pt-0 text-right rwd-text">性別</label>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
                                    <label class="form-check-label" for="genderM">男 Male</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="genderF" value="female">
                                    <label class="form-check-label" for="genderF">女 Female</label>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </fieldset>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="birthday" class="col-sm-2 col-form-label text-right rwd-text">生日</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="格式: YYYY-MM-DD" value="">
                            <small id="birthdayHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="mobile" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>手機</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="格式: 0912345678" value="">
                            <small id="mobileHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="email" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>信箱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" placeholder="" value="">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="" role="tw-city-selector" data-bootstrap-style data-has-zipcode>
                        <div class="form-group address_api">
                            <div class="row d-flex justify-content-center">
                                <label for="address" class="col-sm-2 col-form-label text-right rwd-text">地址</label>
                                <div class="col-sm-1 d-flex">
                                    <input type="text" name="address[]" class="zipcode border-0" readonly placeholder="郵遞區號" size="5" autocomplete="off">
                                </div>
                                <div class="col-sm-2 d-flex p-0">
                                    <select class="form-control county" name="county"></select>
                                </div>
                                <div class="col-sm-2 d-flex p-0">
                                    <select class="form-control district" name="district"></select>
                                </div>
                                <div class="col-sm-1 d-flex"></div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6 mt-1">
                                    <input type="text" class="form-control flex-grow-1" id="address" name="address[]" placeholder="">
                                    <small id="addressHelp" class="form-text text-muted"></small>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="email" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>等級</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="level" id="level">
                                <option value="1" selected>1 露營新手</option>
                                <option value="2">2 業餘露營家</option>
                                <option value="3">3 露營達人</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row after_sub text-center d-flex justify-content-center">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

</main>

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    const fields = [
        'account',
        'password',
        'password_check',
        'name',
        'nickname',
        'birthday',
        'mobile',
        'email'
    ];

    const info_bar = document.querySelector('#info_bar');
    const submit_btn = document.querySelector('#submit_btn');
    const after_sub = document.querySelector('.after_sub');

    const myimg = document.querySelector('#myimg');
    const my_file = document.querySelector('#my_file');
    const avatar_picutres = document.querySelector('#avatar_picutres');
    const err = document.querySelector('#err');

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
            title: '資料新增錯誤',
            showConfirmButton: false,
            timer: 1500
        })
    }

    const checkForm = () => {

        let ispassed = true;

        let account = document.formInsert.account.value;
        let name = document.formInsert.name.value;
        let birthday = document.formInsert.birthday.value;
        let mobile = document.formInsert.mobile.value;
        let email = document.formInsert.email.value;
        let password = document.formInsert.password.value;
        let password_check = document.formInsert.password_check.value;

        let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        let mobile_pattern = /^09\d{2}\d{3}\d{3}$/;

        for (let k in fields) {
            document.formInsert[fields[k]].style.borderColor = '#ccc';
            document.querySelector('#' + fields[k] + 'Help').innerHTML = '';
        }

        if (account.length < 3) {
            document.formInsert.account.style.borderColor = 'red';
            document.querySelector('#accountHelp').innerHTML = '字數不足，請至少輸入3個字';
            ispassed = false;
        }
        if (password.length < 5) {
            document.formInsert.password.style.borderColor = 'red';
            document.querySelector('#passwordHelp').innerHTML = '字數不足，請至少輸入5個英數字';
            ispassed = false;
        }
        if (name.length < 2) {
            document.formInsert.name.style.borderColor = 'red';
            document.querySelector('#nameHelp').innerHTML = '請輸入完整的姓名';
            ispassed = false;
        }
        if (!mobile_pattern.test(mobile)) {
            document.formInsert.mobile.style.borderColor = 'red';
            document.querySelector('#mobileHelp').innerHTML = '格式錯誤';
            ispassed = false;
        }
        if (!email_pattern.test(email)) {
            document.formInsert.email.style.borderColor = 'red';
            document.querySelector('#emailHelp').innerHTML = '請輸入完整的電子郵件';
            ispassed = false;
        }

        if (password_check != password) {
            document.formInsert.password_check.style.borderColor = 'red';
            document.querySelector('#password_checkHelp').innerHTML = '與上列密碼不符';
            ispassed = false;
        }

        if (ispassed) {
            let form = new FormData(document.formInsert);
            submit_btn.style.display = 'none';

            fetch('member_insert_api.php', {
                    method: 'POST',
                    body: form
                })
                .then(response => {
                    return response.json();
                })
                .then(obj => {
                    console.log(obj);
                    info_bar.style.display = 'block';
                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '會員 ' + $('#account').val() + ' 資料已新增完成';
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

    my_file.addEventListener('change', event => {
        const fd = new FormData();
        fd.append('my_file', my_file.files[0]);

        fetch('member_avatar_api.php', {
                method: 'POST',
                body: fd
            })
            .then(response => {
                return response.json();
            })
            .then(obj => {
                console.log(obj);
                myimg.setAttribute('src', 'avatar_pictures/' + obj.filename);
                avatar_pictures.setAttribute('value', 'avatar_pictures/' + obj.filename);
                err.innerHTML = obj.info;
            })
    })

    $(window).resize(function() {
        var windowWidth = $(this).width();
        console.log(windowWidth);
        if (windowWidth <= 768) {
            $(".rwd-text").removeClass("text-right");
        } else {
            $(".rwd-text").addClass("text-right");
        }
    });
</script>

<!-- tw-city-selector.js -->
<script src="./tw-city-selector-master/dist/tw-city-selector.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/tw-city-selector@2.0.2/dist/tw-city-selector.min.js" integrity="sha256-A5spLuZOMU0/G4RzZn45BoSBIpoWmV4xwp+LouIldsI=" crossorigin="anonymous"></script> -->
<script>
    new TwCitySelector({
        el: '.address_api',
        elCounty: '.county', // 在 el 裡查找 element
        countyFieldName: 'address[]',
        elDistrict: '.district', // 在 el 裡查找 element
        districtFieldName: 'address[]',
        elZipcode: '.zipcode', // 在 el 裡查找 element
        zipcodeFieldName: 'address[]', // input區域裡的zipcode name也要改成address[]才能夠接上
        // bootstrapStyle: true
    });
</script>

<?php include '../../__index_foot.php'; ?>