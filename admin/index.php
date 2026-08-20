<?php include 'includes/access.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🛒</text></svg>">
  <link rel="stylesheet" href="css/variable.css">
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <!--====== HEADER & SIDEBAR ======== -->
  <?php include 'includes/sidebar.php' ?>

  <main>
    <!-- ALL YOUR CODE SHOULD BE HERE -->
     <div class="statistic_container">
      <div class="box">
        <span>Total Orders</span>
        <h1>45</h1>
      </div>
      <div class="box product_box">
        <span>Total Product</span>
        <h1>
          <?php
            global $connect;
            $stmt = "SELECT SUM(price) AS totalprice FROM products";
            $query = mysqli_query($connect, $stmt);
            $product = mysqli_fetch_assoc($query);
            $totalprice = $product['totalprice'];
            echo "&#8358;".number_format($totalprice);
          ?>
        </h1>
      </div>
      <div class="box category_box">
        <span>Total Category</span>
        <h1>
          <?php
            global $connect;
            $stmt = "SELECT COUNT(*) AS category FROM categories";
            $query = mysqli_query($connect, $stmt);
            $category = mysqli_fetch_assoc($query);
            $allcategory = $category['category'];
            echo $allcategory;
          ?>
        </h1>
      </div>
      <div class="box">
        <span>Total Users</span>
        <h1>
          <?php
            global $connect;
            $stmt = "SELECT COUNT(*) AS users FROM users";
            $query = mysqli_query($connect, $stmt);
            $user = mysqli_fetch_assoc($query);
            $allusers = $user['users'];
            echo number_format($allusers);
          ?>
        </h1>
      </div>
     </div>
  </main>
</body>
</html>