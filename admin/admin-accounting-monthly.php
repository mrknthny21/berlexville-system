<?php 
include 'admin-nav-sidebars.php';


include '../db_connect.php';

// Initialize an array to store the homeowner monthly data
$homeownerMonthlyData = array();

// Replace the conditions with your dynamic year and month selection
$year = 2024;
$month = 'January';

$query = "SELECT h.blk, h.lot, h.name AS owner, m.amount, m.status
          FROM tbl_homeowners h
          LEFT JOIN tbl_monthly m ON h.accountID = m.accountID";

$result = mysqli_query($conn, $query);

// Retrieve homeowner monthly data from the database
if ($result && mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        // Extract data details
        $blk = $data['blk'];
        $lot = $data['lot'];
        $owner = $data['owner'];
        $amount = $data['amount'];
        $status = $data['status'];

        // Create an array with data details
        $homeownerMonthlyData[] = array(
            'blk' => $blk,
            'lot' => $lot,
            'owner' => $owner,
            'amount' => $amount,
            'status' => $status
        );
    }
}
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
            flex-direction: row;
            justify-content: space-between;
            padding: 10px;
            margin-top: 2px;
        }

        table {
            border-collapse: collapse;
            width: 95%;
            border: 1px solid black;
            align-items: center;
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
        
        }

        .title {
            border: solid 1px black;
            width: 95%;
            margin-bottom: 10px;
            display: flex;
         
            align-items: center;
        }

        .title p {
            margin: 0; /* Remove default margin for the paragraph */
        }

        .dropdown {
            margin-left: 1vw;
        }
      

        .left {
            margin-left: 50vw;
        }

        .year-dropdown {
            display: none;
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
                <p>Monthly Dues</p>
                <a href="admin-records.php">
                    <i class="fa-regular fa-square-caret-left"></i>
                </a>
            </div>  

            <div class="middlebox">

            <div class="tablebox">
                
                <div class="title" >    
                <div class="dropdown">
                    <i class="fa-solid fa-caret-down" onclick="toggleYearDropdown()"></i>
                    <select id="yearDropdown" class="year-dropdown" onchange="updateMonthYearText()">
                        <!-- Options will be added dynamically using JavaScript -->
                    </select>
                </div>
                <div class="left" onclick="decrementMonth()"><i class="fa-solid fa-angle-left"></i></div>
                <div class="right" onclick="incrementMonth()"><i class="fa-solid fa-angle-right"></i></div>
                <p id="selectedMonthYear">Month of November 2024</p>
                </div>
           
                <table>
                    <thead>
                        <tr>
                            <th>Block</th>
                            <th>Lot</th>
                            <th>Owner</th>
                            <th>Amount</th>
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
                            <td><?php echo isset($row['status']) ? $row['status'] : 'Unpaid'; ?></td>

                            <td>
                                <div class="modify">
                                    <i class="fa-regular fa-pen-to-square edit-icon" data-ownerid="<?php echo $row['owner']; ?>"></i>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            


        </div>

        <script>
    // Global variable to store the months
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    function toggleYearDropdown() {
        var yearDropdown = document.getElementById('yearDropdown');

        // Check if the dropdown is visible
        var isDropdownVisible = window.getComputedStyle(yearDropdown).display !== 'none';

        // Toggle the visibility of the dropdown
        if (isDropdownVisible) {
            yearDropdown.style.display = 'none';
        } else {
            yearDropdown.style.display = 'block';
            yearDropdown.focus(); // Optional: Focus on the dropdown to enable keyboard navigation
        }
    }

    function updateYearDropdown() {
        var yearDropdown = document.getElementById('yearDropdown');

        // Remove existing options
        yearDropdown.innerHTML = '';

        // Add options dynamically
        for (var year = 2020; year <= 2024; year++) {
            var option = document.createElement('option');
            option.value = year;
            option.text = year;
            yearDropdown.add(option);
        }

        // Set default selected year to 2024
        yearDropdown.value = 2024;
    }

    function updateMonthYearText() {
    var yearDropdown = document.getElementById('yearDropdown');
    var selectedYear = parseInt(yearDropdown.value);
    var selectedMonth = getSelectedMonth();

    // Update the paragraph text
    document.getElementById('selectedMonthYear').textContent = 'Month of ' + selectedMonth + ' ' + selectedYear;
}

    function getSelectedMonth() {
        var monthDropdown = document.getElementById('monthDropdown');

        if (monthDropdown) {
            var selectedMonthIndex = monthDropdown.selectedIndex;
            return months[selectedMonthIndex];
        }

        return ""; // Default to an empty string if monthDropdown is null
    }

    function decrementMonth() {
        var selectedMonth = document.getElementById('selectedMonth');
        var selectedMonthIndex = months.indexOf(selectedMonth.innerText);

        // Decrement the month (if it's greater than 0)
        if (selectedMonthIndex > 0) {
            selectedMonthIndex--;
        }

        // Update the selected month in the paragraph
        selectedMonth.innerText = months[selectedMonthIndex];
        updateMonthYearText();
    }

    function incrementMonth() {
        var selectedMonth = document.getElementById('selectedMonth');
        var selectedMonthIndex = months.indexOf(selectedMonth.innerText);

        // Increment the month (if it's less than the maximum index)
        if (selectedMonthIndex < months.length - 1) {
            selectedMonthIndex++;
        }

        // Update the selected month in the paragraph
        selectedMonth.innerText = months[selectedMonthIndex];
        updateMonthYearText();
    }

    // Initialize the year dropdown
    updateYearDropdown();

    // You can call updateMonthYearText initially with the default values if needed
    updateMonthYearText();
</script>

            </body>
        </html>














