
<?php

include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_INT);

    if ($name === '' || $description === '' || $quantity === false || $quantity < 1) {
        die("Please enter valid product information.");
    }

    $sql = "INSERT INTO products (name, description, quantity)
            VALUES (:name, :description, :quantity)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':name' => $name,
        ':description' => $description,
        ':quantity' => $quantity
    ]);

    header("Location: dashboard.php");
    exit();

} else {

    header("Location: index.php");
    exit();

}

?>
