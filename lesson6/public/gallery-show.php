<?php
include_once "../models/db_img.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Фотогаллерея</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
</head>
<body>
<div id="container">
    <? include "../templates/header.php"; ?>
    <div class="leftblock">
        <? include "../templates/menu.php"; ?>
    </div>
    <div class="content">
    <h1>Фотогаллерея</h1>
    <h3><a href="gallery.php"><u>Вернуться в галлерею</u></a></h3>
    <?php
    if(isset($_GET['id'])){
        countImages($link, $_GET['id']);
        $img = images_get($link, $_GET['id']);
        echo "<img src='$img[src]' width='90%'><br>Количество просмотров: $img[count]";
    }else{
        echo '<h2>No Images</h2>';
    }

    ?>
</div>
    <footer>
        <? include "../templates/footer.php"; ?>
    </footer>
</div>
</body>
</html>