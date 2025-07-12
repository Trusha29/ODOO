<?php
include 'db_connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check for duplicate email
$check = $conn->query("SELECT * FROM users WHERE email = '$email'");
if ($check->num_rows > 0) {
    echo "Email already registered!";
    exit;
}

// Insert new user
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    // Redirect to login.html after successful signup
    header("Location: login.html");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>
