<?php
 // require __DIR__. '/__cred.php';
require __DIR__ . '/__connect_db.php';
// $page_name = 'data_insert';

$post_cate = '';
$post_title = '';
$post_content = '';
$post_time = '';

if (isset($_POST['post_title'])) {
    $slct = array('文章分類', '露營裝備', '帳篷選擇', '天氣對策');
    $post_cate = $_POST['slct'];
    $post_title = strip_tags($_POST['post_title']);
    $post_content = strip_tags($_POST['content']);
    $post_time = date("Y-m-d h:i:s");

    $sql = "INSERT INTO `share_post`(
       `post_cate`, `post_title`, `post_content`, `post_time`
    ) VALUES (
        ?, ?, ?, ?
    )";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $post_cate,
        $post_title,
        $post_content,
        $post_time,
    ]);

    if ($stmt->rowCount() == 1) {
        $success = true;
        $msg = [
            'type' => 'success',
            'info' => '文章發布成功',
        ];
    } else {
        $msg = [
            'type' => 'danger',
            'info' => '資料新增錯誤',
        ];
    };
};

?>

<?php include __DIR__ . '/__html_head.php';  ?>
<?php include __DIR__ . '/__navbar.php';  ?>

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
    <form name="form1" method="post" onsubmit="return checkForm();">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 p-0">
                    <select class="custom-select mr-sm-2" name="slct" id="slct">
                        <option selected>文章分類</option>
                        <option value="露營裝備">露營裝備</option>
                        <option value="帳篷選擇">帳篷選擇</option>
                        <option value="天氣對策">天氣對策</option>
                    </select>
                </div>
                <div class="col-lg-10 p-0">
                    <input type="text" class="form-control" id="post_title" name="slct" placeholder="文章標題" value="<?= $post_title ?>">
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <textarea name="content" id="content" rows="10" cols="80"></textarea>
                        <script>
                            CKFinder.setupCKEditor();
                            CKEDITOR.replace('content', {});
                        </script>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">發布</button>
    </form>

    <script>
        const fields = [
            'slct',
            'post_title',
            'content'
        ];

        const fs = {};
        for (let v of fields) {
            fs[v] = document.form1[v];
        }

        console.log(fs);
        console.log('fs.name:', fs.name);
               
        const checkForm = () => {
            let isPassed = true;

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

            return isPassed;
        };
    </script>

    <?php include __DIR__ . '/__html_foot.php';  ?> 