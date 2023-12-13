<?php
session_start();

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
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" referrerpolicy="no-referrer" />
</head>

<body>
    <section id="header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">


                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if ($loggedIn) { ?>

                    <p id="welcome">Welcome, <?php echo $username; ?></p>
                    <form action="" method="post">
                        <li><button type="submit" name="logout" class="normal">Logout</button></li>
                    </form>

                <?php } else { ?>

                    <li><button class="normal"><a href="login.php">Log In</a></button></li>

                <?php } ?>
                <li id="lg-bag">
                    <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
                </li>
                <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>
    </section>