<?php
 // require __DIR__. '/__cred.php';
require __DIR__ . '/__connect_db.php';
$page_name = 'data_insert';

$post_cate = '';
$post_title = '';
$post_content = '';
$post_time = '';

if (isset($_POST['post_title'])) {
    $slct = array('文章分類', '露營裝備', '帳篷選擇', '天氣對策');
    $post_cate = $_POST['slct'];
    $post_title = htmlentities($_POST['post_title']);
    $post_content = htmlentities($_POST['content']);
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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <style>
        .form-control {
            border-radius: 0;
        }

        .input-group-prepend .btn {
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
                    <input type="text" class="form-control" id="post_title" name="post_title" placeholder="文章標題" value="<?= $post_title ?>">
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
           return true;
        };
    </script>

    <?php include __DIR__ . '/__html_foot.php';  ?> 