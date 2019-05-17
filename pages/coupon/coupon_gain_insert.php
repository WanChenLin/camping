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
?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>

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

<?php include '../../__index_navbar.php'; ?>

<main class="col-10 bg-white">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./coupon_gain_list.php">優惠券獲取紀錄查詢</a></li>
      <li class="breadcrumb-item active">新增優惠券獲取紀錄</li>
    </ol>
  </nav>
  <section class="" style="height: 100%;">
    <!-- submit result message -->
    <div id="info_bar" style="display: none" class="alert alert-success"></div>
    <div class="container">
      <div class="card-body">

        <div class="row d-flex justify-content-center">
          <div class="col-sm-8">
            <h5 class="card-title text-center">新增coupon獲取紀錄</h5>
          </div>
        </div>
        <form method="POST" name="coupon_form" onsubmit="return sendForm()">

          <div class="form-group justify-content-center row">
            <label class="col-2 text-right"><span class="asterisk"> *</span>新增筆數</label>
            <div class="col-6">
              <input type="text" class="form-control" name="insert_record_amount" placeholder="輸入欲新增紀錄筆數">
              <small class="form-text text-muted"></small>
            </div>
          </div>
          <div class="form-group justify-content-center row">
            <label class="col-2 text-right"><span class="asterisk"> *</span>coupon種類</label>
            <div class="col-6">
              <select class="form-control" name="coupon_genre" id="coupon_genre">
                <?php foreach ($coupon_rows as $coupon) : ?>
                  <option value="<?= $coupon['coupon_genre_id'] ?>">
                    <?= $coupon['coupon_name'] ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group justify-content-center row">
            <label class="col-2 text-right"><span class="asterisk"> *</span>使用者</label>
            <div class="col-6">
              <select class="form-control" name="mem_account" id="mem_account">
                <?php foreach ($member_rows as $member) : ?>
                  <option value="<?= $member['mem_account'] ?>">
                    <?= $member['mem_account'] ?>
                  </option>
                <?php endforeach ?>
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
    <!-- ui toggle -->
    <link rel="stylesheet" href="./css/ui-toggle.css">
    <link rel="stylesheet" href="./css/bootstrap-toggle.min.css">
    <script src="./js/bootstrap-toggle.min.js"></script>
    <script src="./js/jquery.toggler.js"></script>

    <script>
      const info_bar = document.getElementById('info_bar')

      function sendForm(e) {
        const form = new FormData(coupon_form);
        console.log(form)
        $('#submit_btn').attr('disabled', true);
        fetch('coupon_gain_insert_api.php', {
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