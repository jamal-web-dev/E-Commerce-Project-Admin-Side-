<header>
        <div class="container header-content">
            <a href="index.html" class="logo">
                Electro <span>.</span>
            </a>
            <form class="search">
                <select name="category">
                    <option value="0"> All Category</option>
                    <?php
                        global $connect;
                        $stmt = "SELECT * FROM categories";
                        $query = mysqli_query($connect, $stmt);
                        while($category = mysqli_fetch_assoc($query)){
                            echo '<option value="'.$category["id"].'">'.$category['category_name'].'</option>';
                        }
                    ?>
                </select>

                <input type="text" name="search" placeholder="Search here">
                <button type="submit">Search</button>
            </form>

            <div class="header-links">
                <a href="#"><br>Whilist</a>
                <a href="checkout.php"><br>Your cart</a>
            </div>
        </div>
    </header>