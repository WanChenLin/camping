<?php
require '../../__cred.php';
require '../../__connect_db.php';

$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;
// echo $event_id;

$sql_countMem = "SELECT event_id, COUNT(event_id) num FROM event_applylist WHERE `apply_order`=0 AND event_id=$event_id GROUP BY event_id ";
$pdo_query_countMem = $pdo->query($sql_countMem);
$rows_countMem = $pdo_query_countMem->fetchAll(PDO::FETCH_ASSOC);
$num_data = [];
foreach ($rows_countMem as $v) {
    $num_data[$v['event_id']] = $v['num'];
}
// echo print_r($num_data);


$sql_countGender = "SELECT event_id, COUNT(applyList_gender) num FROM event_applylist WHERE `applyList_gender`=1 AND event_id=$event_id GROUP BY event_id ";
$pdo_query_countGender = $pdo->query($sql_countGender);
$rows_countGender = $pdo_query_countGender->fetchAll(PDO::FETCH_ASSOC);
$gender_data = [];
foreach ($rows_countGender as $v) {
    $gender_data[$v['event_id']] = $v['num'];
}
// echo print_r($gender_data);

$sql_countAge1 = "SELECT event_id, COUNT(applyList_age) num FROM event_applylist WHERE `applyList_age`=1 AND event_id=$event_id";
$pdo_query_countAge1 = $pdo->query($sql_countAge1);
$rows_countAge1 = $pdo_query_countAge1->fetchAll(PDO::FETCH_ASSOC);
$age1_data = [];
foreach ($rows_countAge1 as $v) {
    $age1_data[$v['event_id']] = $v['num'];
}
$sql_countAge2 = "SELECT event_id, COUNT(applyList_age) num FROM event_applylist WHERE `applyList_age`='2' AND event_id=$event_id ";
$pdo_query_countAge2 = $pdo->query($sql_countAge2);
$rows_countAge2 = $pdo_query_countAge2->fetchAll(PDO::FETCH_ASSOC);
$age2_data = [];
foreach ($rows_countAge2 as $v) {
    $age2_data[$v['event_id']] = $v['num'];
}
$sql_countAge3 = "SELECT event_id, COUNT(applyList_age) num FROM event_applylist WHERE `applyList_age`=3 AND event_id=$event_id";
$pdo_query_countAge3 = $pdo->query($sql_countAge3);
$rows_countAge3 = $pdo_query_countAge3->fetchAll(PDO::FETCH_ASSOC);
$age3_data = [];
foreach ($rows_countAge3 as $v) {
    $age3_data[$v['event_id']] = $v['num'];
}
$sql_countAge4 = "SELECT event_id, COUNT(applyList_age) num FROM event_applylist WHERE `applyList_age`=4 AND event_id=$event_id";
$pdo_query_countAge4 = $pdo->query($sql_countAge4);
$rows_countAge4 = $pdo_query_countAge4->fetchAll(PDO::FETCH_ASSOC);
$age4_data = [];
foreach ($rows_countAge4 as $v) {
    $age4_data[$v['event_id']] = $v['num'];
}
// echo print_r($age4_data);
$sql_countAge5 = "SELECT event_id, COUNT(applyList_age) num FROM event_applylist WHERE `applyList_age`=5 AND event_id=$event_id";
$pdo_query_countAge5 = $pdo->query($sql_countAge5);
$rows_countAge5 = $pdo_query_countAge5->fetchAll(PDO::FETCH_ASSOC);
$age5_data = [];
foreach ($rows_countAge5 as $v) {
    $age5_data[$v['event_id']] = $v['num'];
}


$sql = "SELECT * FROM `event_list` WHERE event_id=$event_id";
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include '../../__index_head.php'; ?>
<?php include '../../__index_header.php'; ?>
<?php include '../../__index_navbar.php'; ?>

<main class="col-md-10 bg-white">
    <section>

        <style>
            .row{
                padding:0;
                margin:0;
            }
            .line::after {
                content: '';
                position: absolute;
                left: 0;
                top: 100%;
                width: 100%;
                height: 1px;
                background: #ccc;
            }
            .sep::after {
                content: '';
                position: absolute;
                right: -2vw;
                top: 0;
                width: 1px;
                height: 100%;
                background: #ccc;
            }
            .male::before {
                content: '';
                position: absolute;
                left: -25px;
                top: 0;
                width: 20px;
                height: 80%;
                background: lightseagreen;
            }
            .female::after {
                content: '';
                position: absolute;
                left: -25px;
                top: 0;
                width: 20px;
                height: 80%;
                background: lightsalmon;
            }
            .age1::after {
                content: '';
                position: absolute;
                left: -25px;
                top: 0;
                width: 20px;
                height: 80%;
                background: lightcoral;
            }
            .age2::after {
                content: '';
                position: absolute;
                left: -25px;
                top: 0;
                width: 20px;
                height: 80%;
                background: lightpink;
            }
            .age3::after {
                content: '';
                position: absolute;
                left: -25px;
                top: 0;
                width: 20px;
                height: 80%;
                background: lightskyblue;
            }
            .age4::after {
                content: '';
                position: absolute;
                left: -25px;
                top: 0;
                width: 20px;
                height: 80%;
                background: lightslategray;
            }
            .age5::after {
                content: '';
                position: absolute;
                left: -25px;
                top: 0;
                width: 20px;
                height: 80%;
                background: lightgray;
            }
            .age6::after {
                content: '';
                position: absolute;
                left: -25px;
                top: 0;
                width: 20px;
                height: 80%;
                background: lightgreen;
            }
            
        </style>

        <aside class="bg-warning">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-2">
                    <li class="breadcrumb-item">主題活動</li>
                    <li class="breadcrumb-item"><a href="event_listCost.php">活動收益</a></li>
                    <li class="breadcrumb-item active" aria-current="page">費用明細</a></li>
                </ol>
            </nav>
        </aside>
        <?php foreach ($rows as $row) : ?>
            <div class="card container" style="max-width:700px; padding:0">
                <div class="card-header">
                    <h5>活動名稱：<?= $row['event_name'] ?></h5>
                    <p>活動日期：<?= $row['event_dateStart'] ?> 至<?= $row['event_dateEnd'] ?></p>
                </div>
                
                <div class="row p-3">
                    <div class="col-6 sep">
                        <div class="form-group">
                            <h5>活動收入</h5>
                            <div class="row">
                                <div class="col-2"></div>
                                <label for="staticEmail" class="col-5 col-form-label">活動單價(/人)</label>
                                <div class="col-5">
                                    <input type="text" readonly class="form-control-plaintext text-right" id="staticEmail" value="$ <?= $row['event_price'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <label for="" class="col-5 col-form-label">總報名人數</label>
                                <div class="col-5 line">
                                    <input type="text" readonly class="form-control-plaintext text-right" id="" value="<?php $Num = isset($num_data[$row['event_id']]) ? $num_data[$row['event_id']]: 0; echo $Num?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <label for="" class="col-5 col-form-label"></label>
                                <div class="col-5">
                                    <input type="text" readonly class="form-control-plaintext text-right" id="" value="$ <?php $earn = $row['event_price'] * $Num; echo $earn ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <h5>活動費用</h5>
                                <a class="px-2" href="event_costEdit.php?event_id=<?= $row['event_id'] ?>"><i class="fas fa-edit"></i></a>
                            </div>
                            
                            <div class="row">
                                <div class="col-2"></div>
                                <label for="" class="col-5 col-form-label">營地租借費用</label>
                                <div class="col-5">
                                    <input type="text" readonly class="form-control-plaintext text-right" id="" value="$ <?= $row['event_campCost'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <label for="" class="col-5 col-form-label">食材支出</label>
                                <div class="col-5">
                                    <input type="text" readonly class="form-control-plaintext text-right" id="" value="$ <?= $row['event_foodCost'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <label for="" class="col-5 col-form-label">外包費用</label>
                                <div class="col-5">
                                    <input type="text" readonly class="form-control-plaintext text-right" id="" value="$ <?= $row['event_outsourcingCost'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <label for="" class="col-5 col-form-label">保險費用</label>
                                <div class="col-5">
                                    <input type="text" readonly class="form-control-plaintext text-right" id="" value="$ <?= $row['event_insCost'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <label for="" class="col-5 col-form-label">其他支出<br><small>(<?= $row['event_itemName'] ?>)</small></label>
                                <div class="col-5 line">
                                    <input type="text" readonly class="form-control-plaintext text-right" id="" value="$ <?= $row['event_itemCost'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"></div>
                                <label for="" class="col-5 col-form-label"></label>
                                <div class="col-5">
                                    <input type="text" readonly class="form-control-plaintext text-right" id="" value="$ <?php $cost = $row['event_campCost'] + $row['event_foodCost'] + $row['event_outsourcingCost'] + $row['event_insCost'] + $row['event_itemCost'];
                            echo $cost ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h5 class="col-6">活動毛利</h5>
                            <h5 class="col-6 text-right">$ <?= $earn - $cost ?></h5>
                        </div>

                    </div>
                    <div class="col-1"></div>
                    <div class="col-5">
                        <div class="">
                            <p class="male position-relative" style="margin:0">男：<span id="male"><?php $maleNum = isset($gender_data[$row['event_id']])? $gender_data[$row['event_id']]: 0; echo $maleNum ?></span> 人</p>
                            <p class="female position-relative" style="margin:0">女：<span id="female"><?= $Num-$maleNum ?></span> 人</p>
                            <canvas class="" id="myCanvas" width="200" height="200"></canvas>
                        </div>
                        <div class="">
                            <p class="age1 position-relative" style="margin:0">10歲以下：<span id="age1"><?php $age1Num = isset($age1_data[$row['event_id']])? $age1_data[$row['event_id']]: 0; echo $age1Num ?></span> 人</p>
                            <p class="age2 position-relative" style="margin:0">11歲至19歲：<span id="age2"><?php $age2Num = isset($age2_data[$row['event_id']])? $age2_data[$row['event_id']]: 0; echo $age2Num ?></span> 人</p>
                            <p class="age3 position-relative" style="margin:0">20歲至29歲：<span id="age3"><?php $age3Num = isset($age3_data[$row['event_id']])? $age3_data[$row['event_id']]: 0; echo $age3Num ?></span> 人</p>
                            <p class="age4 position-relative" style="margin:0">30歲至39歲：<span id="age4"><?php $age4Num = isset($age4_data[$row['event_id']])? $age4_data[$row['event_id']]: 0; echo $age4Num ?></span> 人</p>
                            <p class="age5 position-relative" style="margin:0">40歲至49歲：<span id="age5"><?php $age5Num = isset($age5_data[$row['event_id']])? $age5_data[$row['event_id']]: 0; echo $age5Num ?></span> 人</p>
                            <p class="age6 position-relative" style="margin:0">50歲(含)以上：<span id="age6"><?= $Num-$age1Num-$age2Num-$age3Num-$age4Num-$age5Num ?></span> 人</p>
                            <canvas class="" id="myCanvasAge" width="200" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


        <script>
           var canvas = document.getElementById('myCanvas');
           let male = Number($("#male").text());
           let female = Number($('#female').text());
           console.log(female);
            var ctx = canvas.getContext("2d");
            var data = [male,female];
            var colors = ["lightseagreen", "lightsalmon"];
            var center = [100, 100];
            var radius = 80;
            var lastPosition = 0, total = 0;
            
            for(var i in data) { total += data[i]; }
            
            for (var i = 0; i < data.length; i++) {
            ctx.fillStyle = colors[i];
            ctx.beginPath();
            ctx.moveTo(center[0],center[1]);
            ctx.arc(center[0],center[1],radius,lastPosition,lastPosition+(Math.PI*2*(data[i]/total)),false);
            ctx.lineTo(center[0],center[1]);
            ctx.fill();
            lastPosition += Math.PI*2*(data[i]/total);
            }

            var canvasAge = document.getElementById('myCanvasAge');
           let age1 = Number($("#age1").text());
           let age2 = Number($("#age2").text());
           let age3 = Number($("#age3").text());
           let age4 = Number($("#age4").text());
           let age5 = Number($("#age5").text());
           let age6 = Number($("#age6").text());
           

            var ctxAge = canvasAge.getContext("2d");
            var dataAge = [age1, age2, age3, age4, age5, age6];
            var colorsAge = ["lightcoral","lightpink" ,"lightskyblue","lightslategray","lightgray","lightgreen"];
            var centerAge = [100, 100];
            var radiusAge = 80;
            var lastPositionAge = 0, totalAge = 0;
            
            for(var i in dataAge) { totalAge += dataAge[i]; }
            
            for (var i = 0; i < dataAge.length; i++) {
            ctxAge.fillStyle = colorsAge[i];
            ctxAge.beginPath();
            ctxAge.moveTo(centerAge[0],centerAge[1]);
            ctxAge.arc(centerAge[0],centerAge[1],radiusAge,lastPositionAge,lastPositionAge+(Math.PI*2*(dataAge[i]/totalAge)),false);
            ctxAge.lineTo(centerAge[0],centerAge[1]);
            ctxAge.fill();
            lastPositionAge += Math.PI*2*(dataAge[i]/totalAge);
            }
            
        </script>
    </section>
</main>

<?php include '../../__index_foot.php'; ?>