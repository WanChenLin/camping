<?php
require __DIR__ . '/__connect_db.php';

$user = '';
$password = '';

if (isset($_POST['user']) and isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admins` WHERE `admin_id`=? AND `password`=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $user,
        $password,
    ]);

    if ($stmt->rowCount() == 1) {
        session_start();
        $_SESSION['admin'] = $user;
        echo  $user;
        header('Location: index_.php');
        exit;
    } else {
        $msg = '帳號或密碼錯誤';
    }
}
?>
<!doctype html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <script src="./js/jquery-3.3.1.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.js"></script>
    <style>
        .box {
            max-width: 560px;
            box-shadow: 2px 6px 10px #ccc;
            border: 1px solid #ccc;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -30%);
        }
    </style>
</head>

<body>
    <div class="container box position-fixed no-gutters p-5">

        <?php if (!isset($_SESSION['admin'])) : ?>

            <?php if (isset($msg)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $msg ?>
                </div>
            <?php endif ?>

            <div class="pb-5" style="text-align:center;">
                <img src="images/LOGO_final-11.svg" class="card-img" alt="..." style="width:250px">
            </div>
            <form class="" method="post" cction="<?= $_SERVER["PHP_SELF"]; ?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="user" placeholder="用戶名稱" value="<?= $user ?>">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="密碼" value="<?= $password ?>">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info " style="">Submit</button>
                </div>
            </form>
        <?php else : ?>
            <script>
                location.href = 'event_list_search.php';
            </script>
        <?php endif; ?>
    </div>

</body>

</html>