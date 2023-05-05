<?php
session_start();
if(empty($_COOKIE['id_user'])) {
    $_SESSION['errLogin'] = "Авторизуйтесь!";
    header("Location: ../login.php");
} elseif($_COOKIE['id_group'] != 1) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

require_once("../db/db.php");

$id_room = $_GET['id'];

mysqli_query($link, "DELETE FROM `offer` WHERE `id` = '$id_room'");
header("Location: ../offers.php");
?>