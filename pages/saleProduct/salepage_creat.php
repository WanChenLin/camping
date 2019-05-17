<?php
require '../../__connect_db.php';
$page_name = 'salepage_creat.php';
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<style>
    .asterisk {
        color: red;
    }
</style>

<!-- 麵包屑 -->
<main class="col-10 bg-white ">
    <aside class="my-2">
        <nav class="bread" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="salepage_list.php">商品管理</a></li>
                <li class="breadcrumb-item bread_list"><a href="salepage_list.php">商品清單</a></li>
                <li class="breadcrumb-item active bread_list">新增商品</li>
            </ol>
        </nav>
    </aside>

    <section class="">
        <div class="container">
            <div class="card-body">
                <!-- 標題 -->
                <div class="row d-flex justify-content-center">
                    <h5 class="card-title">新增商品</h5>
                </div>
                <form name="saleform" method="post" action="" onsubmit="return salecheckForm()">
                    <input type="hidden" name="checksale" value="checkcheck">
                    <!-- 商品分類 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_salecateid" class="col-sm-2 col-form-label"> 商品分類<span class="asterisk">*</span></label>
                        <div class="col-sm-6">
                            <select id="salepage_salecateid" name="salepage_salecateid" class="custom-select custom-select-sm">
                                <option value="0" selected>請選擇</option>
                                <option value="1">冷凍食品</option>
                                <option value="2">冷藏食品</option>
                                <option value="3">生鮮食材</option>
                                <option value="4">素料理專區</option>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <!-- 商品資訊 -->
                    <div class="row d-flex justify-content-center">
                        <h5>商品資訊</h5>
                    </div>
                    <!-- 商品品牌 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_salebrand" class="col-sm-2 col-form-label">商品品牌<span class="asterisk">*</span></label>
                        <div class="col-sm-6">
                            <select id="salepage_salebrand" name="salepage_salebrand" class="custom-select custom-select-sm">
                                <option value="" selected>請選擇</option>
                                <option value="1">桂冠</option>
                                <option value="2">紅龍</option>
                                <option value="3">七里香</option>
                                <option value="4">西北</option>
                            </select>
                        </div>
                    </div>
                    <!-- 商品名稱 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_name" class="col-sm-2 col-form-label">商品名稱<span class="asterisk">*</span></label>
                        <div class="col-sm-6">
                            <small id="salepage_nameHelp" class="form-text text-muted">最多100字</small>
                            <textarea class="form-control" id="salepage_name" name="salepage_name" cols="30" rows="3"></textarea><br>
                        </div>
                    </div>
                    <!-- 商品數量 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_quility" class="col-sm-2 col-form-label">商品數量</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="salepage_quility" name="salepage_quility" placeholder="" value="">
                            <small id="salepage_quilityHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <!-- Todo 多張上傳 -->
                    <!-- 上傳商品圖 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="saleimg" class="col-sm-2 col-form-label">商品圖</label>
                        <div class="col-sm-6">
                            <input type="hidden" id="salepage_image" name="salepage_image" value="">
                            <img id="myimg" src="" alt="" width="100px">
                            <input type="file" id="my_file" name="my_file">
                        </div>
                    </div>
                    <!-- 建議售價 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_suggestprice" class="col-sm-2 col-form-label">建議售價</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="salepage_suggestprice" name="salepage_suggestprice" placeholder="" value="">
                            <small id="salepage_suggestpriceHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <!-- 售價 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_price" class="col-sm-2 col-form-label">售價<span class="asterisk">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="salepage_price" name="salepage_price" placeholder="" value="">
                            <small id="salepage_priceHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <!-- 成本 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_cost" class="col-sm-2 col-form-label">成本</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="salepage_cost" name="salepage_cost" placeholder="" value="">
                            <small id="salepage_costHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <!-- 網站顯示設定 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_state" class="col-sm-2 col-form-label">網站顯示設定</label>
                        <div class="col-sm-6 col-form-label">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="salepage_state" id="salepage_state" value=1 checked="checked">
                                <label class="form-check-label" for="salepage_state">顯示</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="salepage_state" id="salepage_state" value=0>
                                <label class="form-check-label" for="salepage_state">不顯示</label>
                            </div>
                        </div>
                    </div>
                    <!-- 商品特色 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_feature" class="col-sm-2 col-form-label">商品特色</label>
                        <div class="col-sm-6">
                            <small id="salepage_featurelsHelp" class="form-text text-muted"></small>
                            <textarea class="form-control" id="salepage_feature" name="salepage_feature" cols="30" rows="3"></textarea><br>
                        </div>
                    </div>
                    <!-- 詳細說明 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_proddetails" class="col-sm-2 col-form-label">詳細說明</label>
                    </div>
                    <div>
                        <small id="salepage_proddetailsHelp" class="form-text text-muted"></small>
                        <textarea class="form-control col-sm-8" id="salepage_proddetails" name="salepage_proddetails" cols="30" rows="3"></textarea><br>
                        <!--因為ckeditor編輯後無法從下面的submit送出 加上function  -->
                    </div>

                    <!-- 新增成功/失敗顯示info -->
                    <div id="saleinfo_bar" class="alert alert-success " role="alert" style="display:none; "></div>
                    <!-- 確認紐   -->
                    <div class="form-group row after_sub text-center">
                        <div class="col-sm-12">
                            <input id="salesubmit_btn" type="submit" class="btn btn-primary" onClick="CKupdate()" value='確定新增'>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<script>
    const saleinfo_bar = document.querySelector('#saleinfo_bar');
    const salesubmit_btn = document.querySelector('#salesubmit_btn');
    const myimg = document.querySelector('#myimg');
    const my_file = document.querySelector('#my_file');
    const salepage_image = document.querySelector('#salepage_image');

    CKEDITOR.replace('salepage_proddetails', {});
    // CKEDITOR.replace('salepage_proddetails');
    // CKFinder.setupCKEditor();

    function CKupdate() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
    }

    const salefields = [
        'salepage_name',
        'salepage_suggestprice',
        'salepage_price',
        'salepage_cost',
        'salepage_feature',
        'salepage_state',
        'salepage_proddetails',
        'salepage_salecateid',
        'salepage_image',
        'salepage_salebrand'
    ];

    const salefs = {};
    for (let v of salefields) {
        salefs[v] = document.saleform[v];
    }

    const salecheckForm = () => {
        let isPassed = true;
        saleinfo_bar.style.display = 'none';

        // 拿到每個欄位的值
        const salefsv = {};
        for (let v of salefields) {
            salefsv[v] = salefs[v].value;
        }

        if (isPassed) {
            let saleform = new FormData(document.saleform);
            salesubmit_btn.style.display = 'none';
            fetch('salepage_creat_api.php', {
                    method: 'POST',
                    body: saleform,
                })
                .then(response => response.json())
                .then(obj => {
                    saleinfo_bar.style.display = 'block';

                    if (obj.success) {
                        saleinfo_bar.className = 'alert alert-success';
                        saleinfo_bar.innerHTML = '資料新增成功';
                        window.location.href = 'salepage_list.php';
                        //跳轉至list    
                    } else {
                        saleinfo_bar.className = 'alert alert-danger';
                        saleinfo_bar.innerHTML = obj.errorMsg;
                    }

                    salesubmit_btn.style.display = 'block';
                    salesubmit_btn.style = 'btn-primary';
                    //因為按下btn後位置會跑掉，所以要加上面這一行固定原來的位置
                }, 2000)
        }
        return false;
    };

    my_file.addEventListener('change', event => {

        const fd = new FormData();
        fd.append('my_file', my_file.files[0]);

        fetch('sale_picture_api.php', {
                method: 'POST',
                body: fd
            })
            .then(response => response.json())
            .then(obj => {
                // 設定img屬性
                myimg.setAttribute('src', 'sale_pictures/' + obj.filename);
                salepage_image.setAttribute('value', 'sale_pictures/' + obj.filename);
            })
    })
</script>

<?php include '../../__index_foot.php'; ?>