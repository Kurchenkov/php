<?php
include_once "db.php";

require_once "image.php";
require_once "../config/config.php";

if(isset($_POST['submit'])){
    $filePath  = $_FILES['img']['tmp_name'];
    $fileName  = translate($_FILES['img']['name']);
    $type = $_FILES['img']['type'];
    $size = $_FILES['img']['size'];

    if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
        if($size>0 and $size<1000000){
            if(copy($filePath,DIR_BIG.$fileName)){
                image_resize(DIR_BIG.$fileName, DIR_SMALL.$fileName, 250, 150);
                images_new($link, $fileName, DIR_BIG.$fileName, DIR_SMALL.$fileName, $size);
                $message = "<h3>Файл успешно загружен на сервер</h3>";
            }else{
                $message = "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
                exit;
            }
        }else{
            $message = "<b>Ошибка - картинка превышает 1 Мб.</b>";
        }
    }else{
        $message = "<b>Картинка не подходит по типу! Картинка должна быть в формате JPEG, PNG или GIF</b>";
    }
}
