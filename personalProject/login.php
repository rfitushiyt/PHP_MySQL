
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SkillSwap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #080D20;
            font-family: 'Poppins', sans-serif;
            color: #FFFFFF;
            padding: 30px 15px;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
            background: #111C38;
            border: 1px solid rgba(99, 133, 255, 0.2);
            border-radius: 20px;
            padding: 45px 40px;
            box-shadow: 0 0 40px rgba(52, 87, 213, 0.12);
        }

        .logo {
            font-family: 'Orbitron', sans-serif;
            font-size: 27px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 12px;
            color: #FFFFFF;
        }

        .logo span {
            color: #6385FF;
        }

        .subtitle {
            text-align: center;
            color: #A5B1D0;
            font-size: 13px;
            margin-bottom: 35px;
        }

        h2 {
            text-align: center;
            font-size: 25px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .description {
            text-align: center;
            color: #A5B1D0;
            font-size: 13px;
            margin-bottom: 30px;
        }

        .form-label {
            color: #DCE4FF;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .form-control {
            background: #0B1F3B;
            border: 1px solid #263B68;
            color: #FFFFFF;
            padding: 13px 15px;
            border-radius: 10px;
            font-size: 14px;
        }

        .form-control:focus {
            background: #0B1F3B;
            color: #FFFFFF;
            border-color: #6385FF;
            box-shadow: 0 0 0 3px rgba(99, 133, 255, 0.15);
        }

        .form-control::placeholder {
            color: #7D8BAE;
        }

        .form-check {
            margin: 18px 0 25px;
        }

        .form-check-label {
            color: #A5B1D0;
            font-size: 12px;
        }

        .form-check-input {
            background-color: #0B1F3B;
            border-color: #6385FF;
        }

        .form-check-input:checked {
            background-color: #6385FF;
            border-color: #6385FF;
        }

        .login-btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #3457D5, #7856FF);
            color: white;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 133, 255, 0.3);
        }

        .register-text {
            text-align: center;
            margin-top: 25px;
            color: #A5B1D0;
            font-size: 13px;
        }

        .register-text a {
            color: #6385FF;
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
        }

        .register-text a:hover {
            color: #FFFFFF;
        }

        .back-home {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #A5B1D0;
            text-decoration: none;
            font-size: 12px;
        }

        .back-home:hover {
            color: #6385FF;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

    <main class="login-container">

        <div class="logo">SKILL<span>SWAP</span></div>
        <p class="subtitle">Share Skills. Exchange Knowledge. Grow Together.</p>

        <h2>Welcome Back!</h2>
        <p class="description">Sign in to continue your SkillSwap journey.</p>

        <form action="loginLogic.php" method="POST">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="1"
                    id="remember"
                    name="remember"
                >
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <button type="submit" name="submit" class="login-btn">
                Sign In
            </button>

        </form>

        <p class="register-text">
            Don't have an account?
            <a href="register.php">Sign Up</a>
        </p>

        <a href="main.html" class="back-home">← Back to Home</a>

    </main>

</body>
</html>
