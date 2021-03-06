<?php include '../../__connect_db.php'; ?>

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
      <li class="breadcrumb-item active">優惠券查詢</li>
    </ol>
  </nav>
  <section class="container-fluid" style="height: 100%;">
    <div class="row py-2">
      <div class="col-md-10">
        <div class="alert alert-success" role="alert" style="display: none;" id="info_bar"></div>
      </div>
      <div class="col-md-2">
        <div class="">
          <select class="form-control" id="fetch_option_date">
            <option class="dropdown-item">列出所有Coupon</option>
            <option class="dropdown-item" data-sql="WHERE `coupon_expire`>CURRENT_DATE()">列出有效期限內coupon</option>
            <option class="dropdown-item" data-sql="WHERE `coupon_expire`<CURRENT_DATE()">列出已過期coupon</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 table-responsive">
        <table id="coupon_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">編號</th>
              <th scope="col">Coupon 名稱</th>
              <th scope="col">折扣數值</th>
              <th scope="col">折扣方法</th>
              <th scope="col">開始領取日期</th>
              <th scope="col">結束領取日期</th>
              <th scope="col">使用到期日期</th>
              <th scope="col">適用營地</th>
              <th scope="col">訂單價格條件</th>
              <th scope="col">訂單日數條件</th>

              <th scope="col">描述</th>
              <th scope="col">操作</th>
              <!-- <th scope="col"><input type="checkbox" id="select_all"></th> -->
            </tr>
          </thead>
          <tbody id="coupon_output">

          </tbody>
        </table>
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
      $(function() {

        function fetch_coupon(sql) {
          $('#coupon_table').DataTable({
            language: {
              searchPlaceholder: "輸入優惠券名稱"
            },

            dom: 'lf<"#pagi-wrap.d-flex"<"mr-auto"B>p>t<"mt-3">',

            buttons: [{
              className: 'btn btn-primary ',
              attr: {
                id: 'coupon_insert_btn'
              },
              text: '新增coupon',
              action: function() {
                window.location = './coupon_genre_insert.php'
              },

            }, ],
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
              url: "coupon_genre_api.php",
              type: "POST",
              data: {
                date_condition: sql
              }
            },
            "columnDefs": [{
              "targets": [11],
              "data": "coupon_genre_id",
              "render": function(data, type, row, meta) {
                return '<a href="coupon_genre_edit.php?coupon_id=' + data +
                  '" class="edit_btn mx-1 p-1" data-coupon_id=' + data +
                  '><i class="fas fa-edit"></i></a > <a href="#" class="del-btn mx-1 p-1" data-coupon_id=' +
                  data + '><i class="fas fa-trash-alt"></i></a>';
              }
            }, ],
            "columns": [{
                "data": "coupon_genre_id"
              },
              {
                "data": "coupon_name"
              },
              {
                "data": "discount_unit",
                "render": function(data, type, row, meta) {
                  let display = ''
                  if (row.discount_type == 'percentage') {
                    display = data + '折'
                  } else if (row.discount_type == 'currency') {
                    display = data + '元'
                  }
                  return display
                }
              },
              {
                "data": "discount_type",
                "render": function(data) {
                  let display = ''
                  if (data == 'percentage') {
                    display = "折扣";
                  } else if (data == 'currency') {
                    display = "扣除金額"
                  }
                  return display;
                }
              },
              {
                "data": "avaliable_start",
              },
              {
                "data": "avaliable_end",
              },
              {
                "data": "coupon_expire"
              },
              {
                "data": "camp_name",
              },
              {
                "data": "order_price",
                "render": function(data) {
                  let display = ''
                  display = "訂購滿" + data + "元"
                  return display
                }
              },
              {
                "data": "order_night",
                "render": function(data) {
                  let display = ''
                  display = "訂購滿" + data + "夜"
                  return display
                }
              },

              {
                "data": "discription"
              },
            ],
          })
        }
        fetch_coupon()




        $('#fetch_option_date').change(function() {
          let sql = $("#fetch_option_date option:selected").data('sql')
          $('#coupon_table').DataTable().destroy();
          fetch_coupon(sql)
        })

        const info_bar = $("#info_bar");


        $("#coupon_table tbody").on("click", ".del-btn", function() {
          let del_btn = $(this)
          $.confirm.show({
            "message": "確認刪除此筆coupon",
            "yesText": "確認",
            "noText": "取消",
            "yes": function() {
              let coupon_id = del_btn.data('coupon_id');
              const form = new FormData();
              form.append("coupon_id", coupon_id);
              fetch('coupon_genre_delete_api.php', {
                method: "POST",
                body: form
              }).then(response => {
                return response.json()
              }).then(result => {
                info_bar.css("display", "block")
                if (result['success']) {
                  info_bar.attr('class', 'alert alert-info').text('刪除成功');
                } else {
                  info_bar.attr('class', 'alert alert-danger').text(result.errorMsg);
                }
                setTimeout(function() {
                  info_bar.css("display", "none")
                }, 3000)

                $('#coupon_table').DataTable().destroy();
                fetch_coupon()
                $("#select_all").prop('checked', false)
              });
            },
            "no": function() {
              return false
            },
          })
        });


        function group_del(e, dt, node, config) {
          let form = new FormData();
          let delete_coupons = [];
          $('#coupon_table tbody :checked').each(function() {
            delete_coupons.push($(this).data('coupon_id'))
          });
          if (confirm('確認刪除資料')) {
            info_bar.css('display', 'block');
            if (delete_coupons.length < 1) {
              info_bar.attr('class', 'alert alert-danger');
              info_bar.html("未選擇資料");
              setTimeout(function() {
                info_bar.css('display', 'none')
              }, 3000);
              return false;
            } else {
              let delete_coupons_str = JSON.stringify(delete_coupons);
              form.append('delete_coupons', delete_coupons_str);
              fetch('_group_delete_api.php', {
                  method: 'POST',
                  body: form
                })
                .then(response => response.json())
                .then(data => {
                  $('#coupon_table').DataTable().destroy();
                  fetch_coupon(sql);
                  info_bar.attr('class', 'alert alert-success');
                  info_bar.html("刪除成功");
                  setTimeout(function() {
                    info_bar.css('display', 'none')
                  }, 3000);
                })
            }
          }
        }
      });
    </script>

  </section>

</main>

</div>
</div>
</div>
</body>

</html>