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
    <div class="container">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">文章分類</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">露營裝備</a>
                            <a class="dropdown-item" href="#">帳篷選擇</a>
                            <a class="dropdown-item" href="#">天氣對策</a>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="文章標題" aria-label="Text input with dropdown button">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name='form' action='#' method='post'>
                    <textarea name="content" id="content" rows="10" cols="80"></textarea>
                    <script>
                        CKFinder.setupCKEditor();
                        CKEDITOR.replace('content', {});
                    </script>
                    <input type='button' value='送出' onclick='processData()'>
                </form>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html> 