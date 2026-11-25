
<?php

session_start();

require_once "config.php";

if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['is_admin']) || (int)$_SESSION['is_admin'] !== 1) {
    header("Location: dashboard.html");
    exit();
}

$sql = "SELECT id, name, username, skills, is_admin FROM users ORDER BY id DESC";
$selectUsers = $conn->prepare($sql);
$selectUsers->execute();

$users_data = $selectUsers->fetchAll(PDO::FETCH_ASSOC);

$totalUsers = count($users_data);
$totalAdmins = 0;
$totalMembers = 0;
$totalSkills = 0;

foreach ($users_data as $user) {

    if ((int)$user['is_admin'] === 1) {
        $totalAdmins++;
    } else {
        $totalMembers++;
    }

    if (!empty($user['skills'])) {
        $totalSkills++;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | SkillSwap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #080D20;
            color: #FFFFFF;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        .navbar {
            background: #0B1F3B;
            border-bottom: 1px solid rgba(99, 133, 255, 0.2);
            padding: 15px 30px;
        }

        .navbar-brand {
            font-family: 'Orbitron', sans-serif;
            font-weight: 800;
            font-size: 23px;
            color: white;
        }

        .navbar-brand span {
            color: #6385FF;
        }

        .welcome-text {
            color: #A5B1D0;
            font-size: 13px;
        }

        .logout-btn {
            color: white;
            text-decoration: none;
            background: rgba(120, 86, 255, 0.15);
            border: 1px solid rgba(120, 86, 255, 0.4);
            padding: 9px 18px;
            border-radius: 8px;
            font-size: 13px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #7856FF;
            color: white;
        }

        .sidebar {
            background: #0B1F3B;
            min-height: calc(100vh - 70px);
            padding: 30px 18px;
            border-right: 1px solid rgba(99, 133, 255, 0.15);
        }

        .sidebar-title {
            color: #6F83B5;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 2px;
            margin: 10px 12px 20px;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: #A5B1D0;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 9px;
            font-size: 13px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(99, 133, 255, 0.15);
            color: #6385FF;
        }

        .main-content {
            padding: 35px;
        }

        .page-heading {
            margin-bottom: 30px;
        }

        .page-heading h1 {
            font-size: 27px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: #A5B1D0;
            font-size: 13px;
        }

        .admin-badge {
            display: inline-block;
            background: rgba(120, 86, 255, 0.15);
            color: #A994FF;
            border: 1px solid rgba(120, 86, 255, 0.3);
            padding: 6px 13px;
            border-radius: 20px;
            font-size: 11px;
            margin-top: 10px;
        }

        .stat-card {
            background: #111C38;
            border: 1px solid rgba(99, 133, 255, 0.15);
            border-radius: 15px;
            padding: 24px;
            height: 100%;
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: #6385FF;
        }

        .stat-label {
            color: #A5B1D0;
            font-size: 12px;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: 600;
            color: white;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(99, 133, 255, 0.15);
            border-radius: 10px;
            color: #6385FF;
            font-size: 20px;
            margin-bottom: 18px;
        }

        .section-card {
            background: #111C38;
            border: 1px solid rgba(99, 133, 255, 0.15);
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .section-heading h2 {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }

        .section-heading p {
            color: #A5B1D0;
            font-size: 12px;
            margin: 6px 0 0;
        }

        .search-input {
            background: #0B1F3B;
            border: 1px solid #263B68;
            color: white;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 12px;
            max-width: 230px;
        }

        .search-input:focus {
            background: #0B1F3B;
            color: white;
            border-color: #6385FF;
            box-shadow: none;
        }

        .search-input::placeholder {
            color: #7D8BAE;
        }

        .table {
            color: #DCE4FF;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            background: #0B1F3B;
            color: #8FA5DF;
            font-size: 11px;
            font-weight: 600;
            padding: 15px;
            border-bottom: 1px solid #263B68;
            white-space: nowrap;
        }

        .table tbody td {
            background: transparent;
            color: #DCE4FF;
            font-size: 12px;
            padding: 16px 15px;
            border-bottom: 1px solid rgba(99, 133, 255, 0.1);
        }

        .table tbody tr:hover td {
            background: rgba(99, 133, 255, 0.05);
        }

        .user-id {
            color: #6385FF;
            font-weight: 600;
        }

        .role-badge {
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .admin-role {
            background: rgba(120, 86, 255, 0.15);
            color: #B6A3FF;
        }

        .member-role {
            background: rgba(52, 87, 213, 0.15);
            color: #8FA5FF;
        }

        .empty-skills {
            color: #7D8BAE;
            font-style: italic;
        }

        .footer {
            text-align: center;
            color: #6F83B5;
            font-size: 11px;
            padding: 25px 0 5px;
        }

        @media (max-width: 767px) {

            .sidebar {
                min-height: auto;
                border-right: none;
                border-bottom: 1px solid rgba(99, 133, 255, 0.15);
            }

            .main-content {
                padding: 25px 15px;
            }

            .navbar {
                padding: 15px;
            }

            .section-card {
                padding: 18px;
            }

            .search-input {
                max-width: 100%;
                width: 100%;
            }
        }

    </style>

</head>

<body>

    <nav class="navbar d-flex justify-content-between">

        <a class="navbar-brand" href="main.html">
            SKILL<span>SWAP</span>
        </a>

        <div class="d-flex align-items-center gap-3">

            <span class="welcome-text">
                Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>
            </span>

            <a href="logout.php" class="logout-btn">
                Sign Out
            </a>

        </div>

    </nav>

    <div class="container-fluid">

        <div class="row">

            <aside class="col-md-3 col-lg-2 sidebar">

                <p class="sidebar-title">ADMIN PANEL</p>

                <a href="dashboard.php" class="active">
                    ◈ Dashboard
                </a>

                <a href="main.html">
                    ◈ Main Website
                </a>

                <a href="about.html">
                    ◈ About SkillSwap
                </a>

                <a href="features.html">
                    ◈ Platform Features
                </a>

                <a href="howItWorks.html">
                    ◈ How It Works
                </a>

                <a href="dashboard.html">
                    ◈ User Dashboard
                </a>

            </aside>

            <main class="col-md-9 col-lg-10 main-content">

                <div class="page-heading">

                    <h1>Admin Dashboard</h1>

                    <p>
                        Manage your SkillSwap platform and monitor registered users.
                    </p>

                    <span class="admin-badge">
                        ADMINISTRATOR ACCESS
                    </span>

                </div>

                <div class="row g-4">

                    <div class="col-sm-6 col-xl-3">

                        <div class="stat-card">

                            <div class="stat-icon">♙</div>

                            <p class="stat-label">Total Users</p>

                            <div class="stat-number">
                                <?php echo $totalUsers; ?>
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6 col-xl-3">

                        <div class="stat-card">

                            <div class="stat-icon">♧</div>

                            <p class="stat-label">Regular Members</p>

                            <div class="stat-number">
                                <?php echo $totalMembers; ?>
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6 col-xl-3">

                        <div class="stat-card">

                            <div class="stat-icon">♛</div>

                            <p class="stat-label">Administrators</p>

                            <div class="stat-number">
                                <?php echo $totalAdmins; ?>
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6 col-xl-3">

                        <div class="stat-card">

                            <div class="stat-icon">✧</div>

                            <p class="stat-label">Users With Skills</p>

                            <div class="stat-number">
                                <?php echo $totalSkills; ?>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="section-card">

                    <div class="section-heading">

                        <div>
                            <h2>Registered Users</h2>
                            <p>View all accounts registered on SkillSwap.</p>
                        </div>

                        <input
                            type="text"
                            id="userSearch"
                            class="form-control search-input"
                            placeholder="Search users..."
                        >

                    </div>

                    <div class="table-responsive">

                        <table class="table" id="usersTable">

                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>USERNAME</th>
                                    <th>SKILLS</th>
                                    <th>ROLE</th>
                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($users_data as $user_data) { ?>

                                    <tr>

                                        <td class="user-id">
                                            #<?php echo htmlspecialchars((string)$user_data['id']); ?>
                                        </td>

                                        <td>
                                            <?php echo htmlspecialchars($user_data['name']); ?>
                                        </td>

                                        <td>
                                            <?php echo htmlspecialchars($user_data['username']); ?>
                                        </td>

                                        <td>
                                            <?php if (!empty($user_data['skills'])) { ?>

                                                <?php echo htmlspecialchars($user_data['skills']); ?>

                                            <?php } else { ?>

                                                <span class="empty-skills">
                                                    No skills added
                                                </span>

                                            <?php } ?>
                                        </td>

                                        <td>

                                            <?php if ((int)$user_data['is_admin'] === 1) { ?>

                                                <span class="role-badge admin-role">
                                                    Admin
                                                </span>

                                            <?php } else { ?>

                                                <span class="role-badge member-role">
                                                    Member
                                                </span>

                                            <?php } ?>

                                        </td>

                                    </tr>

                                <?php } ?>

                                <?php if ($totalUsers === 0) { ?>

                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No users registered yet.
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="footer">
                    © 2026 SkillSwap. All rights reserved.
                </div>

            </main>

        </div>

    </div>

    <script>

        const searchInput = document.getElementById("userSearch");

        searchInput.addEventListener("keyup", function () {

            const searchValue = this.value.toLowerCase();

            const rows = document.querySelectorAll("#usersTable tbody tr");

            rows.forEach(function (row) {

                const rowText = row.textContent.toLowerCase();

                row.style.display = rowText.includes(searchValue) ? "" : "none";

            });

        });

    </script>

</body>

</html>
