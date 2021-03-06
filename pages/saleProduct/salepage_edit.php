<?php
require '../../__connect_db.php';
$page_name = 'salepage_edit.php';
$salepage_id = isset($_GET['salepage_id']) ? intval($_GET['salepage_id']) : 0;
$sql = "SELECT * FROM `salepage` WHERE `salepage_id` = $salepage_id";

$stmt = $pdo->query($sql);
if ($stmt->rowCount() == 0) {
    header('Location: salepage_list.php');
    exit;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<style>
    .asterisk {
        color: red;
    }
</style>

<main class="col-10 bg-white ">
    <!--取消原本的改為麵包屑 -->
    <aside class="my-2">
        <nav class="bread" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="salepage_list.php">商品管理</a></li>
                <li class="breadcrumb-item bread_list"><a href="salepage_list.php">商品清單</a></li>
                <li class="breadcrumb-item active bread_list">修改商品</li>
            </ol>
        </nav>
    </aside>
    <!-- edit product -->
    <section class="">
        <div class="container">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <h5 class="card-title">修改商品資料</h5>
                </div>

                <form name="saleform" method="post" action="" onsubmit="return salecheckForm();">
                    <input type="hidden" name="checksale" value="checkcheck">
                    <input type="hidden" name="salepage_id" value="<?= $row['salepage_id'] ?>">
                    <!-- 商品分類 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_salecateid" class="col-sm-2 col-form-label">商品分類 <span class="asterisk"> *</span></label>
                        <div class="col-sm-6">
                            <select id="salepage_salecateid" name="salepage_salecateid" class="custom-select custom-select-sm ">
                                <option value="5" selected>請選擇</option>
                                <option value="1" <?php echo ($row['salepage_salecateid'] == 1) ? 'selected' : '' ?>>冷凍食品</option>
                                <option value="2" <?php echo ($row['salepage_salecateid'] == 2) ? 'selected' : '' ?>>冷藏食品</option>
                                <option value="3" <?php echo ($row['salepage_salecateid'] == 3) ? 'selected' : '' ?>>生鮮食材</option>
                                <option value="4" <?php echo ($row['salepage_salecateid'] == 4) ? 'selected' : '' ?>>素料理專區</option>
                            </select>
                        </div>
                        <br><br>
                    </div>
                    <!-- 商品品牌 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_salebrand" class="col-sm-2 col-form-label">商品品牌 <span class="asterisk"> *</span></label>
                        <div class="col-sm-6">
                            <select id="salepage_salebrand" name="salepage_salebrand" class="custom-select custom-select-sm">
                                <option value="5" selected>請選擇</option>
                                <option value="1" <?php echo ($row['salepage_salebrand'] == 1) ? 'selected' : '' ?>>桂冠</option>
                                <option value="2" <?php echo ($row['salepage_salebrand'] == 2) ? 'selected' : '' ?>>紅龍</option>
                                <option value="3" <?php echo ($row['salepage_salebrand'] == 3) ? 'selected' : '' ?>>七里香</option>
                                <option value="4" <?php echo ($row['salepage_salebrand'] == 4) ? 'selected' : '' ?>>西北</option>
                            </select>
                        </div>
                    </div>
                    <!-- 商品名稱 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_name" class="col-sm-2 col-form-label">商品名稱 <span class="asterisk"> *</span></label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="salepage_name" name="salepage_name" cols="10" rows="3" placeholder="" value=""><?= $row['salepage_name'] ?></textarea>
                            <small id="salepage_nameHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <!-- 商品數量 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_quility" class="col-sm-2 col-form-label">商品數量</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="salepage_quility" name="salepage_quility" placeholder="" value="<?= $row['salepage_quility'] ?>">
                            <small id="salepage_quilityHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <!-- 商品建議售價 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_suggestprice" class="col-sm-2 col-form-label">商品建議售價</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="salepage_suggestprice" name="salepage_suggestprice" placeholder="" value="<?= $row['salepage_suggestprice'] ?>">
                            <small id="salepage_suggestpriceHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <!-- 商品售價 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_price" class="col-sm-2 col-form-label">售價</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="salepage_price" name="salepage_price" placeholder="" value="<?= $row['salepage_price'] ?>">
                            <small id="salepage_priceHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <!-- 成本 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_cost" class="col-sm-2 col-form-label">成本</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="salepage_cost" name="salepage_cost" placeholder="" value="<?= $row['salepage_cost'] ?>">
                            <small id="salepage_costHelp" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <!-- 商品圖 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="saleimg" class="col-sm-2 col-form-label">商品圖</label>
                        <div class="col-sm-6">
                            <input type="hidden" id="salepage_image" name="salepage_image" value="<?= $row['salepage_image'] ?>">
                            <img id="myimg" src="<?= $row['salepage_image'] ?>" alt="" width="100px">
                            <input type="file" id="my_file" name="my_file">
                        </div>
                    </div>
                    <!-- 商品特色 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_feature" class="col-sm-2 col-form-label">商品特色</label>
                        <small id="salepage_featureHelp" class="form-text text-muted"></small>
                        <div class="col-sm-6">
                            <textarea class="form-control " id="salepage_feature" name="salepage_feature" cols="30" rows="3"><?= $row['salepage_feature'] ?></textarea><br>
                        </div>
                    </div>
                    <!-- 網站顯示設定 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_state" class="col-sm-2 col-form-label">網站顯示設定</label>
                        <div class="form-check form-check-inline col-sm-6">
                            <div>
                                <input class="form-check-input" type="radio" name="salepage_state" id="salepage_state" value=1 <?php echo ($row['salepage_state'] == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="salepage_state">顯示</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="salepage_state" id="salepage_state" value=0 <?php echo ($row['salepage_state'] == 0) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="salepage_state">不顯示</label>
                            </div>
                        </div>
                    </div>
                    <!-- 詳細說明 -->
                    <div class="form-group row d-flex justify-content-center">
                        <label for="salepage_proddetails" class="col-sm-2 col-form-label">詳細說明</label>
                        <small id="salepage_proddetailsHelp" class="form-text text-muted"></small>
                    </div>
                    <textarea class="form-control col-sm-8" id="salepage_proddetails" name="salepage_proddetails" cols="30" rows="3"><?= $row['salepage_proddetails'] ?></textarea><br>
                    <!-- 修改成功/失敗顯示info -->
                    <div id="saleinfo_bar" class="alert alert-success " role="alert" style="display:none; "></div>
                    <!-- 確定修改地按鈕 -->
                    <div class="form-group row after_sub text-center">
                        <div class="col-sm-12">
                            <input id="salesubmit_btn" type="submit" class="btn btn-primary" onClick="CKupdate()" value='確定修改'>
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

    // CKEditor
    CKEDITOR.replace('salepage_proddetails', {});

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
        'salepage_image'
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
            fetch('salepage_edit_api.php', {
                    method: 'POST',
                    body: saleform
                })
                .then(response => response.json())
                .then(obj => {
                    saleinfo_bar.style.display = 'block';

                    if (obj.success) {
                        saleinfo_bar.className = 'alert alert-success';
                        saleinfo_bar.innerHTML = '修改資料成功';
                        window.location.href = 'salepage_list.php';
                        //跳轉至list
                    } else {
                        saleinfo_bar.className = 'alert alert-danger';
                        saleinfo_bar.innerHTML = obj.errorMsg;
                    }

                    salesubmit_btn.style.display = 'block';
                    salesubmit_btn.style = 'btn-primary';
                }, 2000);
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