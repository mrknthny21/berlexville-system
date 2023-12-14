<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the delete button is clicked
    if (isset($_POST['account_id']) && isset($_POST['deleteUser'])) {
        // Delete existing user
        $userID = $_POST['account_id'];

        // Delete the user from the database
        $deleteQuery = "DELETE FROM users WHERE userID = '$userID'";
        $conn->query($deleteQuery);

        // Redirect back to the page to refresh the user list
        header('Location: admin-records-user.php');
        exit();
    } elseif (isset($_POST['updateUser'])) {
        // Retrieve form data
        $userID = $_POST['userId'];
        $userName = $_POST['userName'];
        $userBlock = $_POST['userBlock'];
        $userLot = $_POST['userLot'];
        $userPassword = $_POST['userPassword'];
        $userRole = $_POST['userRole'];

        // Construct the update query
        $query = "UPDATE users SET
                    name = '$userName',
                    blk = '$userBlock',
                    lot = '$userLot',
                    password = '$userPassword',
                    role = '$userRole'
                WHERE account_Id = '$userID'";

        // Execute the update query
        if (mysqli_query($conn, $query)) {
            header("Location: admin-records-user.php");
        } else {
            // Update failed
            echo "Error updating user details: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['addUser'])) {
        // Handle the form submission for adding a new user
        $userName = $_POST['userName'];
        $userBlock = $_POST['userBlock'];
        $userLot = $_POST['userLot'];
        $userID = $_POST['userID'];
        $userPassword = $_POST['userPassword'];
    

        // Construct the insert query
        $insertQuery = "INSERT INTO tbl_homeowners (blk, lot, name, account_id, password) VALUES ('$userBlock', '$userLot', '$userName', '$userID', '$userPassword')";

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
}
?>
