<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconnect.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                header("location: loggedinhome.php"); 
                exit;
            } else {
                echo "Invalid password";
            }
        } else {
            echo "User not found";
        }

        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>   

        <title>AtYourService- Expert Services at Your Doorstep</title>
       
    </head>
    <body>

      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
           <div class="sidebar">
        <ul>
          <li>
            <a href="profile.php"><i class="fas fa-qrcode"></i>Profile</a>
          </li>
          <li>
            <a href=""><i class="fas fa-link"></i>Services</a>
          </li>
          <li>
            <a href="bookinghistory"><i class="fas fa-stream"></i>Booking History</a>
          </li>
        </ul>
      </div>
        </div>
      </div>
      
     <nav class="navbar navbar-expand-lg bg-body-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="partials/lightlogo.jpeg" alt="Bootstrap" width="230" height="70" class="image" >
              </a>
          
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 " id="xyz">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="aboutus.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="regpro.php">Register as a Proffesional</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="services.php">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="login.php">Login</a>
              </li>
            
            </ul>
            
          </div>
        </div>
      </nav>
       
    <div  id="front">
       <section class="box">
        <section class="hero">
          <h1>Expert Technicians at Your Doorstep</h1>
          <p>Powering Your Home's Bright Future: Your Trusted Electrician On-Demand!</p>
          <button id="bookNowButton" class="cta-button">Book Now</button>
          
      </section>
      
      <section class="services">
          <div class="service1">
              
              <p class="service1text">Welcome to AtYourService, where we take pride in offering a comprehensive range of top-tier electrician services to elevate your living experience. Our platform brings together a curated selection of skilled professionals dedicated to addressing your household need. </p>
          </div>
  </section>
       </section>
       
       
    
            
        
        </div>
    

        
        
    <div class="secondpara">
      <h1>Find top-rated certified
        pros in your area.</h1>
 
      </div>

       <div class="wrap">
          <div class="search">
             <input type="search" class="searchTerm" placeholder="What are you looking for?">
             <button type="submit" class="searchButton">
Search
            </button>
          </div>
       </div>

<ul class="servicelist">
  <li class="seritem">
   <a href="services3.php" class="homeservices"><img src="partials/fan.jpeg"> <br><p class="iconname">Fan</p> </a> 
  </li>

  <li class="seritem">
    <a href="services2.php"  class="homeservices"> <img src="partials/fridge.jpeg"> <br> <p class="iconname">Refrigerator</p> </a> 
   
  </li>

  <li class="seritem">
    <a href="services2.php"  class="homeservices">   <img src="partials/microwave.jpeg"> <br><p class="iconname">Microwave</p> 
       </a> 

  </li>

  <li class="seritem">
    <a href="services2.php"  class="homeservices">  <img src="partials/washingmachine.jpeg"> <br><p class="iconname">Washing Machine</p>  
   </a> 

  </li>

  
  <li class="seritem">
    <a href="services2.php"  class="homeservices">  <img src="partials/geyser.jpeg"> <br><p class="iconname">Geyser</p>  
   </a> 

  </li>

  
  <li class="seritem">
    <a href="services4.php"  class="homeservices">  <img src="partials/socket.jpeg"> <br><p class="iconname">Switch/Sockets</p>  
   </a> 

  </li>


  <li class="seritem">
    <a href="services3.php"  class="homeservices">  <img src="partials/tv.jpeg"> <br><p class="iconname">TV</p>  
   </a> 

  </li>

  
  <li class="seritem">
    <a href="services.php"  class="homeservices">  <img src="partials/plus.jpeg"> <br><p class="iconname">Other</p>  
   </a> 

  </li>


</ul>
    </div>
   
    <p id="para" >Popular projects</p>

    
        <div class="ser">

            <ul class="popular">
              <li class="popularlist">
               <a href="services3.php" class="popim"><img src="partials/websitefanrepair.jpeg" > </a> 
              </li>
            
              <li class="popularlist">
                <a href="services2.php"  class="popim"> <img src="partials/websitebulbrepair.jpeg"> </a> 
              </li>
            
              <li class="popularlist">
                <a href="services3.php"  class="popim">     <img src="partials/websitetvrepair.jpeg">
                   </a>           
              </li>           
</ul> 
        </div>

        <div class="every">
          
          <div class="whole">
             <p>AtYourService: <strong>Where Every Service is a Stroke of Perfection</strong></p> 
             <div class="left">AtYourService Home Services offers a curated range of meticulously crafted solutions to transform your living space into a haven of comfort and elegance. Our skilled professionals bring a touch of perfection to every corner of your home. With AtYourService, experience the convenience of on-demand services and the assurance of quality, ensuring your home remains a place of beauty, serenity, and functionality.</div> 
      
          </div>
          
          <div class="right">
      <img src="partials/fanrepair.webp">
          </div>
      
      </div>
      

<hr>
        <div class="how-it-works"><h3> How it works</h3></div>    

        <div class="hiw">


  <div class="p1">
    <div class="heads">
      1. Tell us what your home needs
    </div>
    <div class="des">
      From routine maintenance to repairs, we can help with any project — big or small.
    </div>
  </div>

  <div class="p1">
    <div class="heads">
      2. We’ll match you with personalized solutions
    </div>
    <div class="des">
      See your price and book services by highly skilled pros near you in an instant. 
    </div>
  </div>

  <div class="p1">
    <div class="heads">
      3. Start to finish, we’ve got you covered
    </div>
    <div class="des">
      When you book and pay with AtYourService, you’re covered by our Happiness Guarantee. We’ll cover your projects up to full purchase price, plus limited damage protection.


    </div>
  </div>

</div>
<hr>
        
          


<footer>
            <div class="footer-content">
                <p>&copy; 2023 Your Website</p>
                <ul class="foo">
                    <li><a href="aboutus.html">About Us</a></li>
                    <li><a href="aboutus.html">Contact</a></li>
                </ul>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
         integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
         crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
         integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
         crossorigin="anonymous"></script>
     <script src="js/home.js"></script>

     <script>
        document.getElementById("bookNowButton").addEventListener("click", function() {
            var loggedIn = <?php echo isset($_SESSION['loggedin']) ? 'true' : 'false'; ?>;
            
            if (!loggedIn) {
                alert("Please login to book a service!");
                window.location.href = "login.php"; 
            } else {
                window.location.href = "book.php"; 
            }
        });
    </script>
    </body>
</html>