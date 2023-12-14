<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    session_start();
    include 'partials/_dbconnect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    if (!strpos($email, '@')) {
        $showError = "Invalid email address! '@' missing!";
    }
    $street1 = $_POST['street1'];
    $street2 = $_POST['street2'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postalcode = $_POST['postalcode'];
    $experience = $_POST['experience'];
    //$license_certification = $_POST['license_certification'];
    $specialization = $_POST['specialization'];
    $availability = $_POST['availability'];
    $services = implode(', ', $_POST['services']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    $existSql = "SELECT * FROM `regpro` WHERE name = '$name'";
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
            $sql = "INSERT INTO `regpro` (`name`, `email`, `street1`, `street2`, `city`, `region`, `postalcode`, `experience`, `specialization`, `availability`, `services`, `password`) 
            VALUES ('$name', '$email', '$street1', '$street2', '$city', '$region', '$postalcode', '$experience', '$specialization', '$availability', '$services', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                header("location: Confirmation.php");
                exit();
            }
        }
        else{
            $showError = "Passwords do not match!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Electrician Registration</title>
    <link rel="stylesheet" href="reg.css" />
    <script>
        function validateForm() {
            var email = document.getElementById("email").value;

            if (email.indexOf('@') === -1) {
                alert("Invalid email address! '@' is missing.");
                return false;
            }
        }
    </script>
</head>
<body>
    <section class="container">
        <!-- Electrician Registration Form -->
        <header>Electrician Registration</header>
        <form action="regpro.php" class="form" method="POST">
            <!-- Personal Information -->
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" placeholder="Enter your full name" name="name" required />
            </div>
            
            <div class="input-box">
                <label>Email</label>
                <input type="email" placeholder="Enter your email address" name="email" required />
            </div>

            <!-- Address Information -->
            <div class="input-box address">
                <label>Address</label>
                <input type="text" placeholder="Enter street address" name="street1" required />
                <input type="text" placeholder="Enter street address line 2" name="street2" />
                <div class="column">
                    <input type="text" placeholder="Enter your city" name="city" required />
                </div>
                <div class="column">
                    <input type="text" placeholder="Enter your region" name="region" required />
                    <input type="number" placeholder="Enter postal code" name="postalcode" required />
                </div>
            </div>

            <div class="input-box checkbox-profession">
    <label>Profession : Electrician</label> <!-- Label follows the checkbox -->
    <input type="checkbox" checked disabled/> <!-- Move the checkbox here -->

</div>

           
            <!-- <div class="input-box">
                <label>Profession Electrician</label>
                <input type="checkbox" checked disabled /> 
            </div> -->

            <div class="input-box">
                <label>Years of Experience</label>
                <input type="number" placeholder="Enter years of experience" name="experience" required />
            </div>

            <div class="input-box">
                <label>License or Certification (if applicable)</label>
                <input type="file" accept=".pdf" />
            </div>

            <div class="input-box">
                <label>Specializations</label>
                <div class="radio-options">
                    <input type="radio" name="specialization" value="Residential" /> Residential
                    <input type="radio" name="specialization" value="Commercial" /> Commercial
                    <input type="radio" name="specialization" value="Industrial" /> Industrial
                </div>
            </div>

            <!-- Work Availability -->
            <div class="input-box">
                <label>Availability</label>
                <select name="availability">
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Weekends">Weekends</option>
                </select>
            </div>

            <!-- Skills and Services Offered -->
            <div class="input-box">
                <label>Skills and Services Offered</label>
                <div class="checkbox-options">
                <input type="checkbox" name="services[]" value="Repairs" /> Repairs
                <input type="checkbox" name="services[]" value="Installations" /> Installations
                <input type="checkbox" name="services[]" value="Urgent Inspection" /> Urgent Inspection
                </div>
            </div>
            
            
            <div class="input-box">
                <label>Password</label>
                <input type="password" placeholder="Enter password" name="password" required />
            </div>

            <div class="input-box">
                <label>Confirm Password</label>
                <input type="password" placeholder="Confirm password" name="cpassword" required />
            </div>
            
            <button type="submit" onclick="return validateForm();">Register</button>
           
        </form>
    </section>
</body>
</html>
