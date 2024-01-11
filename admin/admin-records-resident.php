<?php include 'admin-nav-sidebars.php'; 

include '../db_connect.php';

// Initialize an array to store the user data
$users = array();

$query = "SELECT * FROM tbl_resident"; // Replace 'your_table_name' with the actual table name
$result = mysqli_query($conn, $query);

// Retrieve user data from the database
if ($result && mysqli_num_rows($result) > 0) {
    while ($user = mysqli_fetch_assoc($result)) {
        // Extract user details
        $residentID = $user['residentID']; 
        $blk = $user['block'];
        $lot = $user['lot'];
        $name = $user['name'];
        $age = $user['age'];
        $gender = $user['gender'];

        // Create an array with user details
        $users[] = array(
            'residentID' => $residentID,
            'blk' => $blk,
            'lot' => $lot,
            'name' => $name,
            'age' => $age,
            'gender' => $gender
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
            padding: 10px;
        }

        .upperbox i {
            font-size: 25px;
            text-decoration: none;
            color: inherit;
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
            <p>Resident Information</p>
            <a href="admin-records.php">
                <i class="fa-regular fa-square-caret-left"></i>
            </a>
        </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      

        <div class="middlebox">
                <table>
                    <thead>
                        <tr>
                            <th>Resident ID</th>
                            <th>blk</th>
                            <th>lot</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $row): ?>
                            <tr>
                                <td><?php echo $row['residentID']; ?></td>
                                <td><?php echo $row['blk']; ?></td>
                                <td><?php echo $row['lot']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                 <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td>
                                    <div class="modify">
                                       <i id="editIcon" onclick="openEditForm(<?php echo $row['residentID']; ?>)" data-residentID="<?php echo $row['residentID']; ?>" class="fa-regular fa-pen-to-square"></i>
                                        <i class="fa-regular fa-trash-can" onclick="deleteResident(<?php echo $row['residentID']; ?>)"></i>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="bottombox"  id="addResidentButton">
                <div class="add-button">
                    <i class="fa-solid fa-plus"></i>
                    <p>Add a Resident</p>
                </div>
             </div>
            
             <div id="addForm" class="form-popup">
                <form action="admin-manage-resident.php" method="POST" class="form-container" enctype="multipart/form-data">
                    <h2>Add Resident</h2>

                    <label for="residentID"><b>Resident ID</b></label>
                    <input type="text" placeholder="Enter Resident ID" name="residentID" required>

                    <label for="block"><b>Block</b></label>
                    <input type="text" name="block" placeholder="Enter Block">

                    <label for="lot"><b>Lot</b></label>
                    <input type="text" placeholder="Enter Lot" name="lot" required>

                    <label for="name"><b>Name</b></label>
                    <input type="text" placeholder="Enter Name" name="name" required>

                    <label for="age"><b>Age</b></label>
                    <input type="text" placeholder="Enter Age" name="age" required>

                    <label for="gender"><b>Gender</b></label>
                    <input type="text" placeholder="Enter Gender" name="gender" required>

                    <button type="submit" name="addResident" class="fa-solid fa-plus" onclick="closeAddForm()">Add</button>
                    <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
                </form>
            </div>

            <div id="editForm" class="form-popup">
                <form action="admin-manage-resident.php" method="POST" class="form-container" enctype="multipart/form-data">
                    <h2>Edit Resident</h2>

                    <label for="block"><b>Block</b></label>
                    <input type="text" name="block" placeholder="Enter Block" id="block">

                    <label for="lot"><b>Lot</b></label>
                    <input type="text" placeholder="Enter Lot" name="lot" required id="lot">

                    <label for="name"><b>Name</b></label>
                    <input type="text" placeholder="Enter Name" name="name" required id="name">

                    <label for="age"><b>Age</b></label>
                    <input type="text" placeholder="Enter Age" name="age" required id="age">

                    <label for="gender"><b>Gender</b></label>
                    <input type="text" placeholder="Enter Gender" name="gender" required id="gender">

                    <!-- Add an additional field for identifying the resident being edited -->
                    <input type="hidden" name="editResidentID" id="editResidentID">

                    <button type="submit" name="editResident" class="fa-solid fa-pencil">Save Changes</button>
                    <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
                </form>
            </div>

            <form id="deleteUserForm" action="admin-manage-resident.php" method="post">
                <input type="hidden" name="residentID" id="accountIDInput">
                <input type="hidden" name="deleteResident" value="1">
            </form>

        </div>
    </body>

    
    <script>
    // Get the button element
    var addHomeownersButton = document.getElementById('addResidentButton');

    // Get the popup form element
    var addHomeownerForm = document.getElementById('addForm');

    // Add an event listener to the button for the click event
    addHomeownersButton.addEventListener('click', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Show the popup form
        addHomeownerForm.style.display = 'block';
    });

    // Function to close the pop-up form
    function closeAddForm() {
        document.getElementById("addForm").style.display = "none";
    }

    var residents = <?php echo json_encode($users); ?>;

   // Function to open the edit form
   
    function openEditForm(residentId) {
        var resident = <?php echo json_encode($users); ?>;
        console.log('Residents:', resident);

        var selectedResident = resident.find(function (item) {
            return item.residentID == residentId;
        });

        if (selectedResident) {
            // Populate the form fields with resident details
            document.getElementById("block").value = selectedResident.blk;
            document.getElementById("lot").value = selectedResident.lot;
            document.getElementById("name").value = selectedResident.name;
            document.getElementById("age").value = selectedResident.age;
            document.getElementById("gender").value = selectedResident.gender;

            // Set the resident ID value in the hidden field
            document.getElementById("editResidentID").value = selectedResident.residentID;

            // Show the edit form
            document.getElementById("editForm").style.display = "block";
        } else {
            console.log("Resident not found for ID: " + residentId);
        }
    }



    function closeEditForm() {
        // Hide the edit form
        document.getElementById("editForm").style.display = "none";
    }

        function deleteResident(residentID) {
        if (confirm("Are you sure you want to delete this user?")) {
            document.getElementById('accountIDInput').value = residentID;
            document.getElementById('deleteUserForm').submit();
        }
}

</script>

</html>