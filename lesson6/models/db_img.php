<?php
require_once "db.php";
function images_new($link, $name, $src, $small_src, $size){
    $name = trim($name);

    if ($name=='')
        return False;

    $t = "INSERT INTO images (name, src, small_src, size) VALUES ('%s','%s','%s','%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $name),mysqli_real_escape_string($link, $src),mysqli_real_escape_string($link, $small_src),mysqli_real_escape_string($link, $size));

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return true;
}

function images_all($link){
    $query = "SELECT * FROM images order by count desc";
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    $n = mysqli_num_rows($result);
    $images = array();

    for($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $images[] = $row;
    }

    return $images;
}

function images_get($link, $id){
    $query = sprintf("SELECT * FROM images where id=%d",(int)$id);
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    $img = mysqli_fetch_assoc($result);

    return $img;
}

function countImages($link, $id){
    $sql = "UPDATE images SET count=count+1 WHERE id='$id'";
    $result = mysqli_query($link, $sql);
}