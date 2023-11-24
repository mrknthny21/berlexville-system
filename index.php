<!DOCTYPE html>
<html lang="en">
    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        *{
            margin:0;
            border-box:0;
        }
        .navbar{
            height:75px;
            width: 100%;
            background-color: #4F71CA;
          
           

        }

        .logobox{
            height: 65px;
            margin: 5px;
            position: fixed;
            width: 300px;
            border: solid 1px black;
            display: flex;
            flex-direction: row;
        }

        .logo{
            height:60px;
            width: 70px;
            border: solid 1px black;
          
        }

        .logo img {
            max-width: 100%;
            max-height: 100%;
        }

        .letters{
            display: flex;
            flex-direction: column;
        }
        .title-berlex{
            height:35px;
            width: 220px;
            border: solid 1px black;
            margin-left: 5px;
            text-align: center;
            vertical-align: center;
        }

        .title-berlex p {
        font-family: 'Poppins', sans-serif;
        font-size:30px;
        font-weight: 700;
    
        /* You can adjust other font properties here, such as font-size, font-weight, etc. */
    }

        .title-home{
            height:20px;
            width: 220px;
            border: solid 1px black;
            margin-left: 5px;
            margin-top: 1px;
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
                <img src="assets/logo.png" alt="Logo Description">
                </div>



                <div class="letters">
                    <div class="title-berlex">
                        <p>BERLEXVILLE</p>
                    </div>   

                    <div class="title-home">
                        HOMEOWNERS ASSOCIATION
                    </div>  
            </div>
            </div> 


        </nav>
    </body>
</html>