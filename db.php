<?php
$servername = "127.0.0.1";
$username = "root";
$password = "123";
$dbname = "first";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    echo "Ошибка подключения" . mysqli_connect_error();
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать БД";
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу Users";
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(400) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу posts";
}

$sql = "CREATE TABLE IF NOT EXISTS new_posts(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(400) NOT NULL,
    name_file VARCHAR(400) 
)";

if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу new_posts";
}

mysqli_close($link);

?>