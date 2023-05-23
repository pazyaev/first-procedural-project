<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once('dbconnection.php');

define('SITE_ROOT', realpath(dirname(__FILE__)));
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body>
        <nav class="menu">
            <ul>
                <?php if (array_key_exists('id', $_SESSION)): ?>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="formNews.php">Добавить новость</a></li>
                    <li><a href="showAllNews.php">Новости</a></li>
                    <li><a href="addCategory.php">Добавить категорию</a></li>
                    <li><a href="loadTableFile.php">Загрузка из файла</a></li>
                    <li><a href="logOut.php">Выйти</a></li>
                <?php else: ?>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="showAllNews.php">Новости</a></li>
                    <li><a href="loadTableFile.php">Загрузка из файла</a></li>
                    <li><a href="logIn.php">Войти</a></li>
                <?php endif ; ?>
            </ul>
        </nav>
    </body>
</html>