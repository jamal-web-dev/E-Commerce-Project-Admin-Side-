<?php
require "includes/access.php";
global $connect;
$msg = "";

// Delete Category Action
if (isset($_GET["delcat"]) && !empty($_GET["delcat"])) {
    $categoryId = (int)$_GET["delcat"];
    $stmt = "DELETE FROM categories WHERE id = $categoryId";
    $query = mysqli_query($connect, $stmt);
    if ($query) {
        $_SESSION['msg'] = "Category deleted successfully";
        header('location:add_category.php');
    }else{
        $_SESSION['msg'] = "Something went wrong, unable to delet category";
    }
}