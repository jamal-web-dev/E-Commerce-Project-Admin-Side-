<?php 
  require "includes/config.php";
  global $connect;
  $errName = $errEmail = $errPhoneNumber = $errPassword = $errAddress = "";
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
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];
    $address = $_POST["address"];

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

    // Phone Number
    if(empty($phone_number)){
      $errPhoneNumber = "Phone Number is required";
    }else{
      $phone_number = testInput($phone_number);
      $errPhoneNumber = "";

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

     // PASSWORD VALIDATE. 
    if(empty($address)){
      $errAddress = "Address is required";
    }else{
      $errAddress = "";
    }

    // CHECKING IF ALL ERRORS IS EMPTY AN GETTING THE CORRECT DATA.
    if(empty($errName) && empty($errEmail) && empty($errPhoneNumber) && empty($errPassword) && empty($errAddress)){
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
            $sql = "INSERT INTO users(fullname, email, phone_number, password, address) VALUES('$fullname', '$email', '$phone_number', '$password', '$address')";
            $stmt = mysqli_query($connect, $sql);
            $succMsg = "Registration Successfull";
            header("location: login.php");
          }
        }
    }else{
      $succMsg = "Fill the required fields";
    }
  }
  