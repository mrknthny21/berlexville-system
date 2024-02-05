<?php 

include 'admin-nav-sidebars.php';
include '../db_connect.php';

// Fetch year data from the database
$yearQuery = "SELECT yearID, year FROM tbl_year";
$yearResult = mysqli_query($conn, $yearQuery);

if (!$yearResult) {
    die('Error in the query: ' . mysqli_error($conn));
}

$years = mysqli_fetch_all($yearResult, MYSQLI_ASSOC);

$homeownerMonthlyData = array();

$selectedYear = $_GET['selectedYear'] ?? null; 
$selectedMonth = $_GET['selectedMonth'] ?? null; 

if ($selectedYear !== null && $selectedMonth !== null) {
    
    $query = "SELECT h.blk, h.lot, h.name AS owner, m.dueID, m.amount, m.status m.`date-of-payment`
              FROM tbl_homeowners h
              LEFT JOIN tbl_amilyar m ON h.accountID = m.accountID
              WHERE m.year = $selectedYear AND m.month = '$selectedMonth'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $blk = $data['blk'];
            $lot = $data['lot'];
            $owner = $data['owner'];
            $amount = $data['amount'];
            $status = $data['status'];
            $dueID = $data['dueID'];
            $date_of_payment = $data['date-of-payment'];  // Added date_of_payment

            $homeownerMonthlyData[] = array(
                'blk' => $blk,
                'lot' => $lot,
                'owner' => $owner,
                'amount' => $amount,
                'status' => $status,
                'dueID' => $dueID,  
                'date-of-payment' => $date_of_payment, 
            );
        }
    } else {
        // Handle case where no data is found for the selected year and month
    }
}

mysqli_close($conn);
?>






<!DOCTYPE html>
<html lang="en">
<style>
         body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden; /* Hide horizontal overflow */
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
            padding-top: 600px;
        }

        .title {
            width: 100%;
            height: 5vh;
            display: flex;
            flex-direction: row;
            margin-top: 80px;
            margin-left:-30px;
            margin-bottom: -10vh;
            
        }

        .title p {
            margin: 0; /* Remove default margin for the paragraph */
            font-weight: bold;
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
            margin-left: 0vw;
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
        
        #editForm select {
            width: 100%;
            padding: 8px; /* Add padding for better appearance */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            border: 1px solid black; /* Add a border for better visibility */
            border-radius: 4px; /* Add border-radius for rounded corners */
            margin-top: 10px;
            
        }
        #editForm input[type="text"], #editForm input[type="date"] {
            width: 100%;
            padding: 8px; /* Add padding for better appearance */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            border: 1px solid black; /* Add a border for better visibility */
            border-radius: 4px; /* Add border-radius for rounded corners */
            margin-bottom: 10px; /* Add margin to separate input elements */
        }

        .month select,
        .year select {
            outline: none;
            border: 1px solid #EFEFEF; /* Add border for better visibility if needed */
            border-radius: 4px; /* Add border-radius for rounded corners */
            padding: 8px; /* Add padding for better appearance */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            height: 5vh;
            padding-bottom: 1px;
            background-color: #EFEFEF;
            font-family: 'Poppins', sans-serif;
            margin-left: 0;
        }
        /* Vertically align text and select elements */
        .month, .year {
            display: flex;
            align-items: center;
        }

        /* Optional: Adjust margin or padding for better spacing */
        .month p, .year p, .month select, .year select {
            margin: 0;
            padding: 5px; /* Adjust as needed */
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
            <div class="upperbox">
                <p>Amilyar</p>
                <a href="admin-accounting.php">
                    <i class="fa-regular fa-square-caret-left"></i>
                </a>
            </div>  

            <div class="middlebox">
            <div class="title" >      
                <div class="dropdown">
                
                    <div class="year">
                        <p>Year of  </p>
                        <select name='year' id="yearDropdown" onchange="updateTable()">
                            <?php foreach ($years as $year): ?>
                                <option value="<?php echo $year['yearID']; ?>"><?php echo $year['year']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="tablebox">

            

                <table id="monthlyTable">
                    <thead>
                        <tr>
                           
                            <th>Block</th>
                            <th>Lot</th>
                            <th>Owner</th>
                            <th>Amount</th>
                            <th>Date of Payment</th>
                            <th>Status</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($homeownerMonthlyData as $row): ?>
                            <tr>
                               
                                <td><?php echo $row['blk']; ?></td>
                                <td><?php echo $row['lot']; ?></td>
                                <td><?php echo $row['owner']; ?></td>
                                <td><?php echo isset($row['amount']) ? $row['amount'] : 100; ?></td>
                                <td><?php echo isset($row['date-of-payment']) ? $row['date-of-payment'] : '---'; ?></td>
                                <td><?php echo isset($row['status']) ? $row['status'] : 'Unpaid'; ?></td>
                                <td>
                                <div class="modify">
                                <i class="fa-regular fa-pen-to-square edit-icon" data-amilyarID="<?php echo $row['amilyarID']; ?>"></i>
                                </div>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>




            <div id="editForm" class="form-popup">
                <form action="admin-manage-amilyar.php" method="POST" class="form-container" enctype="multipart/form-data">
                    <h2>Edit Payment Status</h2>

                    <!-- Use amilyarID instead of dueID -->
                    <input type="hidden" name="amilyarID" id="amilyarID">

                    <label for="paymentStatus"><b>Payment Status</b></label>
                    <br>
                    <select name="paymentStatus" id="paymentStatus" required>
                        <option value="Unpaid" selected>Unpaid</option>
                        <option value="Exempted">Exempted</option>
                        <option value="Paid">Paid</option>
                    </select>

                    <br> <br>
                    <label for="dateOfPayment"><b>Date of Payment</b></label>
                    <input type="date" name="dateOfPayment" id="dateOfPayment">

                    <button type="submit" name="editPaymentStatus" id="editPaymentStatus" class="fa-solid fa-pencil">Save Changes</button>
                    <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
                </form>
            </div>

    <script>

document.addEventListener('DOMContentLoaded', function () {
    updateTable();
});

console.log('Script is running.');

function updateTable() {
    // Get the selected year value
    var selectedYear = document.getElementById('yearDropdown').value;

    // Make an AJAX request to fetch filtered data
    fetch(`fetch-filtered-data-year.php?selectedYear=${selectedYear}`)
        .then(response => response.json())
        .then(filteredData => {
            // Directly update the table with the filtered data
            var tableBody = document.getElementById('monthlyTable').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = ''; // Clear existing rows

            // Iterate over the filtered data and append rows to the table
           // Iterate over the filtered data and append rows to the table
                filteredData.forEach(row => {
                    var newRow = tableBody.insertRow(tableBody.rows.length);
                  
                    // Hide the amilyarID column
                    newRow.insertCell(0).style.display = 'none';
    
                    newRow.insertCell(1).textContent = row.blk;
                    newRow.insertCell(2).textContent = row.lot;
                    newRow.insertCell(3).textContent = row.owner;
                    newRow.insertCell(4).textContent = row.amount || 100;
                    newRow.insertCell(5).textContent = row['date-of-payment'] || '---'; 
                    newRow.insertCell(6).textContent = row.status || 'Unpaid';
                    newRow.insertCell(7).innerHTML = '<div class="modify"><i class="fa-regular fa-pen-to-square edit-icon" data-amilyarid="' + row.amilyarID + '"></i></div>';
                });

            })
        .catch(error => console.error('Error fetching filtered data:', error));
}

document.addEventListener('click', function (event) {
    var target = event.target;

    // Check if the clicked element has the class 'edit-icon'
    if (target.classList.contains('edit-icon')) {
        // Retrieve the amilyarID from the data-amilyarid attribute of the clicked icon
        var amilyarID = target.getAttribute('data-amilyarid');

        // Log to the console for verification
        console.log('Amilyar ID:', amilyarID);

        // Pass the amilyarID to the openEditForm function
        openEditForm(amilyarID);
    }
});

// Function to open the edit form
function openEditForm(amilyarID) {
    // Use the amilyarID as needed to open the edit form
    console.log('Open Edit Form for Amilyar ID:', amilyarID);

    // For example, you can set the amilyarID as the value of an input field in the edit form
    document.getElementById("amilyarID").value = amilyarID;

    // Show the edit form
    document.getElementById("editForm").style.display = "block";
}

// Function to close the edit form
function closeEditForm() {
    // Hide the edit form
    document.getElementById("editForm").style.display = "none";
}

            
            </script>
        </body>
    </html>














