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
            margin: 0; /* Reset margin */
        
        }
        .navbar{

            height:9vh;
            width: 100vw;
            background-color: WHITE;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            z-index: 1000; /* keep it above other content */
            padding-top: 1vh ; /* optional spacing inside navbar */
           
          
           

        }

        .logobox {
            margin: 5px;
            position: fixed;
            width: 50vw;
            margin-left: 20px;
            display: flex;
            flex-direction: row;
            align-items: center; /* vertical alignment */
            
            height: auto; /* Let content define height */
            max-height: 90px; /* Optional: cap height */
        }

        .logo {
            width: auto;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            height: 100%;
            width: auto; /* keeps aspect ratio */
            
            max-height:60px
        }

        @media (max-width: 600px) {
            .logo img {
                height: 40px;
                max-height: none;
            }
        }

        .letters {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 98%;
        }

        .title-berlex, .title-home {
            display: flex;
            width: 100%;
          
            overflow: hidden; /* Prevent any overflow */
            padding: 0; /* Remove padding if any */
        }

        .title-berlex {
            height: 70%;
        }

        .title-home {
            height: 40%;
           
      
        }

        .title-berlex p, .title-home p {
            margin: 0;
            line-height: 1;
            white-space: nowrap; /* Prevent wrapping */
            text-overflow: ellipsis; /* Optional: adds "..." if text is clipped */
            overflow: hidden; /* Hide text overflow */
        }

        .title-berlex p {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(23px, 5vw, 43px);
            font-weight: 700;
            margin-left:-1px;
        }

        .title-home p {
            font-family: 'Abel', sans-serif;
            font-weight: lighter;
            font-size: clamp(13px, 2vw, 24px);
        }

        .navlinks {
            display: flex;
            align-items: center;
            height: 100%;
            margin-left: 38vw;
        }

        .navlinks a {
            margin-left: 4vw; /* Add some spacing between the links */
            text-decoration: none;
            color: #333; /* Adjust the color as needed */
        }

        .navlinks a:hover {
            color: #007bff; /* Change color on hover */
        }   

        
        .login-button{
            margin:10px;
            margin-left: 50px;
            text-decoration: none;
        }

        .login-button button{
            background-color: #4F71CA;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            height: 40px;
            width: 100px;   
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            border-radius: 50px;
        } 
        

        .button p{
            text-decoration: none;
        }

        nav ul li a.active {
            color: #4F71CA; 
        }

        .hamburger {
            display: none;
            font-size: 28px;
            cursor: pointer;
         
            padding: 10px;
            margin-left: 35vw;
        }

        .mobile-nav {
            display: none; /* hidden on load */
            flex-direction: column;
            background-color: white;
            position: fixed;
            top: 0;
           
            width: 35%;
            z-index: 9999; /* must be higher than other elements */
            box-shadow: -2px 0px 10px rgba(0, 0, 0, 0.3);
            margin-top: 10vh;
            margin-left: 62vw;
        }

        .mobile-nav a {
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        .mobile-nav a:hover {
            background-color: #f0f0f0;
        }

        /* Show hamburger menu and hide navlinks on mobile */
        @media (max-width: 768px) {
            .navlinks,
            .login-button {
                display: none;
            }

            .hamburger {
                display: block;
            }
        }


        /* On mobile: show dropdown, hide regular nav */
        @media (max-width: 768px) {
            .desktop-nav {
                display: none;
            }

            .mobile-nav {
                display: none;
            }
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div class ="navbar">
            <div class="logobox">
               
                <div class= "logo">
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

                 <div class= "navlinks">
                        <a href="index.php" class="<?php echo ($currentPage === 'index') ? 'active' : ''; ?>">Home</a>
                        <a href="about.php" class="<?php echo ($currentPage === 'about') ? 'active' : ''; ?>">About</a>
                        <a href="news.php" class="<?php echo ($currentPage === 'news') ? 'active' : ''; ?>">Officers</a>
                        <a href="contacts.php" class="<?php echo ($currentPage === 'contacts') ? 'active' : ''; ?>">Contacts</a>
                </div>

                <div class="hamburger" onclick="toggleMobileMenu()">
                    &#9776;
                </div>

              
                
                <div class="login-button">
                    <a href="../login.php">
                        <button>
                            <p>LOG IN</p>
                        </button>
                    </a>
                </div>


                
        </div> 

      


        <div class="mobile-nav" id="mobileNav">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="news.php">Officers</a>
            <a href="contacts.php">Contacts</a>
            <a href="../login.php">Log In</a>
        </div>


    </body>

    <script>
        function toggleMobileMenu() {
            const mobileNav = document.getElementById("mobileNav");
            mobileNav.style.display = (mobileNav.style.display === "flex") ? "none" : "flex";
        }
    </script>

</html>