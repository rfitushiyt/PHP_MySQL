
<?php

include_once('config.php');

// Check if register button is clicked
if (isset($_POST['submit'])) {

    // Get data from form
    $emri = trim($_POST['emri']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if all fields are filled
    if (
        empty($emri) ||
        empty($username) ||
        empty($email) ||
        empty($password) ||
        empty($confirm_password)
    ) {

        echo "Please fill in all fields.";

    }

    // Check if passwords match
    elseif ($password != $confirm_password) {

        echo "Passwords do not match.";

    }

    else {

        // Check if username or email already exists
        $sql = "SELECT id FROM users
                WHERE username = :username OR email = :email";

        $checkUser = $conn->prepare($sql);

        $checkUser->bindParam(':username', $username);
        $checkUser->bindParam(':email', $email);

        $checkUser->execute();

        $existingUser = $checkUser->fetch();

        if ($existingUser) {

            echo "Username or email already exists.";

        }

        else {

            // Hash password
            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            // Every new registered user is NOT an admin
            $is_admin = 'false';

            // Insert user into database
            $sql = "INSERT INTO users
                    (emri, username, email, password, is_admin)
                    VALUES
                    (:emri, :username, :email, :password, :is_admin)";

            $insertUser = $conn->prepare($sql);

            $insertUser->bindParam(':emri', $emri);
            $insertUser->bindParam(':username', $username);
            $insertUser->bindParam(':email', $email);
            $insertUser->bindParam(':password', $hashed_password);
            $insertUser->bindParam(':is_admin', $is_admin);

            if ($insertUser->execute()) {

                // Registration successful
                header('Location: login.php');
                exit();

            } else {

                echo "Registration failed. Please try again.";

            }

        }

    }

}

?>
