<?php
include_once("header.php");
include_once("db.php");


$sql = "SELECT * FROM products";
$all_products = $conn->query($sql);

?>

<section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with coupons & up to 70% off!</p>
    <button>Shop Now</button>
</section>

<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="img/features/f1.png" alt="" />
        <h6>Free Shipping</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f2.png" alt="" />
        <h6>Order Online</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f3.png" alt="" />
        <h6>Save Money</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f4.png" alt="" />
        <h6>Promotions</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f5.png" alt="" />
        <h6>Happy Customer</h6>
    </div>
    <div class="fe-box">
        <img src="img/features/f6.png" alt="" />
        <h6>24/7 Support</h6>
    </div>
</section>

<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modern Design</p>
    <div class="pro-container">
        <?php
        $counter = 0;

        while ($row = mysqli_fetch_assoc($all_products)) {
            if ($counter >= 8) {
                break; // Exit the loop after displaying eight products
            }
        ?>
            <div class="pro" onclick="redirectToProduct(<?php echo $row['product_id']; ?>)">
                <img src="<?php echo htmlspecialchars('uploads/' . $row['image_path']); ?>" alt="Product Image" />
                <div class="des">
                    <span><?php echo htmlspecialchars($row['product_brand']); ?></span>
                    <h5><?php echo htmlspecialchars($row['product_name']); ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$<?php echo htmlspecialchars($row['price']); ?></h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        <?php
            $counter++;
        }
        ?>

    </div>
</section>

<section id="banner" class="section-m1">
    <h4>Repair Services</h4>
    <h2>Up to <span>70% Off</span> - All T-Shirts & Accessories</h2>
    <button class="normal">Explore More</button>
</section>

<section id="product1" class="section-p1">
    <h2>New Arrivals</h2>
    <p>Summer Collection New Modern Design</p>
    <div class="pro-container">
        <?php
        $counter = 8;

        while ($row = mysqli_fetch_assoc($all_products)) {
            if ($counter >= 17) {
                break; // Exit the loop after displaying eight products
            }
        ?>
            <div class="pro" onclick="redirectToProduct(<?php echo $row['product_id']; ?>);">
                <img src="<?php echo htmlspecialchars('uploads/' . $row['image_path']); ?>" alt="Product Image" />
                <div class="des">
                    <span><?php echo htmlspecialchars($row['product_brand']); ?></span>
                    <h5><?php echo htmlspecialchars($row['product_name']); ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$<?php echo htmlspecialchars($row['price']); ?></h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        <?php
            $counter++;
        }
        ?>
    </div>
</section>

<section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>crazy deals</h4>
        <h2>Buy 1 get 1 free</h2>
        <span>The best classic dress is on sale at cara</span>
        <button class="white">Learn More</button>
    </div>

    <div class="banner-box banner-box2">
        <h4>Spring/Summer</h4>
        <h2>Upcoming Seasons</h2>
        <span>The best classic dress is on sale at cara</span>
        <button class="white">Collection</button>
    </div>
</section>

<section id="banner3">
    <div class="banner-box">
        <h2>SEASON SALE</h2>
        <h3>Winter Collection -50% Off</h3>
    </div>
    <div class="banner-box banner-box2">
        <h2>JACKETS AND HOODIES</h2>
        <h3>Spring/Summer 2023</h3>
    </div>
    <div class="banner-box banner-box3">
        <h2>DRESS</h2>
        <h3>New Trendy Dress</h3>
    </div>
</section>

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>
            Get E-mail updates about our latest products and
            <span>special offers</span>
        </p>
    </div>
    <div class="form">
        <input type="text" placeholder="Your email address" />
        <button class="normal">Sign Up</button>
    </div>
</section>

<script>
    function redirectToProduct(productId) {
        window.location.href = 'sproduct.php?product_id=' + productId;
    }
</script>



<?php
include_once("footer.php");
?>