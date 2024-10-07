<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: get_request_page.php');
    exit();
}

$client_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$script_name = $_SERVER['PHP_SELF'];
$request_method = $_SERVER['REQUEST_METHOD'];
$script_path = $_SERVER['SCRIPT_FILENAME'];

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інформація про сервер та запит</title>
</head>
<body>

<h2>Інформація про запит</h2>

<p><strong>IP-адреса клієнта:</strong> <?php echo htmlspecialchars($client_ip); ?></p>
<p><strong>Назва та версія браузера:</strong> <?php echo htmlspecialchars($user_agent); ?></p>
<p><strong>Назва скрипта, що виконується:</strong> <?php echo htmlspecialchars($script_name); ?></p>
<p><strong>Метод запиту:</strong> <?php echo htmlspecialchars($request_method); ?></p>
<p><strong>Повний шлях до файлу на сервері:</strong> <?php echo htmlspecialchars($script_path); ?></p>

</body>
</html>
