<?php
$logFile = 'log.txt';

if (isset($_POST['text'])) {
    $text = trim($_POST['text']);
    if (!empty($text)) {
        file_put_contents($logFile, $text . PHP_EOL, FILE_APPEND);
        echo "Текст успішно записаний у файл.<br>";
    } else {
        echo "Помилка: Текстове поле не може бути порожнім.<br>";
    }
}

if (file_exists($logFile)) {
    echo "<h2>Вміст файлу log.txt:</h2>";
    $contents = file_get_contents($logFile);
    echo nl2br($contents);
} else {
    echo "Файл log.txt не існує.";
}
?>
<?php
