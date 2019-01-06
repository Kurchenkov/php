<?php
function translate($input){
    $assoc = array(
        'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'j', 'з'=>'z', 'и'=>'i', 'й'=>'i', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'y', 'ф'=>'f', 'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh', 'ы'=>'i', 'э'=>'e', 'ю'=>'u', 'я'=>'ya',
        'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ё'=>'Yo', 'Ж'=>'J', 'З'=>'Z', 'И'=>'I', 'Й'=>'I', 'К'=>'K', 'Л'=>'L', 'М'=>'M', 'Н'=>'N', 'О'=>'O', 'П'=>'P', 'Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'Y', 'Ф'=>'F', 'Х'=>'H', 'Ц'=>'C', 'Ч'=>'Ch', 'Ш'=>'Sh', 'Щ'=>'Sh', 'Ы'=>'I', 'Э'=>'E', 'Ю'=>'U', 'Я'=>'Ya', 'ь'=>'', 'Ь'=>'', 'ъ'=>'', 'Ъ'=>'',
    );
    return $res = strtr($input, $assoc);
}

function image_resize(
    $dir,
    $dir_thumbs,
    $newwidth,
    $newheight = FALSE,
    $quality = 100 // качество для формата jpeg
) {
    ini_set("gd.jpeg_ignore_warning", 1); // иначе на некотоых jpeg-файлах не работает

    list($oldwidth, $oldheight, $type) = getimagesize($dir);
    switch ($type) {
        case IMAGETYPE_JPEG: $typestr = 'jpeg'; break;
        case IMAGETYPE_GIF: $typestr = 'gif' ;break;
        case IMAGETYPE_PNG: $typestr = 'png'; break;
    }
    $function = "imagecreatefrom$typestr";
    $src_resource = $function($dir);

    if (!$newheight) { $newheight = round($newwidth * $oldheight/$oldwidth); }
    elseif (!$newwidth) { $newwidth = round($newheight * $oldwidth/$oldheight); }
    $destination_resource = imagecreatetruecolor($newwidth,$newheight);

    imagecopyresampled($destination_resource, $src_resource, 0, 0, 0, 0, $newwidth, $newheight, $oldwidth, $oldheight);

    if ($type = 2) { # jpeg
        imageinterlace($destination_resource, 1); // чересстрочное формирование изображение
        imagejpeg($destination_resource, $dir_thumbs, $quality);
    }
    else { # gif, png
        $function = "image$typestr";
        $function($destination_resource, $dir_thumbs);
    }

    imagedestroy($destination_resource);
    imagedestroy($src_resource);
}