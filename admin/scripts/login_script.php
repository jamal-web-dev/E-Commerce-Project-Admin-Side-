<?php
session_start();
require "includes/config.php";
global $connect;
$msg = "";

function testInput($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = testInput($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $msg = "Enter email and password";
    }else{
        $stmt = "SELECT * FROM admins WHERE email = '$email'";
        $query = mysqli_query($connect, $stmt);
        $numrows = mysqli_num_rows($query);
        if ($numrows > 0) {
            $admin = mysqli_fetch_assoc($query);
            if (password_verify($password, $admin["password"])) {
                $_SESSION["admin"] = $admin['id'];
                header('location: index.php');
            }else{
                $msg = "Invalid email or password";
            }
        }else{
            $msg = "Invalid email or password";
        }
    }
}
