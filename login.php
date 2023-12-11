<?php
// CONNECTION
include 'db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $username = $_POST['id'];
        $password = $_POST['password'];

        $Result = mysqli_query($conn, "SELECT account_id, password, 'admin' as role FROM tbl_admin WHERE account_id ='$username' AND password='$password'
		UNION
		SELECT account_id, password, 'user' as role FROM tbl_homeowners WHERE account_id ='$username' AND password='$password'");

        if (!$Result) {
            // Query execution failed
            die("Query failed: " . mysqli_error($conn));
        }

        $matchedRows = mysqli_num_rows($Result);

        if ($matchedRows > 0) {
            $row = mysqli_fetch_assoc($Result);
            $id = $row['account_id'];
            $role = $row['role'];

            $_SESSION['name'] = $username;
            $_SESSION['account_id'] = $id;

            if ($role == 'admin') {
                header("location: admin/admin-landingpage.php?id=$id");
                exit();
            } elseif ($role == 'user') {
                header("location: user/user-landingpage.php?id=$id");
                exit();
            }
        } else {
            // No matching user found
            echo ("No data matched");
            exit();
        }
    }
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

        body{
            background-color: #EFEFEF;
            font-family: 'Poppins', sans-serif;
        }
        .navbar{

            height:10vh;
            width: 100%;
            background-color: #4F71CA;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
            display: flex;
            
            display: flex;
            align-items: center;    
        }

        
        
        .title-berlexN{
            height:35px;
            width: 500px;
            vertical-align: center;
            margin-left: 60px;
         
            
        }

        .title-berlexN p {
            font-family: 'Poppins', sans-serif;
            font-size:28px;
            font-weight: 700;
        }

        .middlebox {
            height: 600px;
            width: 500px;
         
            margin-left: 500px;
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .midlogobox{
            height: 90px;
            margin: 5px;
            position: fixed;
            width: 366px;
            margin-left: 65px;
            display: flex;
            flex-direction: row;
           
            
        }

        .logo{  
            height:80px;
            width: 100px;
         
          
        }

        .logo img {
            width:100px;
            height: 80px;
            margin-top: 3px;
            
        }

        .letters{
            display: flex;
            flex-direction: column;
        }

        .title-berlex{
            height:35px;
            width: 300px;
            
        }

        .title-berlex p {
        font-family: 'Poppins', sans-serif;
        font-size:41px;
        font-weight: 700;
        }

        .title-home{
            height:20px;
            width: 500px;
       
            margin-top: 10px;
           
        }

        .title-home p{
            font-family: 'Abel', sans-serif;
            font-weight: lighter;
            font-size: 23px;  
        }

        .home {
            height: 40px;
            width: 40px;
            margin-left: 870px;
        }
        
        .home img {
            max-width: 100%;
            max-height: 100%;
        }


        .loginbox {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center vertically */
            padding-top: 55px;
            height: 350px;
            width: 340px;
            border: 1px black solid;
            margin: 110px auto; /* Center horizontally and adjust top margin */
            border-radius: 5px;
        }

        /* Optional: Add some styling to the form elements */
        form {
            display: flex;
            flex-direction: column;
        
        }

        label {
        margin-left: 0px;
        font-family: 'Poppins', sans-serif;
        weight: bold;
        }

        input{
            width: 300px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid black;
        }

        h2 {
            font-family: 'Poppins', sans-serif;
            margin-bottom: 16px;
            margin-top: 0px;  
        
        }

        button{
            margin-top: 30px;
            height: 35px;
            border: solid 1px black;
            border-radius: 5px;

            background-color: #4F71CA;
        }



    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>
        
        <div class ="navbar">
            <div class="title-berlexN">
                <p>HOMEOWNERS PORTAL</p>
            </div>   


            <div class="home"> 
            <a href="website/index.php">
                <img src="assets/home.png" alt="Logo Description">
                </a>   
            </div>
        </div> 

        <div class="middlebox">

            <div class="midlogobox">
                    <div class= "logo">
                    <img src="assets/logo.png" alt="Logo Description">
                    </div>



                    <div class="letters">
                        <div class="title-berlex">
                            <p>BERLEXVILLE</p>
                        </div>   

                        <div class="title-home">
                            <p>HOMEOWNERS ASSOCIATION</p>
                        </div>  
                    </div>
            
         </div>
      
         <div class="loginbox">
            <form method="post" action="">
                <h2>Login to your account</h2>
                <label for="homeownersId">Homeowners ID:</label>
                <input style="margin-bottom: 15px;" type="text" id="homeownersId" name="id" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="submit">Log In</button>
            </form>
        </div>


            </div>


        </div>


    </body>



</html>
