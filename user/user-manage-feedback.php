<?php
session_start();

// Assuming you have a database connection
include '../db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the suggestion message from the form
    $concernMessage = $_POST['suggestionMessage']; // Assuming the textarea is still named 'suggestionMessage'

    // Get the current date
    $currentDate = date('Y-m-d');

    // Assuming you have the account ID in the session
    if (isset($_SESSION['accountID'])) {
        $accountID = $_SESSION['accountID'];

        // Check the value of the submission type
        $submissionType = $_POST['submissionType'];

        // Insert the concern into the database
        $insertQuery = "INSERT INTO tbl_communityFeedback (accountID, type, message, date, status) VALUES (?, 'Concern', ?, ?, 'Unread')";
        $stmt = $conn->prepare($insertQuery);

        if ($stmt) {
            // Bind parameters and execute the statement
            if ($submissionType === 'anonymous') {
                // Insert concern with a placeholder value for account ID
                $anonymousAccountID = '000000000';
                $stmt->bind_param("sss", $anonymousAccountID, $concernMessage, $currentDate);
            } else {
                // Insert concern with the actual account ID
                $stmt->bind_param("iss", $accountID, $concernMessage, $currentDate);
            }

            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->affected_rows > 0) {
                // Show a pop-up message using JavaScript
                echo '<script>alert("Concern submitted successfully!");';
                // Automatically redirect to the previous page after showing the pop-up with a delay of 0.5 seconds
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
