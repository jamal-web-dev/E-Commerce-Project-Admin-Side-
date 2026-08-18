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
        <h1>45,000</h1>
      </div>
      <div class="box category_box">
        <span>Total Category</span>
        <h1>14</h1>
      </div>
      <div class="box">
        <span>Total Users</span>
        <h1>7,000</h1>
      </div>
     </div>

     <div class="table-container">
      <h2>Recent Products</h2>
      <table>
        <thead>
          <tr>
            <th>PRODUCT NAME</th>
            <th>PRICE</th>
            <th>CATEGORY</th>
            <th>QUANTITY</th>
            <th>SIZE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Black T-shirt</td>
            <td>$80.00</td>
            <td>Fashion</td>
            <td>8</td>
            <td>S</td>
          </tr>
          <tr>
            <td>Olive Green Leather Bag</td>
            <td>$80.00</td>
            <td>Fashion</td>
            <td>8</td>
            <td>S</td>
          </tr>
          <tr>
            <td>Olive Green Leather Bag</td>
            <td>$70.00</td>
            <td>Fashion</td>
            <td>8</td>
            <td>S</td>
          </tr>
        </tbody>
      </table>
     </div>
  </main>
</body>
</html>