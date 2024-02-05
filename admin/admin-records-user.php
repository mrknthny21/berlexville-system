<?php
include 'admin-nav-sidebars.php';
include '../db_connect.php';
// Initialize $userData array

// Continue with your existing PHP code for fetching the list of users
$query = "SELECT * FROM tbl_homeowners";
$result = mysqli_query($conn, $query);

$users = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($user = mysqli_fetch_assoc($result)) {
        $userId = $user['accountID'];
        $userName = $user['name'];
        $userBlock = $user['blk'];
        $userLot = $user['lot'];
        $userPassword = $user['password'];
        $userRole = $user['role'];

        $users[] = array(
            'userId' => $userId,
            'userName' => $userName,
            'userBlock' => $userBlock,
            'userLot' => $userLot,
            'userPassword' => $userPassword,
            'userRole' => $userRole
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
            margin-bottom: 0px;
        }

        .upperbox i {
            font-size: 30px;
            margin-left: -28px;
            margin-bottom:0px;
        }

        .upperbox p{
           margin-bottom: 0px;
        }
    .search-box {
        display: flex;
        align-items: center;
        margin-left: 700px;
  
    }

    .search-box input {
        padding: 8px;
        border: 1px solid black;
        border-radius: 5px;
        margin-right: 10px; /* Adjust margin if needed */
        height:11px;
    }

    .search-box i {
        font-size: 12px;
        cursor: pointer;
        color: #333; /* Icon color */

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
            cursor: pointer;
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

        .search-box {
        position: relative;
        width: 200px; /* Adjust width as needed */
        margin-right: 10px; /* Adjust margin if needed */
    }

    .search-box input {
        padding: 8px 30px 8px 8px; /* Adjust padding for icon space */
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .search-box .search-icon {
        position: absolute;
        right: 10px; /* Adjust right position as needed */
        top: 50%; /* Center vertically */
        transform: translateY(-50%);
        cursor: pointer;
        color: #333; /* Icon color */
    }
    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /><title>Records</title>

    </head>

    <body>
        <div class ="content-area">
        <div class="upperbox">
         
            <p>User Accounts</p>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class="fas fa-search search-icon"></i>

                
            </div>

            <a href="admin-records.php">
            <i class="fa-regular fa-square-caret-left" style="color: black;"></i>
            </a>
        </div>
            <div class = "middlebox";>

                <table>
                    <thead>
                        <tr>
                            <th>Account ID</th>
                            <th>Name</th>
                            <th>Block</th>
                            <th>Lot</th>
                            <th>Password</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                 
                        <?php foreach ($users as $row): ?>
                            <tr>
                                <td><?php echo $row['userId']; ?></td>
                                <td><?php echo $row['userName']; ?></td>
                                <td><?php echo $row['userBlock']; ?></td>
                                <td><?php echo $row['userLot']; ?></td>
                                <td><?php echo $row['userPassword']; ?></td>
                                <td>
                                    <div class="modify">
                                    <i class="fa-regular fa-pen-to-square edit-icon" data-userid="<?php echo $row['userId']; ?>"></i>
                                        <i class="fa-regular fa-trash-can" onclick="deleteResident(<?php echo $row['userId']; ?>)"></i>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="bottombox">
                <button class="add-button" id="addHomeownerButton">
                    <i class="fa-solid fa-plus"></i>
                    <p>Add User Account</p>
                </button>
            </div>


        </div>


   
        <div id="addForm" class="form-popup">
            <form action="admin-manage-user.php" method="POST" class="form-container" enctype="multipart/form-data">
                <h2>Add Homeowner</h2>

                <label for="homeownerID"><b>Homeowner ID</b></label>
                <input type="text" placeholder="Enter homeowner ID" name="homeownerID" required>

                <label for="block"><b>Block</b></label>
                <input type="text" name="block" placeholder="Enter Block">

                <label for="lot"><b>Lot</b></label>
                <input type="text" placeholder="Enter lot of the house" name="lot" required>

                <label for="name"><b>Account Owner</b></label>
                <input type="text" placeholder="Enter Name" name="name" required>

                <label for="password"><b>Password</b></label>
                <input type="text" placeholder="Enter password" name="password" required>

                <!-- Add the role input field -->
                <label for="role"><b>Role</b></label>
                <input type="text" placeholder="Enter Role" name="role" required>

                <button type="submit" name="addUser" class="fa-solid fa-plus" onclick="closeAddForm()">Add</button>
                <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
            </form>
        </div>
    

       <!-- HTML code for the form -->
        <div id="editForm" class="form-popup">
            <form action="admin-manage-user.php" method="POST" class="form-container" enctype="multipart/form-data">
                <h2>Edit Homeowner</h2>

                <label for="homeownerID"><b>Homeowner ID</b></label>
                <input type="text" placeholder="Enter Homeowner ID" name="homeownerID" id="homeownerID" required>

                <label for="homeownerName"><b>Homeowner Name</b></label>
                <input type="text" placeholder="Enter Homeowner Name" name="userName" id="homeownerName" required>

                <label for="blk"><b>Block</b></label>
                <input type="text" placeholder="Enter Block" name="userBlock" id="blk">

                <label for="lot"><b>Lot</b></label>
                <input type="text" placeholder="Enter Lot" name="userLot" id="lot">

                <label for="password"><b>Password</b></label>
                <input type="text" placeholder="Enter Password" name="userPassword" id="password" required>

                <!-- Add the role input field -->
                <label for="role"><b>Role</b></label>
                <input type="text" placeholder="Enter Role"  name="userRole"  id="role" required>

                <br> <br>
                <input type="hidden" name="editHomeownerID" id="editHomeownerID">

                <button type="submit" class="btn" name="updateHomeowner">Update</button>
                <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
            </form>
        </div>

          
        <form id="deleteUserForm" action="admin-manage-user.php" method="post">
            <input type="hidden" name="accountID" id="accountIDInput" value="">
            <input type="hidden" name="deleteResident" value="1">
        </form>


</div>
    </body> 

    <script>
    // Get the button element
    var addHomeownersButton = document.getElementById('addHomeownerButton');

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






// Assuming you have edit icons with a class 'edit-icon'
var editIcons = document.getElementsByClassName('edit-icon');

// Add event listeners to each "Edit" icon
Array.from(editIcons).forEach(function (editIcon) {

    editIcon.addEventListener('click', function (event) {
        var userId = event.target.getAttribute('data-userid');
        openEditForm(userId);
    });
});

function openEditForm(userId) {
    // Assuming $users is a PHP array containing homeowner details
    var users = <?php echo json_encode($users); ?>;
    var user = users.find(function (homeowner) {
        return homeowner.userId == userId;
    });

    if (user) {
        document.getElementById("homeownerID").value = user.userId;
        document.getElementById("homeownerName").value = user.userName;
        document.getElementById("blk").value = user.userBlock;
        document.getElementById("lot").value = user.userLot;
        document.getElementById("role").value = user.userRole;
        console.log("Password input element:", document.getElementById("password"));

         // Set the resolution ID value in the hidden field
         document.getElementById("editHomeownerID").value = user.userId;

        // Set the password value
        document.getElementById("password").value = user.userPassword;

        document.getElementById("password").value = user.userPassword;

        // Show the edit form
        document.getElementById("editForm").style.display = "block";
    } else {
        console.log("User not found for ID: " + userId);
    }
}

    function closeEditForm() {
        // Hide the edit form
        document.getElementById("editForm").style.display = "none";
        }

      


        function deleteResident(userId) {
    if (confirm("Are you sure you want to delete this user?")) {
        document.getElementById('accountIDInput').value = userId;
        document.getElementById('deleteUserForm').submit();
    }
}




</script>

</html>