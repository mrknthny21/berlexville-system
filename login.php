
<?php
// CONNECTION
include 'db_connect.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['id']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $Result = mysqli_query($conn, "SELECT accountID, password, role FROM tbl_homeowners WHERE accountID ='$username' AND password='$password'");


 

        if (!$Result) {
            // Query execution failed
            die("Query failed: " . mysqli_error($conn));
        }

        $matchedRows = mysqli_num_rows($Result);

        if ($matchedRows > 0) {
            $row = mysqli_fetch_assoc($Result);
            $id = $row['accountID'];
            $role = $row['role'];

            $_SESSION['name'] = $username;
            $_SESSION['account_id'] = $id;

            if ($role == 'ADMIN') {
                header("location: admin/admin-landingpage.php?id=$id");
                exit();
            } elseif ($role == 'USER') {
                header("location: user/user-landingPage.php?id=$id");
                exit();
            }
        } else {
            // No matching user found
            echo "No data matched";
            exit();
        }
    }
}
?>
    



<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
      

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/style/login-style.css">
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
