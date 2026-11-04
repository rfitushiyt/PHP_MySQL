
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Users Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eaf4fb;
            font-family: Arial, sans-serif;
        }

        .main-container {
            max-width: 1000px;
            margin: 70px auto;
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
        }

        .btn-add:hover {
            background: #397fae;
            color: white;
        }

        .btn-signin {
            background: #91b8d3;
            color: white;
            border-radius: 8px;
            padding: 11px 22px;
            border: none;
        }

        .btn-signin:hover {
            background: #648eae;
            color: white;
        }

        .btn-delete {
            background: #dc6b75;
            color: white;
            border-radius: 7px;
            padding: 7px 15px;
            border: none;
            text-decoration: none;
        }

        .btn-delete:hover {
            background: #bd4652;
            color: white;
        }

        .footer-text {
            color: #8ba6ba;
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
        }
    </style>
</head>

<body>

<?php
include_once('config.php');

$sql = "SELECT * FROM users";
$getUsers = $conn->prepare($sql);
$getUsers->execute();
$users = $getUsers->fetchAll();
?>

<div class="container main-container">

    <div class="card">

        <div class="card-header">
            <h2>Users Management</h2>
            <p class="mb-0 mt-2">Manage your registered users</p>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover text-center align-middle">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach($users as $user) { ?>

                        <tr>
                            <td>
                                <?= htmlspecialchars($user['id']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['name']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['surname']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['email']) ?>
                            </td>

                            <td>
                                <a href="delete.php?id=<?= urlencode($user['id']) ?>"
                                   class="btn-delete"
                                   onclick="return confirm('Are you sure you want to delete this user?');">
                                    Delete
                                </a>
                            </td>
                        </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

            <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">

                <a href="index1.php" class="btn btn-add">
                    + Add Users
                </a>

                <a href="index.php" class="btn btn-signin">
                    Sign In
                </a>

            </div>

            <p class="footer-text">
                © 2026 Users Management | All Rights Reserved
            </p>

        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
