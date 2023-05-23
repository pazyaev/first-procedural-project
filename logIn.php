<?php

require('header.php');

$errors = [];
$userExists = [];
if ($_POST) {
    if ($_POST['login'] == '') {
        $errors['login'] = 'Введите логин';
    }

    if ($_POST['password'] == '') {
        $errors['password'] = 'Введите пароль';
    }

    if (empty($errors)) {
        $login = $mysqli->real_escape_string($_POST['login']);
        $password = $mysqli->real_escape_string($_POST['password']);
    
        $result = $mysqli->query("SELECT id, name, password FROM user WHERE name = '$login' AND password = '$password'");
        $userExists = $result->fetch_array(MYSQLI_ASSOC);
    }
}

if ($userExists) {
    $_SESSION['id'] = $userExists['id'];
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Вход</title>
    </head>
    <body>
        <div class="formAuth">
            <h1>Вход</h1>
            <form method="POST">
                <div class="strings">
                    <p>Логин:</p>
                    <input type="text" name="login" id="login">
                    <?php if (array_key_exists('login', $errors)): ?>
                        <div class="validation_error"><?= $errors['login'] ?></div>
                    <?php endif; ?>
                    <p>Пароль:</p>
                    <input type="password" name="password" id="password">
                    <?php if (array_key_exists('password', $errors)): ?>
                        <div class="validation_error"><?= $errors['password'] ?></div>
                    <?php endif; ?>
                    <input class = "button" type="submit" value="Войти">
                </div>
            </form>
        </div>
    </body>
</html>