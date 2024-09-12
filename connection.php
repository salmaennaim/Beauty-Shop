<?php

$dsn = 'mysql:host=localhost;dbname=test5';
$username = 'root';
$password = '';

try
{
    $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e)
{
    echo "Connection faild: " . $e->getMessage();
}
