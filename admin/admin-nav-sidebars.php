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


        .navbar {
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
            height: 62px;
            margin: 5px;
            position: fixed;
            width: 300px;
            margin-left: 15px;
            display: flex;
            flex-direction: row;
        }

        .logo{
            height:60px;
            width: 70px;
        }

        .logo img {
            width:66px;
            height: 56px;
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
            font-size:27px;
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
            font-size: 15px;  
            color: white;
        }

        
        .login-button{
            margin:10px;
            margin-left: 72vw;
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
            height: 100vh;
            width: 17vw;
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

        .content {
            margin-left: 250px; /* Adjusted to make space for the sidebar */
            padding: 20px; /* Optional: Add padding to content area */
        }

            /* ... your existing styles ... */

    .sidebar a.active {
        background-color: #4F71CA; /* Set the background color for the active link */
        color: white; /* Set text color for the active link */
    }

    .sidebar a.active img {
        filter: invert(1); /* Invert the color of the icon for better visibility on the active link background */
    }

    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-VCo2EszHFvR0cHJ7dQbSYzLgW5F/+xloqqDte0wC2L3CcvrHOhX8tRcBeSOFqRG+4uqm2nAeG7NbbJ2vKwL2hA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Document</title>
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
    <a href="admin-landingpage.php" class="sidebar-link"><img src="../assets/home.png" alt="Home Icon"> Home</a>
    <a href="admin-records.php" class="sidebar-link"><img src="../assets/records.png" alt="Records Icon"> Records</a>
    <a href="admin-accounting.php" class="sidebar-link"><img src="../assets/calculator.png" alt="Accounting Icon"> Accounting</a>
    <a href="admin-feedback.php" class="sidebar-link"><img src="../assets/feedback.png" alt="Feedback Icon"> Feedback</a>
    <a href="admin-external.php" class="sidebar-link"><img src="../assets/external.png" alt="External Content Icon"> External Content</a>
</div>

        <div class="content">
          
        </div>
    </body>

    <script>
    // Add this script to handle the click event and toggle the 'active' class
    document.addEventListener("DOMContentLoaded", function () {
        var sidebarLinks = document.querySelectorAll(".sidebar-link");

        sidebarLinks.forEach(function (link) {
            link.addEventListener("click", function () {
                // Remove 'active' class from all links
                sidebarLinks.forEach(function (otherLink) {
                    otherLink.classList.remove("active");
                });

                // Add 'active' class to the clicked link
                link.classList.add("active");
            });
        });
    });
</script>

</html>