
<?php
session_start();

include_once('config.php');

// Get user ID and movie ID from SESSION
$user_id = $_SESSION['id'] ?? null;
$movie_id = $_SESSION['movie_id'] ?? null;

// Get data from details.php form
$nr_tickets = $_POST['nr_tickets'] ?? null;
$date = $_POST['date'] ?? null;
$time = $_POST['time'] ?? null;

// Check if all data exists
if (!$user_id || !$movie_id) {
    die("User ID or Movie ID is missing. Please log in again.");
}

if (!$nr_tickets || !$date || !$time) {
    die("Please complete all booking fields.");
}

// Insert booking into database
$sql = "INSERT INTO bookings(user_id, movie_id, nr_tickets, date, time)
        VALUES (:user_id, :movie_id, :nr_tickets, :date, :time)";

$insertBooking = $conn->prepare($sql);

$insertBooking->bindParam(":user_id", $user_id);
$insertBooking->bindParam(":movie_id", $movie_id);
$insertBooking->bindParam(":nr_tickets", $nr_tickets);
$insertBooking->bindParam(":date", $date);
$insertBooking->bindParam(":time", $time);

$insertBooking->execute();

header("Location: home.php");
exit();
?>


	
	











 ?>