
<?php

include_once("config.php");

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, surname, email, password)
            VALUES (:name, :surname, :email, :password)";

    $sqlQuery = $conn->prepare($sql);

    $sqlQuery->bindParam(':name', $name);
    $sqlQuery->bindParam(':surname', $surname);
    $sqlQuery->bindParam(':email', $email);
    $sqlQuery->bindParam(':password', $password);

    $sqlQuery->execute();

    header("Location: dashboard.php");
    exit();

}

?>
