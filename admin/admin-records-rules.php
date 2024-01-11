<?php
include 'admin-nav-sidebars.php';
include '../db_connect.php';

$rules = array();

$query = "SELECT * FROM tbl_rules"; 
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($rule = mysqli_fetch_assoc($result)) {
        $ruleID = $rule['ruleID'];
        $title = $rule['title'];
        $dateCreated = $rule['dateCreated'];
        $dateImplemented = $rule['dateImplemented'];

        $rules[] = array(
            'ruleID' => $ruleID,
            'title' => $title,
            'dateCreated' => $dateCreated,
            'dateImplemented' => $dateImplemented
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
                <p>Rules and Regulations</p>
                <a href="admin-records.php">
                    <i class="fa-regular fa-square-caret-left"></i>
                </a>
            </div>  

            <div class="middlebox">
            <table>
                <thead>
                    <tr>
                        <th>Rule ID</th>
                        <th>Title</th>
                        <th>Date Created</th>
                        <th>Date Implemented</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rules as $row): ?>
                        <tr>
                            <td><?php echo $row['ruleID']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['dateCreated']; ?></td>
                            <td><?php echo $row['dateImplemented']; ?></td>
                            <td>
                                <div class="modify">
                                    <i class="fa-regular fa-pen-to-square edit-icon" data-ruleid="<?php echo $row['ruleID']; ?>"></i>
                                    <i class="fa-regular fa-trash-can" onclick="deleteRule(<?php echo $row['ruleID']; ?>)"></i>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>

            <div class="bottombox">
                <div class="add-button" onclick="showAddForm()">
                    <i class="fa-solid fa-plus"></i>
                    <p>Add New Rules</p>
                </div>
             </div>

             <div id="addForm" class="form-popup">
                <form action="admin-manage-rule.php" method="POST" class="form-container" enctype="multipart/form-data">
                    <h2>Add Rule</h2>

                    <label for="ruleID"><b>Rule ID</b></label>
                    <input type="text" name="ruleID" placeholder="Enter Rule ID" required>

                    <label for="title"><b>Title</b></label>
                    <input type="text" name="title" placeholder="Enter Title" required>
   
                    <label for="dateCreated"><b>Date Created</b></label>
                    <input type="date" name="dateCreated" required>

                    <label for="dateImplemented"><b>Date Implemented</b></label>
                    <input type="date" name="dateImplemented" required>

                    <label for="officialCopy"><b>Official Copy</b></label>
                    <input type="file" name="officialCopy" accept=".pdf, .doc, .docx" required>

                    <button type="submit" name="addRule" class="fa-solid fa-plus" onclick="closeAddForm()">Add</button>
                    <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
                </form>
            </div>


            <div id="editForm" class="form-popup">
                <form action="admin-manage-rule.php" method="POST" class="form-container" enctype="multipart/form-data">
                    <h2>Edit Rule</h2>  

                    <label for="ruleID"><b>Rule ID</b></label>
                    <input type="text" name="ruleID" id="ruleID" placeholder="Enter Rule ID" required>


                    <label for="title"><b>Title</b></label>
                    <input type="text" name="title" placeholder="Enter Title" id="title" required>

                    <label for="dateCreated"><b>Date Created</b></label>
                    <input type="date" name="dateCreated" id="dateCreated" required>

                    <label for="dateImplemented"><b>Date Implemented</b></label>
                    <input type="date" name="dateImplemented" id="dateImplemented" required>

                    <label for="officialCopy"><b>Official Copy</b></label>
                    <input type="file" name="officialCopy" id="officialCopy" accept=".pdf, .doc, .docx">

                    <!-- Add an additional field for identifying the rule being edited -->
                    <input type="hidden" name="editRuleID" id="editRuleID">

                    <button type="submit" name="editRule" class="fa-solid fa-pencil">Save Changes</button>
                    <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
                </form>
            </div>

            <form id="deleteRuleForm" action="admin-manage-rule.php" method="post">
                <input type="hidden" name="ruleID" id="ruleIDInput">
                <input type="hidden" name="deleteRule" value="1">
            </form>

        </div>


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
            var ruleID = event.target.getAttribute('data-ruleid');
            openEditForm(ruleID);
        });
    });

    // Function to open the edit form
    function openEditForm(ruleID) {
        // Assuming $rules is a PHP array containing rule details
        var rules = <?php echo json_encode($rules); ?>;
        var rule = rules.find(function (r) {
            return r.ruleID === ruleID;
        });

        if (rule) {
            document.getElementById("ruleID").value = rule.ruleID;
            document.getElementById("title").value = rule.title;
            document.getElementById("dateCreated").value = rule.dateCreated;
            document.getElementById("dateImplemented").value = rule.dateImplemented;

            // Set the rule ID value in the hidden field
            document.getElementById("editRuleID").value = rule.ruleID;

            // Show the edit form
            document.getElementById("editForm").style.display = "block";
        } else {
            console.log("Rule not found for ID: " + ruleID);
        }
    }

    // Function to close the edit form
    function closeEditForm() {
        // Hide the edit form
        document.getElementById("editForm").style.display = "none";
    }

    // Function to delete a rule
    function deleteRule(ruleID) {
        if (confirm("Are you sure you want to delete this rule?")) {
            // Set the rule ID value in the hidden input
            document.getElementById('ruleIDInput').value = ruleID;

            // Submit the form
            document.getElementById('deleteRuleForm').submit();
        }
    }
</script>

    </body>
</html>