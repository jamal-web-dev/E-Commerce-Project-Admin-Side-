<?php include 'includes/access.php' ?>
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
    <!-- ALL YOUR CODE SHOULD BE HERE -->
     <form action="">
        <div class="input-holder">
          <input type="text" name="product_name" placeholder="Product name">
          <input type="text" name="product_price" placeholder="Product price">
        </div>
        <input type="text" name="product_category" placeholder="Product Category">
        <textarea name="product_details" id="" placeholder="Product details"></textarea>
        <button>Add Product</button>
     </form>
  </main>
</body>
</html>