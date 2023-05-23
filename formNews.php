<?php
require('header.php');

$uploads_dir = '/img';

if ($_FILES) {
    $name = basename($_FILES['img']['tmp_name']);
    $tmp_name = $_FILES['img']['tmp_name'];
    $imagePath = "$uploads_dir/$name";
    move_uploaded_file($tmp_name, SITE_ROOT . "$uploads_dir/$name");
}

if ($_POST) {
    if ($_POST["title"] !== '') {
        $title = $_POST["title"];
    } else {
        echo 'Пожалуйста введите заголовок статьи';
    }
    
    if ($_POST["text"] !== '') {
        $text = $_POST["text"];
    } else {
        echo 'Пожалуйста введите текст статьи';
    }
    
    if (array_key_exists('is_active', $_POST)) {
        $isActive = 1;
    } else {
        $isActive = 0;
    }

    if (isset($_POST["categoryId"])) {
        $categoryId = $_POST["categoryId"];
    }
    
    $mysqli->query("INSERT INTO news (title, text, is_active, category_id, image) VALUES ('$title', '$text', $isActive, $categoryId, '$imagePath')");
    
    echo 'Статья успешно добавлена';
}



$result = $mysqli->query("SELECT * FROM category");
$arr = [];

while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
    $arr[] = $rows;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Добавить новость</title>
    </head>
    <body>
        <form enctype="multipart/form-data" method="POST">
            <p>Заголовок</p>
            <input type="text" name="title" id="title" required>
            <p>Изображение</p>
            <input type="file" name="img" id="img">
            <p><label for="text">Текст статьи</label></p>
            <textarea name="text" required id="text" cols="30" rows="10"></textarea>
            <p>
                <label for="is_active">Отображать на сайте</label>
                <input type="checkbox" id="is_active" name="is_active" value="show">
            </p>
            <label for="categoryId">Выберите категорию:</label>
                <select name="categoryId" id="categoryId">
                <?php foreach($arr as $value): ?>
                <option value="<?= $value['id'] ?>"><?= $value['name']?></option>
                <?php endforeach; ?>
                </select>
            <input type="submit" value="Отправить" />
        </form>
    </body>
</html>