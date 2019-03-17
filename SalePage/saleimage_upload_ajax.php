<?php
$upload_dir = __DIR__. '/remoteimg/';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'filename' => '',
    'info' => '',
];

if(empty($_FILES['saleimg_path'])){
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
}

foreach($_FILES['saleimg_path']['error'] as $i=>$error){
    if($error == UPLOAD_ERR_OK){
        move_uploaded_file(
            $_FILES['saleimg_path']['tmp_name'][$i],
            $upload_dir. $_FILES['saleimg_path']['name'][$i]
        );

    }
}

$filename = sha1($_FILES['saleimg_path']['name']. uniqid());

switch($_FILES['saleimg_path']['type']){
    case 'image/jpeg':
        $filename .= '.jpg';
        break;
    case 'image/png':
        $filename .= '.png';
        break;
    default:
        $result['info'] = '格式不符';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
}
$result['filename'] = $filename;
$upload_file = $upload_dir. $filename;

if(move_uploaded_file($_FILES['saleimg_path']['tmp_name'], $upload_file)){
    $result['success'] = true;
} else {
    $result['info'] = '暫存檔無法搬移';
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);








