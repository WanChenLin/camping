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
</style>
<?php include __DIR__ . '/__style_start.html';  ?>
<?php include __DIR__ . '/__navbar.php';  ?>
<div class="container">
    <div id="info_bar" class="alert alert-success" role="alert" style="display: none"></div>
    <form name="form1" method="post" onsubmit="return checkForm();">

        <div class="row">
            <div class="col-lg-2 pr-0">
                <select class="custom-select mr-sm-2" name="post_cate" id="post_cate">
                    <option selected>文章分類</option>
                    <option value="露營裝備">露營裝備</option>
                    <option value="帳篷選擇">帳篷選擇</option>
                    <option value="天氣對策">天氣對策</option>
                </select>
            </div>
            <div class="col-lg-10 pl-0">
                <input type="text" class="form-control" id="post_title" name="post_title" placeholder="文章標題" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <textarea name="post_content" id="post_content" rows="10" cols="80"></textarea>
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
        <button id="submit_btn" type="submit" class="btn btn-primary" onClick="CKupdate()">發布</button>
    </form>
</div>

<?php include __DIR__ . '/__style_end.html';  ?>
<script>
    const info_bar = document.querySelector('#info_bar');
    const submit_btn = document.querySelector('#submit_btn');

    const fields = [
        'post_cate',
        'post_title',
        'post_content'
    ];

    const fs = {};
    for (let v of fields) {
        fs[v] = document.form1[v];
    }

    console.log(fs);
    console.log('fs.name:', fs.name);

    const checkForm = () => {
        let isPassed = true;
        info_bar.style.display = 'none';

        const fsv = {};
        for (let v of fields) {
            console.log(v)
            fsv[v] = fs[v].value;
        }
        console.log(fsv);

        // for (let v of fields) {
        //     fs[v].style.borderColor = '#cccccc';
        //     }

        if (fsv.post_title.length < 1) {
            fs.post_title.style.borderColor = 'red';
            isPassed = false;
        }
        // if (fsv.post_content.length < 1) {
        //     fs.post_content.style.borderColor = 'red';
        //     isPassed = false;
        // }

        if (isPassed) {
            let form = new FormData(document.form1);

            submit_btn.style.display = 'none';

            fetch('editor_2_api.php', {
                    method: 'POST',
                    body: form
                })
                .then(response => response.json())
                .then(obj => {
                    console.log(obj);

                    info_bar.style.display = 'block';

                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '文章發布成功';
                    } else {
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                    }

                    submit_btn.style.display = 'block';
                });

        }
        return false;
    }
</script>

<?php include __DIR__ . '/__html_foot.php';  ?> 