<?php
$uploadDir = 'files/';

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $fileSize = $file['size'];
    $fileTmpName = $file['tmp_name'];
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowedTypes = ['jpg', 'jpeg', 'png'];

    if (!in_array($fileType, $allowedTypes)) {
        die("Помилка: Дозволено завантажувати лише зображення (jpg, jpeg, png).");
    }

    if ($fileSize > 2 * 1024 * 1024) {
        die("Помилка: Максимальний розмір файлу - 2 МБ.");
    }

    $targetFilePath = $uploadDir . $fileName;
    if (file_exists($targetFilePath)) {
        $uniqueSuffix = time() . rand(1000, 9999);
        $fileName = pathinfo($fileName, PATHINFO_FILENAME) . "_" . $uniqueSuffix . "." . $fileType;
        $targetFilePath = $uploadDir . $fileName;
    }

    if (move_uploaded_file($fileTmpName, $targetFilePath)) {
        echo "Файл успішно завантажений.<br>";
        echo "Ім'я файлу: " . $fileName . "<br>";
        echo "Тип файлу: " . $fileType . "<br>";
        echo "Розмір файлу: " . round($fileSize / 1024, 2) . " КБ<br>";
        echo "<a href='$targetFilePath'>Завантажити файл</a><br>";
    } else {
        echo "Помилка завантаження файлу.";
    }
} else {
    echo "Файл не завантажений.";
}
?>
