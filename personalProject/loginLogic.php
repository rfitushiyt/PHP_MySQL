
<?php

session_start();

require_once "config.php";

if (isset($_POST['submit'])) {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {

        $_SESSION['login_error'] = "Please fill in all fields.";

        header("Location: login.php");
        exit();

    }

    $sql = "SELECT id, name, username, password, skills, is_admin
            FROM users
            WHERE username = :username
            LIMIT 1";

    $selectUser = $conn->prepare($sql);

    $selectUser->bindParam(':username', $username);

    $selectUser->execute();

    $data = $selectUser->fetch(PDO::FETCH_ASSOC);

    if (!$data) {

        $_SESSION['login_error'] = "Username does not exist.";

        header("Location: login.php");
        exit();

    }

    if (!password_verify($password, $data['password'])) {

        $_SESSION['login_error'] = "Incorrect password.";

        header("Location: login.php");
        exit();

    }

    session_regenerate_id(true);

    $_SESSION['id'] = $data['id'];
    $_SESSION['name'] = $data['name'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['skills'] = $data['skills'];
    $_SESSION['is_admin'] = (int)$data['is_admin'];

    if ((int)$data['is_admin'] === 1) {

        header("Location: dashboard.php");
        exit();

    } else {

        header("Location: main.php");
        exit();

    }

} else {

    header("Location: login.php");
    exit();

}

?>
