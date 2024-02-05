<?php
include '../db_connect.php';

if (isset($_POST['resolutionID']) && isset($_POST['deleteResolution'])) {
    // Delete existing resolution
    $resolutionID = $_POST['resolutionID'];

    // Use prepared statement to prevent SQL injection
    $deleteQuery = $conn->prepare("DELETE FROM tbl_resolution WHERE resolutionID = ?");
    $deleteQuery->bind_param("i", $resolutionID);
    $deleteQuery->execute();

    // Redirect back to the page to refresh the resolution list
    header('Location: admin-records-resolution.php');
    exit();
} elseif (isset($_POST['editResolution'])) {
    // Retrieve form data
    $resolutionID = $_POST['editResolutionID'];
    $title = $_POST['title'];
    $dateCreated = $_POST['dateCreated'];
    $dateImplemented = $_POST['dateImplemented'];

    // Use prepared statement to prevent SQL injection
    $updateQuery = $conn->prepare("UPDATE tbl_resolution SET title = ?, dateCreated = ?, dateImplemented = ? WHERE resolutionID = ?");
    $updateQuery->bind_param("sssi", $title, $dateCreated, $dateImplemented, $resolutionID);
    $updateQuery->execute();

    // Redirect to refresh the resolution list
    header("Location: admin-records-resolution.php");
    exit();
} elseif (isset($_POST['addResolution'])) {
    $title = $_POST['title'];
    $dateCreated = $_POST['dateCreated'];
    $dateImplemented = $_POST['dateImplemented'];

    // Process the uploaded file
    $targetDir = "C:/xampp/htdocs/berlexville-system/resolution-files/";
    $officialCopy = $targetDir . basename($_FILES["officialCopy"]["name"]);

    if (move_uploaded_file($_FILES["officialCopy"]["tmp_name"], $officialCopy)) {
        // Use prepared statement to prevent SQL injection
        $insertQuery = $conn->prepare("INSERT INTO tbl_resolution (title, dateCreated, dateImplemented, officialCopy) VALUES (?, ?, ?, ?)");
        $insertQuery->bind_param("ssss", $title, $dateCreated, $dateImplemented, $officialCopy);
        
        if ($insertQuery->execute()) {
            // Set a success message in the session
            $_SESSION['resolutionAdded'] = true;
        } else {
            // Set an error message in the session if insertion fails
            $_SESSION['resolutionAdded'] = false;
        }
    } else {
        // Handle file upload failure
        $_SESSION['resolutionAdded'] = false;
    }

    // Close the form by redirecting to the same page
    header('Location: admin-records-resolution.php');
    exit();
}
?>
