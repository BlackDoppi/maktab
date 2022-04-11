<?php

if (!(isset($_COOKIE['login']) && isset($_COOKIE['password'])))
    exit('<meta http-equiv="refresh" content="0;url=../admin/login.html">');


require('config.php');


$text = $_POST['text'];

try {
    $sql = "UPDATE qabul SET text='$text' WHERE id=1";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo '<script>history.back()</script>';
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
