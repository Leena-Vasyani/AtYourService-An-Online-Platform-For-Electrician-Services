<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="loginsamp.css">
</head>
<body>
<?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $uname = $_POST['name'];
            $email = $_POST['em'];
            $upassword = $_POST['pass'];
        
            //Connecting to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "loginsamp";

            //Create a connection
            $conn = mysqli_connect($servername, $username, $password, $database);

            if(!$conn){
                die("Sorry we failed to connect: ". mysqli_connect_error());
            }
            else{
                //Submit these to database
                //Sql query to be executed
                $sql = "INSERT INTO `logindet` (`Username`, `Email ID`, `Password`) VALUES ('$uname', '$email', '$upassword')";
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your entry has been recorded successfully!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>';
                }
                else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> We are facing some technical issue and your response was not submitted! We regret the inconvenience caused!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>';
                }
            }
        }
    ?>

    <div><h1>Login</h1></div>
    <fieldset>
        <form action="/mprbackend/loginsamp.php" class="form" method="post">
            <div>
                <label for="name">Username</label><br>
                <input type="text" class="input" placeholder="    Enter username" name="name">
            </div>
            <div>
                <br>
                <label for="em">Email ID</label><br>
                <input type="email" class="input" name="em">
            </div>
            <div>
                <br>
                <label for="pass">Password</label><br>
                <input type="password" class="input" name="pass">
            </div>
            <div>
                <br>
                <button type="submit" class="input" id="btn">Login</button>
                <p>Not registered yet? <a href="signup.html"> Signup here</a></p>
            </div>
        </form>
    </fieldset>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>