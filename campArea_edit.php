<?php
//require __DIR__.'/__cred.php';
require __DIR__.'/__connect.php';
 $page_name='campArea_edit';

 $campArea_id=isset($_GET['campArea_id']) ? intval($_GET['campArea_id']):0;
 $sql="SELECT * FROM `campsite_type` WHERE `campArea_id`=$campArea_id";
 
 $stmt=$pdo->query($sql);
 if($stmt->rowCount()==0){
     header('Location:campArea_list.php');
     exit;
 }
 $row=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include __DIR__.'/__html_header.php'; ?>
<?php include __DIR__.'/__html_navbar01.php'; ?>
<style>
.form-group small{
    color:red !important;
}
</style>
<main class="col-10 bg-white">
<aside class="bg-warning">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./camp_list.php">營地列表</a></li>
            <li class="breadcrumb-item"><a href="./campArea_list.php">營地分區清單</a></li>
            <li class="breadcrumb-item active" aria-current="page">修改營地分區資料</li>
         </ol>
        </nav>
</aside>
<div class="container">

<div class="card" style="border:none">
  <div class="card-body">
  <div id="info_bar" class="alert alert-success" role="alert" style="display:none"></div>
      <h5 class="card-title text-center col-sm-10">新增營地分區資料</h5>
      <form name="form" method="post" onsubmit="return checkForm()" class="" >
      <input type="hidden" name="campArea_id" value="<?= $row['campArea_id'] ?>">
      
      <div class="form-group row">
          <label for="camp_name"  class="col-sm-2 col-form-label text-right">營地名稱</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder=""
              value="<?= $row['camp_name'] ?>">
              <small id="camp_nameHelp" class="form-text text-muted"></small>
          </div>
      </div>
      <div class="form-group row">
          <label for="camp_area" class="col-sm-2 col-form-label text-right">營區</label>
          <div class="col-sm-6">
              <input type="text" class="form-control" id="camp_area" name="camp_area" placeholder=""
              value="<?= $row['camp_area'] ?>">
              <small id="camp_areaHelp" class="form-text text-muted"></small>
          </div>
      </div>
      <div class="form-group row ">
          <label for="camp_type" class="col-sm-2 col-form-label text-right">營區類型</label>
          <div class="col-sm-2">
          <select class="custom-select" name="camp_type" id="camp_type" value=""  >
              <option value="0">請選擇</option>
              <option value="草皮" <?php echo ($row['camp_type']=="草皮") ?'selected':''?>>草皮</option>
              <option value="棧板" <?php echo ($row['camp_type']=="棧板") ?'selected':''?>>棧板</option>
              <option value="碎石" <?php echo ($row['camp_type']=="碎石") ?'selected':''?>>碎石</option>
              <option value="雨棚" <?php echo ($row['camp_type']=="雨棚") ?'selected':''?>>雨棚</option>
              <option value="泥土" <?php echo ($row['camp_type']=="泥土") ?'selected':''?>>泥土</option>
              <option value="水泥" <?php echo ($row['camp_type']=="水泥") ?'selected':''?>>水泥</option>
            </select>
          </div> 
          <label for="camp_number" class="col-form-label text-right">帳數</label>
          <div class="col-sm-1">
              <input type="number" class="form-control" id="camp_number" name="camp_number" placeholder=""
              value="<?= $row['camp_number'] ?>">
              <small id="camp_numberHelp" class="form-text text-muted"></small>
          </div>
          <label for="camp_size" class="col-form-label text-right">營區尺寸</label>
          <div class="col-sm-2">
              <input type="text" class="form-control" id="camp_size" name="camp_size" placeholder=""
              value="<?= $row['camp_size'] ?>">
              <small id="camp_typeHelp" class="form-text text-muted"></small>
          </div> 
      </div>
      <div class="form-group row" >
          <label for="camp_priceWeekday" class="col-sm-2 col-form-label text-right">平日價格</label>
          <div class="col-sm-2">
              <input type="number" class="form-control" id="camp_priceWeekday" name="camp_priceWeekday" placeholder=""
              value="<?= $row['camp_priceWeekday'] ?>">
              <small id="camp_priceWeekdayHelp" class="form-text text-muted"></small>
          </div> 
          <label for="camp_priceHoliday" class=" col-form-label text-right">假日價格</label>
          <div class="col-sm-2">
              <input type="number" class="form-control" id="camp_priceHoliday" name="camp_priceHoliday" placeholder=""
              value="<?= $row['camp_priceHoliday'] ?>">
              <small id="camp_priceHolidayHelp" class="form-text text-muted"></small>
          </div>
      </div>
      <div class="form-group row">
            <label for="camp_areaImg" class="col-sm-2 col-form-label text-right" >圖片</label>
            <div class="col-sm-6">
              <input type="hidden" id="camp_areaImg" name="camp_areaImg" value="">
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
            'camp_areaImg',
            'camp_name',
            'camp_area',
            'camp_type',
            'camp_size',
            'camp_number',
            'camp_priceWeekday',
            'camp_priceHoliday',        
        ];

        const edit_success = () => {
        Swal.fire({
            type: 'success',
            title: '資料修改成功',
            showConfirmButton: false,
            timer: 1500
        })
    }
    const edit_error = () => {
        Swal.fire({
            type: 'error',
            title: '資料修改失敗',
            showConfirmButton: false,
            timer: 1500
        })
    }

        const ts = {};
        for(let v of field_image){
            ts[v] = document.form[v];
        }
        console.log(ts);
        console.log('ts.camp_name:', ts.camp_name);


        const checkForm = ()=>{
            let isPassed = true;
            info_bar.style.display = 'none';

            const tsv = {};
            for(let v of field_image){
                tsv[v] = ts[v].value;
            }
            console.log(tsv);
            
            if(isPassed) {
                let form = new FormData(document.form);

                submit_btn.style.display = 'none';

                fetch('campArea_edit_api.php', {
                    method: 'POST',
                    body: form
                })
                    .then(response=>response.json())
                    .then(obj=>{
                        console.log(obj);

                        info_bar.style.display = 'block';

                        if(obj.success){
                            info_bar.className = 'alert alert-success';
                            info_bar.innerHTML = '資料修改成功';
                            edit_success();
                        } else {
                            info_bar.className = 'alert alert-danger';
                            info_bar.innerHTML = obj.errorMsg;
                            edit_error();
                        }

                        submit_btn.style.display = 'block';
                    });

            }
            return false;
        };
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