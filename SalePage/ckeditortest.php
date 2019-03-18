<?php require __DIR__.'/__salepage_connect_db.php'; ?>

<!doctype html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>CKEditor</title>
  <script src="ckeditor/ckeditor.js"></script>
 </head>
 <body>
    <form action="" method="post"> 
        <textarea  id="salepage_proddetails" name="salepage_proddetails" rows="10" cols="80"></textarea>
        <input type='submit' value="輸入">
    </form>   

<?php
if(isset($_POST['salepage_proddetails']))
  {
   $text = $_POST['salepage_proddetails'];
    
   $sql = "INSERT INTO `SalePage`(
      `salepage_proddetails`
      ) VALUES (
        ?,
      )";


  $stmt = $pdo->prepare($sql);

  $stmt->execute([
      $_POST['salepage_proddetails']
  ]);

   if ($query) {
      echo "已傳到資料庫";
   } else {
      echo "錯誤";
   }
   
   }
?>
 <script>
 CKEDITOR.replace( 'salepage_proddetails', {});
   
 </script>
 </body>
</html>
