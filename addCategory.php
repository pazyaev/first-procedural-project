<?php
require('header.php');

if($_POST) {
    if($_POST['categoryName'] == '') {
        echo 'Пожалуйста введите название категории';
    } else {
        $categoryName = $_POST['categoryName'];
        $mysqli->query("INSERT INTO category (name) VALUE ('$categoryName')");
        echo 'Категория успешно добавлена';
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Добавление категории</title>
    </head>
    <body>
        <form method="POST">
            <p><label for="categoryName">Введите название категории</label></p>
            <input type="text" name="categoryName" id="addCategory">
            <input type="submit" value="Отправить">
        </form>
    </body>
</html>