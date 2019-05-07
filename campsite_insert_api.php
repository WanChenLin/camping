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

    $name = $_POST['camp_name'];
    $address = $_POST['camp_address'];
    $location = $_POST['camp_location'];
    $tel = $_POST['camp_tel'];
    $fax = $_POST['camp_fax'];
    $email = $_POST['camp_email'];
    $ownerName = $_POST['camp_ownerName'];
    $openTime = $_POST['camp_openTime'];
    $target = $_POST['camp_target'];
    $intro = $_POST['camp_intro'];
    $notice = $_POST['camp_notice'];
    $detail = $_POST['camp_detail'];
    $device = $_POST['camp_device'];
    
    $result['post']=$_POST;//做echo檢查
    
    //name,email,mobile若有一個為空值，則回傳錯誤
    if(empty($name) or empty($address) or empty($email)or empty($tel)){
        $result['errorCode']=400;
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql= "INSERT INTO `campsite_list`(
       `camp_name`,`camp_address`,`camp_location`, `camp_tel`,`camp_fax`,`camp_email`,`camp_ownerName`, `camp_openTime`,`camp_target`, `camp_intro`,`camp_detail`,`camp_device`,`camp_notice`
       ) VALUES (
           ?,?,?,?,?,?,?,?,?,?,?,?,?
       )";

    try{
        //準備執行
        $stmt=$pdo->prepare($sql);

        //執行$stmt，回傳陣列內容
        $stmt->execute([
            $_POST['camp_name'],
            implode("", $_POST['camp_address']),
            $_POST['camp_location'],
            $_POST['camp_tel'],
            $_POST['camp_fax'],
            $_POST['camp_email'],
            $_POST['camp_ownerName'],
            $_POST['camp_openTime'],
            $_POST['camp_target'],
            $_POST['camp_intro'],
            $_POST['camp_detail'],
            $_POST['camp_device'],
            $_POST['camp_notice'],

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
