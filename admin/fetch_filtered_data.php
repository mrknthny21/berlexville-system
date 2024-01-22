<?php
// Assuming you have established a database connection
include '../db_connect.php';
$selectedYear = $_GET['selectedYear'];
$selectedMonth = $_GET['selectedMonth'];

// Perform your database query to get filtered data based on $selectedYear and $selectedMonth
// Replace 'your_table_name' with the actual table name
$query = "SELECT h.blk, h.lot, h.name AS owner, m.dueID, m.amount, m.status
FROM tbl_homeowners h
LEFT JOIN tbl_monthly m ON h.accountID = m.accountID WHERE m.year = $selectedYear AND m.month = '$selectedMonth'";
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
