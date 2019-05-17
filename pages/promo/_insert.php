<?php require '../../__connect_db.php';

if (isset($_GET['planType'])) {
  $playType = $_GET['planType'];
}

$mem_sql = "SELECT * FROM member_level";
$mem_stmt = $pdo->query($mem_sql);
$mem_rows = $mem_stmt->fetchAll(PDO::FETCH_ASSOC);

$camp_type_sql = "SELECT * FROM campsite_type";
$camp_type_stmt = $pdo->query($camp_type_sql);
$camp_type_rows = $camp_type_stmt->fetchAll(PDO::FETCH_ASSOC);

$dis_type_sql = "SELECT * FROM dis_type";
$dis_type_stmt = $pdo->query($dis_type_sql);
$dis_type_rows = $dis_type_stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="./DataTables/datatables.css" />
  <link rel="stylesheet" href="./DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="./css/H-confirm-alert.css">
  <link rel="stylesheet" href="./css/bootstrap-toggle.min.css">
  <link rel="stylesheet" href="./css/ui-toggle.css">
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="./DataTables/datatables.js"></script>
  <script src="./DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="./DataTables/Buttons-1.5.6/js/buttons.print.js"></script>
  <script src="./js/cleave.js"></script>
  <script src="./js/bootstrap.bundle.js"></script>
  <script src="./js/H-confirm-alert.js"></script>
  <script src="./js/bootstrap-toggle.min.js"></script>
  <script src="./js/jquery.toggler.js"></script>
  <title>Document</title>
  <style>
    body {
      font-family: Arial, "微軟正黑體";
    }

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

</head>

<body>

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
        <main class="col-10 bg-white">

          <aside class="my-2">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link" href="./_plan_list.php">查詢促銷方案</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./_insert.php">新增促銷方案</a>
              </li>
            </ul>
          </aside>

          <section class="container-fluid" style="height: 100%;">

            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="">
                    <!-- submit result message -->
                    <div class="alert alert-success" role="alert" style="display: none;" id="info_bar"></div>

                    <div class="card-body">
                      <div class="row d-flex justify-content-center">
                        <div class="col-sm-8">
                          <h5 class="card-title text-center">新增促銷方案</h5>
                        </div>
                      </div>
                      <form method="POST" name="addPromoForm" id="addPromoForm" onsubmit="return sendForm()">

                        <div class="form-group justify-content-center row">
                          <label class="col-2 text-right"><span class="asterisk"> *</span>促銷類型</label>
                          <select class="col-6 form-control" name="planType" id="planType_field">
                            <option value="">---請選擇方案類型---</option>
                            <option value="user_plan" <?php if (isset($playType)) {
                                                        echo $playType == "user_plan" ? 'selected' : "";
                                                      }
                                                      ?>>
                              使用者促銷
                            </option>
                            <option value="price_plan" <?php if (isset($playType)) {
                                                          echo $playType == "price_plan" ? 'selected' : "";
                                                        }
                                                        ?>>
                              價格促銷
                            </option>
                            <option value="prod_plan" <?php if (isset($playType)) {
                                                        echo $playType == "prod_plan" ? 'selected' : "";
                                                      }
                                                      ?>>產品促銷
                            </option>
                            <option value="amount_plan" <?php if (isset($playType)) {
                                                          echo $playType == "amount_plan" ? 'selected' : "";
                                                        }
                                                        ?>>
                              商品數量促銷
                            </option>
                          </select>
                          <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group justify-content-center row">
                          <label class="col-2 text-right" for="name"><span class="asterisk"> *</span>方案名稱</label>
                          <input type="text" class="col-6 form-control" id="name" name="name" placeholder="" value="">
                          <small id="" class="form-text text-muted"></small>
                        </div>
                        <?php if (isset($playType)) : ?>
                          <?php if ($playType == 'user_plan') : ?>
                            <div class="form-group justify-content-center row">
                              <label class="col-2 text-right"><span class="asterisk"> *</span>適用條件</label>
                              <select class="col-6 form-control" name="condi">
                                <?php foreach ($mem_rows as $mem_row) : ?>
                                  <option value="<?= $mem_row['mem_level'] ?>"><?= $mem_row['level_title'] ?></option>
                                <?php endforeach; ?>
                              </select>
                              <small id="" class="form-text text-muted"></small>
                            </div>
                          <?php elseif ($playType == 'price_plan') : ?>
                            <div class="form-group justify-content-center row">
                              <label class="col-2 text-right"><span class="asterisk"> *</span>訂單價格條件</label>
                              <input class="col-6 form-control" type="text" value="" name="condi" placeholder="請輸入訂單價格條件">
                              <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                          <?php elseif ($playType == 'prod_plan') : ?>
                            <div class="form-group justify-content-center row">
                              <label class="col-2 text-right"><span class="asterisk"> *</span>營地類型</label>
                              <select class="col-6 form-control" name="condi">
                                <?php foreach ($camp_type_rows as $camp_type_row) : ?>
                                  <option value="<?= $camp_type_row['campType_id'] ?>"><?= $camp_type_row['campType_name'] ?></option>
                                <?php endforeach; ?>
                              </select>
                              <small id="" class="form-text text-muted"></small>
                            </div>
                          <?php elseif ($playType == 'amount_plan') : ?>
                            <div class="form-group justify-content-center row">
                              <label class="col-2 text-right"><span class="asterisk"> *</span>訂單數量條件</label>
                              <input class="col-6 form-control" type="text" value="" name="condi" placeholder="請輸入訂單數量條件">
                              <small id="" class="form-text text-muted"></small>
                            </div>
                          <?php endif; ?>
                        <?php endif; ?>
                        <div class="form-group justify-content-center row">
                          <label class="col-2 text-right"><span class="asterisk"> *</span>折扣數值</label>
                          <input type="text" class="col-6 form-control " name="dis_num" placeholder="輸入折扣數值" value="">
                          <small id="" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group justify-content-center row">
                          <label class="col-2 text-right" for="address"><span class="asterisk"> *</span>折扣類型</label>
                          <select class="col-6 form-control" name="dis_type">
                            <?php foreach ($dis_type_rows as $dis_type_row) : ?>
                              <option value="<?= $dis_type_row['id'] ?>"><?= $dis_type_row['dis_type'] ?></option>
                            <?php endforeach; ?>
                          </select>
                          <small id="" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group justify-content-center row">
                          <label class="col-2 text-right" for="address"><span class="asterisk"> *</span>開始時間</label>
                          <input class="col-6 form-control" type="date" id="start" name="start" value="" min="2018-01-01" max="2020-12-31">
                          <small id="addressHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group justify-content-center row">
                          <label class="col-2 text-right" for="address"><span class="asterisk"> *</span>結束時間</label>
                          <input class="col-6 form-control" type="date" id="end" name="end" value="" min="2018-01-01" max="2020-12-31">
                          <small id="" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group justify-content-center row  text-center">
                          <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                          </div>
                        </div>

                      </form>
                    </div>

                  </div>
                </div>
              </div>
            </div>


            <script>
              // //obtain plan type input field reference
              const planType_field = document.getElementById('planType_field');
              planType_field.addEventListener('change', sendPlanType);

              function sendPlanType() {
                let planTypeInput = new FormData();
                planTypeInput.append('planType', planType_field.value);
                fetch('_switchForm_api.php', {
                    method: 'POST',
                    body: planTypeInput
                  })
                  .then(response => response.json())
                  .then(data => {
                    console.log(data);
                    window.location.href = '_insert.php?planType=' + data;
                  })
              }

              const submit_btn = document.getElementById('submit_btn');
              const info_bar = document.getElementById('info_bar');
              const addPromoForm = document.getElementById('addPromoForm');

              function sendForm(e) {
                const form = new FormData(addPromoForm);
                submit_btn.style.display = 'none';
                fetch('_insert_api.php', {
                    method: 'POST',
                    body: form
                  })
                  .then(response => response.json())
                  .then(obj => {
                    info_bar.style.display = 'block';

                    if (obj.success) {
                      info_bar.className = 'alert alert-success';
                      info_bar.innerHTML = '資料新增成功';
                    } else {
                      info_bar.className = 'alert alert-danger';
                      info_bar.innerHTML = obj.errorMsg;
                    }

                    submit_btn.style.display = 'block';
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