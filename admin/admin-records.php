<?php include 'admin-nav-sidebars.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <style>
        .content-area {
          
            height: auto;
            width: 67vw;
            margin-left: 25vw;
            padding: 1vh;
            justify-content:left;
            display: flex;
            flex-wrap: wrap; /* Add this line */
            align-items: flex-start;
        }

        .tab-box {
            display: flex;
            align-items: center; /* Align items vertically in the center */
            border: 1px solid black;
            width: 20vw;
            height: 15vh;
            margin: 2px;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s;
            justify-content: center;
            text-decoration: none; /* Remove the default link underline */
            color: inherit;
        }

        .tab-box i {
            margin-right: 8px; /* Adjust as needed to create space between icon and text */
        }
                
        .tab-box:hover {
            background-color: #4F71CA; /* Change to your desired hover color */
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

        <a href="admin-records-user.php" class="tab-box">
            <i class="fa-regular fa-circle-user"></i>
            <p>User Accounts</p>
        </a>

        
        <a href="admin-records-residence.php" class="tab-box">
            <i class="fa-solid fa-house"></i>
            <p>Residence Information</p>
        </a>

        <a href="admin-records-resident.php" class="tab-box">
            <i class="fa-solid fa-list-ol"></i>
            <p>Resident Information</p>
        </a>

        <a href="admin-records-rules.php" class="tab-box">
            <i class="fa-solid fa-list-check"></i>
            <p>Rules and Regulation</p>
        </a>

        <a href="admin-records-resolution.php" class="tab-box">
            <i class="fa-regular fa-square-check"></i>
            <p>Board Resolutions</p>
        </a>

        <a href="admin-records-meeting.php" class="tab-box">
            <i class="fa-solid fa-microphone"></i>
            <p>Meeting Records</p>
        </a>

        <a href="admin-records-legal.php" class="tab-box">
            <i class="fa-solid fa-gavel"></i>
            <p>Legal Documents</p>
        </a>

            
            
         



            

            

        </div>  
    </body>
</html>