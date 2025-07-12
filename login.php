<?php
session_start();
include 'db_connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
if ($result->num_rows > 0) {
    $_SESSION['user'] = $email;

    // ✅ Redirect to index.html
    header("Location: index.html");
    exit();
} else {
    echo "Invalid credentials";
}
?>
