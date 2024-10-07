<?php
session_start();

$session_timeout = 300; // 5 хвилин = 300 секунд

if (isset($_SESSION['last_activity'])) {
    $inactive_time = time() - $_SESSION['last_activity'];

    if ($inactive_time > $session_timeout) {
        session_unset();
        session_destroy();
        header("Location: index.php?timeout=true");
        exit();
    }
}

$_SESSION['last_activity'] = time();

$products = [
    1 => "Ноутбук",
    2 => "Телефон",
    3 => "Планшет",
    4 => "Навушники"
];

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][$product_id] = $products[$product_id];

    if (isset($_COOKIE['previous_purchases'])) {
        $previous_purchases = unserialize($_COOKIE['previous_purchases']);
    } else {
        $previous_purchases = [];
    }

    if (!isset($previous_purchases[$product_id])) {
        $previous_purchases[$product_id] = $products[$product_id];
    }

    setcookie('previous_purchases', serialize($previous_purchases), time() + 30 * 24 * 60 * 60, "/");

    header("Location: index.php");
    exit();
}

if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина покупок</title>
</head>
<body>

<?php if (isset($_GET['timeout']) && $_GET['timeout'] == 'true'): ?>
    <p style="color: #ff0000;">Ваша сесія завершена через неактивність більше 5 хвилин.</p>
<?php endif; ?>

<h1>Список товарів</h1>

<form action="index.php" method="post">
    <?php foreach ($products as $id => $name): ?>
        <div>
            <span><?php echo htmlspecialchars($name); ?></span>
            <button type="submit" name="product_id" value="<?php echo $id; ?>">Додати до корзини</button>
        </div>
    <?php endforeach; ?>
</form>

<h2>Товари у вашій корзині:</h2>
<?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
    <ul>
        <?php foreach ($_SESSION['cart'] as $product): ?>
            <li><?php echo htmlspecialchars($product); ?></li>
        <?php endforeach; ?>
    </ul>
    <form action="index.php" method="post">
        <button type="submit" name="clear_cart">Очистити корзину</button>
    </form>
<?php else: ?>
    <p>Ваша корзина порожня.</p>
<?php endif; ?>

<h2>Попередні покупки:</h2>
<?php if (isset($_COOKIE['previous_purchases'])): ?>
    <?php
    $previous_purchases = unserialize($_COOKIE['previous_purchases']);
    if (!empty($previous_purchases)): ?>
        <ul>
            <?php foreach ($previous_purchases as $product): ?>
                <li><?php echo htmlspecialchars($product); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Немає попередніх покупок.</p>
    <?php endif; ?>
<?php else: ?>
    <p>Немає попередніх покупок.</p>
<?php endif; ?>

</body>
</html>
