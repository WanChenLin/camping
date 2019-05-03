<?php
//require __DIR__.'/__cred.php';
require __DIR__.'/__connect.php';
$page_name='campImg_insert';
$camp_image = '';
$camp_name = '';
$campImg_name = '';
$campImg_file = '';
  
 //isset檢查變數是否設置
if (isset($_POST['checkme'])){
    $camp_image = $_POST['camp_image'];
    $camp_name = $_POST['camp_name'];
    $campImg_name = $_POST['campImg_name'];
    $campImg_file = $_POST['campImg_file'];
    for($i=1;$i<3;$i++){
        $sql="INSERT INTO `campsite_image`(
            `camp_image`,`camp_name`, `campImg_name`, `campImg_file`
          ) VALUES (
              ?,?,?,?
              )";
    }
    
    try{
        //準備執行
        $stmt=$pdo->prepare($sql);
        //執行$stmt，回傳陣列內容
        $stmt->execute([
            $_POST['camp_image'],
            $_POST['camp_name'],
            $_POST['campImg_name'],
            $_POST['campImg_file'],
            ]);
        if ($stmt->rowCount()==1){
            $success=true;
            $msg=[
                'type'=>'success',
                'info'=>'資料新增成功'
            ];
            
        }else{
            $msg=[
                'type'=>'danger',
                'info'=>'資料新增錯誤'
            ];
           
        }
    }catch( PDOException $ex){
        $msg=[
            'type'=>'danger',
            'info'=>'重複輸入'
        ];
    }        
       
        
    }
?>
<?php include __DIR__.'/__html_header.php'; ?>
<?php include __DIR__.'/__html_navbar01.php'; ?>
<style>
.form-group small{
    color:red !important;
}
#myimg{
    margin-bottom:20px;
}
</style>
<main class="col-10 bg-white">
<aside class="bg-warning">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./camp_list.php">營地列表</a></li>
            <li class="breadcrumb-item"><a href="./campImg_list.php">營地圖片清單</a></li>
            <li class="breadcrumb-item active" aria-current="page">新增圖片資料</li>
         </ol>
        </nav>
</aside>
<div class="container">
      <div class="card" style="border:none" >
        <div class="card-body">
            <h5 class="card-title text-center col-sm-10">新增資料
                <?php if (isset( $msg)):?>
                <div class="alert alert-<?= $msg['type'] ?>" role="alert">
                <?= $msg['info'] ?>
                </div>
                <?php endif ?>

            </h5>
            <!-- <li class="inset_bottom list-unstyled">
                <a class="btn btn-primary" id="button" role="button">新增一筆資料</a>
            </li> -->
            <form name="form1"  method="post" onsubmit="return checkForm()" >
            <input type="hidden" name="checkme" value="check123">
            <div class="form">
            <div class="form-group row">
                <label for="camp_name" class="col-sm-2 col-form-label text-right">營區名稱</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder=""
                value="<?= $camp_name ?>">
                <small id="camp_nameHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="campImg_name" class="col-sm-2 col-form-label text-right">圖片名稱</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="campImg_name" name="campImg_name" placeholder=""
                value="<?= $campImg_name ?>">
                <small id="campImg_nameHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="campImg_file" class="col-sm-2 col-form-label text-right">圖片說明</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="campImg_file" name="campImg_file" cols="30" rows="3"><?= $campImg_file ?></textarea>
                <small id="campImg_fileHelp" class="form-text text-muted"></small>
                </div>
                
            </div>
            <div class="form-group row">
                  <label for="picture" class="col-sm-2 col-form-label text-right">圖片</label><br> 
                  <div class="col-sm-8">
                  <input type="hidden" id="camp_image" name="camp_image" value="<?= $camp_image ?>">
                      <img id="myimg" src="./<?= $camp_image ?>" alt="" width="400px">
                      <br>
                    <input type="file" id="my_file" name="my_file"><br>
                    </div>
                       
            </div>
            </div>
            
            <div class="form" id="form">
            </div>
            <div class="form-group row after_sub text-center">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>        
        </form>

    
        </div>
        </div>
        </div>
 
</main>

<script>
 $("#button").click(function(){
            let newRow=`<div class="form-group row">
                <label for="camp_name" class="col-sm-2 col-form-label text-right">營區名稱</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder=""
                value="<?= $camp_name ?>">
                <small id="camp_nameHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="campImg_name" class="col-sm-2 col-form-label text-right">圖片名稱</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="campImg_name" name="campImg_name" placeholder=""
                value="<?= $campImg_name ?>">
                <small id="campImg_nameHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="campImg_file" class="col-sm-2 col-form-label text-right">圖片說明</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="campImg_file" name="campImg_file" cols="30" rows="3"><?= $campImg_file ?></textarea>
                <small id="campImg_fileHelp" class="form-text text-muted"></small>
                </div>
                
            </div>
            <div class="form-group row">
                  <label for="picture" class="col-sm-2 col-form-label text-right">圖片</label><br> 
                  <div class="col-sm-8">
                  <input type="hidden" id="camp_image" name="camp_image" value="<?= $camp_image ?>">
                      <img id="myimg" src="./<?= $camp_image ?>" alt="" width="400px">
                      <br>
                    <input type="file" id="my_file" name="my_file"><br>
                    </div>
                       
            </div>`;
                 $("#form").append(newRow); 
        })
const add_success = () => {
        Swal.fire({
            type: 'success',
            title: '資料修改成功',
            showConfirmButton: false,
            timer: 1500
        })
    }
    const add_error = () => {
        Swal.fire({
            type: 'error',
            title: '資料修改失敗',
            showConfirmButton: false,
            timer: 1500
        })
    }

const myimg=document.querySelector('#myimg');
const my_file=document.querySelector('#my_file');

    my_file.addEventListener('change', event => {
        // console.log(event.target);
        const fd = new FormData();
        fd.append('my_file', my_file.files[0]);
        fetch('image_upload_api.php', {
                method: 'POST',
                body: fd
            })
            .then(response => {
                return response.json();
            })
            .then(obj => {
                console.log(obj);
                myimg.setAttribute('src', 'upload/' + obj.filename); 
                camp_image.setAttribute('value', 'upload/' + obj.filename);
                err.innerHTML = obj.info;
            })
    })
</script>
<?php include __DIR__.'/__html_footer.php'; ?>