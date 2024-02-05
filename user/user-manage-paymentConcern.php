<?php
session_start();

// Assuming you have a database connection
include '../db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user's concern message from the form
    $concernMessage = $_POST['concernMessage'];

    // Get the current date and time
    $currentDate = date('Y-m-d H:i:s');

    // Assuming you have the account ID in the session
    if (isset($_SESSION['accountID'])) {
        $accountID = $_SESSION['accountID'];

        // Set the status to "Unread" and insert the concern into the database
        $insertQuery = "INSERT INTO tbl_paymentconcerns (accountID, message, dateSent, status) VALUES (?, ?, ?, 'Unread')";
        $stmt = $conn->prepare($insertQuery);

        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bind_param("iss", $accountID, $concernMessage, $currentDate);
            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->affected_rows > 0) {
                // Show a pop-up message using JavaScript
                echo '<script>alert("Concern submitted successfully!");';
               
                echo 'setTimeout(function(){ window.location.href = document.referrer; }, 500);</script>';
            } else {
                echo "Error: Concern submission failed.";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $conn->error;
        }
    } else {
        echo "Error: Account ID not found in the session.";
    }
}
?>
