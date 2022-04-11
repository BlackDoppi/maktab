<?php

// Bazaga ulanish
$HOST = 'localhost:3306';
$USERNAME = 'yangiyol_admin';
$PASSWORD = '.TXkQ5j.HvYTFG5';
$DBNAME = 'yangiyol_maktab';

try {
    $conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $USERNAME, $PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
