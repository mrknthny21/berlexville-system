<?php
include '../db_connect.php';

if (isset($_POST['accountID']) && isset($_POST['deleteResident'])) {
    // Delete existing user
    $userID = $_POST['accountID'];

    // Directly interpolate the value into the delete query
    $deleteQuery = "DELETE FROM tbl_homeowners WHERE accountID = '$userID'";
    $conn->query($deleteQuery);

    // Redirect back to the page to refresh the user list
    header('Location: admin-records-user.php');
    exit();
} elseif (isset($_POST['editHomeownerID'])) {
    // Retrieve form data
    $userID = $_POST['homeownerID'];
    $userName = $_POST['userName'];
    $userBlock = $_POST['userBlock'];
    $userLot = $_POST['userLot'];
    $userPassword = $_POST['userPassword'];
    $userRole = $_POST['userRole'];

    // Construct the update query
    $query = "UPDATE tbl_homeowners SET
                name = '$userName',
                blk = '$userBlock',
                lot = '$userLot',
                password = '$userPassword',
                role = '$userRole'
            WHERE accountID = '$userID'";

    // Execute the update query
    if (mysqli_query($conn, $query)) {
        header("Location: admin-records-user.php");
    } else {
        // Update failed
        echo "Error updating user details: " . mysqli_error($conn);
    }


} elseif (isset($_POST['addUser'])) {
    $userName = $_POST['name'];
    $userBlock = $_POST['block'];
    $userLot = $_POST['lot'];
    $userID = $_POST['homeownerID'];
    $userPassword = $_POST['password'];
    $userRole = $_POST['role']; // Include the role field in the form

    // Construct the insert query
    $insertQuery = "INSERT INTO tbl_homeowners (blk, lot, name, accountID, password, role) VALUES ('$userBlock', '$userLot', '$userName', '$userID', '$userPassword', '$userRole')";

    if ($conn->query($insertQuery)) {
        // Set a success message in the session
        $_SESSION['userAdded'] = true;
        // Close the form by redirecting to the same page
        header('Location: admin-records-user.php');
        exit();
    } else {
        // Set an error message in the session if insertion fails
        $_SESSION['userAdded'] = false;
    }
}
?>
