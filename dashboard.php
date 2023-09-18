<?php
$db = require_once "php/database.php";
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.html");
}
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
    <h2>Twoje zapisane poprzednie BMI</h2>
    <?php
    $result = $db->query("SELECT * FROM users WHERE id = '{$_SESSION['id']}'")->fetch(PDO::FETCH_ASSOC);
    echo "<p>BMI: {$result['bmi']}<br>
            Wzrost: {$result['height']}<br>
            Waga: {$result['weight']}<br>
        </p>";
    ?>
    <script src="scripts/calculator.js"></script>
</main>
</body>
</html>