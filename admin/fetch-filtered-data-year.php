<?php
include '../db_connect.php';

$selectedYear = $_GET['selectedYear'];

// Perform your database query to get filtered data based on $selectedYear
$query = "SELECT a.amilyarID, a.accountID, h.blk, h.lot, h.name AS owner, a.amount, a.status, a.year
          FROM tbl_amilyar a
          LEFT JOIN tbl_homeowners h ON a.accountID = h.accountID
          WHERE a.year = $selectedYear";

$result = mysqli_query($conn, $query);

// Check for errors in the query execution
if (!$result) {
    die('Error in the query: ' . mysqli_error($conn));
}

// Fetch the results as an associative array
$filteredData = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Return the filtered data as JSON
header('Content-Type: application/json');
echo json_encode($filteredData);
?>

