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

            height:11vh;
            width: 100vw;
            background-color: WHITE;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: space-between;
           
          
           

        }

        .logobox{
            height: 65px;
            margin: 5px;
            position: fixed;
            width: 300px;
            margin-left: 50px;
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
        }

        .navlinks {
        display: flex;
        align-items: center;
        height: 100%;
        margin-left: 570px;
       
        }

        .navlinks a {
        margin-left: 50px; /* Add some spacing between the links */
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
      
                    <a href="index.php">Home</a>
                    <a href="about.php">About</a>
                    <a href="news.php">News</a>
                    <a href="contacts.php">Contacts</a>


                </div>
                <div class="login-button">
                    <a href="../login.php">
                        <button>
                            <p>LOG IN</p>
                        </button>
                    </a>
                </div>


                
        </div> 

      


      


    </body>
</html>