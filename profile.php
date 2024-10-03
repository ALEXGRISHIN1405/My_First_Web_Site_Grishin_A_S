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
    <div class="container nav_bar">
        <div class="row">
            <div class="col-3 nav_logo"><img class="img_size2"
                src="img/lego.png" alt="logo"></div>
            <div class="col-9">
                <div class="nav_text">Информация о Гришине А.С.</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Гришин Александр, студент 4 курса РТУ МИРЭА. Golang
                    разработчик. Играю на гитаре, была своя группа. 
                    Хочу стать самым крутым ITшником!
                </h2>
            </div>
            <div class="col-4">
                <div class="logo"></div>
                <div class="row"><p>Радуга</p></div>
            </div>
            <div class="button_js col-12">
                <button id="This_button">Click me</button>
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
        <div class="col-12">
          <form class="form_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
            <input type="text" class="form" name="title" placeholder="Заголовок вашего поста">
            <textarea name="text" cols="30" rows="10" placeholder="Введите текс вашего поста ..."></textarea>
            <input type="file" name="file"><br>
            <button type="submit" class="btn_red" name="submit">Сохранить пост!</button>
          </form>
        </div>
      </div>
    </div>
    <script types="text/javascript" src="./js/button.js">
    </script>
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', '123', 'first');

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $main_text = $_POST['text'];

  if (!$title || !$main_text) die("Заполните все поля");

  if(is_uploaded_file($_FILES["file"]["tmp_name"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
            $file_name = @$_FILES["file"]["name"];
            $sql = "INSERT INTO new_posts (title, main_text, name_file) VALUES ('$title', '$main_text', '$file_name')";
            if (!mysqli_query($link, $sql)) die("Не удалось добавить пост");
        }
        else
        {
            echo "upload failed!";
        }
    } else {
      $sql = "INSERT INTO new_posts (title, main_text, name_file) VALUES ('$title', '$main_text', 'NULL')";
      if (!mysqli_query($link, $sql)) die("Не удалось добавить пост");
    }
}
?>