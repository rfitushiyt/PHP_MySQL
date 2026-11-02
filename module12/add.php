
<?php

include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $city = $_POST['city'] ?? '';

    $remember = isset($_POST['rememberMe']) ? 1 : 0;

    // Kontrollimi i fushave
    if (
        empty($fullname) ||
        empty($email) ||
        empty($password) ||
        empty($city)
    ) {
        die("Please fill in all fields!");
    }

    // Kontrollimi i email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address!");
    }

    // Kontrollimi i password
    if (strlen($password) < 8) {
        die("Password must contain at least 8 characters!");
    }

    // Enkriptimi i password
    $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    try {

        $sql = "INSERT INTO user
        (fullname, email, password, city, remember_me)
        VALUES
        (:fullname, :email, :password, :city, :remember)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':fullname' => $fullname,
            ':email' => $email,
            ':password' => $hashedPassword,
            ':city' => $city,
            ':remember' => $remember
        ]);

        echo "
        <div style='
            text-align:center;
            margin-top:100px;
            font-family:Arial;
        '>
            <h2 style='color:green;'>
                Registration Successful!
            </h2>

            <p>Your account has been created successfully.</p>

            <a href='index.php'>Go Back</a>
        </div>
        ";

    } catch (PDOException $e) {

        if ($e->getCode() == 23000) {

            echo "This email is already registered!";

        } else {

            echo "Something went wrong!";

        }

    }

} else {

    header("Location: index.php");
    exit();

}

?>
