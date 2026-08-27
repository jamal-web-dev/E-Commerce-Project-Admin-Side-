<?php 
  require "config.php";
  $errName = $errEmail = $errPassword = "";
  $succMsg = "";

  function testInput($input){
    $data = strtolower($input);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data; 
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // VALIDATING THE USER INPUTED DATA. 

    // NAME VALIDATION 
    if(empty($fullname)){
      $errName = "Input Valid Name firstname or lastname";
    }else if($fullname < 3  ){
      $errName = "Name too short";
    }else {
      $fullname = testInput($fullname);
      $errName = "";
    }

    // EMAIL VALIDATE
    if(empty($email)){
      $errEmail = "Email is required";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errEmail = "Invalid Email";
    }else{
      $email = testInput($email);
      $errEmail = "";

    }

    // PASSWORD VALIDATE. 
    if(empty($password)){
      $errPassword = "Password required";
    }else if($password < 8){
      $errPassword = "pasword must be 8 characters";
    }else{
      $password = testInput($password);
      $errPassword = "";
    }

    // CHECKING IF ALL ERRORS IS EMPTY AN GETTING THE CORRECT DATA.
    if(empty($errName) && empty($errEmail) && empty($errPassword)){
      $password = password_hash($password, PASSWORD_DEFAULT);

        if(!$connect){
          die("Database Connection failed: " . mysqli_connect_error());
        }else{
          // CHECKING IF USER ALREADY EXIST
          $sql = "SELECT * FROM users WHERE email = '$email' ";
          $stmt = mysqli_query($connect, $sql);

          if(mysqli_num_rows($stmt) > 0){
            $errEmail = "Email Already exist";
          }else{
            $sql = "INSERT INTO users(fullname, email, password) VALUES('$fullname', '$email', '$password')";
            $stmt = mysqli_query($connect, $sql);
            $succMsg = "Registration Successfull";
            header("location: login.php");
          }
        }
    }
  }
  