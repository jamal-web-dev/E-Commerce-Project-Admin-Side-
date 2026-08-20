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

// Edit Category
if (isset($_POST["edit_category"])) {
    $categoryId = (int)$_GET["editcat"];
    $categoryName = testInput($_POST["catName"]);
    $categoryDesc = testInput($_POST["catDesc"]);

    if (empty($categoryName) || empty($categoryDesc)) {
        $msg = "<p>Fill the required fields</p>";
    }else{
        $sql = "SELECT * FROM categories WHERE category_name = '$categoryName' AND id != $categoryId";
        $query = mysqli_query($connect, $sql);
        $numrows = mysqli_num_rows($query);
        if ($numrows > 0) {
            $msg = "<p>Catagory already exist</p>";
        }else{
            $stmt = "UPDATE categories SET category_name = '$categoryName', category_description = '$categoryDesc' WHERE id = $categoryId";
            $query = mysqli_query($connect, $stmt);
            if ($query) {
                $msg = "<p>Catagory updated Successfully</p>";
                // header('location:add_category.php');
            }else{
                $msg = "<p>Something went wrong</p>";
            }
        }
    }
}

// Add Product
if (isset($_POST["add_product"])) {
    $product_name = testInput($_POST["product_name"]);
    $product_price = testInput($_POST["product_price"]);
    $category = (int)testInput($_POST["category"]);
    $product_details = testInput($_POST["product_details"]);
    $product_image = $_FILES['product_image']['name'];
    $target_dir = "product_image/";
    $ext = strtolower(basename(pathinfo($product_image, PATHINFO_EXTENSION)));
    $filename = date("M-d-y-Hms") .".".$ext;

    if (empty($product_name) || empty($product_price) || empty($category) || empty($product_details) || empty($product_image)) {
        $msg = "Please fill all the required fields";
    }else{
        $stmt = "INSERT INTO products(product_name, price, category, product_description, product_image) VALUES ('$product_name', '$product_price', $category, '$product_details', '$filename')";
        $query = mysqli_query($connect, $stmt);
        if ($query) {
            move_uploaded_file($_FILES['product_image']['tmp_name'], $target_dir.$filename);
            $msg = "Product added successfully";
        }else{
            $msg = "<p>Something went wrong</p>";
        }
    }
}

// Edit Product
if (isset($_POST["edit_product"])) {
    $productId = (int)$_GET["editProduct"];
    $product_name = testInput($_POST["product_name"]);
    $product_price = testInput($_POST["product_price"]);
    $category = (int)testInput($_POST["category"]);
    $product_details = testInput($_POST["product_details"]);
    $product_image = $_FILES['product_image']['name'];
    $target_dir = "product_image/";
    $ext = strtolower(basename(pathinfo($product_image, PATHINFO_EXTENSION)));
    $filename = date("M-d-y-Hms") .".".$ext;

    if (empty($product_name) || empty($product_price) || empty($category) || empty($product_details)) {
        $msg = "Please fill all the required fields";
    }else{
        $stmt = "";
        if (empty($product_image)) {
            $stmt = "UPDATE products SET product_name = '$product_name', price = '$product_price', category = $category, product_description = '$product_details' WHERE id = $productId";
        }else{
            $stmt = "UPDATE products SET product_name = '$product_name', price = '$product_price', category = $category, product_description = '$product_details', product_image = '$filename' WHERE id = $productId";
            move_uploaded_file($_FILES['product_image']['tmp_name'], $target_dir.$filename);
        }
        $query = mysqli_query($connect, $stmt);
        if ($query) {
            $msg = "Product updated successfully";
        }else{
            $msg = "<p>Something went wrong</p>";
        }
    }
}