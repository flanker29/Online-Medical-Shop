<?php
session_start();
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if (isset($_POST['submit_cart']) && $_POST['submit_cart'] == "ADD_to_Cart") {
    $qty = $_POST['qty'];
    $product_id = $_POST['prod'];
    $username = $_SESSION['username'];
    $price = $_POST['pr'];
    $sql = "INSERT INTO cart (username,product_id,qty,price) VALUES ('$username', '$product_id', '$qty','$price')";
    if (mysqli_query($link, $sql)) {
        echo "Records inserted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

// Close connection
mysqli_close($link);
header("cart.php");
exit;