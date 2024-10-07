<?php
session_start();

if (isset($_SESSION['username'])) {
    echo "<h2>Hello, " . htmlspecialchars($_SESSION['username']) . "!</h2>";
    echo '<form action="logout.php" method="post">
            <button type="submit">Exit</button>
          </form>';
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
    <form action="login.php" method="post">
        <label for="username">Login:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Enter">
    </form>
    </body>
    </html>
    <?php
}
?>
