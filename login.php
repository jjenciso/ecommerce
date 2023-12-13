<?php
session_start();
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM users WHERE user = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
      // success
      $_SESSION['user'] = $username;
      // check if the user is the admin
      if ($username === "shopAdmin") {
        header("Location: admin/admin.php");
        exit();
      } else {
        header("Location: shop.php");
        exit();
      }
    } else {
      $error_message = "Incorrect password";
    }
  } else {
    $error_message = "User not found <br> Sign up for an account for free";
  }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <section id="log-in" class="section-m1 section-p1">
      <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <div class="btn-container">
          <button class="normal" type="submit">Login</button>
          <button class="normal"><a href="signup.php">Sign Up</a></button>
        </div>
      </form>
      <?php
        if (isset($error_message)) {
          echo "<p>$error_message</p>";
        }
      ?>
    </section>
  </body>
</html>
