<?php

$config = require_once "config.php";

$dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
$conn = new PDO($dsn, $config['user'], $config['password'], [
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

