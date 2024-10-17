<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ласкаво просимо</title>
</head>
<body>
<h2>Ласкаво просимо, <?php echo $_SESSION['username']; ?>!</h2>
<p>Ви успішно увійшли в систему.</p>
<a href="logout.php">Вийти</a>
</body>
</html>
