<?php 
//require __DIR__.'/__cred.php';
require __DIR__.'/__connect.php';
 $page_name='picture_list';

 $per_page=10;
 $page=isset($_GET['page']) ? intval($_GET['page']) : 1;

//計算總筆數
 $t_sql="SELECT COUNT(1) FROM `campsite_image`";
 $t_stmt=$pdo->query($t_sql);
 $total_rows=$t_stmt->fetch(PDO::FETCH_NUM)[0];
//計算總頁數
 $total_pages=ceil($total_rows/$per_page);
 $sql=sprintf("SELECT * FROM `campsite_image`ORDER BY `campImg_id`DESC LIMIT %s,%s",($page-1)*$per_page,$per_page);

if($page<1) $page=1;
if($page>$total_pages) $page=$total_pages;

 $stmt= $pdo-> query("$sql");//ORDER BY `sid`DESC LIMIT 0,10
 $rows= $stmt->fetchall(PDO::FETCH_ASSOC); // 所有資料一次拿出來
?>
<?php include __DIR__.'/__html_header.php'; ?>
<?php include __DIR__.'/__html_navbar01.php'; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/lightbox.min.css">
<style>
 body{
   font-family: arial, "微軟正黑體";
 }

 section{
     overflow:auto;
 }
 .insert_bottom{
     position:absolute;
     right:10px;
 }
</style>
<main class="col-10 bg-white">
<aside class="my-2">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./camp_list.php">營地列表</a></li>
            <li class="breadcrumb-item active" aria-current="page">營地圖片清單</li>
         </ol>
        </nav>
    </aside>

 <section>
 <div class="d-flex justify-content-between">
  <li class="inset_bottom list-unstyled">
        <a class="btn btn-primary" href="campImg_insert02_new.php" role="button">新增資料</a>
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
 
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>編號</th>
      <th>照片</th>
      <th>營區名稱</th>
      <th>圖片名稱</th>
      <th>圖片說明</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row): ?>
    <tr style="white-space:nowrap"> 
      <td><?= $row['campImg_id']?></td>
      <td>
        <a href="./<?= $row['camp_image'] ?>" data-lightbox="image-1" data-title="<?= $row['camp_name']?>-<?= $row['campImg_name']?>">
        <img src="./<?= $row['camp_image'] ?>" alt="" height="50">
        </a></td>
      <td><?= $row['camp_name']?></td>
      <td><?= $row['campImg_name']?></td>
      <td><?= $row['campImg_file']?></td>
      <td><a href="campImg_edit.php?campImg_id=<?= $row['campImg_id'] ?>"><i class="fas fa-edit mx-1 p-1"></i></a>
      <a href="javascript: delete_it(<?= $row['campImg_id'] ?>)">
          <i class="fas fa-trash-alt mx-1 p-1"></i>
      </a>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
</div>


 </section>
 </main>


 <script src="js/lightbox-plus-jquery.min.js"></script>

<script>
  // function delete_it(campImg_id){
  //   if(confirm(`確定要刪除編號為 ${campImg_id} 的資料嗎?`) ){
  //     location.href = 'campImg_delete.php?  campImg_id=' + campImg_id;
  //   }
  // }

      lightbox.option({
            // 'resizeDuration': 200,
            // 'wrapAround': true,
            albumLabel: "第 %1 張,共 %2 張"
        })
  
  const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1',
            cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false,
    })


  function delete_it(campImg_id){
        swalWithBootstrapButtons.fire({
            title: '警告',
            html: '<h5>確定要刪除第 '+campImg_id+' 筆營地圖片嗎?</h5>',
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
                        location.href = 'campImg_delete.php?campImg_id='+ campImg_id ;
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


</script>
<?php include __DIR__.'/__html_footer.php'; ?>