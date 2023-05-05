<?php
session_start();
if(empty($_COOKIE['id_user'])) {
    $_SESSION['errLogin'] = "Авторизуйтесь!";
    header("Location: ../login.php");
} elseif($_COOKIE['id_group'] != 1) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

require_once("../db/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление предложения</title>
    <script src="https://cdn.tiny.cloud/1/fipw5p8ktoulbzn13x05gn3k023y7zotl1ttiifwjubct86w/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="../input.css">
</head>
<body>
    <div class="wrapper" style="padding: 30px;">
        <h1>Добавление предложения</h1>
        <form action="./vendor/create-offer.php" method="post" enctype="multipart/form-data" class="offer-class">
            <?php
            $select_type = mysqli_query($link, "SELECT * FROM `type_offer`");
            $select_type = mysqli_fetch_all($select_type);
            ?>
            <div class="type">
                <select name="type_offer">
                    <?php foreach($select_type as $st) { ?>
                        <option value="<?= $st[0] ?>"><?= $st[1]; ?></option>
                    <?php } ?>
                </select>
                <label for="type_offer">Тип предложения</label>
            </div>
            <div class="text-field text-field_floating">
                <input class="text-field__input" type="text" name="name" placeholder="asd">
                <label class="text-field__label" for="name">Название</label>
            </div>
            <div class="text-field text-field_floating">
                <input class="text-field__input" type="text" name="short_descrip" placeholder="asd">
                <label class="text-field__label" for="short_descrip">Короткое описание</label>
            </div>
            <textarea name="editor" id="editor"></textarea>
            <div class="room">
                <select name="rooms">
                    <?php 
                    $select_num_room = mysqli_query($link, "SELECT * FROM `rooms`");
                    $select_num_room = mysqli_fetch_all($select_num_room);

                    foreach($select_num_room as $snr) { ?>
                        <option value="<?= $snr[0] ?>"><?= $snr[1] ?></option>
                    <?php } ?>
                </select>
                <label for="rooms">Количество комнат</label>
            </div>
            <div class="text-field text-field_floating">
                <input class="text-field__input" type="text" name="price" placeholder="asd">
                <label class="text-field__label" for="price">Цена</label>
            </div>
            <input type="file" name="img_path">
            <button>Добавить</button>
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