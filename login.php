<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <h2>Авторизация</h2>
    <form action="./vendor/login.php" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <button>Войти</button>
    </form>
    <?php
        if(empty($_SESSION['errLogin'])) {
            echo "";
        } else {
            echo $_SESSION['errLogin'];
        }
        session_destroy();
    ?>
    <br>
    <a href="./registr.php">Вы не зарегистрированы, зарегистрироваться</a>
</body>
</html>