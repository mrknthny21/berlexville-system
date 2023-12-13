<?php include 'admin-nav-sidebars.php'; ?>

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
    <p>User Accounts</p>
    <a href="admin-records.php">
        <i class="fa-regular fa-square-caret-left"></i>
    </a>
</div>  

            <div class="middlebox">
                <table>
                    <thead>
                        <tr>
                            <th>blk</th>
                            <th>lot</th>
                            <th>homeowner id</th>
                            <th>password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A</td>
                            <td>1</td>
                            <td>123456</td>
                            <td>pass123</td>
                        </tr>
                        <tr>
                            <td>B</td>
                            <td>2</td>
                            <td>789012</td>
                            <td>secure456</td>
                        </tr>
                        <tr>
                            <td>C</td>
                            <td>3</td>
                            <td>345678</td>
                            <td>password123</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>

            <div class="bottombox">
                <div class="add-button">
                    <i class="fa-solid fa-plus"></i>
                    <p>Add User Account</p>
                </div>
             </div>
        </div>
    </body>
</html>