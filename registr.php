<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form action="./vendor/registr.php" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="password" name="cpassword" placeholder="Подтверждение Пароля">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Телефон">
        <button>Зарегистрироваться</button>
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
    <a href="./login.php">Авторизироваться</a>
</body>
</html>