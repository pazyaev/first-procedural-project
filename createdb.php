<?php

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'console';

$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die('Ошибка соединения');
}

$sql = 'CREATE DATABASE ' . "$database";
if ($conn->query($sql)) {
    echo "База создана\n";
    $conn->select_db("$database");
} else {
    echo "Ошибка при создании базы данных\n";
}

$user = "CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_name VARCHAR(255)
);";

$book = "CREATE TABLE book (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    book_name VARCHAR(255)
);";

$category = "CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    category_name VARCHAR(255)
);";

$queries = [$user, $book, $category];

foreach($queries AS $value) {
    $conn->query($value);
    echo "Таблица успешно создана\n";
}
