<?php require 'scripts/login_script.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🛒</text></svg>">
  <link rel="stylesheet" href="css/variable.css">
  <link rel="stylesheet" href="css/login.css">
</head>
  <body>
    <div class="login">
        <h2>Kindly log in!</h2>
        <?= $msg; ?>
        <form method="post">
          <div>
            <input type="text" name="email" class="input" placeholder="Enter your email address" required> <br> <br>
           
            <input type="password" name="password" class="input" placeholder="Enter your password" required> <br> <br>
          </div>
        
          <div>
              <button>Log in</button>
          </div>
        </form>
    </div>
    
  </body>
</html>