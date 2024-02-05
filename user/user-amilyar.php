<?php
// Start the session
session_start();

// Assuming you have a database connection
include '../db_connect.php';

// Fetch year data from the database
$yearQuery = "SELECT yearID, year FROM tbl_year";
$yearResult = mysqli_query($conn, $yearQuery);

// Check for errors in the query execution
if (!$yearResult) {
    die('Error in the query: ' . mysqli_error($conn));
}

$years = mysqli_fetch_all($yearResult, MYSQLI_ASSOC);

// Check if the 'accountID' session variable is set
if (isset($_SESSION['accountID'])) {
    // Retrieve the account ID from the session
    $accountID = $_SESSION['accountID'];

    // Query to retrieve familyar payments for the specific accountID
    $query = "SELECT year, `date-of-payment`, amount, status FROM tbl_amilyar WHERE accountID = $accountID";
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result) {
      

    } else {
        // Handle the case when the query fails
        echo "Error executing the query: " . $conn->error;
    }

    $conn->close();
} else {
    // Handle the case when 'accountID' session variable is not set
    echo "Error: Account ID not found in the session.";
}
?>






<!DOCTYPE html>
<html lang="en">

<style>
        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');


        *{
            margin:0;
            border-box:0;
        }
        body {
            background-color: #EFEFEF;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden; /* Hide horizontal scrollbar */
            overflow-y: scroll; /* Set to scroll only vertically */
        }

        .navbar{
            height: 10vh;
            width: 100vw;
            background-color: #4F71CA;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: space-between;
            position: sticky;
            top: 0; /* Stick to the top */
            z-index: 100; /* Set a higher z-index to ensure it appears above other elements */
        }

        .logobox{
            height: 65px;
            margin: 5px;
            position: fixed;
            width: 300px;
            margin-left: 40px;
            display: flex;
            flex-direction: row;
        }

        .logo{
            height:60px;
            width: 70px;
        }

        .logo img {
            width:70px;
            height: 60px;
            margin-top: 3px;
        }

        .letters{
            display: flex;
            flex-direction: column;
        }

        .title-berlex{
            height:35px;
            width: 180px;
            vertical-align: center;
            color: white;
        }

        .title-berlex p {
            font-family: 'Poppins', sans-serif;
            font-size:30px;
            font-weight: 700;
        }

        .title-home{
            height:20px;
            width: 220px;
            margin-top: 1px;
            vertical-align: center;
        }

        .title-home p{
            font-family: 'Abel', sans-serif;
            font-weight: lighter;
            font-size: 17px;  
            color: white;
        }

        
        .login-button{
            margin:10px;
            margin-left: 67vw;
            position: relative;
        }

        .login-button button{
            background-color: white;
            color: black;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            height: 40px;
            width: 100px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            border-radius: 50px;
            text-decoration: none;
        } 
   
        .sidebar {
            height: 100%;
            width: 20vw;
            position: fixed;
            background-color: white; /* Set background color to white */
            padding-top: 10px; /* Adjusted to match the height of the navbar */
            z-index: 1; /* Lower z-index to go under the navbar */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2); /* Optional: Add a shadow for separation */
        }

        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #333; /* Set text color */
            display: block;
            transition: 0.3s;
            align-items: center;
            font-size: bold;
        }

        .sidebar img {
            margin-top: 5px;
            width: 25px; /* Adjust the width as needed */
            height: auto; /* Maintain aspect ratio */
            margin-right: 10px; /* Add some space between image and text */
        }

        .sidebar a:hover {
            background-color: #eee; /* Set background color on hover */
        }

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
          width: 300vw;
          height: 65vh;
          margin: 15px;
          border-radius: 10px;
          text-align: center;
          justify-content: center;
          text-decoration: none; /* Remove the default link underline */
          color: black;
      }

      .upperbox {
            border-bottom: 1px black solid;
            width: 100vw;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding-top: 15px;
        }

        .upperbox i {
            font-size: 25px;
        }
        .eval_sheet button{
            background-color: #6FBB76;
            color: white;
            width: 200px;
            height: 50px;
            font-family: 'Poppins';
            margin-left: 425px;
            
        }
        .eval_sheet button:hover{
            background-color: #008A0E;
        }

        table {
            border-collapse: collapse;
            width: 60%;
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

        .tablebox{
            border: 1px solid black;
            border-radius: 10px;
            width: 67vw;
            height:80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            align-items: center;
            margin: auto;
            flex-direction: column;
            overflow: auto;
            margin-top: 10px;
            padding-top:15px;
        }

        .year{
            
            display: flex;
            margin-top: 5px;
            margin-bottom: -10px;
        }

        .month select,
        .year select {
            outline: none;
            border: 1px solid #EFEFEF; /* Add border for better visibility if needed */
            border-radius: 4px; /* Add border-radius for rounded corners */
            padding: 8px; /* Add padding for better appearance */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            height: 5vh;
            padding-bottom: 1px;
            background-color: #EFEFEF;
            font-family: 'Poppins', sans-serif;
            margin-left: 0;
        }
        /* Vertically align text and select elements */
        .month, .year {
            display: flex;
            align-items: center;
        }

        /* Optional: Adjust margin or padding for better spacing */
        .month p, .year p, .month select, .year select {
            margin: 0;
            padding: 5px; /* Adjust as needed */
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Payments</title>
    </head>
   <body>
        <div class="navbar">
            <div class="logobox">
                <div class="logo">
                    <img src="../assets/logo.png" alt="Logo Description">
                </div>

                <div class="letters">
                    <div class="title-berlex">
                        <p>BERLEXVILLE</p>
                    </div>   

                    <div class="title-home">
                        <p>HOMEOWNERS ASSOCIATION</p>
                    </div>  
                </div>

                <div class="login-button">
                    <a href="../login.php">
                        <button>
                            <p>LOG OUT</p>
                        </button>
                    </a>
                </div>
            </div>
        </div> 

        <div class="sidebar">
        <a href="user-landingPage.php"><img src="../assets/home.png" alt="Home Icon"> Home</a>
            <a href="user-personal-information.php"><img src="../assets/records.png" alt="Records Icon"> Personal Information</a>
            <a href="user-payments.php"><img src="../assets/calculator.png" alt="Accounting Icon"> Accounting</a>
            <a href="user-community.php"><img src="../assets/feedback.png" alt="Feedback Icon"> Community</a>
            <a href="user-feedback.php"><img src="../assets/external.png" alt="External Content Icon">Feedback</a>
        </div>


        <div class="content">

        <div class ="content-area">

        <div class="upperbox">
            <p>Amilyar</p>
            <a href="user-payments.php">
            <i class="fa-regular fa-square-caret-left"></i>
        </a>
        </div>

        <div class="tablebox">
     
            <table id="monthlyTable">
                <thead>
                    <tr>
                        <th>YEAR</th>
                        <th>DATE OF PAYMENT</th>
                        <th>AMOUNT</th>
                        <th>PAYMENT STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   while ($row = $result->fetch_assoc()) {
                    $year = $row['year'];
                    $dateOfPayment = ($row['date-of-payment'] !== null && $row['date-of-payment'] !== '0000-00-00') ? $row['date-of-payment'] : 'Not Available';
                    $amount = $row['amount'];
                    $status = $row['status'];
                
                    echo "<tr>";
                    echo "<td>{$year}</td>";
                    echo "<td>{$dateOfPayment}</td>";
                    echo "<td>{$amount}</td>";
                    echo "<td>{$status}</td>";
                    echo "</tr>";
                }

                    ?>
                </tbody>

            
            </table>
 
         </div>

            <p></p>
        </a>

        <div class="eval_sheet">
        <a href="amilyar-payment-concern.php">
        <button type="submit" class="btn btn-primary">SUBMIT A CONCERN</button>
        </div>

        </div>
    </body>
</html> 