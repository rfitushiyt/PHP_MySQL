
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">

    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16">

    <style>

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-floating {
            margin: 10px;
        }

        .form-signin input {
            border-radius: 5px;
        }

    </style>

</head>

<body class="text-center">

    <main class="form-signin">

        <form action="register.php" method="post">

            <img class="mb-4"
            src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg"
            alt="Bootstrap Logo"
            width="72"
            height="57">

            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-floating">

                <input type="text"
                class="form-control"
                id="emri"
                placeholder="Emri"
                name="emri"
                required>

                <label for="emri">Emri</label>

            </div>

            <div class="form-floating">

                <input type="text"
                class="form-control"
                id="username"
                placeholder="Username"
                name="username"
                required>

                <label for="username">Username</label>

            </div>

            <div class="form-floating">

                <input type="email"
                class="form-control"
                id="email"
                placeholder="Email"
                name="email"
                required>

                <label for="email">Email</label>

            </div>

            <div class="form-floating">

                <input type="password"
                class="form-control"
                id="password"
                placeholder="Password"
                name="password"
                required>

                <label for="password">Password</label>

            </div>

            <div class="form-floating">

                <input type="password"
                class="form-control"
                id="confirm_password"
                placeholder="Confirm Password"
                name="confirm_password"
                required>

                <label for="confirm_password">Confirm Password</label>

            </div>

            <div class="checkbox mb-3">

                <label>
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>

            </div>

            <button class="w-100 btn btn-lg btn-primary"
            type="submit"
            name="submit">

                Sign up

            </button>

            <p class="mt-3">

                Already have an account:

                <a href="login.php">Sign in</a>

            </p>

        </form>

    </main>

</body>

</html>
