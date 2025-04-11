<?php
include 'admin-nav-sidebars.php';
include '../db_connect.php';

// Initialize an array to store the payment concern data
$paymentConcerns = array();

$query = "SELECT * FROM tbl_paymentconcerns";
$result = mysqli_query($conn, $query);

// Retrieve payment concern data from the database
if ($result) {
    while ($paymentConcern = mysqli_fetch_assoc($result)) {
        // Extract payment concern details
        $paymentConcernID = $paymentConcern['paymentConcernID'];
        $accountID = $paymentConcern['accountID'];
        $message = $paymentConcern['message'];
        $dateSent = $paymentConcern['dateSent'];
        $status = $paymentConcern['status'];

        // Create an array with payment concern details
        $paymentConcerns[] = array(
            'paymentConcernID' => $paymentConcernID,
            'accountID' => $accountID,
            'message' => $message,
            'dateSent' => $dateSent,
            'status' => $status
        );
    }
} else {
    // Handle the case where the query fails
    echo "Error executing query: " . mysqli_error($conn);
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
            padding: 10px;
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
            width: 100%;
            border: 1px solid black;
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

        a {
        color: inherit;
        text-decoration: none;
        cursor: pointer;
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
                <p>Payment Concerns</p>
                <a href="admin-accounting.php">
                    <i class="fa-regular fa-square-caret-left"></i>
                </a>
            </div>  

            <div class="middlebox">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>AccountID</th>
           
                <th>Date Sent</th>
                <th>Message</th>
                <th>Status</th>
                <th>Modify</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paymentConcerns as $row): ?>
                <tr>
                    <td><?php echo $row['paymentConcernID']; ?></td>
                    <td><?php echo $row['accountID']; ?></td>
                  
                    <td><?php echo $row['dateSent']; ?></td>
                    <td><a href="admin-view-message.php?id=<?php echo $row['paymentConcernID']; ?>" target="_blank">View</a></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <div class="modify">
                            <!-- Modify the link and function accordingly -->
                       
                            <i class="fa-regular fa-pen-to-square edit-icon" data-paymentconcernid="<?php echo $row['paymentConcernID']; ?>"></i>
                            <i class="fa-regular fa-trash-can" onclick="deletePaymentConcern(<?php echo $row['paymentConcernID']; ?>)"></i>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

            </div>

           
        </div>


        <div id="addForm" class="form-popup">
            <form action="admin-manage-resolution.php" method="POST" class="form-container" enctype="multipart/form-data">
                <h2>Add Resolution</h2>

                <label for="title"><b>Title</b></label>
                <input type="text" name="title" placeholder="Enter Title" required>

                <label for="dateCreated"><b>Date Created</b></label>
                <input type="date" name="dateCreated" required>

                <label for="dateImplemented"><b>Date Implemented</b></label>
                <input type="date" name="dateImplemented" required>

                <label for="officialCopy"><b>Official Copy</b></label>
                <input type="file" name="officialCopy" accept=".pdf, .doc, .docx" required>

                <button type="submit" name="addResolution" class="fa-solid fa-plus" onclick="closeAddForm()">Add</button>
                <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
            </form>
        </div>

        <div id="editForm" class="form-popup">
            <form action="admin-manage-resolution.php" method="POST" class="form-container" enctype="multipart/form-data">
                <h2>Edit Resolution</h2>  

                <label for="title"><b>Title</b></label>
                <input type="text" name="title" placeholder="Enter Title" id="title" required>

                <label for="dateCreated"><b>Date Created</b></label>
                <input type="date" name="dateCreated" id="dateCreated" required>

                <label for="dateImplemented"><b>Date Implemented</b></label>
                <input type="date" name="dateImplemented" id="dateImplemented" required>

                <label for="officialCopy"><b>Official Copy</b></label>
                <input type="file" name="officialCopy" id="officialCopy" accept=".pdf, .doc, .docx">

                <!-- Add an additional field for identifying the resolution being edited -->
                <input type="hidden" name="editResolutionID" id="editResolutionID">

                <button type="submit" name="editResolution" class="fa-solid fa-pencil">Save Changes</button>
                <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
            </form>
        </div>

        <form id="deleteResolutionForm" action="admin-manage-resolution.php" method="post">
            <input type="hidden" name="resolutionID" id="resolutionIDInput">
            <input type="hidden" name="deleteResolution" value="1">
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

            // Assuming you have edit icons with a class 'edit-icon'
            var editIcons = document.getElementsByClassName('edit-icon');

            // Add event listeners to each "Edit" icon
            Array.from(editIcons).forEach(function (editIcon) {
                editIcon.addEventListener('click', function (event) {
                    var resolutionID = event.target.getAttribute('data-resolutionid');
                    openEditForm(resolutionID);
                });
            });

            // Function to open the edit form
            function openEditForm(resolutionID) {
                // Assuming $resolutions is a PHP array containing resolution details
                var resolutions = <?php echo json_encode($resolutions); ?>;
                var resolution = resolutions.find(function (r) {
                    return r.resolutionID == resolutionID;
                });

                if (resolution) {
                    document.getElementById("title").value = resolution.title;
                    document.getElementById("dateCreated").value = resolution.dateCreated;
                    document.getElementById("dateImplemented").value = resolution.dateImplemented;

                    // Set the resolution ID value in the hidden field
                    document.getElementById("editResolutionID").value = resolution.resolutionID;

                    // Show the edit form
                    document.getElementById("editForm").style.display = "block";
                } else {
                    console.log("Resolution not found for ID: " + resolutionID);
                }
            }

            // Function to close the edit form
            function closeEditForm() {
                // Hide the edit form
                document.getElementById("editForm").style.display = "none";
            }

            // Function to delete a resolution
            function deleteResolution(resolutionID) {
                if (confirm("Are you sure you want to delete this resolution?")) {
                    // Set the resolution ID value in the hidden input
                    document.getElementById('resolutionIDInput').value = resolutionID;

                    // Submit the form
                    document.getElementById('deleteResolutionForm').submit();
                }
            }
        </script>


    </body>
</html>