<?php
include '../db_connect.php';

if (isset($_POST['resolutionID']) && isset($_POST['deleteResolution'])) {
    // Delete existing resolution
    $resolutionID = $_POST['resolutionID'];

    // Directly interpolate the value into the delete query
    $deleteQuery = "DELETE FROM tbl_resolution WHERE resolutionID = '$resolutionID'";
    $conn->query($deleteQuery);

    // Redirect back to the page to refresh the resolution list
    header('Location: admin-records-resolution.php');
    exit();
} elseif (isset($_POST['editResolution'])) {
    // Retrieve form data
    $resolutionID = $_POST['editResolutionID'];
    $title = $_POST['title'];
    $dateCreated = $_POST['dateCreated'];
    $dateImplemented = $_POST['dateImplemented'];

    // Construct the update query
    $query = "UPDATE tbl_resolution SET
                title = '$title',
                dateCreated = '$dateCreated',
                dateImplemented = '$dateImplemented'
            WHERE resolutionID = '$resolutionID'";

    // Execute the update query
    if ($conn->query($query)) {
        header("Location: admin-records-resolution.php");
    } else {
        // Update failed
        echo "Error updating resolution details: " . mysqli_error($conn);
    }
} elseif (isset($_POST['addResolution'])) {
    $title = $_POST['title'];
    $dateCreated = $_POST['dateCreated'];
    $dateImplemented = $_POST['dateImplemented'];

    // Process the uploaded file
    $targetDir = "uploads/";  // Create a directory to store uploaded files
    $officialCopy = $targetDir . basename($_FILES["officialCopy"]["name"]);
    move_uploaded_file($_FILES["officialCopy"]["tmp_name"], $officialCopy);

    // Construct the insert query
    $insertQuery = "INSERT INTO tbl_resolution (title, dateCreated, dateImplemented, officialCopy) 
                    VALUES ('$title', '$dateCreated', '$dateImplemented', '$officialCopy')";

    if ($conn->query($insertQuery)) {
        // Set a success message in the session
        $_SESSION['resolutionAdded'] = true;
        // Close the form by redirecting to the same page
        header('Location: admin-records-resolution.php');
        exit();
    } else {
        // Set an error message in the session if insertion fails
        $_SESSION['resolutionAdded'] = false;
    }
}
?>
