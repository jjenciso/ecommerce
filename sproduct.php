<?php
include_once("db.php");
include_once("header.php");

// Retrieve product_id from the URL
if (isset($_GET['product_id'])) {
  $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);

  // Fetch product data
  $query = "SELECT * FROM products WHERE product_id = '$product_id'";
  $result = mysqli_query($conn, $query);

  if ($result && $row = mysqli_fetch_assoc($result)) {
    // Found product details
    $product_name = htmlspecialchars($row['product_name']);
    $product_brand = htmlspecialchars($row['product_brand']);
    $price = htmlspecialchars($row['price']);
    $image_path = htmlspecialchars('uploads/' . $row['image_path']);
  } else {
    echo "Product not found.";
    exit();
  }
} else {
  header("Location: index.php");
  exit();
}

  $thumbnailQuery = "SELECT product_id, image_path FROM products WHERE product_id != '$product_id' LIMIT 4";
  $thumbnailResult = mysqli_query($conn, $thumbnailQuery);

  $thumbnailImages = array();
  while ($thumbnailRow = mysqli_fetch_assoc($thumbnailResult)) {
    $thumbnailImages[$thumbnailRow['product_id']] = htmlspecialchars('uploads/' . $thumbnailRow['image_path']);
  }

?>

<section id="prodetails" class="section-p1">
  <div class="single-pro-image">
    <img src="<?php echo $image_path; ?>" width="100%" id="MainImg" alt="" />


    <!-- Add some small images here -->
    <div class="small-img-group">
      <?php foreach ($thumbnailImages as $productId => $thumbnailPath) {?>
        <div class="small-img-col" onclick="changeMainImage('<?php echo $thumbnailPath;  ?>')" >
          <img src="<?php echo $thumbnailPath; ?>" width="100%" class="small-img" alt="">
        </div>
    <?php
      }
      ?>
    </div>
  </div>
  <div class="single-pro-details">
    <h6><?php echo $product_brand; ?></h6>
    <h4><?php echo $product_name; ?></h4>
    <h2>$<?php echo $price; ?></h2>
    <select>
      <option>Select Size</option>
      <option>XL</option>
      <option>XXL</option>
      <option>Small</option>
      <option>Medium</option>
      <option>Large</option>
    </select>
    <input type="number" value="1" />
    <button class="normal">Add To Cart</button>
    <h4>Product Details</h4>
    <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque sed
      aspernatur adipisci sit veniam eligendi repudiandae eius velit debitis
      quo!</span>
  </div>
</section>

<section id="product1" class="section-p1">
  <h2>Featured Products</h2>
  <p>Summer Collection New Modern Design</p>
  <div class="pro-container">
    <div class="pro">
      <img src="img/products/n1.jpg" alt="" />
      <div class="des">
        <span>adidas</span>
        <h5>Cartoon Astronaut T-Shirts</h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h4>$70</h4>
      </div>
      <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>

    <div class="pro">
      <img src="img/products/n2.jpg" alt="" />
      <div class="des">
        <span>adidas</span>
        <h5>Cartoon Astronaut T-Shirts</h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h4>$70</h4>
      </div>
      <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>

    <div class="pro">
      <img src="img/products/n3.jpg" alt="" />
      <div class="des">
        <span>adidas</span>
        <h5>Cartoon Astronaut T-Shirts</h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h4>$70</h4>
      </div>
      <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>

    <div class="pro">
      <img src="img/products/n4.jpg" alt="" />
      <div class="des">
        <span>adidas</span>
        <h5>Cartoon Astronaut T-Shirts</h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h4>$70</h4>
      </div>
      <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
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
  function changeMainImage(newImagePath) {
    document.getElementById('MainImg').src = newImagePath;
  }
</script>

<?php
include_once("footer.php");
?>