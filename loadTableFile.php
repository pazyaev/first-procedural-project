<?php
    require('header.php');
    $uploads_dir = '/csv';
    if($_FILES){
        $name = basename($_FILES['table']['tmp_name']) . '.csv';
        $tmp_name = $_FILES['table']['tmp_name'];
        $imagePath = "$uploads_dir/$name";
        move_uploaded_file($tmp_name, SITE_ROOT . "$uploads_dir/$name");
        if(($handle = fopen(SITE_ROOT . "$uploads_dir/$name", "r")) !== FALSE) {
            while(($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                $mysqli->query("INSERT INTO user (name, password) VALUES ('$data[0]', '$data[1]')");
            }
            fclose($handle);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Загрузка данных в БД</title>
</head>
<body>
    <form enctype="multipart/form-data" method="POST">
        <p>Загрузите файл:</p>
        <input type="file" name="table">
        <input type="submit" value="Загрузить">
    </form>
</body>
</html>