<?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" href="home.css">
    <main>
        <title>AtYourService- Expert Services at Your Doorstep</title>
    </head>
    <body>
          Welcome - <?php echo $_SESSION['username']?> 
          <div class="container my-3"> 
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?></h4>
            <p> Welcome to AtYourService! You are logged in as <?php echo $_SESSION['username']?>.</p>
            <hr>
            </div>
          </div> 
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
              <a class="nav-link" href="#">About Us<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item-active">
              <a class="nav-link" href="#">Register as a Proffesional</a>
            </li>
            <li class="nav-item-active">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item-active">
              <a class="nav-link " href="login.php">Login</a>
            </li>
            <li class="nav-item-active">
              <a class="nav-link " href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
        
       

       
    <div  id="front">
       <section class="box">
        <section class="hero">
          <h1>Expert Technicians at Your Doorstep</h1>
          <p>Powering Your Home's Bright Future: Your Trusted Electrician On-Demand!</p>
          <a href="bookingpage.php" class="cta-button">Book Now</a>
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
   <a href="service.php" class="homeservices"><img src="partials/fan.jpeg"> <br><p class="iconname">Fan</p> </a> 
  </li>

  <li class="seritem">
    <a href="#"  class="homeservices"> <img src="partials/fridge.jpeg"> <br> <p class="iconname">Refrigerator</p> </a> 
   
  </li>

  <li class="seritem">
    <a href="#"  class="homeservices">   <img src="partials/microwave.jpeg"> <br><p class="iconname">Microwave</p> 
       </a> 

  </li>

  <li class="seritem">
    <a href="#"  class="homeservices">  <img src="partials/washingmachine.jpeg"> <br><p class="iconname">Washing Machine</p>  
   </a> 

  </li>

  
  <li class="seritem">
    <a href="#"  class="homeservices">  <img src="partials/geyser.jpeg"> <br><p class="iconname">Geyser</p>  
   </a> 

  </li>

  
  <li class="seritem">
    <a href="#"  class="homeservices">  <img src="partials/socket.jpeg"> <br><p class="iconname">Switch/Sockets</p>  
   </a> 

  </li>


  <li class="seritem">
    <a href="#"  class="homeservices">  <img src="partials/tv.jpeg"> <br><p class="iconname">TV</p>  
   </a> 

  </li>

  
  <li class="seritem">
    <a href="#"  class="homeservices">  <img src="partials/plus.jpeg"> <br><p class="iconname">Other</p>  
   </a> 

  </li>


</ul>
    </div>
   
    <p id="para" >Popular projects</p>

    
        <div class="ser">

    <ul class="popular">
              <li class="popularlist">
               <a href="#" class="popim"><img src="partials/websitefanrepair.jpeg" > </a> 
              </li>
            
              <li class="popularlist">
                <a href="#"  class="popim"> <img src="partials/websitebulbrepair.jpeg"> </a> 
               
              </li>
            
              <li class="popularlist">
                <a href="#"  class="popim">     <img src="partials/websitetvrepair.jpeg">
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
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </footer>
    
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
         integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
         crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
         integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
         crossorigin="anonymous"></script>
     <script src="js/app.js"></script>
        </body>
</html>