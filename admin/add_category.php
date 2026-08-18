<?php include 'scripts/script.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Category Manager — Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@500&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="css/variable.css" />
    <link rel="stylesheet" href="css/add_category.css" />
    <link rel="stylesheet" href="css/index.css" />
  </head>
  <body>
    <!--====== HEADER & SIDEBAR ======== -->
    <?php include 'includes/sidebar.php' ?>
    
    <main>
      <?php
        if (isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
        echo $msg;
      ?>
      <div class="topbar">
        <div>
          <h1>Category Manager</h1>
          <p>Add and organize product categories for the catalog.</p>
        </div>
      </div>

      <div class="layout">
        <?php
          if (!isset($_GET['editcat']) || empty($_GET['editcat'])) {
        ?>
        <div class="form-panel">
          <h2>New Category</h2>
          <p class="sub">
            Fields marked required must be filled before saving.
          </p>

          <form method="post">
            <div class="field">
              <label for="catName">Category name *</label>
              <input
                type="text"
                id="catName"
                name="catName"
                placeholder="e.g. Shoes"
                required />
            </div>

            <div class="field">
              <label for="catDesc">Description</label>
              <textarea
                id="catDesc"
                name="catDesc"
                placeholder="Short description shown to shoppers"
                required></textarea>
            </div>

            <button class="submit-btn" name="add_category">Add category</button>
          </form>
          
        </div>
        <?php
          }else{
            global $connect;
            $categoryId = (int)$_GET["editcat"];
            $stmt = "SELECT * FROM categories WHERE id = $categoryId";
            $query = mysqli_query($connect, $stmt);
            if (mysqli_num_rows($query) > 0) {
              $category = mysqli_fetch_assoc($query);
        ?>

        <div class="form-panel">
          <h2>Edit Category</h2>
            <a href="add_category.php">New Category</a>
          <p class="sub">
            Fields marked required must be filled before saving.
          </p>


          <form method="post">
            <div class="field">
              <label for="catName">Category name *</label>
              <input
                type="text"
                id="catName"
                name="catName"
                value="<?= $category["category_name"]; ?>"
                placeholder="e.g. Shoes"
                required />
            </div>

            <div class="field">
              <label for="catDesc">Description</label>
              <textarea
                id="catDesc"
                name="catDesc"
                placeholder="Short description shown to shoppers"
                required><?= $category["category_description"]; ?></textarea>
            </div>

            <button class="submit-btn" name="edit_category">edit category</button>
          </form>
          
        </div>
        <?php 
         }else{
              header('location:add_category.php');
            }
        } 
        ?>

        <div class="grid">
          <?php
            global $connect;
            $stmt = "SELECT * FROM categories";
            $query = mysqli_query($connect, $stmt);
            while($category = mysqli_fetch_assoc($query)):
          ?>
          <div class="tag-card">
            <div class="tag-top">
              <div class="tag-icon" style="background: #da061e33"><a href="action.php?delcat=<?= $category['id']; ?>">🗑️</a></div>
              <div class="tag-icon" style="background: #1f6f5433"><a href="?editcat=<?= $category['id']; ?>">✏️</a></div>
            </div>
            <h3 class="tag-name" style="color: #1f6f54"><?= ucfirst($category['category_name']); ?></h3>
            <p class="tag-desc">
              <?= $category['category_description']; ?>
            </p>
          </div>
          <?php
            endwhile;
          ?>
        </div>
      </div>
    </main>
  </body>
</html>
