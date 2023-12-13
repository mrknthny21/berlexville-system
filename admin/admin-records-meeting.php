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
                <p>Meeting Records</p>
                <a href="admin-records.php">
                    <i class="fa-regular fa-square-caret-left"></i>
                </a>
            </div>  

            <div class="middlebox">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Agenda</th>
                            <th>Meeting Minutes</th>
                            <th>Meeting Transcript </th>
                            <th>Modify </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Reducing Noise Poluttion</td>
                            <td>OCT 20, 2021 </td>
                            <td>OCT 27, 2021</td>
                            <td>
                            <div class="modify">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <i class="fa-regular fa-trash-can"></i>
                            </div>
                            </td>
                        </tr>
                        <tr>
                         
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>

            <div class="bottombox">
                <div class="add-button">
                    <i class="fa-solid fa-plus"></i>
                    <p>Add New Rules</p>
                </div>
             </div>
        </div>
    </body>
</html>