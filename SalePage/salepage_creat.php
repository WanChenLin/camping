<?php
require __DIR__.'/__salepage_connect_db.php';
$page_name = 'salepage_creat.php';
?>
<?php include __DIR__.'/__html_dbhead.php';?>
<?php include __DIR__.'/__html_dbheader.php';?>
<?php include __DIR__.'/__html_dbnavbar.php';?>
<style>


</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12"> 
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">新增商品</h3>

                    <div id="saleinfo_bar" class="alert alert-success" role="alert" style="display: none"></div>

                    <form name="saleform" method="post" action="" onsubmit="return salecheckForm()"> 
                        <input type="hidden" name="checksale" value="checkcheck">

                        <label for="salepage_salecateid" >*商品分類</label>
                        <select id="salepage_salecateid" name="salepage_salecateid" class="custom-select custom-select-sm col-sm-4 ">
                            <option value="0" selected>請選擇</option>
                            <option value="1">冷凍食品</option>
                            <option value="2">冷藏食品</option>
                            <option value="3">生鮮食材</option>
                            <option value="4">素料理專區</option>
                        </select>
                        
                        <br>
                        <br>

                        <h5>商品資訊</h5>
                        <div class="form-group">
                            <label for="salepage_name">*商品名稱</label>
                            <small id="salepage_nameHelp" class="form-text text-muted">最多100字</small>
                            <textarea class="form-control" id="salepage_name" name="salepage_name" cols="30" rows="3"></textarea><br>
                        </div>


                        <div class="form-group row">
                            <label for="saleimg" class="col-sm-2 col-form-label">商品圖</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="salepage_image" name="salepage_image" value="">
                                <img id="myimg" src="" alt="" width="100px">
                                <!-- <p class="product_upload d-inline" id="err"></p> -->
                                <input type="file" id="my_file" name="my_file">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="salepage_suggestprice" class="col-sm-2 col-form-label">建議售價</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" id="salepage_suggestprice" name="salepage_suggestprice" placeholder=""
                                   value="" >
                                   <small id="salepage_suggestpriceHelp" class="form-text text-muted"></small>       
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salepage_price" class="col-sm-2 col-form-label">* 售價</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" id="salepage_price" name="salepage_price" placeholder=""
                                   value="">
                                   <small id="salepage_priceHelp" class="form-text text-muted"></small>     
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salepage_cost" class="col-sm-2 col-form-label">成本</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" id="salepage_cost" name="salepage_cost" placeholder=""
                                   value="">
                            <small id="salepage_costHelp" class="form-text text-muted"></small>     
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="salepage_state">網站顯示設定</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="salepage_state" id="salepage_state" value=1 checked="checked">
                                <label class="form-check-label" for="salepage_state">顯示</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="salepage_state" id="salepage_state" value=0>
                                <label class="form-check-label" for="salepage_state">不顯示</label>
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="salepage_feature">商品特色</label>
                            <small id="salepage_featurelsHelp" class="form-text text-muted"></small>
                            <textarea class="form-control" id="salepage_feature" name="salepage_feature" cols="30" rows="3"></textarea><br>
                        </div>

                        <div class="form-group">
                            <label for="salepage_proddetails">詳細說明</label>
                            <small id="salepage_proddetailsHelp" class="form-text text-muted"></small>
                            <textarea class="form-control" id="salepage_proddetails" name="salepage_proddetails" cols="30" rows="3" ></textarea><br>
                            <!-- <script>
                                CKFinder.setupCKEditor();
                                CKEDITOR.replace('salepage_proddetails');
                                function CKupdate()
                                {
                                    for(instance in CKEDITOR.instances)
                                    {
                                        CKEDITOR.instances[instance].updateElement();
                                    }
                                }
                            </script> -->
                             <!--因為ckeditor編輯後無法從下面的submit送出 加上function  -->
                        </div>
                        

                        <div class="form-group row after_sub text-center">
                            <div class="col-sm-12">
                                <!-- <input id="salesubmit_btn" type="submit" class="btn btn-primary" onClick="CKupdate()" value='確定新增'> -->
                                <input id="salesubmit_btn" type="submit" class="btn btn-primary" value='確定新增'>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

</div>
</div>
</div>


<script>
    const saleinfo_bar = document.querySelector('#saleinfo_bar');
    const salesubmit_btn = document.querySelector('#salesubmit_btn');

    const myimg = document.querySelector('#myimg');
    const my_file = document.querySelector('#my_file');
    const salepage_image = document.querySelector('#salepage_image');
    
    // CKEDITOR.replace( 'salepage_proddetails', {});

    const salefields = [
        'salepage_name',
        'salepage_suggestprice',
        'salepage_price',
        'salepage_cost',
        'salepage_feature',
        'salepage_state',
        'salepage_proddetails',
        'salepage_salecateid',
        'salepage_image'      
    ];

    const salefs = {}; 
    for(let v of salefields){
        salefs[v] = document.saleform[v];
    }    

    const salecheckForm = ()=>{
        let isPassed = true;
        saleinfo_bar.style.display = 'none';

        // 拿到每個欄位的值
        const salefsv = {};
        for(let v of salefields){
            salefsv[v] = salefs[v].value;
        }        
        
        console.log(salefsv);

        if(isPassed) {
            let saleform = new FormData(document.saleform);
            salesubmit_btn.style.display = 'none';
            console.log(saleform);
            fetch('salepage_creat_api.php', {
                method: 'POST',
                body: saleform,                
            })
                .then(response=>response.json())
                .then(obj=>{
                    console.log(obj);

                    saleinfo_bar.style.display = 'block';

                    if(obj.success){
                        saleinfo_bar.className = 'alert alert-success';
                        saleinfo_bar.innerHTML = '資料新增成功';
                    } else {
                        saleinfo_bar.className = 'alert alert-danger';
                        saleinfo_bar.innerHTML = obj.errorMsg;
                    }

                    salesubmit_btn.style.display = 'block';
                })
        }
        return false;
    };

    my_file.addEventListener('change', event=>{
        
        const fd = new FormData();
        fd.append('my_file', my_file.files[0]);

        fetch('sale_picture_api.php', {
            method: 'POST',
            body: fd
        })
        .then(response => response.json())
        .then(obj => {
            console.log(obj);
            // 設定img屬性
            myimg.setAttribute('src', 'sale_pictures/' + obj.filename); 
            salepage_image.setAttribute('value', 'sale_pictures/' + obj.filename); 
        })
    })
</script>
    
<?php include __DIR__.'/__html_dbfoot.php';?>