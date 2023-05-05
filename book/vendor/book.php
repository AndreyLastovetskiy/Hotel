<?php
session_start();
if(empty($_COOKIE['id_user'])) {
    $_SESSION['errLogin'] = "Авторизуйтесь!";
    header("Location: ../login.php");
}

require_once("../../db/db.php");

$id_offer = $_POST['id_offer'];
$name = $_POST['name'];
$email = $_POST['email'];
$date_in = $_POST['date_in'];
$date_out = $_POST['date_out'];
$adults = $_POST['adults'];
$child = $_POST['child'];

mysqli_query($link, "INSERT INTO `card`
                    (`id_offer`, `full_name`, `email`, `date_in`, `date_out`, `adults`, `child`) 
                    VALUES 
                    ('$id_offer','$name','$email','$date_in','$date_out','$adults','$child')
");

header("Location: " . $_SERVER['HTTP_REFERER']);


?>