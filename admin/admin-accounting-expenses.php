<?php 

include 'admin-nav-sidebars.php';
include '../db_connect.php';




$query = "SELECT expenseID, expenseName, yearID, amount FROM tbl_expenses ";
$result= mysqli_query($conn, $query);


if ($result->num_rows > 0) {
    $expenses = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $expenses = array();


}

// Retrieving the budget for the year 2023
$query = "SELECT total_budget FROM tbl_budget WHERE yearID = 2023";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$totalBudget = $row['total_budget'];


// Retrieving the total expenses for the year 2023
$query = "SELECT SUM(amount) AS total_expenses FROM tbl_expenses  WHERE yearID = 1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$totalExpenses = $row['total_expenses'];

// Calculating the remaining budget
$remainingBudget = $totalBudget - $totalExpenses;
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
  margin-left: 100px;
}

.budget-box{
    background: white;
  background: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  width:  280px;
  height: 100px;
  margin: 10px;
  text-align: center;
  border-radius: 15px;
}

.budget-box h1{
margin-bottom: 50px:
}

.total-expenses-box{
  background: white;
  background: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  width:  280px;
  height: 100px;
  margin: 10px;
  text-align: center;
  border-radius: 15px;
}

.align-tbl-finances{
  margin: 5px 0px 0px 5px;
}

.tabledisplay-finance #expense-table {
  width: 100%;
  border-collapse: collapse;
  table-layout: fixed;
  margin-top: 10px;
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
                <p>Expenses</p>
                <a href="admin-accounting.php">
                    <i class="fa-regular fa-square-caret-left"></i>
                </a>
            </div>  

            <div class="middlebox">
                <div class="middlebox-finance">
                            <div class="status-box">
                                    <div class="budget-box">
                                        <ion-icon name="card-outline"></ion-icon>
                                        <h1><?php echo '₱' , $totalBudget?></h1>
                                        <p>Budget</p>
                                    </div>
                                
                                    <div class="total-expenses-box">
                                        <ion-icon name="receipt-outline"></ion-icon>
                                        <h1><?php echo  '₱' ,$totalExpenses?></h1>
                                        <p> Total Expenses</p>
                                    </div>

                                    <div class="total-expenses-box">
                                        <ion-icon name="cash-outline"></ion-icon>
                                        <h1><?php echo  '₱' ,$remainingBudget?></h1>
                                        <p> Remaining Budget</p>
                                    </div>
                        </div>

                        <div class="align-tbl-finances">  
                                <div class="table-box">
                                    <p>EXPENSES</p>
                                    <div class="tabledisplay-finance">
                                        <table id="expense-table">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Date</th>
                                                    <th>Amount Spent</th>
                                                    <th>Modify</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($expenses as $expense): ?>
                                            <tr>
                                                <td><?php echo $expense['expenseName']; ?></td>
                                                <td><?php echo $expense['yearID']; ?></td>
                                                <td><?php echo $expense['amount']; ?></td>
                                                <td>
                                                <button class="edit-button" onclick="openEditForm(<?php echo $expense['expenseID']; ?>)" data-expense-id="<?php echo $expense['expenseID']; ?>">Edit</button>
                                                <button class="delete-button" onclick="deleteExpense(<?php echo $expense['expenseID']; ?>)">Delete</button>
                                                </td>
                                            </tr>
                                            <?php
                                                $expenseID = $expense['expenseID'];
                                                $expenseName = $expense['expenseName'];
                                                $year = $expense['yearID'];
                                                $amount = $expense['amount'];
                                                ?>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
             </div>
        </body>
    </html>














