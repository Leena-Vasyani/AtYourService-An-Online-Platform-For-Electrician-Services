<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    session_start();
    include 'partials/_dbconnect.php';
    $showAlert = false;
    //$showError = false;
    
    // echo var_dump($_POST);
    $username = $_POST["username"];
    $email = $_POST["email"];
    if (!strpos($email, '@')) {
      $showError = "Invalid email address. It must contain the '@' symbol.";
    } 
    $phoneno = $_POST["telno"];
    if (strlen($phoneno) != 10) {
      $showError = "Contact number must have exactly 10 digits!";
    }
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $street1 = $_POST["street1"];
    $street2 = $_POST["street2"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $postalcode = $_POST["postalcode"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    //$exists=false;
    // Check whether this username exists
     $existSql = "SELECT * FROM `users` WHERE username = '$username'";
     $result = mysqli_query($conn, $existSql);
     $numExistRows = mysqli_num_rows($result);
     if($numExistRows > 0){
         // $exists = true;
         $showError = "Username Already Exists!";
     }
     else{
         // $exists = false; 
         if(($password == $cpassword)){
             $hash = password_hash($password, PASSWORD_DEFAULT);
             $sql = "INSERT INTO `users` (`username`, `email`, `phone`, `dob`, `gender`, `street1`, `street2`, `city`, `region`, `postalcode`, `password`, `date`) VALUES ('$username', '$email', '$phoneno', '$dob', '$gender', '$street1', '$street2', '$city', '$region', '$postalcode', '$hash', current_timestamp())";
             $result = mysqli_query($conn, $sql);
             if ($result){
                 $showAlert = true;
                 header("location: login.php");
             }
         }
         else{
             $showError = "Passwords do not match!";
         }
     }
 
    if($showAlert){
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your account is now created and you can login
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div> ';
      }
      if($showError){
      echo ' <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
          <strong>Error!</strong> '. $showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div> ';
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Signup</title>
        <link rel="stylesheet" href="signup.css"/>
        <script>
      function validateForm() {
          var email = document.getElementById("email").value;
          var phone = document.getElementById("telno").value;

          if (email.indexOf('@') === -1) {
              alert("Invalid email address! It must contain the '@' symbol.");
              return false;
          }

          if (phone.length !== 10) {
              alert("Contact number must have exactly 10 digits!");
              return false;
          }

          return true; 
        }
</script>

    </script>
      </head>
  <body>
    <section class="container">
      <header> Registration Form</header>
      <form action="signup.php" class="form" method="post">
        
        <div class="input-box">
          <label for="username">Full Name</label>
          <input type="text" placeholder="Enter full name" name="username" required/>
        </div>

        <div class="input-box">
          <label for="email">Email Address</label>
          <input type="text" placeholder="Enter email address" name="email" id="email" required/>
        </div>

        <div class="column">
          <div class="input-box">
            <label for="telno">Phone Number</label>
            <input type="tel" placeholder="+91" name="telno" id="telno" required/> 
          </div>
          <div class="input-box">
            <label for="dob">Birth Date</label>
            <input type="date" placeholder="Enter birth date" name="dob" required/>
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="male" name="gender" value="male"/>
              <label for="male">Male</label>
            </div>
            <div class="gender">
              <input type="radio" id="female" name="gender" value="female"/>
              <label for="female">Female</label>
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label for="add">Address</label>
          <input type="text" placeholder="Enter street address" name="street1" required/>
          <input type="text" placeholder="Enter street address line 2" name="street2" required/>
          <div class="column">
            <input type="text" placeholder="Enter your city" name="city" required/>
          </div>
          <div class="column">
            <input type="text" placeholder="Enter your region" name="region" required/>
            <input type="number" placeholder="Enter postal code" name="postalcode" required/>
          </div>
        </div>

        <div class="input-box">
          <label for="password">Password</label>
          <input type="password" placeholder="Enter password" name="password" required/>
        </div>

        <div class="input-box">
          <label for="cpassword">Confirm Password</label>
          <input type="password" placeholder="Confirm password" name="cpassword" required/>
        </div>
        <button type="submit" onclick="return validateForm();">Register</button>
      </form>
    </section>
  </body>
</html>
