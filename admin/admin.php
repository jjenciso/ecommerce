<?php
session_start();
include_once("../db.php");

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    $loggedIn = true;
    $username = $_SESSION['user'];
} else {
    $loggedIn = false;
}

// Handle logout
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: ../index.php");
    exit;
}

if (isset($_POST["submit"])) {

    $productbrand = $_POST["productbrand"];
    $productname = $_POST["productname"];
    $price = $_POST["price"];

    // For upload photos
    $upload_dir = "../uploads/";
    $product_image = $upload_dir . $_FILES["imageUpload"]["name"];
    $upload_file = $upload_dir . basename($_FILES["imageUpload"]["name"]);
    $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
    $check = $_FILES["imageUpload"]["size"];

    if (file_exists($upload_file)) {
        echo "<script>alert('The file already exists')</script>";
    } elseif ($check === 0) {
        echo "<script>alert('The photo size is 0. Please change the photo')</script>";
    } elseif ($imageType != 'jpg' && $imageType != 'png' && $imageType != 'jpeg' && $imageType != 'webpg') {
        echo "<script>alert('Invalid image format')</script>";
    } elseif ($productname == "" || $price == "") {
        echo "<script>alert('Please enter both product name and price')</script>";
    } else {
        move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $upload_file);

        $sql = "INSERT INTO products(product_brand, product_name, price, image_path)
                VALUES(?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssds", $productbrand, $productname, $price, $product_image);

        if ($stmt->execute()) {
            echo "<script>alert('Item uploaded successfully')</script>";
        } else {
            echo "<script>alert('There was a problem uploading the item')</script>";
        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <section id="header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <?php if ($loggedIn) { ?>

                    <p id="welcome">Welcome, <?php echo $username; ?></p>
                    <form action="" method="post">
                        <li><button type="submit" name="logout" class="normal">Log Out</button></li>
                    </form>

                <?php } else { ?>

                    <li><button class="normal"><a href="login.php">Log In</a></button></li>

                <?php } ?>
                <li id="lg-bag">
                    <a href="myproducts.php">View Products</a>
                </li>

            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>
    </section>
    <section id="admin" class="section-m1 section-p1">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="productbrand" id="productbrand" placeholder="Product Brand ..">
            <input type="text" name="productname" id="productname" placeholder="Product Name .." required>
            <input type="number" name="price" id="price" placeholder="Product Price.." required>
            <input type="file" name="imageUpload" id="imageUpload" required>
            <input class="normal" type="submit" value="Upload" name="submit">
        </form>
    </section>
</body>

</html>