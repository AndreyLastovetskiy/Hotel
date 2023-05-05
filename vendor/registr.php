<?php
session_start();
require_once("../db/db.php");

$idgroup = 2;
$login = $_POST['login'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$select_user = mysqli_query($link, "SELECT * FROM `user` WHERE `login` = '$login'");
$select_user = mysqli_fetch_assoc($select_user);

if(empty($select_user)) {
    if($password == $cpassword) {
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($link, "INSERT INTO `user`
                            (`idgroup`, `login`, `password`, `email`, `phone`)
                            VALUES 
                            ('$idgroup','$login','$pass_hash','$email','$phone')
        ");

        header("Location: ../login.php");
    } else {
        $_SESSION['errRegistr'] = "Пароли не совпадают!";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
} else {
    $_SESSION['errRegistr'] = "Такой пользователь существует!";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

?>