
<?php

// Including config.php file for database connection
include_once('config.php');

// If the Add Movie button in movies.php is pressed
if (isset($_POST['submit'])) {

    $movie_name = trim($_POST['movie_name']);
    $movie_desc = trim($_POST['movie_desc']);
    $movie_quality = trim($_POST['movie_quality']);
    $movie_rating = trim($_POST['movie_rating']);
    $movie_image = trim($_POST['movie_image']);

    $sql = "INSERT INTO movies
            (movie_name, movie_desc, movie_quality, movie_rating, movie_image)
            VALUES
            (:movie_name, :movie_desc, :movie_quality, :movie_rating, :movie_image)";

    $insertMovie = $conn->prepare($sql);

    $insertMovie->bindParam(':movie_name', $movie_name);
    $insertMovie->bindParam(':movie_desc', $movie_desc);
    $insertMovie->bindParam(':movie_quality', $movie_quality);
    $insertMovie->bindParam(':movie_rating', $movie_rating);
    $insertMovie->bindParam(':movie_image', $movie_image);

    $insertMovie->execute();

    header("Location: movies.php");
    exit;
}

?>
