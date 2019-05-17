<?php include '../../__connect_db.php'; ?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<style>
    .asterisk {
        color: red;
    }
</style>

<main class="col-10 bg-white">
    <!-- 麵包屑 -->
    <aside class="my-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="host_list.php">營地主管理</a></li>
                <li class="breadcrumb-item"><a href="host_list.php">營地主列表</a></li>
                <li class="breadcrumb-item active">新增營地主</li>
            </ol>
        </nav>
    </aside>

    <section class="">

        <div class="container">
            <div id="info_bar" role="alert"></div>

            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-8">
                        <h5 class="card-title text-center">新增營地主資料</h5>
                    </div>
                </div>
                <form name="formInsert" method="POST" onsubmit="return checkForm()">
                    <input type="hidden" name="gotodb" value="check">
                    <div class="form-group row d-flex justify-content-center">
                        <label for="account" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>帳號</label>
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
                        <label for="name" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>公司名稱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="">
                            <small id="nameHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="vatnum" class="col-sm-2 col-form-label text-right rwd-text">公司統編</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="vatnum" name="vatnum" placeholder="" value="">
                            <small id="vatnumHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="tel" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>公司電話</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="格式：02-2345-6789" value="">
                            <small id="telHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="fax" class="col-sm-2 col-form-label text-right rwd-text">公司傳真</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="fax" name="fax" placeholder="格式：02-2345-6789" value="">
                            <small id="faxHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="email" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>公司信箱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" placeholder="" value="">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="" role="tw-city-selector" data-bootstrap-style data-has-zipcode>
                        <div class="form-group address_api">
                            <div class="row d-flex justify-content-center">
                                <label for="address" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>公司地址</label>
                                <div class="col-sm-1 d-flex">
                                    <input type="text" name="address[]" class="zipcode border-0" readonly placeholder=" 郵遞區號" size="5" autocomplete="off">
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
                        <label for="bankname" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>銀行戶名</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="bankname" name="bankname" placeholder="" value="">
                            <small id="banknameHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <label for="bankaccount" class="col-sm-2 col-form-label text-right rwd-text"><span class="asterisk">* </span>銀行帳號</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="bankaccount" name="bankaccount" placeholder="" value="">
                            <small id="bankaccountHelp" class="form-text text-muted"></small>
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
        'vatnum',
        'tel',
        'fax',
        'email',
        'address',
        'bankname',
        'bankaccount'
    ];

    const info_bar = document.querySelector('#info_bar');
    const submit_btn = document.querySelector('#submit_btn');
    const after_sub = document.querySelector('.after_sub');

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
        let password = document.formInsert.password.value;
        let password_check = document.formInsert.password_check.value;
        let name = document.formInsert.name.value;
        let tel = document.formInsert.tel.value;
        let email = document.formInsert.email.value;
        let address = document.formInsert.address.value;
        let bankname = document.formInsert.bankname.value;
        let bankaccount = document.formInsert.bankaccount.value;

        let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

        for (let k in fields) {
            document.formInsert[fields[k]].style.borderColor = '#ccc';
            document.querySelector('#' + fields[k] + 'Help').innerHTML = '';
        }

        if (account.length < 3) {
            document.formInsert.account.style.borderColor = 'red';
            document.querySelector('#accountHelp').innerHTML = '帳號長度不足，請至少輸入3個英數字';
            ispassed = false;
        }
        if (password.length < 5) {
            document.formInsert.password.style.borderColor = 'red';
            document.querySelector('#passwordHelp').innerHTML = '密碼長度不足，請至少輸入5個英數字';
            ispassed = false;
        }
        if (password_check != password) {
            document.formInsert.password_check.style.borderColor = 'red';
            document.querySelector('#password_checkHelp').innerHTML = '與上列密碼不符';
            ispassed = false;
        }
        if (name.length < 2) {
            document.formInsert.name.style.borderColor = 'red';
            document.querySelector('#nameHelp').innerHTML = '請輸入完整的公司名稱';
            ispassed = false;
        }
        if (tel.length < 7) {
            document.formInsert.tel.style.borderColor = 'red';
            document.querySelector('#telHelp').innerHTML = '請輸入完整的公司電話';
            ispassed = false;
        }
        if (!email_pattern.test(email)) {
            document.formInsert.email.style.borderColor = 'red';
            document.querySelector('#emailHelp').innerHTML = '請輸入完整的電子郵件';
            ispassed = false;
        }
        if (address.length < 5) {
            document.formInsert.address.style.borderColor = 'red';
            document.querySelector('#addressHelp').innerHTML = '請輸入完整的公司地址';
            ispassed = false;
        }
        if (bankname.length < 3) {
            document.formInsert.bankname.style.borderColor = 'red';
            document.querySelector('#banknameHelp').innerHTML = '請輸入完整的公司銀行戶名';
            ispassed = false;
        }
        if (bankaccount.length < 10) {
            document.formInsert.bankaccount.style.borderColor = 'red';
            document.querySelector('#bankaccountHelp').innerHTML = '請輸入完整的公司銀行帳號';
            ispassed = false;
        }

        if (ispassed) {
            let form = new FormData(document.formInsert);
            submit_btn.style.display = 'none';

            fetch('host_insert_api.php', {
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
                        info_bar.innerHTML = '營地主 ' + $('#account').val() + ' 資料已新增完成';
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
    };
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