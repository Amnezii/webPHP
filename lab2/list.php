<?php
$uploadDir = 'files/';

if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);

    if (count($files) > 2) {
        echo "<h2>Список файлів у папці files:</h2>";
        echo "<ul>";
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                echo "<li><a href='$uploadDir$file'>$file</a></li>";
            }
        }
        echo "</ul>";
    } else {
        echo "Папка пуста.";
    }
} else {
    echo "Папка files не існує.";
}
?>
<?php
