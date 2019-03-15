<?php
require __DIR__ . '/__connectDB.php';

$total_sql = "SELECT COUNT(1) FROM `address_book`";
$total_pdo_query = $pdo->query($total_sql);
$total_rows = $total_pdo_query->fetch(PDO::FETCH_NUM)[0];

$per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$total_page = ceil($total_rows / $per_page);

$sql = sprintf("SELECT * FROM `address_book` LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$pdo_query = $pdo->query($sql);
$rows = $pdo_query->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include __DIR__ . '/__head.php'; ?>

<div class="container">
    <h2><?= $total_rows ?></h2>

    <ul class="nav nav-pills">
        <?php for ($i = 1; $i <= $total_page; $i++) : ?>
        <li class="nav-item">
            <a class="nav-link <?= $i==$page? 'active': ''?>" href="?page=<?= $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>

    </ul>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">mobile</th>
                <th scope="col">address</th>
                <th scope="col">birthday</th>
                <th><i class="fas fa-edit"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row['sid'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['mobile'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['birthday'] ?></td>
                <td><a href="data_edit.php?sid=<?= $row['sid'] ?>"><i class="fas fa-edit"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include __DIR__ . '/__footer.php' ?> 