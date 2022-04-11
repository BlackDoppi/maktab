<?php

require('config.php');


$login = $_POST['login'];
$password = $_POST['password'];

try {
    $sql = "SELECT * FROM admin WHERE id=1 AND login='$login' AND password='$password'";
    $data = $conn->query($sql)->fetch();

    if ($data != NULL) {
        setcookie('login', $login, time() + (60), "/");
        setcookie('password', $password, time() + (60), "/");
        echo '<meta http-equiv="refresh" content="0;url=../admin/index.php">';
    } else {
        echo '<script>history.back()</script>';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
