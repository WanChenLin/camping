<?php

include __DIR__ . '/__connect_db.php';

$mem_id = isset($_GET['mem_id']) ? intval($_GET['mem_id']) : 0;

$sql =  "SELECT * FROM member_list WHERE mem_id=$mem_id";

$stmt = $pdo->query($sql);
if ($stmt->rowCount() == 0) {
    header('Location: member_list.php');
    exit;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<?php include __DIR__ . '/html_head.php'; ?>
<?php include __DIR__ . '/html_header.php'; ?>
<?php include __DIR__ . '/html_navbar.php'; ?>

<style>
    .asterisk {
        color: red;
    }
</style>

<main class="col-10 bg-white">

    <aside class="my-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="member_list.php">會員資料清單</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member_insert.php">新增資料</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member_search.php">搜尋會員</a>
            </li>
        </ul>
    </aside>

    <section class="">

        <div class="container">
            <div id="info_bar" role="alert"></div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">修改會員資料</h5>

                    <form name="formInsert" method="POST" onsubmit="return checkForm()">
                        <input type="hidden" name="gotodb" value="check">
                        <input type="hidden" name="mem_id" value="<?= $row['mem_id'] ?>">
                        <div class="form-group row">
                            <label for="account" class="col-sm-2 col-form-label">帳號名稱<span class="asterisk"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="account" name="account" placeholder="" value="<?= $row['mem_account'] ?>">
                                <small id="accountHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">密碼<span class="asterisk"> *</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="" value="<?= $row['mem_password'] ?>">
                                <small id="passwordHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_check" class="col-sm-2 col-form-label">確認密碼<span class="asterisk"> *</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_check" name="password_check" placeholder="" value="">
                                <small id="password_checkHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-sm-2 col-form-label">大頭貼</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="avatar_pictures" name="avatar_pictures" value="<?= $row['mem_avatar'] ?>">
                                <img id="myimg" src="./<?= $row['mem_avatar'] ?>" height="100px">
                                <!-- <img id="preview" src="" height="100px" width="" /> -->
                                <input type="file" name="my_file" id="my_file" accept="image/*">
                                <!-- <input type="file" name="my_file" id="my_file" onchange="previewImage(this)" accept="image/*" value=""> -->
                                <!-- <img id="myimg" src="" alt="" height="100px">
                                <p class="avatar_upload d-inline" id="err"></p>
                                <input type="file" id="my_file" name="my_file"> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">姓名<span class="asterisk"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= $row['mem_name'] ?>">
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nickname" class="col-sm-2 col-form-label">暱稱</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="此暱稱將同步用於分享樂" value="<?= $row['mem_nickname'] ?>">
                                <small id="nicknameHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <label for="gender" class="col-form-label col-sm-2 pt-0">性別</label>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="male" <?= ($row['mem_gender']=='male') ? 'checked':'' ?>>
                                        <label class="form-check-label" for="gender">男 Male</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="female" <?= ($row['mem_gender']=='female') ? 'checked':'' ?>>
                                        <label class="form-check-label" for="gender">女 Female</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <label for="birthday" class="col-sm-2 col-form-label">生日</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="birthday" name="birthday" placeholder="格式: YYYY-MM-DD" value="<?= $row['mem_birthday'] ?>">
                                <small id="birthdayHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 col-form-label">手機<span class="asterisk"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="格式: 0912345678" value="<?= $row['mem_mobile'] ?>">
                                <small id="mobileHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">信箱<span class="asterisk"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?= $row['mem_email'] ?>">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group row text-center">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

</main>

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

    const checkForm = () => {

        let ispassed = true;

        let account = document.formInsert.account.value;
        let password = document.formInsert.password.value;
        let password_check = document.formInsert.password_check.value;
        let name = document.formInsert.name.value;
        let birthday = document.formInsert.birthday.value;
        let mobile = document.formInsert.mobile.value;
        let email = document.formInsert.email.value;

        let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        let mobile_pattern = /^09\d{2}\d{3}\d{3}$/;
        // let birth_pattern = /^\d{4}\-\d{2}\-\d{2}$/;


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
        // if(! birth_pattern.test(birthday)){
        //     document.formInsert.birthday.style.borderColor = 'red';
        //     document.querySelector('#birthdayHelp').innerHTML = '格式錯誤';
        //     ispassed = false;
        // }

        if (password_check != password) {
            document.formInsert.password_check.style.borderColor = 'red';
            document.querySelector('#password_checkHelp').innerHTML = '與上列密碼不符';
            ispassed = false;
        }

        if (ispassed) {
            let form = new FormData(document.formInsert);
            submit_btn.style.display = 'none';

            fetch('member_edit_api.php', {
                    method: 'POST',
                    body: form
                })
                .then(
                    response => {
                        return response.json();
                    })
                .then(
                    obj => {
                        console.log(obj);
                        info_bar.style.display = 'block';
                        if (obj.success) {
                            info_bar.className = 'alert alert-success';
                            info_bar.innerHTML = '資料修改完成';
                        } else {
                            info_bar.className = 'alert alert-danger';
                            info_bar.innerHTML = obj.errorMsg;
                        }
                        submit_btn.style.display = 'block';
                        submit_btn.style = 'btn_primary';
                    })
        }

        return false;
    }

    my_file.addEventListener('change', event => {
        // console.log(event.target);

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
                myimg.setAttribute('src', 'avatar_pictures/' + obj.filename); // 設定img屬性
                avatar_pictures.setAttribute('value', 'avatar_pictures/' + obj.filename);
                // err.innerHTML = obj.info;
            })
    })

    // function previewImage(input) {

    //     let preview = document.getElementById('preview');

    //     if (input.files && input.files[0]) {

    //     let reader = new FileReader();

    //     reader.onload = function (e) {
    //         preview.setAttribute('src', e.target.result);
    //     }
    //     reader.readAsDataURL(input.files[0]);
    //     } else {
    //     preview.setAttribute('src', '');
    //     }
    // }
</script>

<?php include __DIR__ . '/html_foot.php'; ?> 