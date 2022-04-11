<?php

if (!(isset($_COOKIE['login']) && isset($_COOKIE['password'])))
    exit('<meta http-equiv="refresh" content="0;url=../admin/login.html">');


require('config.php');


try {
    $id = $_GET['id'];

    $sql = "SELECT image FROM yangiliklar WHERE id=$id";
    $data = $conn->query($sql)->fetch();

    unlink('../' . $data['image']);

    $sql = "DELETE FROM yangiliklar WHERE id=$id";
    $conn->exec($sql);

    echo '<meta http-equiv="refresh" content="0;url=../admin/yangiliklar.php">';
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
