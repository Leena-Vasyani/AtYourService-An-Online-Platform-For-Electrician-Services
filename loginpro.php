<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ig.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form action="login_process.php" method="POST">
      <label for="Username">Username</label>
      <input type="text" id="Username" name="Username" required>
      
      
      <label for="Prefessional ID">Prefessional Id</label>
      <input type="number" id="PrefessionalId" name="PrefessionalId" required>

      <label for="Password">Password</label>
      <input type="password" id="Password" name="Password" required>
      <a href="">
      <button type="submit">Login</button>
      </a>
    </form>
    <p>Not registered? <a href="regpro.php">Register as Prefessional </a></p>
    
  </div>
</body>
</html>
