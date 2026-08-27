<?php require "includes/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header Section -->
     <?php include "includes/header.php"; ?>

    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-card">
                <img src="images/laptop.jpg">
                <div class="hero-text">
                    <h2>Laptop <br>Collection</h2>
                    <a href="category.php?cat=laptops">SHOP NOW</a>
                </div>
            </div>

            <div class="hero-card">
                <img src="images/headphones.jpg">
                <div class="hero-text">
                    <h2>Accessories <br>Collection</h2>
                    <a href="category.php?cat=accessories">SHOP NOW</a>
                </div>
            </div>

            <div class="hero-card">
                <img src="images/camera).jpg">
                <div class="hero-text">
                    <h2>Cameras <br>Collection</h2>
                    <a href="category.php?cat=cameras">SHOP NOW</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>NEW PRODUCTS</h2>

            </div>

            <div class="products">
                <?php
                    global $connect;
                    $where = "";
                    if(isset($_GET["category"]) && isset($_GET["search"])){
                        $category = $_GET["category"];
                        $search = $_GET["search"];
                        if ($category > 0) {
                            $where = "WHERE (p.product_name LIKE '%$search%' OR p.product_description LIKE '%$search%') AND p.category = $category";
                        }else{
                            $where = "WHERE p.product_name LIKE '%$search%' OR p.product_description LIKE '%$search%'";
                        }
                    }
                    $stmt = "SELECT p.*, c.category_name FROM products p INNER JOIN categories c ON c.id = p.category $where";
                    $query = mysqli_query($connect, $stmt);
                    while($product = mysqli_fetch_assoc($query)):
                        // var_dump($product);
                ?>
                <div class="Product">
                    <span class="badge">NEW</span>
                    <div class="product-image">
                        <img src="../admin/product_image/<?= $product["product_image"]; ?>">
                    </div>

                    <div class="product-info">
                        <div class="category"><?= ucfirst($product["category_name"]) ?></div>

                        <div class="product-name">
                            <?= ucfirst($product["product_name"]) ?>
                        </div>

                        <span class="price">
                           &#8358;<?= number_format($product["price"]) ?>
                        </span>

                        <div class="rating">
                            *****
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>

            </div>
        </div>
    </section>

     <!-- Footer Section -->
     <?php include "includes/footer.php"; ?>
</body>
</html>