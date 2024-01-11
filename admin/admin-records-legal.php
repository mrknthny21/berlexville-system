<?php
include 'admin-nav-sidebars.php';
include '../db_connect.php';

// Initialize an array to store the legal data
$legals = array();

$query = "SELECT * FROM tbl_legal";
$result = mysqli_query($conn, $query);

// Retrieve legal data from the database
if ($result && mysqli_num_rows($result) > 0) {
    while ($legal = mysqli_fetch_assoc($result)) {
        // Extract legal details
        $legalID = $legal['legalID']; 
        $title = $legal['title'];
        $date = $legal['date'];
        $officialCopy = $legal['officialCopy'];

        // Create an array with legal details
        $legals[] = array(
            'legalID' => $legalID,
            'title' => $title,
            'date' => $date,
            'officialCopy' => $officialCopy
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
                <p>Board Resolutions</p>
                <a href="admin-records.php">
                    <i class="fa-regular fa-square-caret-left"></i>
                </a>
            </div>  

            <div class="middlebox">
            <table>
                <thead>
                    <tr>
                        <th>Legal ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($legals as $row): ?>
                        <tr>
                            <td><?php echo $row['legalID']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                                <div class="modify">
                                    <i class="fa-regular fa-pen-to-square edit-icon" data-legalid="<?php echo $row['legalID']; ?>"></i>
                                    <i class="fa-regular fa-trash-can" onclick="deleteLegal(<?php echo $row['legalID']; ?>)"></i>
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
                    <p>Add New Resolution</p>
                </div>
             </div>
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