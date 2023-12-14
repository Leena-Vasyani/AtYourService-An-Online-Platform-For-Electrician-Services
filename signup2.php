<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    session_start();
    include 'partials/_dbconnect.php';
    $showAlert = false;
    $showError = false;
    
    // echo var_dump($_POST);
    $_SESSION['username'] = $_POST["username"];
    $_SESSION['email'] = $_POST["email"];
    $_SESSION['phoneno'] = $_POST["telno"];
    $_SESSION['dob'] = $_POST["dob"];
    $_SESSION['gender'] = $_POST["gender"];
    $address = $_POST["add"];
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
             $sql = "INSERT INTO `users` (`username`, `email`, `phone`, `dob`, `gender`, `address`, `password`, `date`) VALUES ('$username', '$email', '$telno', '$dob', '$gender', '$address', '$password', 'current_timestamp()')";
             $result = mysqli_query($conn, $sql);
             if ($result){
                 $showAlert = true;
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
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
      <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
      <link rel="stylesheet" href="signup.css" />
      
    </head>
  <body>
    
    <section class="container">
        <!-- Registration Form-page 2 -->
      <header>Registration Form </header>
      <form action="signup2.php" class="form" method="post">
        <!-- Page 2 content -->
        <div class="input-box address">
          <label for="add">Address</label>
          <input type="text" placeholder="Enter street address" name="add" required/>
          <input type="text" placeholder="Enter street address line 2" name="add" required/>
          <div class="column">
            <input type="text" placeholder="Enter your city" name="add" required/>
          </div>
          <div class="column">
            <input type="text" placeholder="Enter your region" name="add" required/>
            <input type="number" placeholder="Enter postal code" name="add" required/>
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
        <button type="submit">Submit</button>
      </form>
    </section>
  </body>
</html>
