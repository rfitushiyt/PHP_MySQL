
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            width: 100%;
        }

        .card-header-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);
            border-radius: 20px 20px 0 0 !important;
            border-bottom: none;
        }

        .form-control {
            border-radius: 10px;
            padding: 14px 16px 14px 48px;
            font-size: 1.05rem;
            border: 1px solid #bfdbfe;
        }

        .form-control:focus {
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

        .btn-custom {
            background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);
            border: none;
            border-radius: 10px;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
        }

        .btn-custom:hover {
            opacity: 0.92;
            color: white;
        }

        .form-label {
            font-weight: 600;
            color: #1e3a8a;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center">

    <div class="col-12 col-md-8 col-lg-7">

        <div class="card custom-card shadow-lg">

            <div class="card-header card-header-gradient text-white text-center py-5">

                <h2 class="mb-2 fw-bold">Product Management</h2>

                <p class="mb-0 text-white-50 fs-5">
                    Discover powerful product management tools
                    and insights to help you plan, manage, and grow
                    your products successfully.
                </p>

            </div>

            <div class="card-body p-4 p-md-5">

                <form action="add.php" method="POST">

                    <div class="mb-4">

                        <label for="name" class="form-label">
                            Name
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-box"></i>

                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Product name"
                                required
                            >

                        </div>
                    </div>

                    <div class="mb-4">

                        <label for="description" class="form-label">
                            Description
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-card-text"></i>

                            <input
                                type="text"
                                class="form-control"
                                id="description"
                                name="description"
                                placeholder="Describe product"
                                required
                            >

                        </div>
                    </div>

                    <div class="mb-4">

                        <label for="quantity" class="form-label">
                            Quantity
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-123"></i>

                            <input
                                type="number"
                                class="form-control"
                                id="quantity"
                                name="quantity"
                                placeholder="Enter quantity"
                                min="1"
                                required
                            >

                        </div>
                    </div>

                    <div class="d-grid pt-2">

                        <button
                            type="submit"
                            name="add"
                            class="btn btn-primary btn-custom shadow-sm"
                        >
                            <i class="bi bi-plus-circle me-2"></i>
                            Add Product
                        </button>

                    </div>

                  <div class="d-grid pt-2">

    <a href="dashboard.php"
       class="btn btn-primary btn-custom shadow-sm">
        Go To Dashboard
    </a>

</div>

                </form>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
