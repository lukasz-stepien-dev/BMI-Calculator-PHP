<?php
session_start();
$pdo = require_once "database.php";

if (!empty($_POST["name"]) || !empty($_POST["surname"]) || !empty($_POST["password"])) {
    $name = htmlentities($_POST["name"], ENT_QUOTES, "UTF-8");
    $surname = htmlentities($_POST["surname"], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $user = $pdo->query("SELECT * FROM users 
         WHERE name = '$name' AND surname = '$surname' AND password = '$hashed_password'");
    $user->fetch(PDO::FETCH_ASSOC);
    echo var_dump($user);
}
