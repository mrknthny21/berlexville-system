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
            width: 1560px;
            border: 1px black solid;
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
            width: 1110px;
            border: 1px black solid;
            margin-left: 30px;
            margin-top: 5px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            background-color: #FFFFFF;
        }

        .mission {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 120px;
            width: 540px;
            border: 1px black solid;
            margin-left: 10px;
            margin-top: 10px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            float: left;
            background-color: #FFFFFF;
        }

        .vision {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 120px;
            width: 540px;
            border: 1px black solid;
            margin-left: 10px;
            margin-top: 10px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            align-items: left;
            justify-content: left;
            float: left;
            background-color: #FFFFFF;
        }

        .box2 {
            margin-left: 20px;
        }

        .picbox {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 270px;
            width: 340px;
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
            flex-direction: row;
            padding: 10px;
            height: 290px;
            width: 1540px;
            border: 1px black solid;
            margin-left: 20px;
            margin-top: 10px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            justify-content: center;
            background-color: #4F71CA;
        }

        .bod {
           width: 100%;
           text-align: center;
        }

        .pbox {
            display: flex;
            flex-direction: row;
            padding: 10px;
            height: 165px;
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
            height: 165px;
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
            height: 165px;
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
            height: 165px;
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
            height: 165px;
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
        }

        .textm {
            color: black; 
        }

        .textv {
            color: black; 
        }

        .textp {
            color: black; 
        }


        .textbod { 
            font-weight: bold; 
            color: black; 
        }
    </style>
</head>

<body>
<?php include 'website-navbar.php'; ?>
    <!-- Your page content goes here -->
    <div class="mainbox">
        <div class="leftbox">
            <div class= "box1">
                <div class="history">
                    <p class="texth">History</p>
                </div>
            </div>

            <div class= "box2">
                <div class="mission">
                    <p class="textm">Mission</p>
                </div>

                <div class="vision">
                    <p class="textv">Vision</p>
                </div>
            </div>
        </div>


            <div class = "picbox">
                <p class="textp"> Picture </p>
            </div>
        </div>

        <div class="mainbox2">
          <div class="bod">
             <h3 class="textbod"> BOARD OF DIRECTORS </h3> 
          </div>
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

       
       
    </div>
    

</body>

</html>

