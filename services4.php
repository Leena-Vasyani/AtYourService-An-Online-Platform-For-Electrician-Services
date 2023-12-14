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
    <title>Urgent Services</title>
    <link rel="stylesheet" href="chat.css">
    
</head>
<body>
    <header>
        <img src="partials/darklogo.jpg" class="logo">
        <h1 class="Title">Urgent Services</h1>
    </header>
    <nav>
        <a href="loggedinhome.php">Home</a>
        <a href="services.php">Services</a>
        <a href="services2.php">Repair</a>
        <a href="services3.php">Installation</a>
        <a href="services4.php">Urgent</a>
        <a href="viewcart.php"><img src="partials/shopping-cart.png" class="cart"></a>
        <!-- <a href="#">Cart</a>   -->
        <!-- <img src="shopping-cart.png" class="cart"> -->
        <a href="login.php">Login / Signup</a>    

    </nav>
    <div class="container">
        
        <section class="service" id="urgent">
              <div class="sub-service">
                <img src="partials/Inspection copy.png" alt="Inspection" width="100">
                <div class="sub-service-details">                   <h3>Inspection</h3>
                    <p>We provide urgent electrical inspections to ensure safety.</p>
                    <p><strong>Cost: ₹ 99</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="Inspection">
                            <input type="hidden" name="item_price" value="99.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
            <div class="sub-service">
                <img src="partials/Wiring.jpeg" alt="Wiring" width="100">
                <div class="sub-service-details">                   <h3>New Wiring with Casing</h3>
                    <p>We provide urgent electrical inspections to ensure safety.</p>
                    <p><strong>Cost: ₹ 199 (per 5m)</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="New Wiring with Casing">
                            <input type="hidden" name="item_price" value="199.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
            <!-- Add more urgent services here -->
        </section>
        
    </div>
    <footer>
        &copy; 2023 Electrician Services
    </footer>
</body>
</html>
