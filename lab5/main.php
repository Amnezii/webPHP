<?php
class Product {
    public $name; // Назва товару
    protected $price; // Ціна товару
    public $description; // Опис товару

    // Конструктор для ініціалізації властивостей
    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->setPrice($price); // Виклик методу для валідації ціни
        $this->description = $description;
    }

    // Метод для валідації ціни
    public function setPrice($price) {
        if ($price < 0) {
            throw new Exception("Ціна не може бути від'ємною.");
        }
        $this->price = $price;
    }

    // Метод для отримання інформації про товар
    public function getInfo() {
        return "Назва: $this->name<br>Ціна: $this->price<br>Опис: $this->description";
    }
}

class DiscountedProduct extends Product
{
    public $discount; // Знижка на товар

    // Конструктор для ініціалізації властивостей
    public function __construct($name, $price, $description, $discount)
    {
        parent::__construct($name, $price, $description); // Виклик батьківського конструктора
        $this->discount = $discount; // Ініціалізація знижки
    }

    // Метод для розрахунку нової ціни з урахуванням знижки
    public function getDiscountedPrice()
    {
        return $this->price - ($this->price * ($this->discount / 100));
    }

    // Перевизначений метод для отримання інформації про товар
    public function getInfo()
    {
        $newPrice = $this->getDiscountedPrice();
        return "Назва: $this->name<br>Ціна: $newPrice (з урахуванням знижки: $this->discount%)<br>Опис: $this->description";
    }
}

class Category
{
    public $name; // Назва категорії
    private $products = []; // Масив товарів

    // Конструктор для ініціалізації властивостей
    public function __construct($name)
    {
        $this->name = $name;
    }

    // Метод для додавання товару до категорії
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    // Метод для виведення всіх товарів категорії
    public function displayProducts()
    {
        echo "<h2>Товари в категорії: $this->name</h2>";
        foreach ($this->products as $product) {
            echo $product->getInfo() . "<br><br>";
        }
    }
}

// Включаем файлы классов (если они в отдельных файлах)
// require_once 'Product.php';
// require_once 'DiscountedProduct.php';
// require_once 'Category.php';

// Создание объектов класса Product
$product1 = new Product("Товар 1", 100, "Опис товару 1");
$product2 = new Product("Товар 2", 200, "Опис товару 2");

// Создание объектов класса DiscountedProduct
$discountedProduct1 = new DiscountedProduct("Товар 3", 150, "Опис товару 3", 20); // 20% знижка
$discountedProduct2 = new DiscountedProduct("Товар 4", 250, "Опис товару 4", 10); // 10% знижка

// Создание категории
$category = new Category("Категорія 1");

// Додавання товарів до категорії
$category->addProduct($product1);
$category->addProduct($product2);
$category->addProduct($discountedProduct1);
$category->addProduct($discountedProduct2);

// Виведення всіх товарів категорії
$category->displayProducts();

