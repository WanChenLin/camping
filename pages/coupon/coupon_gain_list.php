<?php
include '../../__connect_db.php';

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
      <li class="breadcrumb-item active"><a href="#">優惠券獲取紀錄查詢</a></li>
    </ol>
  </nav>
  <section class="container-fluid" style="height: 100%;">
    <div class="row py-2">
      <div class="col-md-10">
        <div class="alert alert-success" role="alert" style="display: none;" id="info_bar"></div>
      </div>
      <div class="col-md-2">
        <div class="">
          <select class="form-control" id="fetch_option_valid">
            <option class="dropdown-item">列出所有紀錄</option>
            <option class="dropdown-item" data-sql="WHERE `coupon_valid`='1'">列出有效優惠券</option>
            <option class="dropdown-item" data-sql="WHERE `coupon_valid`='2'">列出無效優惠券</option>
            <option class="dropdown-item" data-sql="WHERE `coupon_valid`='3'">列出已使用優惠券</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 table-responsive">
        <table id="coupon_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">紀錄編號</th>
              <th scope="col">優惠券編號</th>
              <th scope="col">優惠碼</th>
              <th scope="col">取得日期</th>
              <th scope="col">有效狀態</th>
              <th scope="col">使用者帳號</th>
              <th scope="col">操作</th>
              <!-- <th scope="col"><input type="checkbox" id="checkAll"></th> -->
            </tr>
          </thead>
          <tbody id="coupon_output">
          </tbody>
        </table>
      </div>
    </div>
    <div class="modal fade" id="multi_switch_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">多筆資料操作</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group justify-content-center row">
                <label class="col-auto text-right">將已選取紀錄設為</label>
                <div class="">
                  <input id='multi_switch' type='checkbox'>
                  <small class="form-text text-muted"></small>
                </div>
              </div>
            </form>
          </div>
        </div>
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
      function sendForm(e) {
        return false;
        const form = new FormData(insert_record_form);

        $('#submit_btn').attr('disabled', true);
        fetch('coupon_genre_insert_api.php', {
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

      $(function() {

        function fetch_coupon(sql) {
          $('#coupon_table').DataTable({
            language: {
              searchPlaceholder: "輸入優惠券編號或帳號"
            },
            drawCallback: function() {
              let checkCount = $("tbody .checkbox_manipulation :checkbox").length
              let checkedCount = $("tbody .checkbox_manipulation :checked").length
              $("#checkAll").click(function() {
                let checkAll = $("#checkAll").prop("checked");
                $("tbody :checkbox").prop("checked", checkAll);
              })

              $(".checkbox_manipulation :checkbox").click(function() {
                checkedCount = $("tbody .checkbox_manipulation :checked").length
                if (checkCount == checkedCount) {
                  $("#checkAll").prop("checked", true)
                } else {
                  $("#checkAll").prop("checked", false)

                }
              })

              $('.switch').checkToggler({
                labelOn: "啟用",
                labelOff: "關閉"
              }).on('change', function() {
                let coupon_record_id = $(this).data('coupon_record_id')
                let coupon_valid = 0
                if ($(this).prop('checked')) {
                  coupon_valid = 1
                } else {
                  coupon_valid = 2
                }
                const formData = new FormData()
                formData.append('coupon_record_id', coupon_record_id)
                formData.append('coupon_valid', coupon_valid)

                fetch('coupon_gain_edit_api.php', {
                  method: 'POST',
                  body: formData
                }).then(obj => obj.json()).then(result => {
                  $('#coupon_table').DataTable().destroy()
                  fetch_coupon()
                })
              });
            },
            dom: 'lf<"#pagi-wrap.d-flex"<"mr-auto"B>p>t<"mt-3">',
            buttons: [{
              className: 'btn btn-primary ',
              attr: {
                id: 'coupon_gain_insert_btn'
              },
              text: '新增coupon獲取紀錄',
              action: function() {
                window.location = './coupon_gain_insert.php'
              },
            }, ],
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
              url: "coupon_gain_list_api.php",
              type: "POST",
              data: {
                valid_condition: sql
              }
            },
            "columnDefs": [{
              "targets": [6],
              "data": "gain_record_id",
              "render": function(data, type, row, meta) {
                let render = '';
                switch (row.coupon_valid) {
                  case '1':
                    render = '<input data-coupon_record_id=' + data +
                      ' class="switch" type="checkbox" checked>';
                    break;
                  case '2':
                    render = '<input data-coupon_record_id=' + data +
                      ' class="switch" type="checkbox">';
                    break;
                  case '3':
                    render = '';
                    break
                }
                return render;
              }
            }, ],
            "columns": [{
                "data": "gain_record_id"
              },
              {
                "data": "coupon_genre_id"
              },
              {
                "data": "coupon_code"
              },
              {
                "data": "gain_date",
                "className": "text-truncate"
              },
              {
                "data": "coupon_valid",
                "render": function(data) {
                  let display = ''
                  if (data == 1) {
                    display = '啟用';
                  } else if (data == 2) {
                    display = '關閉'
                  } else if (data == 3) {
                    display = '已使用'
                  }
                  return display;
                }
              },
              {
                "data": "mem_account",
              }
            ],

          })
        }
        fetch_coupon()
        $('#fetch_option_valid').change(function() {
          let sql = $("#fetch_option_valid option:selected").data('sql')
          $('#coupon_table').DataTable().destroy();
          fetch_coupon(sql)
        })

        $('#multi_switch').checkToggler({
          labelOn: "啟用",
          labelOff: "關閉"
        })

        const info_bar = $("#info_bar");
      });
    </script>

  </section>

</main>

</div>
</div>
</div>
</body>

</html>