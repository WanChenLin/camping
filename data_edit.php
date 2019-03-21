<?php
 // require __DIR__. '/__cred.php';
require __DIR__ . '/__connect_db.php';
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
<?php include __DIR__ . '/__html_head.php';  ?>

<style>
    .form-control {
        border-radius: 0;
    }

    .custom-select {
        border-radius: 0;
    }
</style>
</head>

<body>
    <?php include __DIR__ . '/__style_start.html';  ?>
    <?php include __DIR__ . '/__navbar.php';  ?>
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
    <?php include __DIR__ . '/__style_end.html';  ?>

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
        console.log(fs);
        console.log('fs.name:', fs.name);


        const checkForm = () => {
            let isPassed = true;
            info_bar.style.display = 'none';

            // 拿到每個欄位的值
            const fsv = {};
            for (let v of fields) {
                fsv[v] = fs[v].value;
            }
            console.log(fsv);


            // for (let v of fields) {
            //     fs[v].style.borderColor = '#cccccc';
            // }

            if (fsv.post_title.length < 1) {
                fs.post_title.style.borderColor = 'red';
                isPassed = false;
            }
            if (fsv.post_content.length < 1) {
                fs.post_content.style.borderColor = 'red';
                isPassed = false;
            }

            if (isPassed) {
                let form = new FormData(document.form1);

                submit_btn.style.display = 'none';

                fetch('data_edit_api.php', {
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
    <?php include __DIR__ . '/__html_foot.php';  ?> 