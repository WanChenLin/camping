<?php
require '../../__connect_db.php';

try {
  $campsite_sql = 'SELECT  * FROM campsite_list';
  $stmt = $pdo->query($campsite_sql);
  $campsite_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
  echo $ex->getMessage();
}
try {
  $coupon_sql = "SELECT * FROM coupon_genre";
  $coupon_stmt = $pdo->query($coupon_sql);
  $coupon_rows = $coupon_stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
  echo $ex->getMessage();
}

try {
  $member_sql = "SELECT * FROM member_list";
  $member_stmt = $pdo->query($member_sql);
  $member_rows = $member_stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
  echo $ex->getMessage();
}

$promo_apply_id = isset($_GET['promo_apply_id']) ? intval($_GET['promo_apply_id']) : 0;
$sql = "SELECT * FROM promo_apply as o LEFT OUTER JOIN campsite_list as p on o.camp_id = p.camp_id  WHERE promo_apply_id=$promo_apply_id";

$stmt = $pdo->query($sql);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php include '../../__index_head.php'; ?>

<style>
    .white {
      color: white;
    }

    .dark {
      color: #4b4b4b;
    }

    .box {
      width: 150px;
      height: 150px;
      margin: 10px;
    }

    .asterisk {
      color: red;
    }
  </style>
  
  <header class="bg-dark">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-6 mt-2">
          <h1 class=" text-white text-center">
            GO CAMPING 後台
          </h1>
        </div>
      </div>
    </div>
  </header>

  <div class="bg-white py-3">
    <div class="container-fluid">
      <div class="row d-flex">
        <nav class="col-2">
          <div class="accordion" id="accordionExample">

            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    會員
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <a class="card-body ml-2 d-flex" href="..\member\member_list.php">
                  會員清單
                </a>
                <a class="card-body ml-2 d-flex" href="#">
                  會員等級
                </a>
                <a class="card-body ml-2 d-flex" href="#">
                  收藏管理
                </a>
                <a class="card-body ml-2 d-flex" href="#">
                  勳章管理
                </a>
                <a class="card-body ml-2 d-flex" href="#">
                  活動管理
                </a>
                <a class="card-body ml-2 d-flex" href="#">
                  訂單管理
                </a>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    主題活動
                  </button>
                </h2>
              </div>

              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <a class="card-body ml-2 d-flex" href="..\event\event_insert.php">
                  新增活動
                </a>
                <a class="card-body ml-2 d-flex" href="..\event\event_list.php">
                  活動列表
                </a>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    分享樂
                  </button>
                </h2>
              </div>

              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <a class="card-body ml-2 d-flex" href="..\share_fun\post_list.php">
                  新手指南
                </a>
                <a class="card-body ml-2 d-flex" href="#">
                  達人帶路
                </a>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    商品管理
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <a class="card-body ml-2 d-flex" href="../SalePage/salepage_list.php">
                  商品清單
                </a>
                <a class="card-body ml-2 d-flex" href="../SalePage/salepage_creat.php">
                  建立商品頁
                </a>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    營地主
                  </button>
                </h2>
              </div>

              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <a class="card-body ml-2 d-flex" href="">
                  營地列表
                </a>
                <a class="card-body ml-2 d-flex" href="../host_menu.php">
                  營地主管理
                </a>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="headingSix">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                    行銷
                  </button>
                </h2>
              </div>

              <div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#accordionExample">
                <a class="card-body ml-2 d-flex" href="promo_list.php">
                  優惠方案管理
                </a>
                <a class="card-body ml-2 d-flex" href="promo_apply_list.php">
                  優惠方案參加紀錄管理
                </a>
                <a class="card-body ml-2 d-flex" href="coupon_genre_list.php">
                  優惠券管理
                </a>
                <a class="card-body ml-2 d-flex" href="coupon_gain_list.php">
                  優惠券獲取紀錄管理
                </a>
              </div>
            </div>

          </div>
        </nav>
        <main class="col-10 bg-white">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./promo_apply_list.php">優惠活動參加紀錄查詢</a></li>
              <li class="breadcrumb-item active">優惠活動參加紀錄編輯</li>
            </ol>
          </nav>
          <section class="" style="height: 100%;">

            <!-- submit result message -->
            <div id="info_bar" style="display: none" class="alert alert-success"></div>

            <div class="container">
              <div class="card-body">

                <div class="row d-flex justify-content-center">
                  <div class="col-sm-8">
                    <h5 class="card-title text-center">優惠活動參加紀錄編輯</h5>
                  </div>
                </div>

                <form method="POST" name="promo_apply_insert_form" onsubmit="return sendForm()">

                  <input type="hidden" class="form-control" readonly name="promo_apply_id" value="<?= $row['promo_apply_id'] ?>">
                  <div class="form-group justify-content-center row">
                    <label class="col-2 text-right">營地</label>
                    <div class="col-6">
                      <input type="text" class="form-control" readonly value="<?= $row['camp_name'] ?>">
                    </div>
                  </div>
                  <div class="form-group justify-content-center row">
                    <label class="col-2 text-right"><span class="asterisk"> *</span>優惠類別</label>
                    <div class="col-6">
                      <select class="form-control" name="promo_type" id="promo_type">
                        <option <?= $row['promo_type'] == "promo_user" ? "selected" : ""; ?> value="promo_user">會員優惠
                        </option>
                        <option <?= $row['promo_type'] == "promo_campType" ? "selected" : ""; ?> value="promo_campType">營地分類優惠
                        </option>
                        <option <?= $row['promo_type'] == "promo_price" ? "selected" : ""; ?> value="promo_price">滿額優惠</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group justify-content-center row">
                    <label class="col-2 text-right"><span class="asterisk"> *</span>啟用狀態</label>
                    <div class="col-6">
                      <select class="form-control" name="apply_valid" id="apply_valid">
                        <option value="1">啟用</option>
                        <option value="2">關閉</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group justify-content-center row  text-center">
                    <div class="col-sm-8">
                      <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                    </div>
                  </div>

                </form>

              </div>
            </div>

            <!-- DataTables -->
            <link rel="stylesheet" type="text/css" href="./DataTables/datatables.css" />
            <link rel="stylesheet" href="./DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css">
            <script type="text/javascript" src="./DataTables/datatables.js"></script>
            <script src="./DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
            <script src="./DataTables/Buttons-1.5.6/js/buttons.print.js"></script>
            <!-- Tiny Nice Confirmation -->
            <link rel="stylesheet" href="./css/H-confirm-alert.css">
            <script src="./js/H-confirm-alert.js"></script>

            <script>
              const info_bar = document.getElementById('info_bar')

              function sendForm(e) {
                const form = new FormData(promo_apply_insert_form);
                console.log(form)
                $('#submit_btn').attr('disabled', true);
                fetch('promo_apply_edit_api.php', {
                    method: 'POST',
                    body: form
                  })
                  .then(response => response.json())
                  .then(obj => {

                    console.log(obj);

                    info_bar.style.display = 'block';

                    if (obj.success) {
                      info_bar.className = 'alert alert-success';
                      info_bar.innerHTML = '資料修改成功';
                    } else {
                      info_bar.className = 'alert alert-danger';
                      info_bar.innerHTML = obj.errorMsg;
                    }
                    setTimeout(function() {
                      info_bar.style.display = 'none';
                    }, 3000);

                    $('#submit_btn').attr('disabled', false);
                  });
                return false;
              }
            </script>

          </section>

        </main>

      </div>
    </div>
  </div>
</body>

</html>