<?php
$conn = @new mysqli('localhost', 'root', '', 'bmi');


if ($conn->connect_errno != 0) {
    echo "Error: ".$conn->connect_errno;
} else {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = "SELECT * FROM Users WHERE name = '$name' AND surname = '$surname' AND password = '$password'";

    if ($result = @$conn->query($stmt)) {
        $num_users = $result->num_rows;
        echo $num_users;
        if ($num_users = 0) {
            header("Location: ../create-account.html");
        }
    }
    $conn->close();
}