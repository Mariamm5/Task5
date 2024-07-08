<?php
function getCities($con, $start, $end)
{
    $query = "SELECT * FROM `city` LIMIT $start, $end";
    $stmt = $con->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getTotalRows($con)
{
    $totalQuery = "SELECT COUNT(*) as total FROM `city`";
    $totalStmt = $con->query($totalQuery);
    $totalResult = $totalStmt->fetch(PDO::FETCH_ASSOC);
    return $totalResult['total'];
}