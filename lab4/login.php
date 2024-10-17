<?php
session_start();

// Підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "users_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка на помилки підключення
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

$hashed_pass = md5($pass);

$stmt = $conn->prepare("SELECT id, username FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $hashed_pass);

$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['username'] = $user;
    header("Location: welcome.php");
} else {
    echo "Невірне ім'я користувача або пароль";
}

$stmt->close();
$conn->close();
?>
