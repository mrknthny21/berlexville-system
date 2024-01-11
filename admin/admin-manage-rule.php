<?php
include '../db_connect.php';

if (isset($_POST['ruleID']) && isset($_POST['deleteRule'])) {
    // Delete existing rule
    $ruleID = $_POST['ruleID'];

    // Directly interpolate the value into the delete query
    $deleteQuery = "DELETE FROM tbl_rules WHERE ruleID = '$ruleID'";
    $conn->query($deleteQuery);

    // Redirect back to the page to refresh the rule list
    header('Location: admin-records-rules.php');
    exit();
} elseif (isset($_POST['editRule'])) {
    // Retrieve form data
    $ruleID = $_POST['editRuleID'];
    $title = $_POST['title'];
    $dateCreated = $_POST['dateCreated'];
    $dateImplemented = $_POST['dateImplemented'];

    // Construct the update query
    $query = "UPDATE tbl_rules SET
                title = '$title',
                dateCreated = '$dateCreated',
                dateImplemented = '$dateImplemented'
            WHERE ruleID = '$ruleID'";

    // Execute the update query
    if ($conn->query($query)) {
        header("Location: admin-records-rules.php");
    } else {
        // Update failed
        echo "Error updating rule details: " . mysqli_error($conn);
    }
} elseif (isset($_POST['addRule'])) {
    $title = $_POST['title'];
    $dateCreated = $_POST['dateCreated'];
    $dateImplemented = $_POST['dateImplemented'];

    // Process the uploaded file
    $targetDir = "uploads/";  // Create a directory to store uploaded files
    $officialCopy = $targetDir . basename($_FILES["officialCopy"]["name"]);
    move_uploaded_file($_FILES["officialCopy"]["tmp_name"], $officialCopy);

    // Construct the insert query
    $insertQuery = "INSERT INTO tbl_rules (title, dateCreated, dateImplemented, officialCopy) 
                    VALUES ('$title', '$dateCreated', '$dateImplemented', '$officialCopy')";

    if ($conn->query($insertQuery)) {
        // Set a success message in the session
        $_SESSION['ruleAdded'] = true;
        // Close the form by redirecting to the same page
        header('Location: admin-records-rules.php');
        exit();
    } else {
        // Set an error message in the session if insertion fails
        $_SESSION['ruleAdded'] = false;
    }
}
?>
