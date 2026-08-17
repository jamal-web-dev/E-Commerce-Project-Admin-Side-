<?php
require "includes/access.php";
global $connect;
$msg = "";

function testInput($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Add New Category
if (isset($_POST["add_category"])) {
    $categoryName = testInput($_POST["catName"]);
    $categoryDesc = testInput($_POST["catDesc"]);

    if (empty($categoryName) || empty($categoryDesc)) {
        $msg = "<p>Fill the required fields</p>";
    }else{
        $sql = "SELECT * FROM categories WHERE category_name = '$categoryName'";
        $query = mysqli_query($connect, $sql);
        $numrows = mysqli_num_rows($query);
        if ($numrows > 0) {
            $msg = "<p>Catagory already exist</p>";
        }else{
            $stmt = "INSERT INTO categories(category_name, category_description) VALUES('$categoryName', '$categoryDesc')";
            $query = mysqli_query($connect, $stmt);
            if ($query) {
                $msg = "<p>Catagory added Successfully</p>";
            }else{
                $msg = "<p>Something went wrong</p>";
            }
        }
    }
}