<?php
require __DIR__. '/__connect_db.php';

$begin = microtime(true);
echo $begin. '<br>';

$sql = "INSERT INTO `go_camping`(
    `mem_id`,
    `mem_nickname`,
    `post_cate`,
    `post_title`,
    `post_time`,
    `post_editTime`,
    `post_content`
    ) VALUES (
      ?, ?, ?, ?, ?, ?,?
    )";

$stmt = $pdo->prepare($sql);

// 開始 Transaction
$pdo->beginTransaction();

for($i=1; $i<50; $i++) {
$stmt->execute([
    "$i",
    "李小明$i",
    "分類$i",
    "標題標題標題標題$i",
    "1990-02-03",
    "1990-03-03",
    "內容內容內容內容內容內容$i",
]);
}

    // 提交 Transaction
    $pdo->commit();

$end = microtime(true);
echo $end. '<br>';
echo $end-$begin. '<br>';