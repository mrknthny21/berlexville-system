<?php
include 'admin-nav-sidebars.php';
include '../db_connect.php';

// Check if payment concern ID is provided in the URL
if (isset($_GET['id'])) {
    $paymentConcernID = mysqli_real_escape_string($conn, $_GET['id']);

// Retrieve payment concern details for the provided ID
$query = "SELECT pc.*, a.name
          FROM tbl_paymentconcerns pc
          JOIN tbl_homeowners a ON pc.accountID = a.accountID
          WHERE pc.paymentConcernID = '$paymentConcernID'";
$result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
    $paymentConcern = mysqli_fetch_assoc($result);
    $senderName = $paymentConcern['name'];
    $message = $paymentConcern['message'];
    // You can fetch other details if needed
    } else {
    // Handle the case where payment concern ID is not found
    echo "Payment concern not found";
    exit;
    }

    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>View Message</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .content-area {
            height: auto;
            width: 73vw;
            margin-left: 23vw;
            padding: 1vh;
            justify-content: left;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            margin-top: 0vh;
        }

        .upperbox {
            border-bottom: 1px black solid;
            width: 100vw;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
            padding-left: 0px;
        }

        .upperbox i {
            font-size: 25px;
        }

        .message-box {
            width: 100%;
            padding: 20px;
            border: 1px solid black;
            margin-top: 10px;
        }

        .message-box p {
            white-space: pre-wrap; /* Preserve line breaks */
        }

        .bottombox {
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .back-button {
            width: 15vw;
            height: 5vh;
            border: 1px black solid;
            display: flex;
            flex-direction: row;
            justify-content: center;
            border-radius: 5px;
            align-items: center;
            background-color: #4F71CA;
            padding: 3px;
            margin-right: 10px;
            text-decoration: none;
            color: white;
        }

        .back-button i {
            margin-right: 8px; /* Adjust as needed to create space between icon and text */
            font-size: 20px;
        }

        .reply-button {
            width: 15vw;
            height: 5vh;
            border: 1px black solid;
            display: flex;
            flex-direction: row;
            justify-content: center;
            border-radius: 5px;
            align-items: center;
            background-color: #4F71CA;
            padding: 3px;
            text-decoration: none;
            color: white;
        }

        .reply-button i {
            margin-right: 8px; /* Adjust as needed to create space between icon and text */
            font-size: 20px;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .popup-content {
            text-align: center;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="content-area">
        <div class="upperbox">
            <p></p>
            <p>Sender: <?php echo $senderName; ?></p>
        </div>

        <div class="message-box">
            <p><?php echo $message; ?></p>
        </div>

        <div class="bottombox">
            <a href="admin-accounting-p-concerns.php" class="back-button">
                <i class="fa-regular fa-square-caret-left"></i>
                <p>Back</p>
            </a>

            <!-- Add your reply button functionality here -->
            <a href="../user/user-community-concern.php" class="reply-button">
                <i class="fa-solid fa-reply"></i>
                <p>Reply</p>
            </a>
        </div>
    </div>
</body>
</html>
