<?php
//require __DIR__.'/__cred.php';
require __DIR__.'/__connect.php';
 $page_name='campsite_edit';

 $camp_id=isset($_GET['camp_id']) ? intval($_GET['camp_id']):0;
 $sql="SELECT * FROM `campsite_list` WHERE `camp_id`=$camp_id";
 
 $stmt=$pdo->query($sql);

 //防止跳到不存在的頁面，會導回列表頁
 if($stmt->rowCount()==0){
     header('Location:campsite_list.php');
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
span{
    color:red !important;
}
</style>
<main class="col-10 bg-white">
<aside class="bg-warning">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./camp_list.php">營地列表</a></li>
            <li class="breadcrumb-item"><a href="./campsite_list.php">營地清單</a></li>
            <li class="breadcrumb-item active" aria-current="page">修改營地資料</li>
         </ol>
        </nav>
</aside>

     
      <div class="card " style="border:none">
        <div class="card-body">
        <div id="info_bar" class="alert alert-success" role="alert" style="display:none"></div>
            <h5 class="card-title text-center col-sm-10">修改資料 <span style="font-size:12px">*為必填欄位</span></h5>
            <form name="form1" method="post" onsubmit="return checkForm();">
                <input type="hidden" name="checkme" value="check123">
                <input type="hidden" name="camp_id" value="<?= $row['camp_id']?>">
                <div class="form-group row">
                <label for="camp_name"class="col-sm-2 col-form-label text-right"><span>*</span>營區名稱</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder=""
                value="<?= $row['camp_name'] ?>">
                <small id="camp_nameHelp" class="form-text text-muted"></small>
                </div>
            </div> 
<!-- 
            <div class="form-group address_api">
            <div class="row d-flex ">
             <label for="camp_address" class="col-sm-2 col-form-label text-right "><span>*</span>地址</label>
                    <div class="col-sm-4 d-flex">
                        <input type="text" name="camp_address[]" class="zipcode border-0" readonly placeholder="郵遞區號" size="5" autocomplete="off">
                    
                    <div class="col-sm-5 d-flex p-1">
                        <select class="form-control county" name="county"></select>
                    </div>
                    <div class="col-sm-5 d-flex p-1">
                        <select class="form-control district" name="district"></select>
                    </div>
                    </div>
            </div>  
                   <div class="row d-flex">
                   <div class="col-sm-2" ></div>
                   <div class="col-sm-6 mt-2">
                        <input type="text" class="form-control " id="camp_address" name="camp_address[]" placeholder=""  value="<?= $row['camp_address'] ?>">
                                    <small id="camp_addressHelp" class="form-text text-muted"></small>
                   </div>
                   
                   </div>
          </div> -->
            <!-- <div class="form-group row">
                <label for="city" class="col-sm-2 col-form-label text-right">城市</label>
                <div class="col-sm-6">
                <select class="custom-select  col-sm-4 " name="city" id="city" value="<?= $row['city'] ?>"  >
                    <option value="">請選擇</option>
                    <option value="臺北市" <?php echo ($row['city']=="臺北市") ?'selected':''?>>臺北市</option>
                    <option value="新北市" <?php echo ($row['city']=="新北市") ?'selected':''?>>新北市</option>
                    <option value="基隆市" <?php echo ($row['city']=="基隆市") ?'selected':''?>>基隆市</option>
                    <option value="桃園市" <?php echo ($row['city']=="桃園市") ?'selected':''?>>桃園市</option>
                    <option value="新竹縣" <?php echo ($row['city']=="新竹縣") ?'selected':''?>>新竹縣</option>
                    <option value="臺中市" <?php echo ($row['city']=="臺中市") ?'selected':''?>>臺中市</option>
                    <option value="苗栗縣" <?php echo ($row['city']=="苗栗縣") ?'selected':''?>>苗栗縣</option>
                    <option value="彰化縣" <?php echo ($row['city']=="彰化縣") ?'selected':''?>>彰化縣</option>
                    <option value="南投縣" <?php echo ($row['city']=="南投縣") ?'selected':''?>>南投縣</option>
                    <option value="雲林縣" <?php echo ($row['city']=="雲林縣") ?'selected':''?>>雲林縣</option>
                    <option value="高雄市" <?php echo ($row['city']=="高雄市") ?'selected':''?>>高雄市</option>
                    <option value="屏東縣" <?php echo ($row['city']=="屏東縣") ?'selected':''?>>屏東縣</option>
                    <option value="臺東縣" <?php echo ($row['city']=="臺東縣") ?'selected':''?>>臺東縣</option>
                    <option value="花蓮縣" <?php echo ($row['city']=="花蓮縣") ?'selected':''?>>花蓮縣</option>
                    <option value="宜蘭縣" <?php echo ($row['city']=="宜蘭縣") ?'selected':''?>>宜蘭縣</option>
            </select>
            </div>
                
            </div>
            <div class="form-group row">
                <label for="dist" class="col-sm-2 col-form-label text-right">地區</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="dist" name="dist" placeholder=""
                value="<?= $row['dist'] ?>">
                <small id="distHelp" class="form-text text-muted"></small>
                </div>
            </div>-->
            <div class="form-group row">
                <label for="camp_address" class="col-sm-2 col-form-label text-right"><span>*</span>地址</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_address" name="camp_address" cols="30" rows="3"><?= $row['camp_address'] ?></textarea>
                <small id="camp_addressHelp" class="form-text text-muted"></small>
                </div>
            </div> 
            <div class="form-group row">
                <label for="camp_location" class="col-sm-2 col-form-label text-right">經緯度</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_location" name="camp_location" placeholder=""
                value="<?= $row['camp_location'] ?>">
                <small id="camp_locationHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_intro" class="col-sm-2 col-form-label text-right">簡介</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_intro" name="camp_intro" cols="30" rows="3"><?= $row['camp_intro'] ?></textarea>
                <small id="camp_introHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_tel" class="col-sm-2 col-form-label text-right"><span>*</span>聯絡電話</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_tel" name="camp_tel" placeholder=""
                value="<?= $row['camp_tel'] ?>">
                <small id="camp_telHelp" class="form-text text-muted"></small>
                </div>
                </div>
        
            <div class="form-group row">
                <label for="camp_fax" class="col-sm-2 col-form-label text-right">傳真</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_fax" name="camp_fax" placeholder=""
                value="<?=  $row['camp_fax'] ?>">
                <small id="camp_faxHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_email" class="col-sm-2 col-form-label text-right"><span>*</span>電子郵件</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_email" name="camp_email" placeholder=""
                value="<?= $row['camp_email'] ?>">
                <small id="camp_emailHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_ownerName" class="col-sm-2 col-form-label text-right">聯絡人</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_ownerName" name="camp_ownerName" placeholder=""
                value="<?= $row['camp_ownerName'] ?>">
                <small id="camp_ownerNameHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_openTime" class="col-sm-2 col-form-label text-right">開放時間</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_openTime" name="camp_openTime" cols="30" rows="3"><?= $row['camp_openTime'] ?></textarea>
                <small id="camp_openTimeHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
            <label for="camp_target" class="col-sm-2 col-form-label text-right">適合對象</label>
            <div class="col-sm-6">
            <select class="custom-select  col-sm-4 " name="camp_target" id="camp_target" value="<?= $row['camp_target'] ?>">
            <option value="">請選擇</option>
                <option value="小家庭" <?php echo ($row['camp_target']=="小家庭") ?'selected':''?>>小家庭</option>
                <option value="營火晚會" <?php echo ($row['camp_target']=="營火晚會") ?'selected':''?>>營火晚會</option>
                <option value="大型派對" <?php echo ($row['camp_target']=="大型派對") ?'selected':''?>>大型派對</option>
                <option value="工商團體" <?php echo ($row['camp_target']=="工商團體") ?'selected':''?>>工商團體</option>
            </select>
            </div>
            </div>
            <div  id="submit_btn"class=" form-group row text-center ">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
           

              
            </form>
        </div>
        </div>



    </main>
    
<script>
        const info_bar = document.querySelector('#info_bar');
        const submit_btn = document.querySelector('#submit_btn');

        const fields = [
        'camp_name',    
        'camp_address',
        'camp_location',
        'camp_tel',
        'camp_fax',
        'camp_email',
        'camp_ownerName',
        'camp_openTime',
        'camp_target',
        'camp_intro'
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
        // 拿到每個欄位的參照
        const fs = {};
        for(let v of fields){
            fs[v] = document.form1[v];
        }
        console.log(fs);
        console.log('fs.camp_name:', fs.camp_name);


        const checkForm = ()=>{
            let isPassed = true;
            info_bar.style.display = 'none';

            // 拿到每個欄位的值
            const fsv = {};
            for(let v of fields){
                fsv[v] = fs[v].value;
            }
            console.log(fsv);



            if(isPassed) {
                let form = new FormData(document.form1);

                submit_btn.style.display = 'none';

                fetch('campsite_edit_api.php', {
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
                            //window.location.href='campsite_list.php';
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

    </script>
    <!-- <script src="./tw-city-selector-master/dist/tw-city-selector.js"></script>
<script>
    new TwCitySelector({
        el: '.address_api',
        elCounty: '.county', // 在 el 裡查找 element
        countyFieldName: 'camp_address[]',
        elDistrict: '.district', // 在 el 裡查找 element
        districtFieldName: 'cmap_address[]',
        elZipcode: '.zipcode', // 在 el 裡查找 element
        zipcodeFieldName: 'camp_address[]', // input區域裡的zipcode name也要改成address[]才能夠接上
        // bootstrapStyle: true
    });
</script> -->
   
<?php include __DIR__.'/__html_footer.php'; ?>