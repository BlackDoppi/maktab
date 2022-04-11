<?php

if (!(isset($_COOKIE['login']) && isset($_COOKIE['password'])))
    exit('<meta http-equiv="refresh" content="0;url=../admin/login.html">');


require('config.php');


$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];

try {
    $sql = "SELECT image FROM yangiliklar WHERE id=$id";
    $data = $conn->query($sql)->fetch();

    unlink('../' . $data['image']);

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
