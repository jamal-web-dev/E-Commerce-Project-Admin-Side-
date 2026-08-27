<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "e_commerce";

$connect = mysqli_connect($hostname, $username, $password, $dbname);
if (!$connect) {
    echo "Failed to connect.".mysqli_connect_error();
}