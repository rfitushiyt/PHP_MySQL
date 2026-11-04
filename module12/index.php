
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
            background: linear-gradient(135deg, #e0f2fe 0%, #dbeafe 100%);
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
            background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);
            border-radius: 20px 20px 0 0 !important;
            border-bottom: none;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 14px 16px 14px 48px;
            font-size: 1.05rem;
            border: 1px solid #bfdbfe;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        .input-group-custom {
            position: relative;
        }

        .input-group-custom i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #3b82f6;
            z-index: 10;
            font-size: 1.25rem;
        }

        .form-check-input:checked {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        .form-check-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        .btn-custom {
            background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);
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
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.25);
        }

        .btn-custom:active {
            transform: scale(0.98);
        }

        .form-label {
            font-weight: 600;
            color: #1e3a8a;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .text-pink-muted {
            color: #3b82f6;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center">

    <div class="col-12 col-md-8 col-lg-7">

        <div class="card custom-card shadow-lg">

            <div class="card-header card-header-gradient text-white text-center py-5">

                <h2 class="mb-2 fw-bold">Sign In</h2>

                <p class="mb-0 text-white-50 fs-5">
                    Please sign in your account to see more!
                </p>

            </div>

            <div class="card-body p-4 p-md-5">

                <form action="add.php" method="POST">

                    <!-- Full Name -->
                    <div class="mb-4">

                        <label for="name" class="form-label">
                             Name
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-person-heart"></i>

                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Jane"
                                required
                            >

                        </div>
                    </div>

                     <div class="mb-4">

                        <label for="surname" class="form-label">
                             Surname
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-person-heart"></i>

                            <input
                                type="text"
                                class="form-control"
                                id="surname"
                                name="surname"
                                placeholder="Doe"
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
