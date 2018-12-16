<?
include_once "../models/core_guestbook.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Гостевая книга - Интернет-магазин ноутбуков</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
</head>
<body>
<div id="container">
    <? include "../templates/header.php"; ?>
    <div class="leftblock">
        <? include "../templates/menu.php"; ?>
    </div>
    <div class="content">
        <h1>Гостевая книга</h1>
        <?php
        $comments = comments_all($link);
            if($comments){
                foreach ($comments as $comment){
                    echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 5px;;'>ФИО: {$comment[fio]}<br>Email: {$comment[email]}<br>Текст: {$comment[text]}<br><i>Дата: {$comment[date]}</i></div>";
                }
            }
        ?>
        <hr>
        <form method="post" action="../models/core_guestbook.php">
            <p><strong>Оставить отзыв о сайте:</strong></p>
            <p>Введите ФИО: <input type="text" name="fio" maxlength="30" required></p>
            <p>Введите Email: <input type="email" name="email" maxlength="20" required></p>
            <p>Введите Текст: <textarea name="text" rows="10" required></textarea></p>
            <p><input type="submit" name="submit"></p>
        </form>
    </div>
    <footer>
        <? include "../templates/footer.php"; ?>
    </footer>
</div>
</body>
</html>