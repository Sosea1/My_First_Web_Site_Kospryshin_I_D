<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta title="WEB_PT">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Коспрышин И.Д.</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav_bar">
        <div class="row">
            <div class="col-3 nav_logo">
            </div>
            <div class="col-9"> <div="nav_text"><h2>Не оборачивайся!
                Информация о Коспрышине Илье Дмитриевиче! </h2>
            </div></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="left_text">
                    <div>
                        Хиробрин (англ. Herobrine) — мифический персонаж, придуманный игровым сообществом «creepy-pasta» (мистической истории).[1] Это название персонажа со старым скином человека, но с полностью белыми глазами. Его также часто называют мёртвым шахтёром. Вопреки многим отсылкам к тому, что Хиробрин действительно существует или когда-то существовал в официальной версии игры, эта информация является ложной. 8 января 2011 года Нотч подтвердил, что Хиробрина не существует.[2] Также, 26 мая 2012 года Нотч подтвердил, что у него никогда не было мёртвого брата, и Хиробрина никогда не было в игре.[3] 
                    </div>
                </div>
            </div>
            <div class="col-4">
                    <div class="img"></div>
                    <div class="title_text"><p>Автор: Коспрышин Илья Дмитриевич</p></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton">Нажми на меня</button>
                <p id="demo"></p>  
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="profile.php"
                enctype="multipart/form-data" name="upload">    
                    <div class="row form__title">
                        <input type="text" class="form" type="text" name="title" 
                        placeholder="Заголовок вашего поста">
                    </div>
                    <div class="row form__main">
                    <textarea name="text" class="textarea_post" cols="30" role="10" 
                    placeholder="Введите текст вашего поста ..."></textarea>
                    </div>
                    <input type="file" name="file"><br>
                    <button type="submit" class="btn_red btn__post" name="submit">
                        Сохранить пост!</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./js/button.js"></script>
</body>
</html>
<?php
require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', '111', 'data_base');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text)
        die ("Заполните все поля");
    $sql = "INSERT INTO posts (title, main_text) 
    VALUES ('$title','$main_text')";
    if(!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пост";
    }
    if (!empty($_FILES["file"])) {
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") ||
        ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") ||
        ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" .$_FILES["file"]["name"]);
            echo "Load in: upload/".$_FILES["file"]["name"];
        }
        else {
            echo "upload failed!";
        }
    }
}
?>







