<?php

$dsn = 'mysql:dbname=mysql;host=172.18.0.1;port=33060';
$user = 'root';
$password = '123456789';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

echo "string";

phpinfo();
