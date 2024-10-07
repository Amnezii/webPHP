<?php
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
} else {
    $username = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>

    <?php if ($username): ?>
        <h2>Hello, <?php echo htmlspecialchars($username); ?>!</h2>
        <form action="delete_cookie.php" method="post">
            <button type="submit">Delete Cookie</button>
        </form>
    <?php else: ?>
        <h2>Enter your name:</h2>
        <form action="set_cookie.php" method="post">
            <label for="username">Name:</label>
            <input type="text" name="username" id="username" required>
            <input type="submit" value="Save">
        </form>
    <?php endif; ?>

</body>
</html>
