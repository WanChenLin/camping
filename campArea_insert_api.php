<?php
require __DIR__.'/__connect.php';

header('Content-Type:application/json');
 $result=[
    'success'=>false,
    'errorCode'=>0,
    'errorMsg'=>'資料輸入不完整',
    'post'=>[],
 ];
 
if (isset($_POST['checkme'])){

    $areaImg = $_POST['camp_areaImg'];
    $camp_name = $_POST['camp_name'];
    $camp_area = $_POST['camp_area'];
    $camp_type = $_POST['camp_type'];
    $camp_size = $_POST['camp_size'];
    $camp_number = $_POST['camp_number'];
    $camp_priceWeekday = $_POST['camp_priceWeekday'];
    $camp_priceHoliday = $_POST['camp_priceHoliday'];
    
    $result['post']=$_POST;//做echo檢查
    
    //name,email,mobile若有一個為空值，則回傳錯誤
    if(empty($camp_area) or empty($camp_name)){
        $result['errorCode']=400;
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql= "INSERT INTO `campsite_type`(
        `camp_areaImg`, `camp_name`, `camp_area`, `camp_type`,`camp_size`, `camp_number`, `camp_priceWeekday`,`camp_priceHoliday`
       ) VALUES (
           ?,?,?,?,?,?,?,?
       )";

    try{
        //準備執行
        $stmt=$pdo->prepare($sql);

        //執行$stmt，回傳陣列內容
        $stmt->execute([
            $_POST['camp_areaImg'],
            $_POST['camp_name'],
            $_POST['camp_area'],
            $_POST['camp_type'],
            $_POST['camp_size'],
            $_POST['camp_number'],
            $_POST['camp_priceWeekday'],
            $_POST['camp_priceHoliday'],
            

            ]);
        if ($stmt->rowCount()==1){
            $result['success']=true;
            $result['errorCode']=200;
            $result['errorMsg']='';
            
        }else{ 
            $result['errorCode']=402;
            $result['errorMsg']='資料重複輸入';
        }
    }catch( PDOException $ex){
        $result['errorCode']=403;
        $result['errorMsg']='資料更新發生錯誤';
    }        
       
        
    }
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
