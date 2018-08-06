<?php

$dsn = 'mysql:dbname=sys;host=mysql;port=3306';
$user = 'root';
$password = '123456789';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

echo "string";

phpinfo();
