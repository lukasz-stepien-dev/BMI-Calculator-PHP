<?php
$conn = @new mysqli('localhost', 'root', '', 'bmi');


if ($conn->connect_errno != 0) {
    echo "Error: ".$conn->connect_errno;
} else {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];

    $stmt = "SELECT * FROM users WHERE name = '$name' AND surname = '$surname' AND password = '$password'";

    if ($result = @$conn->query($stmt)) {
        $num_users = $result->num_rows;
        if ($num_users = 0) {
            
        }
    }
    $conn->close();
}