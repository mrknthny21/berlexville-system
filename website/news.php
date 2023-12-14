<?php include 'website-navbar.php'; ?>

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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .mainbox {
            display: flex;
            flex-direction: row;
            padding-top: 10px;
            height: 310px;
            width: 96vw;
           
            margin-left: 20px;
            margin-top: 100px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            text-align: left;
        }

        .history {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 120px;
            width: 60vw;
            border: 1px black solid;
            margin-left: 30px;
            margin-top: 5px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            background-color: #FFFFFF;
        }

        .history p{
            text-decoration: none;
            color: black;
            text-align: justify;
            
        }

        .mission {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 120px;
            width: 29vw;
            border: 1px black solid;
            margin-left: 10px;
            margin-top: 10px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            float: left;
            background-color: #FFFFFF;
        }

        .mission p{
            font-size: 16px;
            color: black;
            text-align: justify;
            
        }

        .vision {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 120px;
            width: 29vw;
            border: 1px black solid;
            margin-left: 10px;
            margin-top: 10px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            float: left;
            background-color: #FFFFFF;
        }

        .vision p{
            font-size: 14px;
            color: black;
            text-align: justify;
        }

        .box2 {
            margin-left: 20px;
        }

        .picbox {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 270px;
            width: 27vw;
            border: 1px black solid;
            margin-left: 10px;
            margin-top: 5px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            float: left; 
            background-color: #FFFFFF;
        }

        .mainbox2 {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            padding: 5px;
            height: 55vh;
            width: 90vw;
            border: 1px black solid;
            margin-left: auto; /* Center horizontally by using auto margins */
            margin-right: auto;
            margin-top: 5px;
            border-radius: 10px;
            justify-content: center;
            background-color: #4F71CA;
            margin-top: 15vh;
        }

        .bod {
            width: 100%;
            text-align: center;
            font-weight: bold;
            font-family: 'Poppins', sans-serif; /* Use Poppins font */
            height: 3vh;
            margin-bottom: 15px;
            
        }

        .pbox {
            display: flex;
            flex-direction: row;
            padding: 10px;
            height: 200px;
            width: 140px;
            border: 1px black solid;
            margin-left: 20px;
            margin-top: 1px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            justify-content: center;
            background-color: #FFFFFF;
        }

        .vpbox{
            display: flex;
            flex-direction: row;
            padding: 10px;
            height: 200px;
            width: 140px;
            border: 1px black solid;
            margin-left: 20px;
            margin-top: 1px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            justify-content: center;
            background-color: #FFFFFF;
        }

        .sbox {
            display: flex;
            flex-direction: row;
            padding: 10px;
            height: 200px;
            width: 140px;
            border: 1px black solid;
            margin-left: 20px;
            margin-top: 1px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            justify-content: center;
            background-color: #FFFFFF;
        }

        .tbox{
            display: flex;
            flex-direction: row;
            padding: 10px;
            height: 200px;
            width: 140px;
            border: 1px black solid;
            margin-left: 20px;
            margin-top: 1px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            justify-content: center;
            background-color: #FFFFFF;
        }

        .abox{
            display: flex;
            flex-direction: row;
            padding: 10px;
            height: 200px;
            width: 140px;
            border: 1px black solid;
            margin-left: 20px;
            margin-top: 1px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            justify-content: center;
            background-color: #FFFFFF;
        }

        .texth {
            color: black;
            text-decoration: none;
            font-weight: bold; 
            margin-bottom: 5px;


        }

        .textm {
            color: black;
            font-weight: bold; 
        }

        .textv {
            color: black; 
            font-weight: bold; 
        }

        .textp {
            color: black; 
        }


        .textbod { 
            font-weight: bold; 
            color: white; 
        }

        .flashcard {
            display: flex;
            flex-direction: row;
            width: 100%;
            justify-content: center;
        }

        .titles {
            display: flex;
            flex-direction: row;
            width: 100%;
           flex-wrap: wrap;
            margin-top: 10px;
            margin-left: 5px;
        }

        .pres{
            margin-left:19vw;
            font-weight: bold;
            font-family: 'Poppins', sans-serif; /* Use Poppins font */
            color: white;
        }

        .Vpres{
            margin-left:6vw;
            font-weight: bold;
            font-family: 'Poppins', sans-serif; /* Use Poppins font */
            color: white;
        }

        .sec{
            margin-left:5vw;
            font-weight: bold;
            font-family: 'Poppins', sans-serif; /* Use Poppins font */
            color: white;
        }

        .tres{
            margin-left:7vw;
            font-weight: bold;
            font-family: 'Poppins', sans-serif; /* Use Poppins font */
            color: white;
        }

        .aud{
            margin-left:7vw;
            font-weight: bold;
            font-family: 'Poppins', sans-serif; /* Use Poppins font */
            color: white;
        }
    </style>
</head>

<body>

   

            <div class="mainbox2">

                    <div class="bod">
                        <h3 class="textbod"> BOARD OF DIRECTORS </h3> 
                    </div>
                    
                    <div class= "flashcard">
                        <div class="pbox">
                        </div>
                        <div class="vpbox">
                        </div>
                        <div class="sbox">
                        </div>
                        <div class="tbox">  
                        </div>
                        <div class="abox">
                        </div>
                    </div>

                    <div class="titles">
                    <div class="pres"> President </div>
                    <div class="Vpres"> Vice President </div>
                    <div class="sec"> Secretary </div>
                    <div class="tres"> Treasurer </div>
                    <div class="aud"> Auditor </div>
                    </div>
                </div>
    </div>
       
       

    

</body>

</html>

