<?php
$link = mysqli_connect('127.0.0.1', 'root', '123', 'first');
$id = $_GET['id'];
$sql = "SELECT * FROM new_posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
$file_name = $rows['name_file'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гришин А.С.</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="">
</head>
<body>
    <?php
        echo "<h1> $title </h1>";
        echo "<p> $main_text </p>";
        if ($file_name != "NULL") {
        echo '<img src="./upload/' . $file_name . '" >';

        }
    ?>
</body>
</html>
