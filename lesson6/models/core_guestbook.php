<?php
include_once "db.php";
if($_POST['submit']){
    $fio = trim(strip_tags($_POST['fio']));
    $email = trim(strip_tags($_POST['email']));
    $text = trim(strip_tags($_POST['text']));

    $t = "INSERT INTO comment (fio, email, text) VALUES ('%s','%s','%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $fio),mysqli_real_escape_string($link, $email),mysqli_real_escape_string($link, $text));

    $result = mysqli_query($link, $query);

    if(!$result){
        die(mysqli_error($link));
    }else{
        header("Location: ../public/guestbook.php");
    }
}

function comments_all($link){
    $query = "SELECT * FROM comment order by id desc";
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    $n = mysqli_num_rows($result);
    $comments = array();

    for($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $comments[] = $row;
    }
    return $comments;
}