<?php
// Start the session
session_start();
include 'user-nav-sidebars.php';

// Check if the 'accountID' session variable is not set
if (!isset($_SESSION['accountID'])) {
    // Check if the 'id' parameter is present in the URL
    if (isset($_GET['id'])) {
        // Sanitize the input to prevent any potential security issues
        $accountID = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        // Store the account ID in the session variable
        $_SESSION['accountID'] = $accountID;
    } else {
        // Handle the case when 'id' parameter is not present
        echo "Error: Account ID not provided in the URL.";
        exit(); // You may choose to redirect or display an error message
    }
}

// Continue with the rest of your code
// Assuming you have a database connection
include '../db_connect.php';

// Check if the 'accountID' session variable is set
if (isset($_SESSION['accountID'])) {
    // Retrieve the account ID from the session
    $accountID = $_SESSION['accountID'];

    // Query to retrieve user information based on the accountID
    $query = "SELECT * FROM tbl_homeowners WHERE accountID = $accountID";
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result) {
        // Fetch user data and store it in a variable for later use
        $userData = $result->fetch_assoc();
    } else {
        // Handle the case when the query fails
        echo "Error executing the query: " . $conn->error;
    }
} else {
    // Redirect to the login page if 'accountID' session variable is not set
    header("Location: login.php");
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Include your CSS and other head elements here -->
    <style>
        /* Your custom CSS styles go here */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 16px;
            color: #333; /* Set text color */
            display: block;
            transition: 0.3s;
            align-items: center;
        }

        .mainbox {
            display: flex;
            flex-direction: row;
            height: 80vh;
            width: 80vw;
            margin-left: 280px;
            margin-top: 50px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            text-align: left;
        }

        .homeacc {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 55px;
            width: 50vw;
            border: 1px black solid;
            margin-left: 30px;
            margin-top: 5px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            background-color: #FFE193;
        }

        .monthdue {
            padding: 10px;
            height: 50px;
            width: 15vw;
            border: 1px black solid;
            margin-left: 840px;
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            background-color: #FFFFFF;
        }
        .amilyar {
            padding: 10px;
            height: 50px;
            width: 15vw;
            border: 1px black solid;    
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            background-color: #FFFFFF;
        }

        .welcome {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 65vh;
            width: 50vw;
        
            margin-left: 10px;
            margin-top: 10px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            float: left;
            background-color: #FFFFFF;
        }

        .welcome p{
            font-size: 16px;
            color: black;
            text-align: justify;
            
        }


        .box2 {
            margin-left: 20px;
            height: 70vh;
        }

        .texth {
            color: black;
            text-decoration: none;
            font-weight: bold; 
            margin-top: 10px;
            margin-left: 10px;
            font-size: x-large;
            


        }

        .textm {
            color: black;
            font-weight: bold; 
        }

        .textv {
            color: black; 
            font-weight: bold; 
        }

        .status-box{
          
            height: 10vh;
            width: 20vw;
           
            padding:1vw;
            
            padding-top: 7px;
            margin-left:px;
            
        }

        .leftbox{
          
            width: 54vw;
        }

        .mainbox{
    
        }

        .monthly{
          border: solid 1px black;
          width: 12vw;
          height: 10vh;
          border-radius: 10px;
          padding:1px;
          padding-left: 3px;
          display: flex;
          background:#7BB274;
    
        }

        .monthly p {
            font-size:10px;
        }

       .text{
     
        width:75%
       }
        .text h2{
            margin-bottom: 5px;
            padding-top: 5px;
            padding-left:3px;
        }

        .text p{
            margin-left:3px;
        }
        .yearly{
            border: solid 1px black;
          width: 12vw;
          height: 10vh;
          border-radius: 10px;
          padding:1px;
          padding-left: 3px;
          display: flex;
          background:#7BB274;
          margin-left: -18px;
          
        }

        .yearly p {
            font-size:10px;
        }
        .icon{
            
            width: 15%;
        }

        .icon i{
            font-size: 40px;
            margin-top:12px;
        }

    </style>
</head>

<body>

    <div class="box">
        <div class="mainbox">

            <div class="leftbox">

                <div class="box1">
                    <div class="homeacc">   
                        <p class= "texth">Welcome to your Homeowners Account!</p>
                    </div>
                </div>
        
                <div class= "box2">
                    <div class="welcome">
                        <p class="textm"></p>
        
                    </div>
                </div>
            </div>

            <div class="status-box">
                <div class = "monthly">
                    <div class="text">
                    <h2>Paid </h2>
                    
                    <p> Monthly Due of January </p>
                     </div>

                    <div class="icon">
                     <i class="fa-solid fa-check"></i>
                    </div>
                </div>
            </div>

            <div class="status-box">
                <div class = "yearly">
                    <div class="text">
                    <h2>Paid </h2>
                    
                    <p>Amilyar 2024 </p>
                     </div>

                    <div class="icon">
                     <i class="fa-solid fa-check"></i>
                    </div>
                </div>
            </div>


            

            
   
        </div>

    </div>
               

              

              
    

</body>

</html>

