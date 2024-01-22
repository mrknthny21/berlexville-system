<?php
// fetch_years.php

include '../db_connect.php';

$query = "SELECT * FROM tbl_year";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $years = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($years);
} else {
    echo json_encode([]);
}

mysqli_close($conn);
?>
