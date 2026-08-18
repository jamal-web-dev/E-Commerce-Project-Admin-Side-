<?php include 'includes/access.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products</title>
    <link
      rel="icon"
      href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🛒</text></svg>" />
    <link rel="stylesheet" href="css/variable.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/product.css" />
    <link
      rel="stylesheet"
      href="fontawesome-free-7.1.0-web/fontawesome-free-7.1.0-web/css/all.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  </head>
  <body>
    <!--====== HEADER & SIDEBAR ======== -->
    <?php include 'includes/sidebar.php' ?>
    <main>
      <!-- ALL YOUR CODE SHOULD BE HERE -->

      <!-- Font Awesome -->

      <div class="container">
        <div class="top-bar">
          <h2>PRODUCT LIST</h2>

          <div class="right">
            <input type="text" placeholder="Search..." />

            <button>Search</button>
          </div>
        </div>

        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Product Name & Size</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
                global $connect;
                $stmt = "SELECT p.*,c.category_name FROM products p INNER JOIN categories c ON c.id = p.category ORDER BY p.id DESC";
                $query = mysqli_query($connect, $stmt);
                $numrows = mysqli_num_rows($query);
                if ($numrows > 0) {
                 while ($product = mysqli_fetch_assoc($query)) {

              ?>
              <tr>
                <td class="product">
                  <img src="product_image/<?= $product["product_image"]; ?>" />

                  <div>
                    <h4><?= ucfirst($product['product_name']) ?></h4>
                  </div>
                </td>

                <td>&#8358;<?= number_format($product["price"]); ?></td>


                <td><?= ucfirst($product['category_name']) ?></td>

                <td class="action">
                  <i class="fa-regular fa-eye"></i>
                  <i class="fa-regular fa-pen-to-square"></i>
                  <i class="fa-regular fa-trash-can"></i>
                </td>
              </tr>
              <?php   
                 }
                }else{
                  echo "<tr><td colspan='4'>No product found</td></tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </body>
</html>
