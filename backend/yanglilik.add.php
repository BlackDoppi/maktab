<?php

if (!(isset($_COOKIE['login']) && isset($_COOKIE['login'])))
    exit('<meta http-equiv="refresh" content="0;url=../admin/login.html">');


require('config.php');


$title = $_POST['title'];
$text = $_POST['text'];

try {
    $file_path = 'images/' . basename($_FILES['image']['name']);
    $target_file = '../' . $file_path;

    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
} catch (\Throwable $th) {
    echo $th;
}

try {
    $sql = "INSERT INTO yangiliklar (title, text, image) VALUES ('$title', '$text', '$file_path')";
    $conn->exec($sql);

    echo '<meta http-equiv="refresh" content="0;url=../admin/yangiliklar.php">';
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
