<?php
include 'admin-nav-sidebars.php';
include '../db_connect.php';

// Initialize an array to store the expense data
$expenses = array();

$query = "SELECT expenseID, expenseName, date, amount, proof FROM tbl_expenses";
$result = mysqli_query($conn, $query);

// Retrieve expense data from the database
if ($result && mysqli_num_rows($result) > 0) {
    while ($expense = mysqli_fetch_assoc($result)) {
        // Extract expense details
        $expenseID = $expense['expenseID']; 
        $expenseName = $expense['expenseName'];
        $date = $expense['date'];
        $amount = $expense['amount'];
        $proof = $expense['proof']; // New column for receipts

        // Create an array with expense details
        $expenses[] = array(
            'expenseID' => $expenseID,
            'expenseName' => $expenseName,
            'date' => $date,
            'amount' => $amount,
            'proof' => $proof
        );
    }
}


// Retrieving the budget for the year 2023
$query = "SELECT total_budget FROM tbl_budget WHERE yearID = 2023";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$totalBudget = $row['total_budget'];

// Assuming your table name is 'your_table_name'
$tableName = 'tbl_monthly';

// Query to retrieve and total the value of paid monthly dues
$query = "SELECT SUM(amount) AS totalDueIncome FROM $tableName WHERE status = 'Paid'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Fetch the result row as an associative array
    $row = mysqli_fetch_assoc($result);

    // Access the totalDueIncome value
    $totalDueIncome = $row['totalDueIncome'];

  
} else {
    // Handle the query error
    echo "Error: " . mysqli_error($conn);
}


// Assuming your table name is 'tbl_donation'
$tableNameDonation = 'tbl_donation';

// Query to retrieve and total the value of donations
$queryDonation = "SELECT SUM(amount) AS totalDonationAmount FROM $tableNameDonation";
$resultDonation = mysqli_query($conn, $queryDonation);

if ($resultDonation) {
    // Fetch the result row as an associative array
    $rowDonation = mysqli_fetch_assoc($resultDonation);

    // Access the totalDonationAmount value
    $totalDonationAmount = $rowDonation['totalDonationAmount'];

} else {
    // Handle the query error
    echo "Error: " . mysqli_error($conn);
}


// Calculate the overall budget by adding the two totals
$overallBudget = $totalDueIncome + $totalDonationAmount;


// Retrieving the total expenses for the year 2023
$query = "SELECT SUM(amount) AS total_expenses FROM tbl_expenses";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$totalExpenses = $row['total_expenses'];

// Calculating the remaining budget
$remainingBudget = $totalBudget - $totalExpenses;
?>








<!DOCTYPE html>
<html lang="en">
    <style>
         body {
            font-family: 'Poppins', sans-serif;
        }

        .content-area {
            height: auto;
            width: 73vw;
            margin-left: 23vw;
            padding: 1vh;
            justify-content:left;
            display: flex;
            flex-wrap: wrap; 
            align-items: flex-start;
            margin-top: 0vh;
        }

        .upperbox {
            border-bottom: 1px black solid;
            width: 100vw;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding-left: 0px;
        }

        .upperbox i {
            font-size: 25px;
        }

        .middlebox {
            width: 100vw;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
            margin-top: 2px;
        }

        table {
            border-collapse: collapse;
            width: 95%;
            border: 1px solid black;
            align-items: center;
            margin-top: -50px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            border: 1px solid black;
            
        }

        th {
            background-color: #f2f2f2;
        }

        .bottombox{
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        
        .add-button{
            width: 15vw;
            height: 5vh;
            border: 1px black solid;
            display: flex;
            flex-direction: row;
            justify-content: center;
            border-radius: 5px;
            align-items:center;
            background-color:#4F71CA;
            padding: 3px;
        }
        .add-button i {
            margin-right: 8px; /* Adjust as needed to create space between icon and text */
            font-size: 20px;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
          
        }

        .popup-content {
            text-align: center;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

      

        .form-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            width: 20vw;
            border-radius: 10px;

        }

        .form-popup button{
            border-radius: 10px;
        }

        .form-container {
            text-align: left;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
        }

        .form-container button.cancel {
            background-color: #f44336;
        }

        .form-container label {
            justify: left;
        }

        .fa-regular.fa-square-caret-left {
            color: black;
        }

        .tablebox{
            border: 1px solid black;
            border-radius: 10px;
            width: 72vw;
            height:80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            align-items: center;
            margin: auto;
            flex-direction: column;
            overflow: auto;
        }

        .title {
        
            width: 100%;
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
        }

        .title p {
            margin: 0; /* Remove default margin for the paragraph */
        }

        .dropdown {
            margin-left: 2vw;
            display: flex;
            flex-direction: row;
            width: 30vw;
            margin-top: -10vh;
            height: 4vh;
          
        }
      

        .left {
            margin-left: 50vw;
        }

        .year-dropdown {
            display: none;
        }

        .month{
            display: flex;
            flex-direction: row;
        }

        .year{
            display: flex;
            flex-direction: row;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
          
        }

        .popup-content {
            text-align: center;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

      

        .form-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            width: 20vw;
            border-radius: 10px;

        }

        .form-popup button{
            border-radius: 10px;
        }

        .form-container {
            text-align: left;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
        }

        .form-container button.cancel {
            background-color: #f44336;
        }

        .form-container label {
            justify: left;
        }

        .form-popup {   
            display: none;
        }

.status-box{
  display: flex;


}
.budget-box-add {
    background: #4F71CA;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    width: 185px;
    height: 110px;
    margin: 10px;
    text-align: center;
    border-radius: 15px;
    border: solid 1px black;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer; /* Add pointer cursor to indicate it's clickable */
    transition: background-color 0.3s ease; 
}

.budget-box-add:hover {
    background-color:white; /* Darker color on hover */
}

.budget-box-add i {
    margin-bottom: 10px; /* Add space between icon and text */
}
.budget-box-add p{
    font-size:12px;
    font-weight: bold;

}
.budget-box{
  background: white;
  background: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  width:  280px;
  height: 90px;
  margin: 10px;
  text-align: center;
  border-radius: 15px;
  border-radius: 15px;
  border: solid 1px black;
  padding-top:20px;
}

.budget-box h2{
margin-bottom: 20px:
}

.total-expenses-box{
  background: white;
  background: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  width:  280px;
  height: 90px;
  margin: 10px;
  text-align: center;
  border-radius: 15px;
  border: solid 1px black;
  padding-top:20px;
}

.align-tbl-finances{
  margin: 5px 0px 0px 5px;
}

.tabledisplay-finance #expense-table {
  width: 100%;
  border-collapse: collapse;
  table-layout: fixed;
  margin-top: 10px;
}
        
.edit-button,
.delete-button {
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

/* Edit button specific styles */
.edit-button {
    background-color: #4CAF50; /* Green color */
    color: white;
}

/* Delete button specific styles */
.delete-button {
    background-color: #f44336; /* Red color */
    color: white;
    margin-left: 10px; /* Add some spacing between the buttons */
}

/* Hover effect for both buttons */
.edit-button:hover,
.delete-button:hover {
    background-color: #45a049; /* Darker green for edit button */
}


.popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
          
        }

        .popup-content {
            text-align: center;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

      

        .form-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            width: 20vw;
            border-radius: 10px;

        }

        .form-popup button{
            border-radius: 10px;
        }

        .form-container {
            text-align: left;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
        }

        .form-container button.cancel {
            background-color: #f44336;
        }

        .form-container label {
            justify: left;
        }

        /* Style for the modal */
#imageModal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.8); /* Black background with opacity */
}

/* Modal content */
#imageModalContent {
    position: relative;
    margin: auto;
    display: block;
    width: 80%; /* Adjust width as needed */
    max-width: 800px;
    max-height: 80%; /* Adjust height as needed */
    text-align: center;
    overflow: hidden;
}

/* Close button */
#closeImageModal {
    color: #fff;
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 30px;
    font-weight: bold;
    cursor: pointer;
}

/* Image */
#modalImage {
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 100%;
    margin-top: 20px;
}
        
/* Style for clickable filename */
.file-link {
    color: inherit; /* Use the default text color */
    text-decoration: none; /* Remove underline */
    cursor: pointer; /* Add pointer cursor for clickable items */
}

.file-link:hover {
    text-decoration: underline; /* Underline on hover */
    color: #007bff; /* Change color on hover, use the desired color */
}
    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Records</title>

    </head>

    <body>
        <div class ="content-area">
            <div class="upperbox" >
                <p>Expenses</p>
                <a href="admin-accounting.php">
                    <i class="fa-regular fa-square-caret-left"></i>
                </a>
            </div>  

            <div class="middlebox">
                <div class="middlebox-finance">
                        <div class="status-box">
                                <div class="budget-box-add" onclick="showAddForm()">
                                
                                    <i class="fa-solid fa-plus"></i>
                                        <p>Add New Expense</p>
                                </div>
                            
                                <div class="budget-box">
                                <ion-icon name="card-outline"></ion-icon>
                                <h2><?php echo '₱' , $overallBudget?></h2>
                                <p>Budget</p>
                            </div>
                        
                            <div class="total-expenses-box">
                                <ion-icon name="receipt-outline"></ion-icon>
                                <h2><?php echo  '₱' ,$totalExpenses?></h2>
                                <p> Total Expenses</p>
                            </div>

                            <div class="total-expenses-box">
                                <ion-icon name="cash-outline"></ion-icon>
                                <h2><?php echo  '₱' ,$remainingBudget?></h2>
                                <p> Remaining Budget</p>
                            </div>
                </div>

                <div class="align-tbl-finances">  
                    <div class="table-box">
                        <p>EXPENSES</p>
                        <div class="tabledisplay-finance">
                            <table id="expense-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Amount Spent</th>
                                        <th>Receipt</th> <!-- New column for receipts -->
                                        <th>Modify</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($expenses as $expense): ?>
                                        <tr>
                                        <td><?php echo $expense['expenseID']; ?></td>
                                            <td><?php echo $expense['expenseName']; ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($expense['date'])); ?></td>

                                            <td><?php echo $expense['amount']; ?></td>
                                            <td>
                                            <?php if ($expense['proof']) : ?>
                                                <a href="#" class="file-link" onclick="openImageModal('<?php echo $expense['proof']; ?>')">
                                                    <?php echo $expense['proof']; ?>
                                                </a>
                                            <?php else : ?>
                                                No Receipt
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <i class="fa-regular fa-pen-to-square edit-icon" data-expenseid="<?php echo $expense['expenseID']; ?>"></i>

                                            <i class="fa-regular fa-trash-can" onclick="deleteExpense(<?php echo $expense['expenseID']; ?>)"></i>
                                        </td>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

<!-- Modal -->
<div id="imageModal">
  <div id="imageModalContent">
    <span id="closeImageModal" onclick="closeImageModal()">&times;</span>
    <img id="modalImage">
  </div>
</div>
                    <div id="addForm" class="form-popup">
                        <form action="admin-manage-expenses.php" method="POST" class="form-container" enctype="multipart/form-data">
                            <h2>Add Expense</h2>

                            <label for="date"><b>Date</b></label>
                            <input type="date" name="date" required>

                            <label for="expenseName"><b>Expense Name</b></label>
                            <input type="text" name="expenseName" placeholder="Enter Expense Name" required>

                            <label for="amount"><b>Amount</b></label>
                            <input type="text" name="amount" placeholder="Enter Amount" required>

                            <label for="receiptImage"><b>Receipt Image</b></label>
                            <input type="file" name="receiptImage" accept="image/*">

                            <button type="submit" name="addExpense" class="fa-solid fa-plus" onclick="closeAddForm()">Add</button>
                            <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
                        </form>
                    </div>
                                
                    <div id="editForm" class="form-popup">
                        <form action="admin-manage-expenses.php" method="POST" class="form-container" enctype="multipart/form-data">
                            <h2>Edit Expense</h2>

                            <label for="date"><b>Date</b></label>
                            <input type="date" name="date" id="date" required>

                            <label for="expenseName"><b>Expense Name</b></label>
                            <input type="text" name="expenseName" id="expenseName" placeholder="Enter Expense Name" required>

                            <label for="amount"><b>Amount</b></label>
                            <input type="text" name="amount" id="amount" placeholder="Enter Amount" required>

                            <!-- Input for the receipt image -->
                            <label for="receiptImage"><b>Receipt Image</b></label>
                            <input type="file" name="receiptImage" accept="image/*">

                            <!-- Display already uploaded filename -->
                            <label for="uploadedFilename"><b>Uploaded Receipt </b></label>
                            <input type="text" name="uploadedFilename" id="uploadedFilename" readonly>

                            <!-- Hidden field for editExpenseID -->
                            <input type="hidden" name="editExpenseID" id="editExpenseID">

                            <button type="submit" name="editExpense" class="fa-solid fa-pencil">Save Changes</button>
                            <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
                        </form>
                    </div>




                    <form id="deleteExpenseForm" action="admin-manage-expenses.php" method="post">
                        <input type="hidden" name="expenseID" id="expenseIDInput">
                        <input type="hidden" name="deleteExpense" value="1">
                    </form>

             <script> 


                 // Function to show the add form
                 function showAddForm() {
                document.getElementById("addForm").style.display = "block";
            }

            // Function to close the add form
            function closeAddForm() {
                document.getElementById("addForm").style.display = "none";
            }
      
        // ---------------------------------- adding instructor open js -------------------------------- //


       





                // ------------------------- OPENING EDITING FORM --------------------------------//


   // Assuming you have edit icons with a class 'edit-icon'
   var editIcons = document.getElementsByClassName('edit-icon');

// Add event listeners to each "Edit" icon
Array.from(editIcons).forEach(function (editIcon) {
    editIcon.addEventListener('click', function (event) {
        var expenseID = event.target.getAttribute('data-expenseid');
        console.log('Clicked Edit Icon with Expense ID:', expenseID);
        openEditForm(expenseID);
    });
});
function openEditForm(expenseID) {
    console.log('Opening Edit Form for Expense ID:', expenseID);

    // Assuming $expenses is a PHP array containing expense details
    var expenses = <?php echo json_encode($expenses); ?>;
    var expense = expenses.find(function (e) {
        return e.expenseID == expenseID;
    });

    if (expense) {
        console.log('Expense Details:', expense);

        // Format the date to 'YYYY-MM-DD' and set it in the input field
        var formattedDate = new Date(expense.date).toISOString().split('T')[0];
        document.getElementById("date").value = formattedDate;

        document.getElementById("expenseName").value = expense.expenseName;
        document.getElementById("amount").value = expense.amount;

        // Set the existing receipt filename
        document.getElementById("uploadedFilename").value = expense.proof;

        // Set the expense ID value in the hidden field
        document.getElementById("editExpenseID").value = expense.expenseID;

        // Show the edit form
        document.getElementById("editForm").style.display = "block";
    } else {
        console.log("Expense not found for ID: " + expenseID);
    }
}

// Function to close the edit form
function closeEditForm() {
    // Hide the edit form
    document.getElementById("editForm").style.display = "none";
}


                //--------------------------- DELETE CONFIRMATION PROMPT ------------------------------//
                function deleteExpense(expenseID) {
                    if (confirm("Are you sure you want to delete this expense?")) {
                        document.getElementById('expenseIDInput').value = expenseID;
                        document.getElementById('deleteExpenseForm').submit();
                    }
                }
                

                //--------------------------- DELETE CONFIRMATION PROMPT ------------------------------//
                function openImageModal(filename) {
                    if (filename) {
                        // Assuming you have a modal with ID 'imageModal' and an image tag with ID 'modalImage'
                        var modal = document.getElementById('imageModal');
                        var image = document.getElementById('modalImage');
                        
                        // Set the source of the image tag to display the clicked image
                        image.src = 'http://localhost/berlexville-system/receipts-expenses/' + filename;

                        
                        // Open the modal
                        modal.style.display = 'block';
                    }
                }

                // Add a close function for the modal if needed
                function closeImageModal() {
                    var modal = document.getElementById('imageModal');
                    modal.style.display = 'none';
                }
                
         </script>
        </body>

    </html>














