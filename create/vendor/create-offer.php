<?php
session_start();
if(empty($_COOKIE['id_user'])) {
    $_SESSION['errLogin'] = "Авторизуйтесь!";
    header("Location: ../../login.php");
} elseif($_COOKIE['id_group'] != 1) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

require_once("../../db/db.php");

$type_offer = $_POST['type_offer'];
$name = $_POST['name'];
$short_descrip = $_POST['short_descrip'];
$editor = $_POST['editor'];
$rooms = $_POST['rooms'];
$price = $_POST['price'];

$path = "upload/offer/" . time() . $_FILES['img_path']['name'];
move_uploaded_file($_FILES['img_path']['tmp_name'], "../../" . $path);

mysqli_query($link, "INSERT INTO `offer`
                    (`type_offer`, `name`, `short_descrip`, `descrip`, `rooms`, `price`, `image_path`) 
                    VALUES 
                    ('$type_offer','$name','$short_descrip','$editor','$rooms','$price','$path')
");

header("Location: ../../offers.php");
?>