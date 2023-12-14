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
            width: 100vw;
            background-color: #4F71CA;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: space-between;
            z-index: 2;
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
            width: 16vw;
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
          width: 20vw;
          height: 15vh;
          margin: 15px;
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
    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Poll</title>
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
            <p>Poll</p>
            <a href="user-community.php">
            <i class="fa-regular fa-square-caret-left"></i>
        </a>
        </div>

        <a href="user-christmas-poll.php" class="tab-box">
            <i class="fa-regular fa-user"></i>
            <p>Christmas Party</p>
        </a>

        
        <a href="user-account-information.php" class="tab-box">
        <i class="fa-solid fa-info"></i>
            <p>Election</p>
        </a>

        <a href="user-family-information.php" class="tab-box">
            <i class="fa-solid fa-people-roof"></i>
            <p>Outing Event</p>
        </a>
        </div>
    </body>
</html> 