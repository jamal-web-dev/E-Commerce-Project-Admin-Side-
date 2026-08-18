<?php
session_start();
require "includes/config.php";
global $connect;

if (isset($_SESSION['admin'])) {
    $adminId = $_SESSION['admin'];
    $stmt = "SELECT * FROM admins WHERE id = $adminId";
    $query = mysqli_query($connect, $stmt);
    $admin = mysqli_fetch_assoc($query);
}else{
    header('location:login.php');
}