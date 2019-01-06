<?php
require_once "../config/config.php";

$link = mysqli_connect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DB) or die("Error: ".mysqli_error($link));
if(!mysqli_set_charset($link, "utf8")){
    printf("Error: ".mysqli_error($link));
}


