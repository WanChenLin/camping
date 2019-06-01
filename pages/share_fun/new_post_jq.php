<?php
// require __DIR__. '/__cred.php';
require '../../__connect_db.php';
$page_name = 'data_insert';
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

    .alert {
        display: none;
    }

    .active {
        display: block;
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
        <div id="success_bar" class="alert alert-success mt-3" role="alert">文章發布成功</div>
        <div id="title_failed" class="alert alert-danger mt-3" role="alert">請確認 [文章分類] 與 [文章標題]</div>
        <div id="content_failed" class="alert alert-danger mt-3" role="alert">文章內容不得少於20字</div>
        <form name="form1" id="form1" method="post">

            <div class="row my-3">
                <div class="col-lg-2 pr-0">
                    <select class="form-control custom-select mr-sm-2" name="post_cate" id="post_cate">
                        <option selected disabled>文章分類</option>
                        <option value="1">露營裝備</option>
                        <option value="2">帳篷選擇</option>
                        <option value="3">天氣對策</option>
                    </select>
                </div>
                <div class="col-lg-10 pl-0">
                    <input type="text" class="form-control" id="post_title" name="post_title" placeholder="文章標題" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <textarea class="form-control" name="post_content" id="post_content" rows="10" cols="80"></textarea>
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
            <button id="submit_btn" type="submit" class="btn btn-primary mt-3" onClick="CKupdate()">發布</button>
        </form>
    </div>

</main>

<!-- Tiny Nice Confirmation -->
<link rel="stylesheet" href="HPCF/H-confirm-alert.css" />
<script type="text/javascript" src="HPCF/H-confirm-alert.js"></script>

<script>
    $("#form1").submit(function() {
        event.preventDefault();
        let title = $("#post_title").val();
        let content = CKEDITOR.instances[instance].getData();
        console.log(title);
        console.log(content.length);
        if (title && content) {
            $.ajax({
                    method: "POST",
                    url: "new_post_api.php",
                    data: $('#form1').serialize(),
                    dataType: "json"
                })
                .done(function() {
                    $("#success_bar").addClass("active");
                    $("#submit_btn").css("display", "none");
                }).fail(function() {
                    $("#failed_bar").addClass("active");
                });
        } else if (!title) {
            $("#title_failed").addClass("active");
        } else if (content.length < 20) {
            $("#content_failed").addClass("active");
        }
        $("#submit_btn").css("display", "block")

    });

    $(".form-control").change(function() {
        $("#title_failed").removeClass("active");
    });

    $("#content_failed").removeClass("active");
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha256-jGAkJO3hvqIDc4nIY1sfh/FPbV+UK+1N+xJJg6zzr7A=" crossorigin="anonymous"></script>

<?php include '../../__index_foot.php'; ?>