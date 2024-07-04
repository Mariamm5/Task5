<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'world';

try {
    $con = new PDO("mysql:host=$servername;dbname=$db;", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function getCities($con, $start, $end)
    {
        $query = "SELECT * FROM `city` LIMIT $start, $end";
        $stmt = $con->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getTotalRows($con)
    {
        $totalQuery = "SELECT COUNT(*) as count FROM `city`";
        $totalStmt = $con->query($totalQuery);
        $totalResult = $totalStmt->fetch(PDO::FETCH_ASSOC);
        return $totalResult['count'];
    }

} catch (PDOException $error) {
    echo "Database not connected: " . $error->getMessage();
    exit();
}