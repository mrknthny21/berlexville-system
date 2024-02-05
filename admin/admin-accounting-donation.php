<?php

include 'admin-nav-sidebars.php';
include '../db_connect.php';

$donationData = array(); // Initialize the array

$query = "SELECT *
          FROM tbl_donation d";

$result = mysqli_query($conn, $query);

// Retrieve donation data from the database
if ($result && mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        // Extract data details
        $donator = $data['donator'];
        $amount = $data['amount'];
        $date = $data['date'];
        $officialCopy = $data['officialCopy'];
        $donationID = $data['donationID'];

        // Create an array with data details
        $donationData[] = array(
            'donator' => $donator,
            'amount' => $amount,
            'date' => $date,
            'officialCopy' => $officialCopy,
            'donationID' => $donationID,
        );
    }
} else {
    // Handle no results
}

// Close the database connection
mysqli_close($conn);

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
    height: 40px;
    margin: 10px;
    text-align: center;
    border-radius: 15px;
    border: solid 1px black;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
    padding: auto;
}


.budget-box-add:hover {
    background-color:white; /* Darker color on hover */
}

.budget-box-add i {
    margin-right: 5px;
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
  margin-top: 50px;
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
    color: black;
    position: absolute;
    top: 10px;
    right: 20px; /* Adjust the right property to your preference */
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
                <p>Donations</p>
                <a href="admin-accounting.php">
                    <i class="fa-regular fa-square-caret-left"></i>
                </a>
            </div>  

            <div class="middlebox">
                <div class="middlebox-finance">
             

                <div class="align-tbl-finances">  
            
                <div class="table-box">
       
                
                <table id="donation-table" style="margin-top: 20px;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Donator</th>
                            <th>Date</th>
                            <th>Amount Donated</th>
                            <th>Official Copy</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donationData as $donation): ?>
                            <tr>
                                <td><?php echo $donation['donationID']; ?></td>
                                <td><?php echo $donation['donator']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($donation['date'])); ?></td>
                                <td><?php echo $donation['amount']; ?></td>
                                
                                <td>
                                <?php if ($donation['officialCopy']) : ?>
                                    <?php
                                    // Get the filename from the officialCopy column
                                    $filename = basename($donation['officialCopy']);
                                    ?>
                                    <a href="#" class="file-link" onclick="openImageModal('<?php echo $filename; ?>')">
                                        <?php echo $filename; ?>
                                    </a>
                                <?php else : ?>
                                    No Official Copy
                                <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Assuming you have Font Awesome for the icons -->
                                    <i class="fa-regular fa-pen-to-square edit-icon" data-donationid="<?php echo $donation['donationID']; ?>"></i>
                                    <i class="fa-regular fa-trash-can" onclick="deleteDonation(<?php echo $donation['donationID']; ?>)"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


                    <div class="budget-box-add" onclick="showAddForm()">
                                <i class="fa-solid fa-plus"></i>
                                    <p>Add New Donation</p>
                    </div>

                                
<div id="imageModal">
  <div id="imageModalContent">
    <span id="closeImageModal" onclick="closeImageModal()">&times;</span>
    <img id="modalImage">
  </div>
</div>
                    <!-- Add Donation Form -->
<div id="addForm" class="form-popup">
<form action="admin-manage-donation.php" method="POST" class="form-container" enctype="multipart/form-data">
    <h2>Add Donation</h2>

    <label for="donator"><b>Donator</b></label>
    <input type="text" name="donator" placeholder="Enter Donator" required>

    <label for="date"><b>Date</b></label>
    <input type="date" name="date" required>

    <label for="amount"><b>Amount Donated</b></label>
    <input type="text" name="amount" placeholder="Enter Amount Donated" required>

    <!-- Input for uploading proof image -->
    <label for="proofImage"><b>Proof Image</b></label>
    <input type="file" name="proofImage" accept="image/*" required>

    <button type="submit" name="addDonation" class="fa-solid fa-plus" onclick="closeAddForm()">Add</button>
    <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
</form>

</div>

<!-- Edit Donation Form -->
<div id="editForm" class="form-popup">
    <form action="admin-manage-donation.php" method="POST" class="form-container" enctype="multipart/form-data">
        <h2>Edit Donation</h2>

        <label for="donator"><b>Donator</b></label>
        <input type="text" name="donator" id="donator" placeholder="Enter Donator" required>

        <label for="date"><b>Date</b></label>
        <input type="date" name="date" id="date" required>

        <label for="amount"><b>Amount Donated</b></label>
        <input type="text" name="amount" id="amount" placeholder="Enter Amount Donated" required>

        <!-- No need for receipt image in the edit form -->

        <!-- Hidden field for editDonationID -->
        <input type="hidden" name="editDonationID" id="editDonationID">

        <button type="submit" name="editDonation" class="fa-solid fa-pencil">Save Changes</button>
        <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
    </form>
</div>

<!-- Delete Donation Form -->
<form id="deleteDonationForm" action="admin-manage-donation.php" method="post">
    <input type="hidden" name="donationID" id="donationIDInput">
    <input type="hidden" name="deleteDonation" value="1">
</form>




        </body>
        <script>
            // Function to show the add form
            function showAddForm() {
                document.getElementById("addForm").style.display = "block";
            }

            // Function to close the add form
            function closeAddForm() {
                document.getElementById("addForm").style.display = "none";
            }

            // Function to open the edit form
            function openEditForm(donationID, donator, date, amount) {
                document.getElementById("donator").value = donator;
                document.getElementById("date").value = date;
                document.getElementById("amount").value = amount;
                document.getElementById("editDonationID").value = donationID;

                document.getElementById("editForm").style.display = "block";
            }

            // Function to close the edit form
            function closeEditForm() {
                document.getElementById("editForm").style.display = "none";
            }

            // Function to confirm and delete a donation
            function deleteDonation(donationID) {
                if (confirm("Are you sure you want to delete this donation?")) {
                    document.getElementById('donationIDInput').value = donationID;
                    document.getElementById('deleteDonationForm').submit();
                }
            }
        
                function openImageModal(filename) {
    if (filename) {
        var modal = document.getElementById('imageModal');
        var image = document.getElementById('modalImage');

        // Use a relative path with forward slashes
        var imagePath = '/berlexville-system/receipts-expenses/' + filename;

        console.log('Image Path:', imagePath); // Add this line for debugging

        image.src = imagePath;
        image.alt = filename;

        modal.style.display = 'block';
    }
}


function closeImageModal() {
                    var modal = document.getElementById('imageModal');
                    modal.style.display = 'none';
                }

        </script>

    </html>














