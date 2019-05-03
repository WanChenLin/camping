<?php
require __DIR__.'/__connect.php';

?>
<?php include __DIR__.'/__html_header.php'; ?>
<?php include __DIR__.'/__html_navbar01.php'; ?>
<style>
.form-group small{
    color:red !important;
}
span{
    color:red !important;

}

#myimg{
    margin-bottom:20px;
}
</style>
<main class="col-9 bg-white">
<aside class="bg-warning">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./camp_list.php">營地列表</a></li>
            <li class="breadcrumb-item"><a href="./campImg_list.php">營地圖片清單</a></li>
            <li class="breadcrumb-item active" aria-current="page">新增圖片資料</li>
         </ol>
        </nav>
</aside>
      <div class="card" >
        <div class="card-body">
        <div id="info_bar" class="alert alert-success" role="alert" style="display:none"></div>
            <h5 class="card-title text-center col-sm-10">新增資料</h5>
            <form name="form2" method="post" onsubmit="return checkForm()" >
            <input type="hidden" name="checkme" value="check123">
            <div class="form-group row">
                <label for="camp_name" class="col-sm-2 col-form-label text-right"><span>*</span>營區名稱</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder=""
                    value="">
                </div>
                <small id="camp_nameHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group row">
                <label for="campImg_name" class="col-sm-2 col-form-label text-right"><span>*</span>圖片名稱</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="campImg_name" name="campImg_name" placeholder=""
                    value="">
                </div>
                <small id="campImg_nameHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group row">
                <label for="campImg_file" class="col-sm-2 col-form-label text-right">圖片說明</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="campImg_file" name="campImg_file" cols="30" rows="3"></textarea>
                </div>
                <small id="campImg_fileHelp" class="form-text text-muted"></small>
                
            </div>
            <div class="form-group row">
                  <label for="picture" class="col-sm-2 col-form-label text-right">圖片</label><br>
                  <div class="col-sm-6">
                    <input type="hidden" id="camp_image" name="camp_image" value="">
                        <img id="myimg" src="" alt="" width="400px">
                        <br>
                        <input type="file" id="my_file" name="my_file"><br>
                  </div> 
                  
            </div>
            <div id="submit_btn" class="form-group row after_sub text-center">
            <div class="col-sm-10">
                <button id="submit_btn" type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>          
            
            </form>

    </form>
        </div>
        </div>
 
</main>

<script>
 const info_bar = document.querySelector('#info_bar');
const submit_btn = document.querySelector('#submit_btn');

        const field_image = [
            'camp_image',
            'camp_name',
            'campImg_name',
            'campImg_file',
            // 'campImg_path'
        
        ];

        const add_success = () => {
        Swal.fire({
            type: 'success',
            title: '資料新增成功',
            showConfirmButton: false,
            timer: 1500
        })
    }
    const add_error = () => {
        Swal.fire({
            type: 'error',
            title: '資料新增失敗',
            showConfirmButton: false,
            timer: 1500
        })
    }

        const ts = {};
        for(let v of field_image){
            ts[v] = document.form2[v];
        }
        console.log(ts);
        console.log('ts.camp_name:', ts.camp_name);


        const checkForm = () => {
        let ispassed = true;
      
        if (ispassed) {
            let form = new FormData(document.form2);
            submit_btn.style.display = 'none';
            fetch('campImg_insert02_api.php', {
                    method: 'POST',
                    body: form
                })
                .then(response=>response.json())
                .then(obj => {
                    console.log(obj);
                    info_bar.style.display = 'block';
                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '資料新增成功';
                        add_success();
                    } else {
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                        add_error();
                    }
                    submit_btn.style.display = 'block';
                    submit_btn.style = 'btn-primary';
                })
        }
        return false;
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