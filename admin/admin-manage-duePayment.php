<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editPaymentStatus'])) {
    // Check if the form is submitted and the button is clicked

    // Validate and sanitize input values
    $dueID = filter_input(INPUT_POST, 'dueID', FILTER_VALIDATE_INT);
    $paymentStatus = mysqli_real_escape_string($conn, $_POST['paymentStatus']);

    if ($dueID === false || $dueID === null) {
        // Invalid dueID, handle the error (you might want to redirect or display an error message)
        echo "Invalid Due ID.";
    } else {
        // Perform the update query
        $updateQuery = "UPDATE tbl_monthly SET status = '$paymentStatus' WHERE dueID = $dueID";

        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            // Update successful
            echo "Payment status updated successfully.";

            // Redirect back to admin-accounting-monthly.php after a short delay
            header("refresh:0.5;url=admin-accounting-monthly.php");
        } else {
            // Update failed
            echo "Error updating payment status: " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
