<?php
session_start();
$pdo = require_once "database.php";



if (!isset($_POST['wrongPassword'])) {
    $pdo->query("INSERT INTO users(name, surname, password, weight, height, bmi) VALUES 
                ('{$_SESSION['name']}','{$_SESSION['surname']}','{$_SESSION['password']}', 0, 0, 0)");
    header("Location: ../dashboard.php");
} else {
    header("Location: ../index.html");
}