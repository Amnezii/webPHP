<?php
if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    if (!empty($username)) {
        setcookie('username', $username, time() + 7 * 24 * 60 * 60, "/");
        header("Location: index.php");
        exit();
    } else {
        echo "Error: name cannot be empty";
    }
}
?>
