<?php 
//require __DIR__.'/__cred.php';
require __DIR__.'/__connect.php';
 $page_name='campsite_list';

 $per_page=10;
 $page=isset($_GET['page']) ? intval($_GET['page']) : 1;

//計算總筆數
 $t_sql="SELECT COUNT(1) FROM `campsite_list`";
 $t_stmt=$pdo->query($t_sql);
 $total_rows=$t_stmt->fetch(PDO::FETCH_NUM)[0];
//計算總頁數
 $total_pages=ceil($total_rows/$per_page);
 $sql=sprintf("SELECT * FROM `campsite_list`ORDER BY `camp_id`DESC LIMIT %s,%s",($page-1)*$per_page,$per_page);

if($page<1) $page=1;
if($page>$total_pages) $page=$total_pages;

 $stmt= $pdo-> query("$sql");//ORDER BY `sid`DESC LIMIT 0,10
 $rows= $stmt->fetchall(PDO::FETCH_ASSOC); // 所有資料一次拿出來
?>
<?php include __DIR__.'/__html_header.php'; ?>
<?php include __DIR__.'/__html_navbar01.php'; ?>
<style>
 section{
     overflow:auto;
 }

 
</style>
<main class="col-10 bg-white">
<aside class="bg-warning">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./camp_list.php">營地列表</a></li>
            <li class="breadcrumb-item active" aria-current="page">營地清單</li>
         </ol>
        </nav>
</aside>

 <section>
  <div class="d-flex justify-content-between">
  <li class="inset_bottom list-unstyled">
        <a class="btn btn-primary" href="campsite_insert.php" role="button">新增資料</a>
      </li>
      <li class="nav-item list-unstyled">
        <a class="nav-link" href="campsite_search.php">搜尋營地資料</a>
     </li>
  </div>
     
    <nav aria-label="...">
    <ul class="pagination pagination-sm justify-content-end">
    
    <li class="page-item <?= $page<=1 ?'disabled':'' ?>">
      <a class="page-link" href="?page=<?= $page-1 ?>">&lt;</a>
      <!-- 前一頁 -->
      </li>
    <?php for($i=1 ; $i<=$total_pages ; $i++):?>
      <li class="page-item <?= $page==$i?'active':'' ?>">
      <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor ?>
    <li class="page-item <?= $page>=$total_pages ?'disabled':'' ?>">
      <a class="page-link" href="?page=<?= $page+1 ?>">&gt;</a>
      <!-- 後一頁 -->
      </li>
      
    </ul>
    
  </nav>
  <div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>編號</th>
      <th>營區名稱</th>
      <th>地址</th>
      <!-- <th>經緯度</th> -->
      <th>簡介</th>
      <th>開放時間</th>
      <th>適合對象</th>
      <th>聯絡人</th>
      <th>聯絡電話</th>
      <!-- <th>傳真</th> -->
      <!-- <th>電子郵件</th> -->
      <th>操作</th>
    </tr>
  </thead>
  <tbody class="data_body">
  <?php foreach($rows as $row): ?>
    <tr style="white-space:nowrap">
  
      <td><?= $row['camp_id']?></td>
      <td><?= $row['camp_name']?></td> 
      <td><?= $row['camp_address']?></td>
      <!-- <td><?= $row['camp_location']?></td> -->
      <td><?= $row['camp_intro']?></td>
      <td><?= $row['camp_openTime']?></td>
      <td><?= $row['camp_target']?></td>
      <td><?= $row['camp_ownerName']?></td>
      <td><?= $row['camp_tel']?></td>
      <!-- <td><?= $row['camp_fax']?></td> -->
      <!-- <td><?= $row['camp_email']?></td> -->
      
      
      <td>
      <a href="#" class="campsite_card mx-1 p-1"
                data-camp-id="<?= $row['camp_id'] ?>" 
                data-camp-name="<?= $row['camp_name'] ?>"
                data-camp-address="<?= $row['camp_address']?>" 
                data-camp-location="<?= $row['camp_location'] ?>" 
                data-camp-intro="<?= $row['camp_intro'] ?>" 
                data-camp-detail="<?= $row['camp_detail'] ?>" 
                data-camp-device="<?= $row['camp_device'] ?>" 
                data-camp-notice="<?= $row['camp_notice'] ?>" 
                data-camp-tel="<?= $row['camp_tel'] ?>" 
                data-camp-fax="<?= $row['camp_fax'] ?>" 
                data-camp-email="<?= $row['camp_email'] ?>" 
                data-camp-ownername="<?= $row['camp_ownerName'] ?>" 
                data-camp-opentime="<?= $row['camp_openTime'] ?>" 
                data-camp-target="<?= $row['camp_target'] ?>" >
                <i class="fas fa-eye "></i>
      </a>
      <a href="campsite_edit.php?camp_id=<?= $row['camp_id'] ?>" class="mx-1 p-1"><i class="fas fa-edit" ></i></a>
      <a href="javascript: delete_it(<?= $row['camp_id'] ?>)"  class="mx-1 p-1">
          <i class="fas fa-trash-alt "></i>
      </a>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>

</div>


 </section>
 </main>

<script>
  // function delete_it(camp_id){
  //   if(confirm(`確定要刪除編號為 ${camp_id} 的資料嗎?`) ){
  //     location.href = 'campsite_delete.php? camp_id=' + camp_id;
  //   }
  // }
  const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1',
            cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false,
    })


  function delete_it(camp_id){
        swalWithBootstrapButtons.fire({
            title: '警告',
            html: '<h5>確定要刪除第 '+camp_id+' 筆營地資料嗎?</h5>',
            type: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: '刪除',
            confirmButtonColor: '#ccc',
            cancelButtonText: '取消',
            cancelButtonColor: '#ff0000',
            focusCancel: true,
        }).then((result) => {
            if (result.value) {
                swalWithBootstrapButtons.fire({
                    title: '刪除成功',
                    html: '已刪除該筆會員資料',
                    type: 'success',
                    timer: 1000,
                    onBeforeOpen: () => {
                        timerInterval = setInterval(() => {}, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                        location.href = 'campsite_delete.php?camp_id='+ camp_id ;
                    }
                })
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: '取消刪除',
                    html: '尚未刪除該筆會員資料',
                    type: 'info'
                })
            }
        })
    }
    $(".data_body").on("click", ".campsite_card", function(){
        let camp_id = $(this).data("campId");
        let camp_name = $(this).data("campName");
        let camp_address = $(this).data("campAddress");
        let camp_location = $(this).data("campLocation");
        let camp_tel = $(this).data("campTel");
        let camp_fax = $(this).data("campFax");
        let camp_email = $(this).data("campEmail");
        let camp_ownerName = $(this).data("campOwnername");
        let camp_openTime = $(this).data("campOpentime");
        let camp_target = $(this).data("campTarget");
        let camp_intro = $(this).data("campIntro");
        let camp_detail = $(this).data("campDetail");
        let camp_device = $(this).data("campDevice");
        let camp_notice = $(this).data("campNotice");
        swalWithBootstrapButtons.fire({
            title: `${camp_name} 詳細資料`,
            html: `<div class="card my-3 p-2" style="border:none">
                    <div class="row no-gutters position-relative">
                        <div class="col align-items-center">
                            <img src="./${camp_name}" class="card-img">
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body">
                                <div class="">
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary ">營區名稱</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center">${camp_name}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary ">地址</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center" style="text-align:left;">${camp_address}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">經緯度</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center ">${camp_location}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">簡介</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center ">${camp_intro}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">設備</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center ">${camp_device}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">營地須知</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center ">${camp_detail}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">注意事項</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center ">${camp_notice}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">連絡電話</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center ">${camp_tel}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">傳真</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center ">${camp_fax}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">信箱</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center ">${camp_email}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">聯絡人</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center">${camp_ownerName}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">開放時間</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center">${camp_openTime}</div>
                                    </div>
                                    <div class="row px-3 py-1 my-1 border-bottom">
                                        <div class="col-lg-4 p-0 d-flex align-items-center text-primary">適合對象</div>
                                        <div class="col-lg-8 p-0 d-flex align-items-center text-left">${camp_target}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`,
            showCloseButton: true,
            confirmButtonText: 'OK',
        })
    })

</script>
<?php include __DIR__.'/__html_footer.php'; ?>