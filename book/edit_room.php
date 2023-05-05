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

$select_offer = mysqli_query($link, "SELECT * FROM `offer` WHERE `id` = '$id_room'");
$select_offer = mysqli_fetch_assoc($select_offer);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение предложения - <?= $select_offer['name'] ?></title>
    <script src="https://cdn.tiny.cloud/1/fipw5p8ktoulbzn13x05gn3k023y7zotl1ttiifwjubct86w/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="../input.css">
</head>
<body>
    <a href="./room.php?id=<?= $id_room ?>">Назад</a>
    <div class="wrapper" style="padding: 30px;">
        <h1>Изменение предложения - <?= $select_offer['name'] ?></h1>
        <form action="./vendor/edit.php" method="post" enctype="multipart/form-data" class="offer-class">
            <input type="hidden" name="id" value="<?= $id_room ?>">
            <div class="text-field text-field_floating">
                <input class="text-field__input" type="text" name="name" placeholder="asd" value="<?= $select_offer['name'] ?>">
                <label class="text-field__label" for="name">Название</label>
            </div>
            <div class="text-field text-field_floating">
                <input class="text-field__input" type="text" name="short_descrip" placeholder="asd" value="<?= $select_offer['short_descrip'] ?>">
                <label class="text-field__label" for="short_descrip">Короткое описание</label>
            </div>
            <textarea name="editor" id="editor"><?= $select_offer['descrip'] ?></textarea>
            <div class="text-field text-field_floating">
                <input class="text-field__input" type="text" name="price" placeholder="asd" value="<?= $select_offer['price'] ?>">
                <label class="text-field__label" for="price">Цена</label>
            </div>
            <input type="file" name="img_path">
            <button>Изменить</button>
        </form>
    </div>
    

<script>
    tinymce.init({
        selector: 'textarea#editor',  //Change this value according to your HTML
        auto_focus: 'element1',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    }); 
</script>   
</body>
</html>