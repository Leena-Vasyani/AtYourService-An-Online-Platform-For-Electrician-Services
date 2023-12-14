
    
            <!DOCTYPE html>
            <html lang="en">
            
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Electrician Services</title>
                <style>
                    /* Reset some default styles */
                    body, h1, p {
                        margin: 0;
                        padding: 0;
                        /* background-image: url(); */
                        
                    }
            
                    /* Set a background color */
                    body {
                        
                        font-family: Arial, sans-serif;
                       
                    }
            
                    /* Header styles */
                    header {
                       
                        display:flex ;
                        align-items: center;
                        justify-content: center;
                        background-color: #004aad;
                        color: #fff;
                        padding: 10px;
                        /* text-align: center; */
                   
                    }
            
                    header h1{
                        display: flex;
                        
                        /* margin-left: 300px; */
                        margin-top: 2%;
                        font-size: 36px;
                        text-decoration: none;
                    }
                    
                    .temp{
                        width: 30%;
                    }

                     /* .Title{
                    margin-left: 250px;
                    } */

                     .Title{
                       
                        display: flex;
                        text-align: center;
                         margin: 0px auto;
                    
                    }

                    /* Navigation menu styles */
                    nav {
                        background-color: #004badeb;
                        text-align: center;
                        padding: 10px;
                    }
            
                    nav a {
                        color: #fff;
                        text-decoration: none;
                        margin: 0 20px;

                    }
                    nav a:hover{
                        color: aqua;
                        transition: color 0.3s ease;

                    }
                    div a{
                        text-decoration: none;
                        color: #333;
                    }
            
                    /* Main content container */
                    .container {
                        /* text-decoration: none; */
                        max-width: 800px;
                        margin: 20px auto;
                        padding: 20px;
                        background-color: #fff;
                        box-shadow: 0 0 10px rgba(45, 122, 217, 0.1);
                       
                    }

                    .container a:hover {
                        color: #4c89ed;
                        transition: color 0.3s ease;
                      
                    }
            
                    /* Service section */
                    .service {
                        margin-bottom: 20px;
                        border: 1px solid #ddd;
                        padding: 10px;
                        background-color: #f9f9f9;
                    }
            
                    .service h2 {
                        font-size: 24px;
                    }
            
                    /* Footer styles */
                    footer {
                        background-color: #1f5fa3;
                        color: #fff;
                        text-align: center;
                        padding: 10px;
                    }
                     .cart{
                        width: 18px ;                        
                        margin-right:  -14px;
                    }
                    .logo{
                        margin-top: -23px;
                        width:200px;
                        margin-left: 0px;
                    }
                    .sub-service-details button{
        margin-top: 1px;
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #171718fc;
        text-align: center;
        cursor: pointer;
        
        font-size: 17px;
      
      
     
}
 .sub-service-details button:hover {
        opacity: 0.7;
      }
      .login-signup {
        margin-left: 20px;
    border: 1px solid #fdfdfd;
    border-radius: 5px;
    padding: 5px 10px;
}


    </style>
                
            </head>
            <body>
                
                <header>
                    <div class="temp">
                        <img src="partials/darklogo.jpg" class="logo">
                    </div>
                    <h1 class="Title">Electrician Services</h1>
                    <div class="temp">

                    </div>
                </header>
                
                <nav>
                    <a href="loggedinhome.php">Home</a>
                   <a href="services.php">Services</a>
                    <a href="aboutus.html">About Us</a>
                    <a href="aboutus.html">Contact</a>
                    
                    <a href="viewcart.php"> <img src="partials/shopping-cart.png" class="cart"> </a>
                    <a class="login-signup" href="login.php">Login / Signup</a> 
                   
                    
                   
                                           
                    

                       
                
                </nav>
                <div class="container">
                    <h2>Our Services</h2>
                    
                   <a href="services2.php"> 
                    <div class="service">

                        
                            <h3 >Electrical Repairs</h3>
                        
                        <p>We offer comprehensive electrical repair services to fix all your electrical problems.</p>
                    </div></a>
                    <a href="services3.php">
                    <div class="service">
                        <h3>Installation Services</h3>
                        <p>We specialize in the installation of electrical systems for homes and businesses.</p>
                    </div>
                    </a>
                    <a href="services4.php">
                        <div class="service">
                        <h3>Emergency Repairs</h3>
                        <p>We provide 24/7 emergency electrical repair services for urgent situations.</p>
                    </div>
                    </a>
                </div>
                <footer>
                    &copy; 2023 Electrician Services
                </footer>
            </body>
            </html>