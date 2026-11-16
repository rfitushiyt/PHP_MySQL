
<?php

session_start();

include_once('config.php');

$error = "";

// Check if login button is clicked
if (isset($_POST['submit'])) {

    // Get username and password
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Check if fields are empty
    if (empty($username) || empty($password)) {

        $error = "Please fill in all fields.";

    } else {

        // Select user from database
        $sql = "SELECT id, emri, username, email, password, is_admin
                FROM users
                WHERE username = :username";

        $selectUser = $conn->prepare($sql);

        $selectUser->bindParam(':username', $username);

        $selectUser->execute();

        // Get user data
        $data = $selectUser->fetch(PDO::FETCH_ASSOC);

        // Check if user exists
        if ($data == false) {

            $error = "The user does not exist.";

        } else {

            // Check password
            if (password_verify($password, $data['password'])) {

                // Create a new session ID
                session_regenerate_id(true);

                // Store user information
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['emri'] = $data['emri'];

                // Check if user is admin
                if (
                    strtolower(trim((string)$data['is_admin'])) == 'true' ||
                    $data['is_admin'] == 1
                ) {

                    $_SESSION['is_admin'] = 'true';

                    // Redirect admin to dashboard
                    header('Location: dashboard.php');
                    exit();

                } else {

                    $_SESSION['is_admin'] = 'false';

                    // Redirect normal user to home page
                    header('Location: home.php');
                    exit();

                }

            } else {

                $error = "The password is not valid.";

            }

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <style>

        body {
            background-color: #f4f4f4;
        }

        .login-container {
            max-width: 420px;
            margin: 100px auto;
            padding: 35px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-login {
            width: 100%;
            background-color: #212529;
            color: white;
        }

        .btn-login:hover {
            background-color: #444;
            color: white;
        }

    </style>

</head>

<body>

    <div class="container">

        <div class="login-container">

            <h2>Sign In</h2>

            <!-- Display error message -->

            <?php if (!empty($error)) { ?>

                <div class="alert alert-danger">

                    <?php echo htmlspecialchars($error); ?>

                </div>

            <?php } ?>

            <!-- Login Form -->

            <form method="POST" action="">

                <div class="mb-3">

                    <label class="form-label">Username</label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Enter your username"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">Password</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required
                    >

                </div>

                <button
                    type="submit"
                    name="submit"
                    class="btn btn-login">

                    Sign In

                </button>

            </form>

        </div>

    </div>

</body>

</html>
