<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "users_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

$hashed_pass = md5($pass);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $user, $email, $hashed_pass);

if ($stmt->execute()) {
    echo "Реєстрація успішна!";
    header("Location: login.html");
} else {
    echo "Помилка: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
