<?php 
  require "config.php";
  session_start();
  $errMsg = "";

  function testInput($input){
    $data = strtolower($input);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data; 
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($email)){
      $errMsg = "Invalid Email or Password";
    }else{
      $email = testInput($email);
    }
    if(empty($password)){
      $errMsg = "Invalid Email or Password";
    }else{
      $password = testInput($password);
    }
    

    // Checking if no error ocuur
    if(empty($errMsg)){

      // Checking if user email exist. 
      $sql = "SELECT * FROM users WHERE email = '$email' ";
      $stmt = mysqli_query($connect, $sql);

      if(mysqli_num_rows($stmt) > 0){
        $user = mysqli_fetch_assoc($stmt);
        $storedPassword = $user["password"];
        if(password_verify($password, $storedPassword)){
          $_SESSION["id"] = $user["id"];
          $_SESSION["fullname"] = $user["fullname"];
          // echo
          // header("location: profile.php");
        }else{
          $errMsg = "Invalid Email or Password";
        }
      }else{
        $errMsg = "User does not exist";
      }
    }
  }