<?php
session_start();
include 'partials/_dbconnect.php';

// Assuming you have a session variable containing the user's username
$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profilekacss.css">
    <title>User Profile</title>
</head>
<body>
    <div class="bg-cover"></div>
    <div class="container">
      <div class="header">
        <i class="fa fa-bars"></i>
        <i class="fa fa-cog"></i>
      </div>
      <div class="middle">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<img src="http://www.tomatinatrip.com/wp-content/uploads/2015/07/Picture-of-person.png" alt="" class="user-pic" />';
                echo '<div>';
                echo '<h4 class="name">' . $row["username"] . '</h4>';
                echo '</div>';
                echo '<div>';
                echo 'Gender:';
                echo '<h4 class="gender">' . $row["gender"] . '</h4>';
                echo '</div>';
                echo '<div>';
                echo 'Date of Birth:';
                echo '<h4 class="gender">' . $row["dob"] . '</h4>';
                echo '</div>';
                echo '<div>Address:<h4 class="Address">' . $row["street1"] . ', <br>' . $row["street2"] . ', <br>' . $row["city"] . ', <br>' . $row["region"] . ' - ' . $row["postalcode"] . '</h4> </div>';
                echo '<div>';
                echo 'Phone Number:';
                echo '<h4 class="phone">' . $row["phone"] . '</h4>';
                echo '</div>';
                echo '<div>';
                echo 'Email Address:';
                echo '<h4 class="email">' . $row["email"] . '</h4><br>';
                echo '</div>';
            }
        } else {
            echo "No results found";
        }
        ?>
        <h4 class="social"><i class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-dribbble"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-twitter"></i></h4>
      </div>
      <div class="footer">
      <a href="bookinghistory.php">
        <button class="btn-follow">View Booking History </button>
      </a> <br>
        <i class="fa fa-lock"></i>
        <br/>
      </div>
    </div>
</body>
</html>
