<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);

    if (empty($first_name) || empty($last_name)) {
        echo "Please fill in all fields!";
    } elseif (!is_string($first_name) || !is_string($last_name)) {
        echo "Invalid data type!";
    } else {
        echo "Hello, " . htmlspecialchars($first_name) . " " . htmlspecialchars($last_name) . "!";
    }
} else {
    echo "No data was sent.";
}
?>
