<?php

include __DIR__ . '/__connect_db.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '',
    'post' => [],
    'data' => []
];

if (isset($_POST['searchdb'])) {

    $search = htmlentities($_POST['search']);
    $filter_gender = htmlentities($_POST['filter_gender']);
    $result['post'] = $_POST;

    if (empty($search)) {
        $result['errorCode'] = 412;
        $result['errorMsg'] = '請輸入關鍵字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // $sql = "INSERT INTO `member_list`(`mem_account`) VALUES (?)";
    $sql = " SELECT *, (SELECT level_title FROM member_level WHERE mem_level=memLevel_id ) AS level_title FROM member_list 
            WHERE (mem_account LIKE :search 
            OR mem_name LIKE :search 
            OR mem_nickname LIKE :search 
            OR mem_mobile LIKE :search 
            OR mem_email LIKE :search 
            OR mem_address LIKE :search)
            ";

    if ($filter_gender != 'all'){
        $sql .= " AND mem_gender = '$filter_gender' ORDER BY mem_id DESC"; // ORDER BY一定要在SQL語法的最後面(不能在AND前面)
    } else {
        $sql .= " ORDER BY mem_id DESC";
    }

    try {
        $stmt = $pdo->prepare($sql);

        // $stmt->bindValue(':search',$search,PDO::PARAM_STR);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);

        // $stmt->execute([
        //     $_POST['account'],
        // ]);
        $stmt->execute();

        if ($stmt->rowCount() != 0) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '搜尋資料如下';
            $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result['errorCode'] = 413;
            $result['errorMsg'] = '查無資料';
        }

    } catch (PDOException $ex) {
        $result['errorCode'] = 414;
        $result['errorMsg'] = '???';
    }

}

// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// if($rows == 0) {
//     $output = '<tr><tr>No results found.</tr></td>';
// } else {
//     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $eName = $row['name'];
//         $eDesc = $row['description'];
//         $eCont = $row['content'];
//         $id = $row['id'];
//         $elvl = $row['level'];
//         $ehp = $row['hp'];

//         $output .= '<tr><td><a href="http://xxxx.com/xxx?id=' .$id. '" onclick="document.linkform.submit();">'.$eName.'</a></td><td>'.$eDesc.'</td><td>'.$elvl.'</td><td>'.$ehp.'</td></tr>';
//     }
// }

// foreach($row as $key => $value)
// {
//     echo $key." : ".$value."<br />";
// }

echo json_encode($result, JSON_UNESCAPED_UNICODE);