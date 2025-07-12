<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['reset_email'] = $email;
        header("Location: reset.html");
    } else {
        echo "<script>alert('Email not found'); window.location.href='foreget.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
