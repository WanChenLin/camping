<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Underscore -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- CKeditor -->
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <!-- LightBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha256-HAaDW5o2+LelybUhfuk0Zh2Vdk8Y2W2UeKmbaXhalfA=" crossorigin="anonymous" />

    <title>GO CAMPING 趣露營 - 後台管理系統</title>

    <style>
        body {
            font-family: Arial, "微軟正黑體";
        }

        header {
            box-shadow: 0px 2px 1px 0 #ccc;
        }
        .logo {
            width: 260px;
        }
        .header_title {
            color: #707070;
        }

        .accordion .card .card-header .btn {
            color: #707070;
        }
        .accordion .card .card-header .btn:hover {
            color: #f2ce63;
        }
        .accordion .card .collapsing a.card-body {
            color: #ba7438;
        }
        .accordion .card .collapse a.card-body {
            color: #ba7438;
        }

        /* 按鈕樣式 */
        .btn.btn-primary {
            color: #ffffff;
            background-color: #87b061;
            border: 1px solid transparent;
        }
        .btn.btn-primary:hover,
        .btn.btn-primary:active, .btn.btn-primary.active,
        .btn.btn-primary:focus, .btn.btn-primary.focus,
        .btn.btn-primary:active:focus, .btn.btn-primary.active:focus {
            color: #ffffff;
            background-color: #027252;
            border: 1px solid transparent;
            outline: none;
            box-shadow: none;
        }
        .btn.btn-danger {
            color: #ffffff;
            background-color: #f26666;
            border: 1px solid transparent;
        }
        .btn.btn-danger:hover,
        .btn.btn-danger:active, .btn.btn-danger.active,
        .btn.btn-danger:focus, .btn.btn-danger.focus,
        .btn.btn-danger:active:focus, .btn.btn-danger.active:focus {
            color: #ffffff;
            background-color: #db1c1c;
            border: 1px solid transparent;
            outline: none;
            box-shadow: none;
        }
        .btn-outline-primary {
            color: #87b061;
            background-color: #ffffff;
            border: 1px solid #87b061;
        }
        .btn.btn-outline-primary:hover,
        .btn.btn-outline-primary:active, .btn.btn-outline-primary.active,
        .btn.btn-outline-primary:focus, .btn.btn-outline-primary.focus,
        .btn.btn-outline-primary:active:focus, .btn.btn-outline-primary.active:focus {
            color: #ffffff;
            background-color: #87b061;
            border: 1px solid #87b061;
            outline: none;
            box-shadow: none;
        }

        /* 頁碼樣式 */
        .pagination .page-item:hover .page-link {
            background-color: #027252;
            border-color: #027252; 
            color: #ffffff;
        }
        .pagination .page-item.active .page-link {
            background-color: #87b061;    
            border-color: #87b061; 
            color: #ffffff;
        }
        .pagination .page-item a.page-link {
            color: #027252;
        }

        /* 麵包屑 */
        .breadcrumb-item a {
            color: #87b061;
        }
        .breadcrumb-item a:hover {
            color: #027252;
        }

        /* 操作各icon樣式 */
        .fas.fa-user-circle, .fas.fa-edit, .fas.fa-trash-alt, .fas.fa-info-circle, .fas.fa-eye {
            color: #87b061;
        }
        .fas.fa-user-circle:hover, .fas.fa-edit:hover, .fas.fa-trash-alt:hover, .fas.fa-info-circle:hover, .fas.fa-eye:hover {
            color: #027252;
        }

        /* sweetalert內頁 */
        .text-primary { color: #87b061 !important; }

        /* 活動 */
        .text-primary.nav-link.check_info:hover {
            color:#027252 !important;
        }
        tbody#myTable tr td a {
            color: #87b061;
        }
        tbody#myTable tr td a:hover {
            color: #027252;
        }
        #submit_btns #back {
            color: #87b061;
        }
        #submit_btns #back:hover {
            color: #ffffff;
        }
        a.cost_a {
            color: #87b061;
        }
        a.cost_a:hover {
            color: #027252;
        }
        /* 分享樂 */
        td.post_title a {
            text-decoration: none;
            color: #87b061;
        }
        td.post_title a:hover { color: #027252; }
        /* 營地列表 */
        li.nav-item a.nav-link {
            color: #87b061;
        }
        li.nav-item a.nav-link:hover {
            color: #027252;
        }

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