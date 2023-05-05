<?php
session_start();
if(empty($_COOKIE['id_user'])) {
    $_SESSION['errLogin'] = "Авторизуйтесь!";
    header("Location: ../../login.php");
} else {
    if($_COOKIE['id_group'] != 1) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } 
}
require_once("../../db/db.php");

$id = $_POST['id'];
$name = $_POST['name'];
$short_descrip = $_POST['short_descrip'];
$editor = $_POST['editor'];
$price = $_POST['price'];

$path = 'upload/offer/' . time() . $_FILES['img_path']['name'];
move_uploaded_file($_FILES['img_path']['tmp_name'], '../../' . $path);

$select_product = mysqli_query($link, "SELECT * FROM `product` WHERE `name` = '$name'");
$select_product = mysqli_fetch_assoc($select_product);

if(!empty($_FILES['img_path']['name'])) {
    if(empty($select_product)) {
        mysqli_query($link, "UPDATE `offer` SET `name`='$name',`short_descrip`='$short_descrip',`descrip`='$editor',`price`='$price',`image_path`='$path' WHERE `id` = '$id'");
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION["errCateg"] = 'Такая категория уже существует!';
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
} else {
    mysqli_query($link, "UPDATE `offer` SET `name`='$name',`short_descrip`='$short_descrip',`descrip`='$editor',`price`='$price' WHERE `id` = '$id'");
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

?>