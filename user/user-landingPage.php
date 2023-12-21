<?php include 'user-nav-sidebars.php'; ?>

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
            height: 310px;
            width: 96vw;
            margin-left: 280px;
            margin-top: 50px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            text-align: left;
        }

        .homeacc {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 50px;
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
            width: 20vw;
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
            width: 20vw;
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
            height: 400px;
            width: 50vw;
            border: 1px black solid;
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
       
        <div class="monthdue">   
                        <p class= "texth">Paid</p>
                        <p>Monthly Dues</p>
                    </div>
                </div>
       
                <div class="amilyar">   
                        <p class= "texth">Paid</p>
                        <p>Monthly Dues</p>
                    </div>
                </div>  

    

</body>

</html>

