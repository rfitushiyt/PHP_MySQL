
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #eaf4fb;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #8dbbd9;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 15px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h3 {
            color: white;
            text-align: center;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 14px 18px;
            margin-bottom: 10px;
            border-radius: 10px;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #397fae;
        }

        .sidebar i {
            width: 25px;
        }

        .logout {
            margin-top: auto;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 250px;
            padding: 40px;
        }

        .main-container {
            max-width: 1100px;
            margin: 20px auto;
        }

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(65, 120, 160, 0.12);
            overflow: hidden;
        }

        .card-header {
            background: #8dbbd9;
            color: white;
            padding: 25px;
            text-align: center;
            border: none;
        }

        .card-header h2 {
            margin: 0;
            font-weight: bold;
        }

        .card-body {
            padding: 30px;
        }

        .table thead th {
            background: #c5e0f1;
            color: #345b75;
            padding: 16px;
            border: none;
        }

        .table tbody td {
            padding: 15px;
            color: #49677d;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #f0f8fd;
        }

        .btn-add {
            background: #5b9bc5;
            color: white;
            border-radius: 8px;
            padding: 11px 22px;
            border: none;
            text-decoration: none;
        }

        .btn-add:hover {
            background: #397fae;
            color: white;
        }

        .btn-update {
            background: #dc9b45;
            color: white;
            border-radius: 7px;
            padding: 7px 15px;
            text-decoration: none;
            border: none;
        }

        .btn-delete {
            background: #dc6b75;
            color: white;
            border-radius: 7px;
            padding: 7px 15px;
            border: none;
            text-decoration: none;
        }

        .footer-text {
            color: #8ba6ba;
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
        }

        /* MOBILE */
        @media(max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar h3 {
                margin-bottom: 15px;
            }

            .sidebar a {
                margin-bottom: 5px;
            }

            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<?php

include_once('config.php');

$sql = "SELECT * FROM products";
$getProducts = $conn->prepare($sql);
$getProducts->execute();
$products = $getProducts->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- SIDEBAR -->
<div class="sidebar">

    <h3>
        <i class="fa-solid fa-box"></i> My Dashboard
    </h3>

    <a href="dashboard.php">
        <i class="fa-solid fa-house"></i> Dashboard
    </a>

    <a href="products.php" class="active">
        <i class="fa-solid fa-boxes-stacked"></i> Products
    </a>

    <a href="index.php">
        <i class="fa-solid fa-plus"></i> Add Product
    </a>

    <a href="settings.php">
        <i class="fa-solid fa-gear"></i> Settings
    </a>

    <a href="logout.php" class="logout">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>

</div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <div class="container-fluid main-container">

        <div class="card">

            <div class="card-header">

                <h2>Products Management</h2>

                <p class="mb-0 mt-2">
                    Manage your products easily
                </p>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover text-center align-middle">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach($products as $product) { ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($product['id']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($product['name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($product['description']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($product['quantity']) ?>
                                </td>

                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="update.php?id=<?= urlencode($product['id']) ?>"
                                           class="btn-update">
                                            Update
                                        </a>

                                        <a href="delete.php?id=<?= urlencode($product['id']) ?>"
                                           class="btn-delete"
                                           onclick="return confirm('Are you sure you want to delete this product?');">
                                            Delete
                                        </a>

                                    </div>

                                </td>

                            </tr>

                            <?php } ?>

                            <?php if (count($products) == 0) { ?>

                            <tr>
                                <td colspan="5">No products found!</td>
                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

                <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">

                    <a href="index.php" class="btn-add">
                        + Add Products
                    </a>

                </div>


                <p class="footer-text">
                    © 2026 Products Management | All Rights Reserved
                </p>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
