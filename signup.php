<?php
include_once("db.php");

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $fullName = $_POST["fullName"];
  $email = $_POST["email"];

  // Prepare and bind
  $stmt = $conn->prepare("SELECT * FROM users WHERE user = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $error_message = "Username already taken. Please choose a different one.";
  } else if($username == 'admin') {
    $error_message = "Username 'admin' is reserved for admins. Please choose a different one.";
  } else {
    // Inser new user to the database
    $stmt = $conn->prepare("INSERT INTO users (user, password, full_name, email) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $username, $password, $fullName, $email);

    if ($stmt->execute()) {
      // Succesful signup
      header("Location: login.php");
      exit();
    } else {
      $error_message = "Error: " . $stmt->error;
    }
  }

  $stmt->close();


}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <section id="sign-up" class="section-p1 section-m1">
      <form action="signup.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

       <div class="btn-container">
         <button class="normal" type="submit">Sign Up</button>
         <button class="normal" type="submit"><a href="login.php">Log In</a></button>
       </div>
      </form>
      <?php
        if (!empty($error_message)) {
          echo "<p>$error_message</p>";
        }
      ?>
    </section>
  </body>
</html>
