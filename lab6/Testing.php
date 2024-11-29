<?php
require_once 'BankAccount.php';
require_once 'SavingAccount.php';

try {
    // Створення звичайного рахунку
    $account1 = new BankAccount("USD", 100);
    echo "Баланс рахунку: " . $account1->getBalance() . PHP_EOL;

    $account1->deposit(50);
    echo "Після поповнення: " . $account1->getBalance() . PHP_EOL;

    $account1->withdraw(30);
    echo "Після зняття: " . $account1->getBalance() . PHP_EOL;

    // Створення накопичувального рахунку
    $savingsAccount = new SavingsAccount("EUR", 200);
    echo "Баланс накопичувального рахунку: " . $savingsAccount->getBalance() . PHP_EOL;

    $savingsAccount->applyInterest();
    echo "Після застосування відсотків: " . $savingsAccount->getBalance() . PHP_EOL;

    // Тестування некоректних операцій
    $account1->withdraw(200); // Викликає виняток
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . PHP_EOL;
}
?>
