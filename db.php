<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "ecomm";
$conn = "";

try {
    $conn = mysqli_connect(
        $servername,
        $username,
        $password,
        $db_name
    );
} catch(mysqli_sql_exception) {
    echo "Could not connect";
}
?>