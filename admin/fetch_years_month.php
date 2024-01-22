<?php
include '../db_connect.php';

// Fetch years from tbl_years
$yearQuery = "SELECT * FROM tbl_years";
$yearResult = mysqli_query($conn, $yearQuery);

// Fetch months from tbl_months
$monthQuery = "SELECT * FROM tbl_months";
$monthResult = mysqli_query($conn, $monthQuery);

// Prepare data array
$data = array(
    'years' => array(),
    'months' => array()
);

// Fetch years
if ($yearResult && mysqli_num_rows($yearResult) > 0) {
    while ($yearData = mysqli_fetch_assoc($yearResult)) {
        $data['years'][] = $yearData;
    }
}

// Fetch months
if ($monthResult && mysqli_num_rows($monthResult) > 0) {
    while ($monthData = mysqli_fetch_assoc($monthResult)) {
        $data['months'][] = $monthData;
    }
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);

// Close the database connection
mysqli_close($conn);
?>
