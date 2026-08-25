<footer>
        <div class="container footer-grid">
            <div>
                <h3>Electro.</h3>
                <p>Your online electronnics store</p>
            </div>

            <div>
                <h3>Categories</h3>
                <?php
                        global $connect;
                        $stmt = "SELECT * FROM categories";
                        $query = mysqli_query($connect, $stmt);
                        while($category = mysqli_fetch_assoc($query)){
                            echo '<h3>'.$category['category_name'].'</h3>';
                        }
                    ?>
            </div>

            <div>
                <h3>Account</h3>
                <p><a href="login.php">Login</a></p>
                <p><a href="register.php">Register</a></p>
                <p><a href="checkout.php">Checkout</a></p>
            </div>

            <div>
                <h3>Support</h3>
                <h3>Contact</h3>
                <h3>Shipping</h3>
                <h3>Returns</h3>
            </div>
        </div>
    </footer>