<?php include 'website-navbar.php';


?>  
<!DOCTYPE html>
<html lang="en">
    <style>
        
        .content-area {
          height: auto;
          width: 100vw;
         
         
          display: flex;
          justify-content:center;
          flex-direction: column;
            position: fixed;
          margin-top: 12vh;
          margin-left: 0px;
      }

      .tab-box {
          display: flex;
          flex-direction: column;
          align-items: center; /* Align items vertically in the center */
          border: 1px solid black;
          width: 27vw;
          height: 15vh;
          margin: 10px;
          
          border-radius: 10px;
          text-align: below;
          transition: all 0.3s;
          justify-content: center;
          text-decoration: none; /* Remove the default link underline */
          color: inherit; 
          
      }
     
      .cards{
        display: flex;
        width: 100vw;
        justify-content: space-evenly;
        margin-top: 3vh;

      }

    

      .tab-box i {
            margin-right: 8px;
            font-size: 30px; /* Adjust as needed to create space between icon and text */
        }
                
        .tab-box:hover {
            background-color: #4F71CA; /* Change to your desired hover color */
        }

        .icon-box{
            display: flex;
            flex-direction: row;
        
        }

        .icon-box p{
            font-weight: 900 ;
            font-size: 25px;
            margin-left:5px;
        }
        .content{
            border: solid 1px black;
            width: 91vw;    
            margin-left:4vw;    
            border-radius: 10px;

        }


        .title{
            width: 100vw;
            text-align: center;
            margin-top: 5vh;
        }
        
        .title p {
            font-size: 25px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            color:  #4F71CA;
        }

        .folders{
            width: 100%;    
            height: 45vh;
            display:flex;
            flex-direction: row;
            flex-wrap: wrap;
            padding:15px;
           
            justify-content: center;
            align-items:center;
        }

        .collection{
            height: 40vh;
            width: 18vw;
            border:solid 1px black;
            border-radius: 5px;
            display:flex;
            flex-direction: column;
            margin: 10px;
        }

        .photo{
            width: 100%;
            height: 31vh;
            border-bottom: solid 1px black;
        }

        .album-title{
            text-align: center;
            display: flex;
            justify-content: center;
            align-items:center;

        }

        .album-title p{
            text-align: center;
            font-weight: lighter;
            font-family: 'Poppins', sans-serif;
            margin-top: 2vh;
          
        }


    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
        <title>Home</title>
    </head>
    <body>

        
    
    
    <div class ="content-area">
       
            <div class="cards">
            <?php    

            include '../db_connect.php';

          
            $sql = "SELECT COUNT(*) AS resident_population FROM tbl_resident";
            $result = $conn->query($sql);

            if ($result) {
                    // Fetch the result
                    $row = $result->fetch_assoc();
                    
                    // Output the resident population
                    $resident_population = $row['resident_population'];
                    echo '<a href="admin-records-user.php" class="tab-box">';
                    echo '<div class ="icon-box">';
                    echo '<i class="fa-regular fa-circle-user"></i>';
                    echo '<p>' . $resident_population . '</p>';
                    echo '</div>';
                    echo '<p>Resident Population</p>';
                    echo '</a>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            ?>
            
            <?php

            include '../db_connect.php';
            // Query to count rows in the homeowners table
            $sql = "SELECT COUNT(*) AS total_households FROM tbl_homeowners";
            $result = $conn->query($sql);

            if ($result) {
                // Fetch the result
                $row = $result->fetch_assoc();
                
                // Output the total households
                $total_households = $row['total_households'];
                echo '<a href="admin-records-residence.php" class="tab-box">';
                echo '<div class ="icon-box">';
                echo '<i class="fa-solid fa-house"></i>';
                echo '<p>' . $total_households . '</p>';
                echo '</div>';
                echo '<div>';
                echo '<p>Current Total Households</p>';
                echo '</div>';
                echo '</a>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            ?>

                <a href="admin-records-resident.php" class="tab-box">
                    <div class="icon-box">
                        <i class="fa-regular fa-calendar"></i>
                        <p> 14 </p>
                    </div>
                    <p>Years Since Foundation</p>
                </a>
            </div>

        <div class="content">
            <div class="title">
                <p> HOMEOWNERS EVENTS AND ACTIVITIES </p>
            </div>

            <div class="folders">

                <div class="collection">
                    <div class="photo">

                    </div>

                    <div class="album-title">
                        <p>Christmas Party 2023 </p>
                    </div>
                </div>

                <div class="collection">
                    <div class="photo">

                    </div>

                    <div class="album-title">
                        <p>Brgy. Clean Up Drive  2023 </p>
                    </div>
                </div>

                <div class="collection">
                    <div class="photo">

                    </div>

                    <div class="album-title">
                        <p>Village Opening Annual Mass </p>
                    </div>
                </div>

                
                <div class="collection">
                    <div class="photo">

                    </div>

                    <div class="album-title">
                        <p>Village Opening Annual Mass </p>
                    </div>
                </div>

                

                
            </div>


        </div>

    
    </body>
</html>