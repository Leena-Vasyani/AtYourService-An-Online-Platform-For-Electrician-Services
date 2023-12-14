<?php
session_start();
include 'partials/_dbconnect.php';

$username = $_SESSION['username'];
$sql = "SELECT * FROM `cart` WHERE `username` = '$username'";
$result = mysqli_query($conn, $sql);

$cart_items = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cart_items[] = $row;
    }
}

if (isset($_POST['remove_item'])) {
  $removeItemName = $_POST['remove_item_name'];
  $username = $_SESSION['username'];

  $sql = "DELETE FROM `cart` WHERE `item_name` = '$removeItemName' AND `username` = '$username'";

  if (mysqli_query($conn, $sql)) {
      //echo "Item removed from your cart successfully.";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Your Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <header>
      
          
        <nav class="navbar">
            <div class="container">
             
                <img src="partials/lightlogo.jpeg" alt="Bootstrap" >
              </a>
            </div>
            
          </nav>
        </header>
           
    <div  id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item-active">
              <a class="nav-link" href="loggedinhome.php">Home</a>
            </li>
          <li class="nav-item-active">
            <a class="nav-link" href="regpro.php">Register as a Proffesional</a>
          </li>
          <li class="nav-item-active">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item-active">
            <a class="nav-link " href="login.php">Login/Sign Up</a>
          </li>
        </ul>
      </div>

      <div class="cart">
          <h2>My Cart</h2>
          <ul class="cart-items">
            <?php
            foreach ($cart_items as $item) {
                echo '<li class="item">';
                echo '<span class="item-name">' . $item['item_name'] . '</span>';
                echo '<span class="item-price">' . $item['item_price'] . '</span>';
                echo '<form method="post">';
                echo '<input type="hidden" name="remove_item_name" value="' . $item['item_name'] . '">';
                echo '<button type="submit" name="remove_item" class="remove-button">
                <img class="dustbin-icon" src="partials/dustbin.png" alt="Remove" /></button>';
                echo '</form>';
                echo '</li>';
            }
            ?>
        </ul>

          <div class="total">
              <div class="last">
                  <span>Total:</span>
                  <?php
                  $total_price = array_sum(array_column($cart_items, 'item_price'));
                  echo '<span class="total-price">' . number_format($total_price, 2) . '</span>';
                  ?>
              </div>
          </div>
          <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
      </div>

</body>
</html>