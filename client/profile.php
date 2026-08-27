<?php 
  session_start();

  if(!isset($_SESSION["id"])){
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Now!</title>
  <link rel="stylesheet" href="css/profile.css">
</head>
<body>
  <h1>Welcome <?=ucwords($_SESSION["fullname"]);?>!</h1>
  <p>You Have Successfully Loged In</p>
  <a href="logout.php">Logout</a>
</body>
</html>