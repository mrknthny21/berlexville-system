<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editPaymentStatus'])) {
    // Check if the form is submitted and the button is clicked

    // Validate and sanitize input values
    $amilyarID = filter_input(INPUT_POST, 'amilyarID', FILTER_VALIDATE_INT);
    $paymentStatus = mysqli_real_escape_string($conn, $_POST['paymentStatus']);

    if ($amilyarID === false || $amilyarID === null) {
        // Invalid amilyarID, handle the error (you might want to redirect or display an error message)
        echo "Invalid Amilyar ID.";
    } else {
        // Perform the update query
        $updateQuery = "UPDATE tbl_amilyar SET status = '$paymentStatus' `date-of-payment` = '$dateOfPayment' WHERE amilyarID = $amilyarID"; 

        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            // Update successful
            echo "Payment status updated successfully.";

            // Redirect back to admin-accounting-monthly.php after a short delay
            header("refresh:0.5;url=admin-accounting-amilyar.php");
        } else {
            // Update failed
            echo "Error updating payment status: " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>