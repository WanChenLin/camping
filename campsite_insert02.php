<?php
require __DIR__.'/__connect.php';
 $page_name='campsite_insert';
    $name = '';
    $address = '';
    $location = '';
    $tel = '';
    $fax ='';
    $email = '';
    $ownerName = '';
    $openTime = '';
    $target = '';
    $intro = '';
    $detail = '';
    $device = '';
    $notice = '';
 //isset檢查變數是否設置
 if (isset($_POST['checkme'])){

    $name = $_POST['camp_name'];
    $address = $_POST['camp_address'];
    $location = $_POST['camp_location'];
    $intro = $_POST['camp_intro'];
    // $notice = $_POST['camp_notice'];
    // $detail = $_POST['camp_detail'];
    // $device = $_POST['camp_device'];
    $tel = $_POST['camp_tel'];
    $fax = $_POST['camp_fax'];
    $email = $_POST['camp_email'];
    $ownerName = $_POST['camp_ownerName'];
    $openTime = $_POST['camp_openTime'];
    $target = $_POST['camp_target'];
   

$sql="INSERT INTO `campsite_list`(
     `camp_name`, `camp_address`, `camp_location`, `camp_tel`, `camp_fax`, `camp_email`, `camp_ownerName`, `camp_openTime`, `camp_target`, `camp_intro` `camp_detail`, `camp_device`, `camp_notice`
    ) VALUES (
        ?,?,?,?,?,?,?,?,?,?,?,?,?
        )";

    try{
        //準備執行
        $stmt=$pdo->prepare($sql);

        //執行$stmt，回傳陣列內容
        $stmt->execute([
            $_POST['camp_name'],
            implode("", $_POST['camp_address']),
            $_POST['camp_location'],
            $_POST['camp_tel'],
            $_POST['camp_fax'],
            $_POST['camp_email'],
            $_POST['camp_ownerName'],
            $_POST['camp_openTime'],
            $_POST['camp_target'],
            $_POST['camp_intro'],
            // $_POST['camp_detail'],
            // $_POST['camp_device'],
            // $_POST['camp_notice']

            ]);
        if ($stmt->rowCount()==1 ){
            if(empty($name) or empty($address) or empty($email)or empty($tel)){
                $success=true;
                $msg=[
                'type'=>'danger',
                'info'=>'資料輸入不完整'
            ];
            }else{
                $msg=[
                    'type'=>'success',
                    'info'=>'資料新增成功'
                   
                ];
            }
            
        }else{
            $msg=[
                'type'=>'danger',
                'info'=>'資料新增錯誤'
                
            ];
        }
    }catch( PDOException $ex){
        $msg=[
            'type'=>'danger',
            'info'=>'資料重複輸入'
        ];
    }           
    }
?>
<?php include __DIR__.'/__html_header.php'; ?>
<?php include __DIR__.'/__html_navbar01.php'; ?>
<style>
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
            <li class="breadcrumb-item active" aria-current="page">新增營地資料</li>
         </ol>
        </nav>
</aside>
<div class="container">

      <div class="card" style="border:none" >
        <div class="card-body">
            <h5 class="card-title text-center col-sm-10">新增營地資料
                <?php if (isset( $msg)):?>
                <div class="alert alert-<?= $msg['type'] ?>" role="alert">
                <?= $msg['info'] ?>
                </div>
                <?php endif ?>
                <span style="font-size:12px">*為必填欄位</span>
            </h5>
            <form name="form1" method="post" onsubmit="return checkForm()" >
            <input type="hidden" name="checkme" value="check123">
            <div class="form-group row">
                <label for="camp_name" class="col-sm-2 col-form-label text-right"><span>*</span>營區名稱</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder=""
                value="<?= $name ?>">
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
                value="<?= $location ?>">
                <small id="camp_locationHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_intro" class="col-sm-2 col-form-label text-right">簡介</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_intro" name="camp_intro" cols="30" rows="3"><?= $intro ?></textarea>
                <small id="camp_introHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <!-- <div class="form-group row">
                <label for="camp_detail" class="col-sm-2 col-form-label text-right">營地須知</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_detail" name="camp_detail" cols="30" rows="5"><?= $detail ?></textarea>
                <small id="camp_detailHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_notice" class="col-sm-2 col-form-label text-right">注意事項</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_notice" name="camp_notice" cols="30" rows="5"><?= $notice ?></textarea>
                <small id="camp_noticeHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_device" class="col-sm-2 col-form-label text-right">設備</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_device" name="camp_device" placeholder=""
                value="<?= $device ?>">
                <small id="camp_deviceHelp" class="form-text text-muted"></small>
                </div>
            </div> -->
            <div class="form-group row">
                <label for="camp_tel" class="col-sm-2 col-form-label text-right"><span>*</span>聯絡電話</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_tel" name="camp_tel" placeholder=""
                value="<?= $tel ?>">
                <small id="camp_telHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_fax" class="col-sm-2 col-form-label text-right">傳真</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_fax" name="camp_fax" placeholder=""
                value="<?=  $fax ?>">
                <small id="camp_faxHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_email" class="col-sm-2 col-form-label text-right"><span>*</span>電子郵件</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_email" name="camp_email" placeholder=""
                value="<?= $email ?>">
                <small id="camp_emailHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_ownerName" class="col-sm-2 col-form-label text-right">聯絡人</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="camp_ownerName" name="camp_ownerName" placeholder=""
                value="<?= $ownerName ?>">
                <small id="camp_ownerNameHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_openTime" class="col-sm-2 col-form-label text-right">開放時間</label>
                <div class="col-sm-6">
                <textarea class="form-control" id="camp_openTime" name="camp_openTime" cols="30" rows="3"><?= $openTime ?></textarea>
                <small id="camp_openTimeHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="camp_target" class="col-sm-2 col-form-label text-right">適合對象</label>
                <div class="col-sm-6">
                <select class="custom-select  col-sm-4 " name="camp_target" id="camp_target" value="<?= $target ?>"  >
                    <option value="">請選擇</option>
                    <option value="小家庭" <?php echo ($target=="小家庭") ?'selected':''?>>小家庭</option>
                    <option value="營火晚會" <?php echo ($target=="營火晚會") ?'selected':''?>>營火晚會</option>
                    <option value="大型派對" <?php echo ($target=="大型派對") ?'selected':''?>>大型派對</option>
                    <option value="工商團體" <?php echo ($target=="工商團體") ?'selected':''?>>工商團體</option>
            </select>
            </div>
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
            title: '資料新增錯誤',
            showConfirmButton: false,
            timer: 1500
        })
    }
/*
const fields=[
        'camp_name',    
        'camp_address',
        'camp_location',
        'camp_tel',
        'camp_fax',
        'camp_email',
        'camp_ownerName',
        'camp_openTime',
        'camp_target'
        'camp_intro'
    ];


//檢查表格內容是否填寫
const checkForm=()=>{
    let isPassed=true;
    

        let name = document.form1.camp_name.value;
        let tel = document.form1.camp_tel.value;
        let email = document.form1.camp_email.value;
    
    let email_pattern=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   
    let mobile_pattern=/^09\d{2}\-?\d{3}\-?\d{3}$/;

      for (let k in fields) {
            document.form1[fields[k]].style.borderColor = '#ccc';
            document.querySelector('#' + fields[k] + 'Help').innerHTML = '';
        }
        
        if (name.length < 2) {
            document.form1.name.style.borderColor = 'red';
            document.querySelector('#camp_nameHelp').innerHTML = '請輸入完整的名稱';
            isPassed = false;
        }
        if (!mobile_pattern.test(tel)) {
            document.form1.tel.style.borderColor = 'red';
            document.querySelector('#camp_telHelp').innerHTML = '請輸入完整的連絡電話';
            isPassed = false;
        }
        if (!email_pattern.test(email)) {
            document.form1.email.style.borderColor = 'red';
            document.querySelector('#camp_emailHelp').innerHTML = '請輸入完整的電子郵件';
            isPassed = false;
        } 

            return isPassed;
        };

        //地址
        
    });
    
</script>
*/
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