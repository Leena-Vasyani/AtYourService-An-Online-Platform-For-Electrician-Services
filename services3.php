<?php
session_start();
include 'partials/_dbconnect.php';

if (isset($_POST['add_to_cart'])) {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $username = $_SESSION['username'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `cart` (`item_name`, `item_price`, `username`) VALUES ('$item_name', '$item_price', '$username')";
    
    if (mysqli_query($conn, $sql)) {
        //echo "Item added to the cart successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation Services</title>
    <link rel="stylesheet" href="chat.css">
</head>
<body>
    <header>
        <img src="partials/darklogo.jpg" class="logo">
        <h1 class="Title">Installation Services</h1>
        
    </header>
    <nav>
        <a href="loggedinhome.php">Home</a>
        <a href="services.php">Services</a>
        <a href="services2.php">Repair</a>
        <a href="services3.php">Installation</a>
        <a href="services4.php">Urgent</a>
        <a href="viewcart.php"><img src="partials/shopping-cart.png" class="cart"></a>
        <a href="login.php">Login / Signup</a>  
    </nav>
    <div class="container">
        <section class="service" id="installation">
            <h2>Installation </h2>
            <div class="sub-service">
                <img src="partials/DoorBellRepair.jpeg" alt="Door Bell Installation" width="100">
                <div class="sub-service-details">
                    <h3>Door Bell Installation</h3>
                    <p>We install doorbells for enhanced security and convenience.</p>
                    <p><strong>Cost: ₹ 99</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="Door Bell Installation">
                            <input type="hidden" name="item_price" value="99.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
            <div class="sub-service">
                <img src="partials/TVInstallation.webp" alt="TV Installation" width="100">
                <div class="sub-service-details">
                    <h3>TV Installation</h3>
                    <p>We set up your television for an excellent viewing experience.</p>
                    <p><strong>Cost: ₹ 399</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="TV Installation">
                            <input type="hidden" name="item_price" value="399.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
            <div class="sub-service">
                <img src="partials/Fannstallation.png" alt="Fan Installation" width="100">
                <div class="sub-service-details">
                    <h3>Fan Installation</h3>
                    <p>We install ceiling fans to keep your space cool and comfortable.</p>
                    <p><strong>Cost: ₹ 149</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="Fan Installation">
                            <input type="hidden" name="item_price" value="149.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
            <div class="sub-service">
                <img src="partials/cctvinstall.jpg" alt="CCTV Camera Installation" width="100">
                <div class="sub-service-details">
                    <h3>CCTV Camera Installation</h3>
                    <p>We install CCTV camera to enable security.</p>
                    <p><strong>Cost: ₹ 499</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="CCTV Installation">
                            <input type="hidden" name="item_price" value="499.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
            <!-- Add more installation services here -->
        </section>
        
        
    </div>
    <footer>
        &copy; 2023 Electrician Services
    </footer>
</body>
</html>
