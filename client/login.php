<?php require "login-validation.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Now!</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="registration-section">
    <div class="container">
      <div class="img-box login-img">
        
      </div>
      <div class="form-box">
        <h2>Login Now!</h2>
        <p>Get your premium frozen foods right away.</p>
        <p class="error"><?=$errMsg?></p>
        <form action="" method="post">
          <div class="box">
            <label for="email">Email</label>
            <input type="email" placeholder="example@gmail.com" name="email">
          </div>
          <div class="box">
            <label for="password">Password</label>
            <input type="password" placeholder="at least 8 characters" name="password">
          </div>
          <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="registration.php">Signup Now!</a></p>
      </div>
    </div>
  </section>
</body>
</html>