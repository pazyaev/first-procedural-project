<?php
require('header.php');

if (isset($_GET['pageNumber'])) {
    $pageNumber = $_GET['pageNumber'];
} else {
    $pageNumber = 1;
}


$size_page = 6;
$offset = ($pageNumber - 1) * $size_page;

$count_sql = $mysqli->query("SELECT COUNT(*) FROM news WHERE is_active = 1");
$total_rows = $count_sql->fetch_array()[0];
$total_pages = ceil($total_rows / $size_page);

$res_data = $mysqli->query("SELECT n.id, title, text, name, image FROM news AS n
LEFT JOIN category AS c
ON n.category_id = c.id
WHERE is_active = 1 LIMIT $offset,$size_page");

$arr = [];

while ($row = $res_data->fetch_array(MYSQLI_ASSOC)) {
    $arr[] = $row;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Новостная лента</title>
    </head>
    <body>
        <div class="wrapper">
                <?php foreach($arr as $value): ?>
                <div class="eachNews">
                    <img class="img" src="<?= $value['image'] ?>" alt="preview">
                    <div class="textPart">
                        <a href="partOfNews.php?id=<?= $value['id'] ?>" class="title"><?= $value['title'] ?></h1>
                        <p class="category"><?= $value['name'] ?></p>
                        <p class="text"><?= mb_substr($value['text'], 0, 20) ?>...</p>
                    </div>
                </div>
                <?php endforeach; ?>
            <div class="pagination">
                <a href="showAllNews.php?pageNumber=1">Начало</a>
                <a href="showAllNews.php?pageNumber=<?php if ($pageNumber <= 1) { echo '1'; } else { echo $pageNumber - 1; } ?>">Предыдушая</a>
                <a href="showAllNews.php?pageNumber=<?php if ($pageNumber >= $total_pages) { echo $total_pages; } else { echo $pageNumber + 1; } ?>">Следующая</a>
                <a href="showAllNews.php?pageNumber=<?= $total_pages ?>">Конец</a>
            </div>      
        </div>  
    </body>
</html>
