<?php
// require __DIR__. '/__cred.php';
require __DIR__ . '/__connect_db.php';
$page_name = 'data_insert';

?>
<?php include __DIR__ . '/__html_head.php';  ?>


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
<?php include __DIR__ . '/__style_start.html';  ?>
<?php include __DIR__ . '/__navbar.php';  ?>
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

<?php include __DIR__ . '/__style_end.html';  ?>
<script>
    // const info_bar = document.querySelector('#info_bar');
    // const submit_btn = document.querySelector('#submit_btn');




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

                    // let info_bar = `<div id="info_bar" class="alert alert-success" role="alert" style="display: none">文章發布成功</div>`
                    $("#success_bar").addClass("active");
                    $("#submit_btn").css("display", "none");
                }).fail(function() {
                    $("#failed_bar").addClass("active");
                    // $("#submit_btn").css("display", "none")
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


<?php include __DIR__ . '/__html_foot.php';  ?>