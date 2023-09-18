<?php
session_start();
$db = require_once 'database.php';
$db->query("UPDATE users 
                    set weight = '{$_COOKIE['weightToSave']}',
                        height = '{$_COOKIE['heightToSave']}',
                        bmi = '{$_COOKIE['bmiToSave']}'
                    WHERE id = '{$_SESSION['id']}'");
header("Location: ../dashboard.php");