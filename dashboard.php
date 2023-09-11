<?php
require_once "php/database.php";
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<header>
    <h1>Dzień Dobry, <?php echo $_SESSION["name"] ?></h1>
</header>
<main>
    <h2>Kalkulator BMI</h2>
    <form action="dashboard.php" method="post">
        <label for="height">Podaj wzrost</label><br>
        <input type="number" name="height" id="height"><br>
        <label for="weight">Podaj wagę</label><br>
        <input type="number" name="weight" id="weight"><br>
        <input type="submit" value="Oblicz" id="calc">
    </form>
    <p class="info"></p>
    <h2>Twoje poprzednie BMI</h2>
    <?php
    echo "<p>Waga: {$_SESSION['weight']}<br>
            Wzrost: {$_SESSION['height']}<br>
            BMI: {$_SESSION['bmi']}
        </p>"
    ?>
    <script src="scripts/calculator.js"></script>
</main>
</body>
</html>