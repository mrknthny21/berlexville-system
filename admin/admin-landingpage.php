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
            flex-direction: column;
            align-items: center; /* Align items vertically in the center */
            border: 1px solid black;
            width: 20vw;
            height: 15vh;
            margin: 10px;
            margin-top: 0px;
            border-radius: 10px;
            text-align: below;
            transition: all 0.3s;
            justify-content: center;
            text-decoration: none; /* Remove the default link underline */
            color: inherit;
        }

        .tab-box i {
            margin-right: 8px;
            font-size: 30px; /* Adjust as needed to create space between icon and text */
        }
                
        .tab-box:hover {
            background-color: #4F71CA; /* Change to your desired hover color */
        }

        .icon-box{
            display: flex;
            flex-direction: row;
        
        }

        .icon-box p{
            font-weight: 900 ;
            font-size: 25px;
            margin-left:5px;
        }
    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Feedback</title>
    </head>
    <body>

        <div class ="content-area">

        <a href="admin-records-user.php" class="tab-box">
            <div class ="icon-box">
            <i class="fa-regular fa-circle-user"></i>
            <p> 33 </p>
             </div>
            <p>Resident Population</p>
        </a>

        <a href="admin-records-residence.php" class="tab-box">
            <div class ="icon-box">
            <i class="fa-solid fa-chart-line"></i>
            <p> 10 </p>
            </div>
            <div>

            <p>Current Total Expenses</p>
            </div>
        </a>

        <a href="admin-records-resident.php" class="tab-box">
            <div class="icon-box">
                <i class="fa-regular fa-message"></i>
                <p> 8 </p>
            </div>
             <p>Community Feedback</p>
        </a>

        <div class="box">
            <diV class="vertical">
                <div class="box1">


                </div>

                <div class="box2">


                </div>
                
            </div>

            
         </div>
        

            
            
         



            

            

        </div>  
    </body>
</html>