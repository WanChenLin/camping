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
<main class="col-10 bg-white">
<aside class="bg-warning">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./camp_list.php">營地列表</a></li>
            <li class="breadcrumb-item"><a href="./campsite_list.php">營地清單</a></li>
            <li class="breadcrumb-item active" aria-current="page">新增營地資料</li>
         </ol>
        </nav>
</aside>
<div class="container">

      <div class="card" style="border:none" >
        <div class="card-body">
        <div id="info_bar" class="alert alert-success" role="alert" style="display:none"></div>
            <h5 class="card-title text-center col-sm-10">新增營地資料
                <span style="font-size:12px">*為必填欄位</span>
            </h5>
            <form name="form" method="post" onsubmit="return checkForm()" >
            <input type="hidden" name="checkme" value="check123">
            <div class="form-group row">
                <label for="camp_name" class="col-sm-2 col-form-label text-right"><span>*</span>營區名稱</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder=""
                value="">
                </div>
                <small id="camp_nameHelp" class="form-text text-muted"></small>
            </div>  
             
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
                        <input type="text" class="form-control " id="camp_address" name="camp_address[]" placeholder="">
                                    <small id="camp_addressHelp" class="form-text text-muted"></small>
                   </div>
                   
                   </div>
          </div>
            <div class="form-group row">
                <label for="camp_location" class="col-sm-2 col-form-label text-right">經緯度</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_location" name="camp_location" placeholder=""
                value="">
                <small id="camp_locationHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_intro" class="col-sm-2 col-form-label text-right">簡介</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_intro" name="camp_intro" cols="30" rows="3"></textarea>
                <small id="camp_introHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_detail" class="col-sm-2 col-form-label text-right">營地須知</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_detail" name="camp_detail" cols="30" rows="5"></textarea>
                <small id="camp_detailHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_notice" class="col-sm-2 col-form-label text-right">注意事項</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_notice" name="camp_notice" cols="30" rows="5"></textarea>
                <small id="camp_noticeHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_device" class="col-sm-2 col-form-label text-right">設備</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_device" name="camp_device" placeholder=""
                value="">
                <small id="camp_deviceHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_tel" class="col-sm-2 col-form-label text-right"><span>*</span>聯絡電話</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_tel" name="camp_tel" placeholder=""
                value="">
                <small id="camp_telHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_fax" class="col-sm-2 col-form-label text-right">傳真</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_fax" name="camp_fax" placeholder=""
                value="">
                <small id="camp_faxHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_email" class="col-sm-2 col-form-label text-right"><span>*</span>電子郵件</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_email" name="camp_email" placeholder=""
                value="">
                <small id="camp_emailHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_ownerName" class="col-sm-2 col-form-label text-right">聯絡人</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_ownerName" name="camp_ownerName" placeholder=""
                value="">
                <small id="camp_ownerNameHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_openTime" class="col-sm-2 col-form-label text-right">開放時間</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_openTime" name="camp_openTime" cols="30" rows="3"></textarea>
                <small id="camp_openTimeHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_target" class="col-sm-2 col-form-label text-right">適合對象</label>
                <div class="col-sm-6">
                <select class="custom-select  col-sm-4 " name="camp_target" id="camp_target" value=""  >
                    <option value="">請選擇</option>
                    <option value="小家庭">小家庭</option>
                    <option value="營火晚會">營火晚會</option>
                    <option value="大型派對">大型派對</option>
                    <option value="工商團體">工商團體</option>
            </select>
            </div>
            </div>
            <div id="submit_btn" class="form-group row after_sub text-center">
            <div class="col-sm-10">
                <button id="submit_btn" type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
            
            </form>
        </div>
        </div>
        </div>



  
</main>

<script>
 const info_bar = document.querySelector('#info_bar');
const submit_btn = document.querySelector('#submit_btn');

        const field = [
        'camp_name',    
        'camp_address',
        'camp_location',
        'camp_tel',
        'camp_fax',
        'camp_email',
        'camp_ownerName',
        'camp_openTime',
        'camp_target',
        'camp_intro',
        'camp_detail',
        'camp_device',
        'camp_notice'
        
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
        for(let v of field){
            ts[v] = document.form[v];
        }
        console.log(ts);
        console.log('ts.camp_name:', ts.camp_name);


        const checkForm = () => {
        let ispassed = true;
      
        if (ispassed) {
            let form = new FormData(document.form);
            submit_btn.style.display = 'none';
            fetch('campsite_insert_api.php', {
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
</script>
<script src="./tw-city-selector-master/dist/tw-city-selector.js"></script>
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
</script>
<?php include __DIR__.'/__html_footer.php'; ?>