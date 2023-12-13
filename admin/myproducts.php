<?php
include_once('../db.php');

$sql = "SELECT * FROM products";
$all_products = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <section id="product1" class="section-p1">
        <div class="pro-container">
       
            <?php
            while ($row = mysqli_fetch_assoc($all_products)) {
            ?>
                <div class="pro">
                    <img src="<?php echo $row['image_path']; ?>" alt="" />
                    <div class="des">
                        <span><?php echo $row['product_brand']; ?></span>
                        <h5><?php echo $row['product_name']; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$<?php echo $row['price']; ?></h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
            <?php
            }
            ?>
            
        </div>
    </section>
</body>

</html>