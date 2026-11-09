
<?php

include_once('config.php');

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {

    $id = (int) $_GET['id'];

    $sql = "DELETE FROM products WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    header("Location: dashboard.php");
    exit();

} else {

    header("Location: dashboard.php");
    exit();

}

?>
