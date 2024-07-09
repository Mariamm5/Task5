<?php
include 'database.php';
include 'functions.php';
global $con;
$end = 10;
$page = isset($_GET['page-nr']) ? (int)$_GET['page-nr'] : 1;
$start = ($page - 1) * $end;

$cities = getCities($con, $start, $end);
$totalRows = getTotalRows($con);
$pages = ceil($totalRows / $end);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>City List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class='main'>
    <?php foreach ($cities as $city): ?>
        <div class='city'>
            <h1><?= $city['ID']; ?></h1>
            <p><strong>Name:</strong> <?= $city['Name']; ?></p>
            <p><strong>Country Code:</strong> <?= $city['CountryCode']; ?></p>
            <p><strong>District:</strong> <?= $city['District']; ?></p>
            <p><strong>Population:</strong> <?= number_format($city['Population']); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<div class='pagination'>
    <?php for ($i = 1; $i <= $pages; $i++): ?>
        <a href='?page-nr=<?= $i; ?>'><?= $i; ?></a>
    <?php endfor; ?>
</div>

</body>
</html>

