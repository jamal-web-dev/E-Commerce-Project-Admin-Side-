<?php 
    include 'scripts/script.php';
    global $connect;
    $product = "";
    if (isset($_GET["editProduct"]) && !empty($_GET["editProduct"])) {
        $productId = (int)$_GET["editProduct"];
        $sql = "SELECT * FROM products WHERE id = $productId";
        $query = mysqli_query($connect, $sql);
        $product = mysqli_fetch_assoc($query);
    }else{
        header('location:product.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🛒</text></svg>">

  <link rel="stylesheet" href="css/variable.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/add_product.css">
</head>
<body>
  <!--====== HEADER & SIDEBAR ======== -->
  <?php include 'includes/sidebar.php' ?>
  <main>
    <?= $msg; ?>
    <!-- ALL YOUR CODE SHOULD BE HERE -->
     <form method="post" enctype="multipart/form-data">
        <div class="input-holder">
          <input type="text" name="product_name" placeholder="Product name" value="<?= $product['product_name'] ?>" required>
          <input type="number" name="product_price" placeholder="Product price" value="<?= $product['price'] ?>" required>
        </div>
        <select name="category" id="" required>
          <option value="">Select Category</option>
          <?php
            global $connect;
            $stmt = "SELECT * FROM categories";
            $query = mysqli_query($connect, $stmt);
            $productCategory = (int)$product['category'];
            while ($category = mysqli_fetch_assoc($query)) {
              $categoryId = $category['id'];
              $categoryName = $category['category_name'];
          ?>
          <option value="<?= $categoryId;?>" <?= ($categoryId == $productCategory) ? "selected" : "" ?>><?= $categoryName;?></option>
          <?php } ?>
        </select>
        <input type="file" name="product_image" accept=".jpg, .jpeg, .png" id="">
        <textarea name="product_details" id="" placeholder="Product details" required><?= $product['product_description'] ?></textarea>
        <button type="submit" name="edit_product">Edit Product</button>
     </form>
  </main>
</body>
</html>