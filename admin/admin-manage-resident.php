<?php
include '../db_connect.php';

if (isset($_POST['residentID']) && isset($_POST['deleteResident'])) {
    // Delete existing resident
    $residentID = $_POST['residentID'];

    // Directly interpolate the value into the delete query
    $deleteQuery = "DELETE FROM tbl_resident WHERE residentID = '$residentID'";
    $conn->query($deleteQuery);

    // Redirect back to the page to refresh the resident list
    header('Location: admin-records-resident.php');
    exit();
} elseif (isset($_POST['editResident'])) {
    // Retrieve form data
    $residentID = $_POST['editResidentID'];
    $block = $_POST['block'];
    $lot = $_POST['lot'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // Construct the update query
    $query = "UPDATE tbl_resident SET
        block = '$block',
        lot = '$lot',
        name = '$name',
        age = '$age',
        gender = '$gender'
    WHERE residentID = '$residentID'";

    // Execute the update query
    if ($conn->query($query)) {
        // Redirect to the page after successful update
        header("Location: admin-records-resident.php");
        exit();
    } else {
        // Update failed
        echo "Error updating resident details: " . $conn->error;
    }



} elseif (isset($_POST['addResident'])) {
    // Handle the form submission for adding a new resident
    $residentID = $_POST['residentID']; 
    $block = $_POST['block'];
    $lot = $_POST['lot'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // Construct the insert query
    $insertQuery = "INSERT INTO tbl_resident (residentID, block, lot, name, age, gender) 
                    VALUES ('$residentID', '$block', '$lot', '$name', '$age', '$gender')";

    if ($conn->query($insertQuery)) {
        // Set a success message in the session
        $_SESSION['residentAdded'] = true;
        // Close the form by redirecting to the same page
        header('Location: admin-records-resident.php');
        exit();
    } else {
        // Set an error message in the session if insertion fails
        $_SESSION['residentAdded'] = false;
    }
}
?>
