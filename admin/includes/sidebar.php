<?php
    $page = basename($_SERVER["PHP_SELF"], ".php");
    global $admin;
?>
<!--====== HEADER ======== -->
  <header>
    <div class="greeting">
      WELlCOM back! 👋🏻 <?= $admin['fullname']; ?>.
    </div>
    <!-- <div class="search-box">
      <input type="text" placeholder="Search">
      <button>Search</button>
    </div> -->
  </header>

  <!--=========== SIDE BAR =========== -->
  <aside>
    <div class="logo">
      🛒 NovaCart
    </div>
    <ul>
      <a href="index.php" class="<?= ($page == "index") ? 'active' : '' ?>"><li>🏠 Dashboard</li></a>
      <a href="product.php" class="<?= ($page == "product") ? 'active' : '' ?>"><li>🍕 Products</li></a>
      <a href="add_product.php" class="<?= ($page == "add_product") ? 'active' : '' ?>"><li>🍑 Add Product</li></a>
      <!-- <a href="category.php" class="<?= ($page == "category") ? 'active' : '' ?>"><li>🏛️ Category</li></a> -->
      <a href="add_category.php" class="<?= ($page == "add_category") ? 'active' : '' ?>"><li>🚪 Add Category</li></a>
      <a href="order.php" class="<?= ($page == "order") ? 'active' : '' ?>"><li>📲 Orders</li></a>
      <a href="logout.php"><li>⬅️ Logout</li></a>
    </ul>
  </aside>