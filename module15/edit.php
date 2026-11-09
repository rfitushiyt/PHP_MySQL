
<?php

include_once('config.php');

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM products WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);

$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Product not found!");
}

if (isset($_POST['update'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_INT);

    if ($name === '' || $description === '' || $quantity === false || $quantity < 1) {
        $error = "Please enter valid information!";
    } else {

        $sql = "UPDATE products
                SET name = :name,
                    description = :description,
                    quantity = :quantity
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':quantity' => $quantity,
            ':id' => $id
        ]);

        header("Location: dashboard.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Product</title>

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

        .form-label {
            font-weight: 600;
            color: #1e3a8a;
            font-size: 0.95rem;
            margin-bottom: 8px;
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

        .btn-back {
            background: #91b8d3;
            color: white;
            border-radius: 10px;
            padding: 12px;
            text-decoration: none;
            text-align: center;
        }

        .btn-back:hover {
            background: #648eae;
            color: white;
        }
    </style>

</head>

<body>

<div class="container d-flex justify-content-center">

    <div class="col-12 col-md-8 col-lg-7">

        <div class="card custom-card shadow-lg">

            <div class="card-header card-header-gradient text-white text-center py-5">

                <h2 class="mb-2 fw-bold">Update Product</h2>

                <p class="mb-0 text-white-50 fs-5">
                    Edit and update your product information
                </p>

            </div>

            <div class="card-body p-4 p-md-5">

                <?php if (isset($error)) { ?>

                    <div class="alert alert-danger">
                        <?= htmlspecialchars($error) ?>
                    </div>

                <?php } ?>

                <form action="edit.php?id=<?= $id ?>" method="POST">

                    <div class="mb-4">

                        <label class="form-label" for="name">
                            Name
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-box"></i>

                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="<?= htmlspecialchars($product['name']) ?>"
                                placeholder="Product name"
                                required
                            >

                        </div>
                    </div>

                    <div class="mb-4">

                        <label class="form-label" for="description">
                            Description
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-card-text"></i>

                            <input
                                type="text"
                                class="form-control"
                                id="description"
                                name="description"
                                value="<?= htmlspecialchars($product['description']) ?>"
                                placeholder="Product description"
                                required
                            >

                        </div>
                    </div>

                    <div class="mb-4">

                        <label class="form-label" for="quantity">
                            Quantity
                        </label>

                        <div class="input-group-custom">

                            <i class="bi bi-123"></i>

                            <input
                                type="number"
                                class="form-control"
                                id="quantity"
                                name="quantity"
                                value="<?= htmlspecialchars($product['quantity']) ?>"
                                min="1"
                                placeholder="Quantity"
                                required
                            >

                        </div>
                    </div>

                    <div class="d-grid gap-3 pt-2">

                        <button
                            type="submit"
                            name="update"
                            class="btn btn-primary btn-custom"
                        >
                            <i class="bi bi-pencil-square me-2"></i>
                            Save Changes
                        </button>

                        <a href="dashboard.php" class="btn-back">
                            Back to Dashboard
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
