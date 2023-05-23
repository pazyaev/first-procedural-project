<?php
    require('header.php');
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT n.id, title, text, name FROM news AS n
    LEFT JOIN category AS c
    ON n.category_id = c.id
    WHERE n.id = $id");
    $partOfNews = $result->fetch_array(MYSQLI_ASSOC);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $partOfNews['title'] ?></title>
    </head>
    <body>
        <div>
            <h1><?= $partOfNews['title'] ?></h1>
            <p><?= $partOfNews['name'] ?></p>
            <p><?= $partOfNews['text'] ?></p>
        </div>        
    </body>
</html>