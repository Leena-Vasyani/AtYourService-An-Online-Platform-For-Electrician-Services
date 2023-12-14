<?php
session_start();
include 'partials/_dbconnect.php';

$username = $_SESSION['username'];
$sql = "SELECT * FROM `bookings` WHERE `username` = '$username'";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking History</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        
        .booking-history {
            max-width: 100%;
            margin: 0px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .booking {
            border: 0px solid #ccc;
            padding: 20px;
            margin: 20px;
    font-size: large;
            border-radius: 5px;
            background-color: #cbe0ef;
            margin-bottom: 50px;
        }
        
        .booking h2 {
            font-size: 20px;
            margin: 0;
        }
        
        .booking p {
            color: rgb(59, 58, 58);
            margin: 5px 0;
            font-weight: lighter;
        }

        h1 {
                margin-top: -10px;
                margin-left: -8px;
                margin-right: -8px;
                background-color: #2c295b;
                font-size: 40px;
                text-align:right;
                padding: 25px;
                color: white;
                
            }

    .question{
        display: flex;
        padding:4px;

    }

            .booking h2{
    font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 25px;
        font-weight: bolder;
        padding-top: 4px;
        padding-bottom: 4px;
    color: white;
        border:1px solid rgb(19, 34, 98);
        background-color: rgb(22, 38, 102);
        width: 140px;
        
        border-radius: 10px;
        
        }

        .info{
            padding-top: 13px;
                }
    </style>    
</head>
<body>
    <h1>Booking History</h1>

    <div class="booking-history">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="booking">';
                echo '<h2>' . $row['servicetype'] . '</h2>'; 
                echo '<div class="info">';
                echo '<div class="question">Date:<div class="put">' . $row['date'] . '</div></div>';
                echo '<div class="question">Time:<div class="put">' . $row['time'] . '</div></div>';
                //echo '<div class="question">Price:<div class="put">' . $row['price'] . '</div></div>';
                echo '<div class="question">Service Provider Name:<div class="put">' . $row['popup-service-provider-name'] . '</div></div>';
                echo '<div class="question">Service Provider Id:<div class="put">' . $row['popup-service-provider-id'] . '</div></div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No booking history found for the current user $username!';
        }

        $conn->close();
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>



    
    

