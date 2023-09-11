<?php
session_start();
$pdo = require_once "database.php";

if (!empty($_POST["name"]) || !empty($_POST["surname"]) || !empty($_POST["password"])) {
    $name = htmlentities($_POST["name"], ENT_QUOTES, "UTF-8");
    $surname = htmlentities($_POST["surname"], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");

    $query = "SELECT * FROM users WHERE name = '$name' AND surname = '$surname';";
    $stmt = $pdo->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($users) {
        foreach ($users as $user) {
            if (password_verify($password, $user["password"])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['weight'] = $user['weight'];
                $_SESSION['height'] = $user['height'];
                $_SESSION['bmi'] = $user['bmi'];
                $_SESSION['password'] = $user['password'];
                header("Location: ../dashboard.php");
            }
        }
    }
} else {
    header("Location: ../index.html");
}
