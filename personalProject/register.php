
<?php

session_start();
require_once "config.php";

$error = "";
$success = "";

if (isset($_POST['submit'])) {

    $name = trim($_POST['name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $skills = trim($_POST['skills'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (
        empty($name) ||
        empty($username) ||
        empty($skills) ||
        empty($password) ||
        empty($confirm_password)
    ) {
        $error = "Please fill in all fields.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 8) {
        $error = "Password must contain at least 8 characters.";
    } else {

        $sql = "SELECT id FROM users WHERE username = :username LIMIT 1";
        $checkUser = $conn->prepare($sql);
        $checkUser->bindParam(':username', $username);
        $checkUser->execute();

        if ($checkUser->fetch(PDO::FETCH_ASSOC)) {

            $error = "This username is already taken.";

        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (name, username, skills, password, is_admin)
                    VALUES (:name, :username, :skills, :password, 0)";

            $insertUser = $conn->prepare($sql);

            $insertUser->bindParam(':name', $name);
            $insertUser->bindParam(':username', $username);
            $insertUser->bindParam(':skills', $skills);
            $insertUser->bindParam(':password', $hashed_password);

            if ($insertUser->execute()) {

                header("Location: login.php");
                exit();

            } else {

                $error = "Registration failed. Please try again.";

            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | SkillSwap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: #080D20;
            color: #FFFFFF;
            overflow-x: hidden;
        }

        .background-glow {
            position: fixed;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            filter: blur(130px);
            opacity: 0.22;
            pointer-events: none;
            z-index: 0;
        }

        .glow-one {
            background: #3457D5;
            top: -150px;
            left: -150px;
        }

        .glow-two {
            background: #7856FF;
            bottom: -180px;
            right: -100px;
        }

        .navbar {
            padding: 22px 7%;
            position: relative;
            z-index: 2;
        }

        .brand {
            font-family: 'Orbitron', sans-serif;
            font-size: 25px;
            font-weight: 800;
            letter-spacing: 2px;
            color: white;
            text-decoration: none;
        }

        .brand span {
            color: #6385FF;
        }

        .navbar-link {
            color: #A5B1D0;
            text-decoration: none;
            font-size: 13px;
            transition: 0.3s;
        }

        .navbar-link:hover {
            color: white;
        }

        .main-container {
            min-height: calc(100vh - 85px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 35px 20px 60px;
            position: relative;
            z-index: 1;
        }

        .register-wrapper {
            width: 100%;
            max-width: 1050px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            background: rgba(17, 28, 56, 0.82);
            border: 1px solid rgba(99, 133, 255, 0.2);
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(20px);
        }

        .left-panel {
            padding: 55px 42px;
            background: linear-gradient(145deg, #14285A, #111C38 65%, #171A43);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border: 1px solid rgba(99, 133, 255, 0.2);
            border-radius: 50%;
            right: -130px;
            top: 100px;
            box-shadow: 0 0 0 35px rgba(99, 133, 255, 0.04),
                        0 0 0 70px rgba(99, 133, 255, 0.03);
        }

        .left-content {
            position: relative;
            z-index: 1;
        }

        .eyebrow {
            display: inline-block;
            padding: 8px 14px;
            background: rgba(99, 133, 255, 0.12);
            border: 1px solid rgba(99, 133, 255, 0.3);
            border-radius: 30px;
            color: #A9BAFF;
            font-size: 10px;
            letter-spacing: 2px;
            font-weight: 600;
            margin-bottom: 28px;
        }

        .left-panel h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 34px;
            line-height: 1.5;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .left-panel h1 span {
            background: linear-gradient(90deg, #6385FF, #A58BFF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .left-panel p {
            color: #A5B1D0;
            font-size: 13px;
            line-height: 2;
            max-width: 350px;
        }

        .benefits {
            margin-top: 45px;
        }

        .benefit {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
            color: #D8E0F7;
            font-size: 12px;
        }

        .benefit-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(99, 133, 255, 0.13);
            border: 1px solid rgba(99, 133, 255, 0.2);
            border-radius: 11px;
            color: #8CA5FF;
            font-size: 17px;
        }

        .left-footer {
            color: #7180A5;
            font-size: 11px;
            margin-top: 40px;
        }

        .right-panel {
            padding: 48px 55px;
        }

        .form-heading {
            margin-bottom: 30px;
        }

        .form-heading h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .form-heading p {
            color: #8795B8;
            font-size: 12px;
        }

        .form-label {
            color: #D8E0F7;
            font-size: 11px;
            font-weight: 500;
            margin-bottom: 9px;
        }

        .input-group-custom {
            margin-bottom: 19px;
        }

        .form-control {
            background: #0B1530;
            border: 1px solid #26365E;
            border-radius: 10px;
            padding: 13px 15px;
            color: white;
            font-size: 12px;
            transition: 0.3s;
        }

        .form-control::placeholder {
            color: #667493;
        }

        .form-control:focus {
            background: #0B1530;
            border-color: #6385FF;
            color: white;
            box-shadow: 0 0 0 3px rgba(99, 133, 255, 0.12);
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #8192BB;
            cursor: pointer;
            font-size: 12px;
        }

        .toggle-password:hover {
            color: white;
        }

        .skills-note {
            color: #7180A5;
            font-size: 10px;
            margin-top: 7px;
        }

        .register-btn {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 14px;
            margin-top: 8px;
            background: linear-gradient(100deg, #3457D5, #7856FF);
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: 0.3s;
            box-shadow: 0 8px 25px rgba(69, 83, 218, 0.25);
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99, 133, 255, 0.35);
        }

        .login-text {
            text-align: center;
            color: #8795B8;
            font-size: 11px;
            margin-top: 25px;
        }

        .login-text a {
            color: #829DFF;
            text-decoration: none;
            font-weight: 600;
        }

        .login-text a:hover {
            color: white;
        }

        .alert {
            font-size: 11px;
            border-radius: 9px;
            padding: 12px 15px;
        }

        .alert-danger {
            background: rgba(255, 75, 95, 0.1);
            border: 1px solid rgba(255, 75, 95, 0.25);
            color: #FF8997;
        }

        @media (max-width: 850px) {

            .register-wrapper {
                max-width: 550px;
                grid-template-columns: 1fr;
            }

            .left-panel {
                padding: 35px;
            }

            .left-panel h1 {
                font-size: 27px;
            }

            .benefits {
                margin-top: 25px;
            }

            .left-footer {
                display: none;
            }

            .right-panel {
                padding: 40px 35px;
            }
        }

        @media (max-width: 480px) {

            .navbar {
                padding: 20px;
            }

            .brand {
                font-size: 20px;
            }

            .left-panel {
                padding: 30px 25px;
            }

            .right-panel {
                padding: 35px 25px;
            }

            .form-heading h2 {
                font-size: 21px;
            }
        }

    </style>
</head>

<body>

    <div class="background-glow glow-one"></div>
    <div class="background-glow glow-two"></div>

    <nav class="navbar d-flex justify-content-between align-items-center">

        <a href="main.html" class="brand">
            SKILL<span>SWAP</span>
        </a>

        <a href="main.html" class="navbar-link">
            Back to Home
        </a>

    </nav>

    <main class="main-container">

        <div class="register-wrapper">

            <section class="left-panel">

                <div class="left-content">

                    <span class="eyebrow">YOUR SKILLS. YOUR FUTURE.</span>

                    <h1>
                        Turn What You Know Into <span>Something More.</span>
                    </h1>

                    <p>
                        Join a community where people exchange knowledge,
                        discover new talents and grow together.
                        Your next opportunity starts here.
                    </p>

                    <div class="benefits">

                        <div class="benefit">
                            <div class="benefit-icon">✦</div>
                            <span>Share your knowledge with others</span>
                        </div>

                        <div class="benefit">
                            <div class="benefit-icon">↗</div>
                            <span>Discover skills worth learning</span>
                        </div>

                        <div class="benefit">
                            <div class="benefit-icon">∞</div>
                            <span>Build connections and grow together</span>
                        </div>

                    </div>

                </div>

                <div class="left-footer">
                    © 2026 SkillSwap. Learn. Share. Grow.
                </div>

            </section>

            <section class="right-panel">

                <div class="form-heading">

                    <h2>Create Account</h2>

                    <p>
                        Start your SkillSwap journey by creating your account.
                    </p>

                </div>

                <?php if (!empty($error)): ?>

                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($error); ?>
                    </div>

                <?php endif; ?>

                <form action="register.php" method="POST">

                    <div class="input-group-custom">

                        <label class="form-label">Full Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter your full name"
                            value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"
                            required
                        >

                    </div>

                    <div class="input-group-custom">

                        <label class="form-label">Username</label>

                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="Choose a username"
                            value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                            required
                        >

                    </div>

                    <div class="input-group-custom">

                        <label class="form-label">Your Skills</label>

                        <input
                            type="text"
                            name="skills"
                            class="form-control"
                            placeholder="e.g. HTML, Design, Photography"
                            value="<?php echo htmlspecialchars($_POST['skills'] ?? ''); ?>"
                            required
                        >

                        <div class="skills-note">
                            Enter the skills you already have and can share.
                        </div>

                    </div>

                    <div class="input-group-custom">

                        <label class="form-label">Password</label>

                        <div class="password-wrapper">

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Create a password"
                                required
                            >

                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('password', this)"
                            >
                                SHOW
                            </button>

                        </div>

                    </div>

                    <div class="input-group-custom">

                        <label class="form-label">Confirm Password</label>

                        <div class="password-wrapper">

                            <input
                                type="password"
                                name="confirm_password"
                                id="confirm_password"
                                class="form-control"
                                placeholder="Confirm your password"
                                required
                            >

                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('confirm_password', this)"
                            >
                                SHOW
                            </button>

                        </div>

                    </div>

                    <button type="submit" name="submit" class="register-btn">
                        CREATE ACCOUNT →
                    </button>

                </form>

                <div class="login-text">
                    Already have an account?
                    <a href="login.php">Log In</a>
                </div>

            </section>

        </div>

    </main>

    <script>

        function togglePassword(inputId, button) {

            const input = document.getElementById(inputId);

            if (input.type === "password") {
                input.type = "text";
                button.textContent = "HIDE";
            } else {
                input.type = "password";
                button.textContent = "SHOW";
            }

        }

    </script>

</body>
</html>
