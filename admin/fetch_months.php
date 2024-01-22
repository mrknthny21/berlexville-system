<?php
// fetch_months.php

include '../db_connect.php';

$query = "SELECT * FROM tbl_months";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $months = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($months);
} else {
    echo json_encode([]);
}

mysqli_close($conn);
?>
