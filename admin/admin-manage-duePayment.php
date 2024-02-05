<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editPaymentStatus'])) {
    // Check if the form is submitted and the button is clicked

    // Validate and sanitize input values
    $dueID = filter_input(INPUT_POST, 'dueID', FILTER_VALIDATE_INT);
    $paymentStatus = mysqli_real_escape_string($conn, $_POST['paymentStatus']);
    $dateOfPayment = isset($_POST['dateOfPayment']) ? mysqli_real_escape_string($conn, $_POST['dateOfPayment']) : null;

    if ($dueID === false || $dueID === null) {
        // Invalid dueID, handle the error (you might want to redirect or display an error message)
        echo "Invalid Due ID.";
    } else {
        // Perform the update query
        $updateQuery = "UPDATE tbl_monthly SET status = '$paymentStatus', `date-of-payment` = '$dateOfPayment' WHERE dueID = $dueID";

        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            // Update successful
           

            // Redirect back to admin-accounting-monthly.php after a short delay
            header("Location: admin-accounting-monthly.php");
        } else {
            // Update failed
            echo "Error updating payment status and Date of Payment: " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
