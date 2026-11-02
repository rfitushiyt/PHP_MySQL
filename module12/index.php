
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Account</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #fff0f5 0%, #ffe4e1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .custom-card {
            border: none;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            width: 100%;
        }

        .card-header-gradient {
            background: linear-gradient(135deg, #ec4899 0%, #f43f5e 100%);
            border-radius: 20px 20px 0 0 !important;
            border-bottom: none;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 14px 16px 14px 48px;
            font-size: 1.05rem;
            border: 1px solid #fbcfe8;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus, .form-select:focus {
            border-color: #ec4899;
            box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
        }

        .input-group-custom {
            position: relative;
        }

        .input-group-custom i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #f472b6;
            z-index: 10;
            font-size: 1.25rem;
        }

        .form-check-input:checked {
            background-color: #ec4899;
            border-color: #ec4899;
        }

        .form-check-input:focus {
            border-color: #ec4899;
            box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
        }

        .btn-custom {
            background: linear-gradient(135deg, #ec4899 0%, #f43f5e 100%);
            border: none;
            border-radius: 10px;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: white;
            transition: transform 0.1s ease, opacity 0.2s ease;
        }

        .btn-custom:hover {
            opacity: 0.92;
            color: white;
            box-shadow: 0 6px 16px rgba(236, 72, 153, 0.35);
        }

        .btn-custom:active {
            transform: scale(0.98);
        }

        .form-label {
            font-weight: 600;
            color: #4c1d95;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .text-pink-muted {
            color: #db2777;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center">

    <div class="col-12 col-md-8 col-lg-7">

        <div class="card custom-card shadow-lg">

            <div class="card-header card-header-gradient text-white text-center py-5">

                <h2 class="mb-2 fw-bold">Create Account</h2>

                <p class="mb-0 text-white-50 fs-5">
                    Join our beautiful community today!
                </p>

            </div>

            <div class="card-body p-4 p-md-5">

                <form action="add.php" method="POST">

                    <!-- Full Name -->
                    <div class="mb-4">

                        <label for="fullName" class="form-label">
                            Full Name
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-person-heart"></i>

                            <input
                                type="text"
                                class="form-control"
                                id="fullName"
                                name="fullname"
                                placeholder="John Doe"
                                required
                            >

                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">

                        <label for="emailAddress" class="form-label">
                            Email Address
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-envelope-heart"></i>

                            <input
                                type="email"
                                class="form-control"
                                id="emailAddress"
                                name="email"
                                placeholder="name@example.com"
                                required
                            >

                        </div>

                        <div class="form-text mt-2 text-pink-muted">

                            <i class="bi bi-heart-lock-fill"></i>
                            We'll never share your email with anyone else.

                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">

                        <label for="password" class="form-label">
                            Password
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-shield-lock-fill"></i>

                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                required
                                minlength="8"
                            >

                        </div>
                    </div>

                    <!-- City -->
                    <div class="mb-4">

                        <label for="city" class="form-label">
                            City
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-geo-alt-fill"></i>

                            <select
                                class="form-select"
                                id="city"
                                name="city"
                                required
                            >

                                <option value="" selected disabled>
                                    Select your city...
                                </option>

                                <option value="pristina">Pristina</option>
                                <option value="tirana">Tirana</option>
                                <option value="prizren">Prizren</option>
                                <option value="shkoder">Shkodër</option>

                            </select>

                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-4 form-check d-flex align-items-center">

                        <input
                            type="checkbox"
                            class="form-check-input mt-0 me-2"
                            id="rememberMe"
                            name="rememberMe"
                            value="1"
                            style="width: 1.2rem; height: 1.2rem;"
                        >

                        <label
                            class="form-check-label text-secondary fs-6"
                            for="rememberMe"
                        >
                            Remember me on this device
                        </label>

                    </div>

                    <!-- Submit -->
                    <div class="d-grid pt-2">

                        <button
                            type="submit"
                            name="submit"
                            class="btn btn-primary btn-custom shadow-sm"
                        >
                            Sign Up
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

