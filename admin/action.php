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
        header('location:add_category.php');
    }
}

// Delete Product
if (isset($_GET["delProduct"]) && !empty($_GET["delProduct"])) {
    $productId = (int)$_GET["delProduct"];
    $stmt = "DELETE FROM products WHERE id = $productId";
    $query = mysqli_query($connect, $stmt);
    if ($query) {
        $_SESSION['msg'] = "Product deleted successfully";
        header('location:product.php');
    }else{
        $_SESSION['msg'] = "Something went wrong, unable to delet category";
        header('location:product.php');
    }
}