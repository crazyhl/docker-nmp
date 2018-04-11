<?php

$dsn = 'mysql:dbname=db;host=172.18.0.1;port=33060';
$user = 'crazyhl';
$password = '123456789';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
