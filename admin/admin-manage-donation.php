<?php
include '../db_connect.php';

if (isset($_POST['donationID']) && isset($_POST['deleteDonation'])) {
    // Delete existing donation
    $donationID = $_POST['donationID'];

    // Directly interpolate the value into the delete query
    $deleteQuery = "DELETE FROM tbl_donation WHERE donationID = '$donationID'";
    $conn->query($deleteQuery);

    // Redirect back to the page to refresh the donation list
    header('Location: admin-accounting-donation.php');
    exit();
} elseif (isset($_POST['editDonationID'])) {
    // Retrieve form data
    $donationID = $_POST['donationID'];
    $donator = $_POST['donator'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    // Construct the update query
    $query = "UPDATE tbl_donation SET
                donator = '$donator',
                amount = '$amount',
                date = '$date'
            WHERE donationID = '$donationID'";

    // Execute the update query
    if (mysqli_query($conn, $query)) {
        header('Location: admin-accounting-donation.php');
    } else {
        // Update failed
        echo "Error updating donation details: " . mysqli_error($conn);
    }
} elseif (isset($_POST['addDonation'])) {
    $donator = $_POST['donator'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    
    // Process receipt image upload
    if (isset($_FILES['proofImage']) && $_FILES['proofImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'C:/xampp/htdocs/berlexville-system/receipts-expenses/';
        $uploadFile = $uploadDir . basename($_FILES['proofImage']['name']);

        // Check if file already exists
        if (file_exists($uploadFile)) {
            echo "Sorry, file already exists.";
        } else {
            // Move the uploaded file to the designated folder
            if (move_uploaded_file($_FILES['proofImage']['tmp_name'], $uploadFile)) {
                // Store the filename in the database
                $officialCopy = $_FILES['proofImage']['name'];

                // Use prepared statement to insert data into the database
                $insertQuery = "INSERT INTO tbl_donation (donator, amount, date, officialCopy) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("ssss", $donator, $amount, $date, $officialCopy);

                if ($stmt->execute()) {
                    // Set a success message in the session
                    $_SESSION['donationAdded'] = true;
                    // Close the form by redirecting to the same page
                    header('Location: admin-accounting-donation.php');
                    exit();
                } else {
                    // Set an error message in the session if insertion fails
                    $_SESSION['donationAdded'] = false;
                    echo "Error inserting data into the database: " . $stmt->error;
                }
            } else {
                echo "Error moving uploaded file.";
            }
        }
    } else {
        // If no receipt image is uploaded, set filename to NULL
        $officialCopy = NULL;

        // Use prepared statement to insert data into the database
        $insertQuery = "INSERT INTO tbl_donation (donator, amount, date, officialCopy) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $donator, $amount, $date, $officialCopy);

        if ($stmt->execute()) {
            // Set a success message in the session
            $_SESSION['donationAdded'] = true;
            // Close the form by redirecting to the same page
            header('Location: admin-accounting-donation.php');
            exit();
        } else {
            // Set an error message in the session if insertion fails
            $_SESSION['donationAdded'] = false;
            echo "Error inserting data into the database: " . $stmt->error;
        }
    }
}

?>
