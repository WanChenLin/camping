<?php

$upload_dir = __DIR__ . '/avatar_pictures/';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'filename' => '',
    'info' => '',
];

if (empty($_FILES['my_file'])) {
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
}

// $filename = sha1($_FILES['my_file']['name'].uniqid());
$filename = sha1($_FILES['my_file']['name'].uniqid());

switch ($_FILES['my_file']['type']) {
    case 'image/jpeg':
        $filename .= '.jpg';
        // $filename = $_FILES['my_file']['name'];
        $result['info'] = '檔案上傳成功';
        break;
    case 'image/png':
        $filename .= '.png';
        // $filename = $_FILES['my_file']['name'];
        $result['info'] = '檔案上傳成功';
        break;
    default:
        $result['info'] = '格式不符';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
}

$result['filename'] = $filename;
$upload_file = $upload_dir . $filename;

if (move_uploaded_file($_FILES['my_file']['tmp_name'], $upload_file)) {
    $result['success'] = true;
} else {
    $result['info'] = '暫存檔無法搬移';
}

// include __DIR__. '/__connect_db.php';

// $file = "/uploads/" . $filename;
// $sql = "INSERT INTO `member_list`(`mem_avatar`) VALUES ('$file')";

// $stmt = $pdo->prepare($sql);

// $stmt->execute([$file]);

// echo "成功新增一條記錄"; //成功傳入資料後顯示成功新增一條資料
echo json_encode($result, JSON_UNESCAPED_UNICODE);