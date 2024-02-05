<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['expenseID']) && isset($_POST['deleteExpense'])) {
        // Delete existing expense
        $expenseID = $_POST['expenseID'];

        // Delete the expense from the database
        $deleteQuery = "DELETE FROM tbl_expenses WHERE expenseID = '$expenseID'";
        $conn->query($deleteQuery);

        // Redirect back to the page to refresh the expense table
        header('Location: admin-accounting-expenses.php');
        exit();
        
    } elseif (isset($_POST['editExpenseID'])) {
        // Edit existing expense
        $editExpenseID = $_POST['editExpenseID'];
        $expenseName = $_POST['expenseName'];
        $date = $_POST['date'];
        $amount = $_POST['amount'];
    
        // Check if a new receipt image is uploaded
        if (isset($_FILES['receiptImage']) && $_FILES['receiptImage']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'C:/xampp/htdocs/berlexville-system/receipts-expenses/';
            $uploadFile = $uploadDir . basename($_FILES['receiptImage']['name']);
    
            // Move the uploaded file to the designated folder
            if (move_uploaded_file($_FILES['receiptImage']['tmp_name'], $uploadFile)) {
                // Store the new filename in the database
                $receiptFilename = $_FILES['receiptImage']['name'];
    
                // Update the expense record in the database
                $updateQuery = "UPDATE tbl_expenses SET expenseName = '$expenseName', date = '$date', amount = '$amount', proof = '$receiptFilename' WHERE expenseID = '$editExpenseID'";
                
                $conn->query($updateQuery);
    
                // Redirect back to the page to refresh the expense table
                header('Location: admin-accounting-expenses.php');
                exit();
            } else {
                echo "Error moving uploaded file.";
            }
        } else {
            // If no new receipt image is uploaded, keep the existing filename
            $receiptFilename = $_POST['existingReceiptFilename'];
    
            // Update the expense record in the database without changing the proof field
            $updateQuery = "UPDATE tbl_expenses SET expenseName = '$expenseName', date = '$date', amount = '$amount' WHERE expenseID = '$editExpenseID'";
            
            $conn->query($updateQuery);
    
            // Redirect back to the page to refresh the expense table
            header('Location: admin-accounting-expenses.php');
            exit();
        }
    } else {
        // Insert new expense
    } elseif (isset($_POST['addDonation'])) {
    $donator = $_POST['donator'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    // Process receipt image upload
    if (isset($_FILES['receiptImage']) && $_FILES['receiptImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'C:/xampp/htdocs/berlexville-system/receipts-expenses/';
        $uploadFile = $uploadDir . basename($_FILES['receiptImage']['name']);

        // Check if file already exists
        if (file_exists($uploadFile)) {
            echo "Sorry, file already exists.";
        } else {
            // Move the uploaded file to the designated folder
            if (move_uploaded_file($_FILES['receiptImage']['tmp_name'], $uploadFile)) {
                // Store the filename in the database
                $officialCopy = $_FILES['receiptImage']['name'];

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
