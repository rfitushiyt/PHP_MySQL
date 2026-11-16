
<?php
session_start();

include_once('config.php');

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 'true';

// If user is admin, show all bookings
if ($is_admin) {

    $sql = "SELECT movies.movie_name, users.email,
            bookings.id, bookings.nr_tickets,
            bookings.date, bookings.is_approved,
            bookings.time
            FROM movies
            INNER JOIN bookings ON movies.id = bookings.movie_id
            INNER JOIN users ON users.id = bookings.user_id";

    $selectBookings = $conn->prepare($sql);
    $selectBookings->execute();

} else {

    // If user is not admin, show only their bookings
    $sql = "SELECT movies.movie_name, users.email,
            bookings.nr_tickets, bookings.date,
            bookings.is_approved, bookings.time
            FROM movies
            INNER JOIN bookings ON movies.id = bookings.movie_id
            INNER JOIN users ON users.id = bookings.user_id
            WHERE bookings.user_id = :user_id";

    $selectBookings = $conn->prepare($sql);
    $selectBookings->bindParam(':user_id', $user_id);
    $selectBookings->execute();
}

$bookings_data = $selectBookings->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bookings Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet">
</head>

<body>

<header class="navbar navbar-dark sticky-top bg-dark p-3">

    <a class="navbar-brand" href="#">
        <?php echo "Welcome to dashboard " . htmlspecialchars($_SESSION['username']); ?>
    </a>

    <a class="nav-link text-white" href="logout.php">
        Sign out
    </a>

</header>

<div class="container-fluid">

    <div class="row">

        <!-- Sidebar -->

        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">

            <div class="position-sticky pt-3">

                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="home.php">
                            Home
                        </a>
                    </li>

                    <?php if ($is_admin) { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="list_movies.php">
                                Movies
                            </a>
                        </li>

                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="bookings.php">
                            Bookings
                        </a>
                    </li>

                </ul>

            </div>

        </nav>

        <!-- Main content -->

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between
            flex-wrap flex-md-nowrap align-items-center
            pt-3 pb-2 mb-3 border-bottom">

                <h1 class="h2">Dashboard</h1>

            </div>

            <h2>Movie Bookings</h2>

            <div class="table-responsive">

                <table class="table table-striped table-sm">

                    <thead>

                        <tr>
                            <th>Movie Name</th>
                            <th>User Email</th>
                            <th>Number of Tickets</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Approved</th>

                            <?php if ($is_admin) { ?>
                                <th>Actions</th>
                            <?php } ?>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($bookings_data as $booking_data) { ?>

                            <tr>

                                <td>
                                    <?php echo htmlspecialchars($booking_data['movie_name']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($booking_data['email']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($booking_data['nr_tickets']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($booking_data['date']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($booking_data['time']); ?>
                                </td>

                                <td>
                                    <?php
                                    echo $booking_data['is_approved'] == 1
                                        ? 'Approved'
                                        : 'Pending';
                                    ?>
                                </td>

                                <?php if ($is_admin) { ?>

                                    <td>

                                        <a href="approve.php?id=<?php echo $booking_data['id']; ?>"
                                        class="btn btn-success btn-sm">
                                            Approve
                                        </a>

                                        <a href="decline.php?id=<?php echo $booking_data['id']; ?>"
                                        class="btn btn-danger btn-sm">
                                            Decline
                                        </a>

                                    </td>

                                <?php } ?>

                            </tr>

                        <?php } ?>

                        <?php if (empty($bookings_data)) { ?>

                            <tr>
                                <td colspan="<?php echo $is_admin ? 7 : 6; ?>"
                                class="text-center">
                                    No bookings found.
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </main>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
