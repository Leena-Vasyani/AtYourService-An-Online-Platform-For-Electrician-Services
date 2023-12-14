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
    <title>Electrical Repairs</title>
    <link rel="stylesheet" href="chat.css">
    
</head>
<body>
    <header>
        <img src="partials/darklogo.jpg" class="logo">
        <h1 class="Title">Electrical Repairs</h1>
    </header>
    <nav>
        <a href="loggedinhome.php">Home</a>
        <a href="services.php">Services</a>
        <a href="services2.php">Repair</a>
        <a href="services3.php">Installation</a>
        <a href="services4.php">Urgent</a>
       <a href="viewcart.php"> <img src="partials/shopping-cart.png" class="cart"> </a>
        <!-- <a href="#">Cart</a>   -->
        <a href="login.php">Login / Signup</a>  
    </nav>
    <div class="container">
        <section class="service" id="repair">
            <h2>Repair Services</h2>
            <div class="sub-service">
                <img src="partials/GeyserRepair copy.png" alt="Geyser Repair" class="serviceimg">
                <div class="sub-service-details">
                    <h3>Geyser Repair</h3>
                    <p>We repair faulty geysers to ensure you have hot water when you need it.</p>
                    <p><strong>Cost: ₹ 99</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="Geyser Repair">
                            <input type="hidden" name="item_price" value="99.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>

                </div>
            </div>
            <div class="sub-service">
                <img  src="partials/DoorBellRepair.jpeg" alt="Door Bell Repair" class="serviceimg">
                <div class="sub-service-details">
                    <h3>Door Bell Repair</h3>
                    <p>We fix doorbell issues for seamless entry and security.</p>
                    <p><strong>Cost: ₹ 49</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="Door Bell Repair">
                            <input type="hidden" name="item_price" value="49.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                    
                </div>
            </div>
            <div class="sub-service">
                <img src="partials/RefrigeratorRepair.jpg" alt="Refrigerator Repair" class="serviceimg">
                <div class="sub-service-details">
                    <h3>Refrigerator Repair</h3>
                    <p>We repair refrigerators to keep your food fresh and cool.</p>
                    <p><strong>Cost: ₹ 149</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="Refrigerator Repair">
                            <input type="hidden" name="item_price" value="149.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
            <div class="sub-service">
                <img src="partials/microwave.webp" alt="Microwave Repair" class="serviceimg">
                <div class="sub-service-details">
                    <h3>Microwave Repair</h3>
                    <p>We fix microwave ovens for quick and easy cooking.</p>
                    <p><strong>Cost: ₹ 149</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="Microwave Repair">
                            <input type="hidden" name="item_price" value="149.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
            <div class="sub-service">
                <img src="partials/WashingMachineRepair.png" alt="Washing Machine Repair" class="serviceimg">
                <div class="sub-service-details">
                    <h3>Washing Machine Repair</h3>
                    <p>We repair washing machines for clean and fresh laundry.</p>
                    <p><strong>Cost: ₹ 199</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="Washing Machine Repair">
                            <input type="hidden" name="item_price" value="199.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
            <div class="sub-service">
                <img src="partials/bulbrepair.webp" alt="Bulb Repair" class="serviceimg">
                <div class="sub-service-details">
                    <h3>Bulb Repair</h3>
                    <p>We repair bulbs for bright lighting.</p>
                    <p><strong>Cost: ₹ 49</strong></p><br>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <form method="post">
                            <input type="hidden" name="item_name" value="Bulb Repair">
                            <input type="hidden" name="item_price" value="49.00">
                            <button style="padding: 10px 20px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                        <button style="padding: 10px 20px; margin-right: 250px; background-color: #171718fc; color: #fff; border: none; cursor: pointer;" type="submit" onclick="location.href='book.php' ">Book Service</button>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
    <footer>
        &copy; 2023 Electrician Services
        
    </footer>
</body>
</html>
