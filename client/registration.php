<?php 
  include "reg-validation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Now!</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="registration-section">
    <div class="container">
      <div class="img-box">
        
      </div>
      <div class="form-box">
        <h2>Register Now!</h2>
        <p>Get your premium frozen foods right away.</p>
        <p class="error"><?=$succMsg?></p>
        <form action="" method="post">
          <div class="box">
            <label for="name">Full Name</label>
            <input type="text" placeholder="Davic Paul" name="fullname">
          </div>
          <div class="box">
            <label for="email">Email</label>
            <input type="text" placeholder="example@gmail.com" name="email">
          </div>
          <div class="box">
            <label for="phone_number">Phone Number</label>
            <input type="text" placeholder="Phone Number" name="phone_number">
          </div>
          <div class="box">
            <label for="address">Address</label>
            <textarea name="address" id="address"></textarea>
          </div>
          <div class="box">
            <label for="name">Password</label>
            <input type="password" placeholder="at least 8 characters" name="password">
          </div>
          <input type="submit">
        </form>
        <p>Already have an account? <a href="login.html">Login Now!</a></p>
      </div>
    </div>
  </section>
</body>
</html>