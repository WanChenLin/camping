<?php
// require __DIR__. '/__cred.php';
require '../../__connect_db.php';
$page_name = 'data_edit';

$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

$sql = "SELECT * FROM share_post LEFT JOIN share_category ON share_post.post_cate = share_category.cate_id WHERE post_id=$post_id";

$stmt = $pdo->query($sql);
if ($stmt->rowCount() == 0) {
    header('Location: data_list.php');
    exit;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/adapters/jquery.js"></script>
<script src="ckfinder/ckfinder.js"></script>

<style>
    .form-control {
        border-radius: 0;
    }

    .custom-select {
        border-radius: 0;
    }
</style>

<main class="col-10 bg-white">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">分享樂</a></li>
            <li class="breadcrumb-item"><a href="#">新手指南</a></li>
            <li class="breadcrumb-item active" aria-current="page">文章列表</li>
        </ol>
    </nav>

    <style>
        ul.navbar-nav>li.nav-item.active {
            background-color: #e0d011;
        }
    </style>

    <ul class="nav nav-tabs pt-3">
        <li class="nav-item">
            <a class="nav-link <?= $page_name == 'data_list' ? 'active' : '' ?>" href="post_list_pre.php">文章列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $page_name == 'data_insert' ? 'active' : '' ?>" href="new_post_jq.php">新增文章</a>
        </li>
    </ul>
    <div class="container-fluid">
        <form name="form1" method="post" onsubmit="return checkForm();">
            <input type="hidden" name="post_id" value="<?= $row['post_id'] ?>">
            <div id="info_bar" class="alert alert-success" role="alert" style="display: none"></div>
            <div class="row my-3">
                <div class="col-lg-2 pr-0">
                    <select class="custom-select mr-sm-2" name="post_cate" id="post_cate">
                        <option selected value="<?= $row['post_cate'] ?>"><?= $row['cate_name'] ?></option>
                        <option value="1">露營裝備</option>
                        <option value="2">帳篷選擇</option>
                        <option value="3">天氣對策</option>
                    </select>
                </div>
                <div class="col-lg-10 pl-0">
                    <input type="text" class="form-control" id="post_title" name="post_title" placeholder="文章標題" value="<?= $row['post_title'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <textarea name="post_content" id="post_content" rows="10" cols="80" value=""><?= $row['post_content'] ?></textarea>
                    <script>
                        CKFinder.setupCKEditor();
                        CKEDITOR.replace('post_content');

                        function CKupdate() {
                            for (instance in CKEDITOR.instances) {
                                CKEDITOR.instances[instance].updateElement();
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="row">
                <div class="form-check form-check-inline m-3">
                    要顯示這篇文章嗎？
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="post_visible" id="visible" value="顯示" checked>
                    <label class="form-check-label" for="visible">顯示</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="post_visible" id="invisible" value="隱藏">
                    <label class="form-check-label" for="invisible">隱藏</label>
                </div>
            </div>
            <button id="submit_btn" class="btn btn-primary mt-3" onClick="CKupdate()">發布</button>
        </form>
    </div>

</main>

<!-- Tiny Nice Confirmation -->
<link rel="stylesheet" href="HPCF/H-confirm-alert.css" />
<script type="text/javascript" src="HPCF/H-confirm-alert.js"></script>

<script>
    const info_bar = document.querySelector('#info_bar');
    const submit_btn = document.querySelector('#submit_btn');

    const fields = [
        'post_cate',
        'post_title',
        'post_content',
        'post_visible'
    ];

    // 拿到每個欄位的參照
    const fs = {};
    for (let v of fields) {
        fs[v] = document.form1[v];
    }

    const checkForm = () => {
        let isPassed = true;

        // 拿到每個欄位的值
        const fsv = {};
        for (let v of fields) {
            fsv[v] = fs[v].value;
        }

        for (let v of fields) {
            fs[v].style.borderColor = '#cccccc';
        }

        if (fsv.post_title.length < 1) {
            fs.post_title.style.borderColor = 'red';
            isPassed = false;
        }
        if (fsv.post_content.length < 1) {
            isPassed = false;
        }

        if (isPassed) {
            let form = new FormData(document.form1);

            fetch('post_edit_api.php', {
                    method: 'POST',
                    body: form
                })
                .then(response => response.json())
                .then(obj => {
                    console.log(obj);

                    info_bar.style.display = 'block';

                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '文章修改成功';
                    } else {
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                    }
                    submit_btn.style.display = 'block';
                });
        }
        return false;
    };
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha256-jGAkJO3hvqIDc4nIY1sfh/FPbV+UK+1N+xJJg6zzr7A=" crossorigin="anonymous"></script>

<?php include '../../__index_foot.php'; ?>