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
        }

        .mainbox2 {
            display: flex;
            flex-direction: row;
            padding: 10px;
            height: 290px;
            width: 1540px;
            border: 1px black solid;
            margin-left: 20px;
            margin-top: 10px; /* Center horizontally and adjust top margin */
            border-radius: 10px;
            text-align: left;
        }

        .bod {
           
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
                    <p>History</p>
                </div>
            </div>

            <div class= "box2">
                <div class="mission">
                    <p>Mission</p>
                </div>

                <div class="vision">
                    <p>Vision</p>
                </div>
            </div>
        </div>


            <div class = "picbox">
                <p> Picture </p>
            </div>
        </div>

        <div class="mainbox2">
          <div class="bod">
         <h3> BOARD OF DIRECTORS </h3> 
          </div>
        </div>

       
    </div>
    

</body>

</html>

