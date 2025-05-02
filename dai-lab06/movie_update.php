<?php
require_once('./connection/BaseMySql.php');
require_once('./model/Movie.php');
require_once('./database/MovieDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    $awards = $_POST['awards'];
    $release_year = $_POST['release_year'];
    $length = $_POST['length'];
    $genre_id = $_POST['genre_id'];

    $movie = new Movie($id, $title, $rating, $awards, $release_year, $length, $genre_id);

    $bd = BaseMySql::conexion();

    $movieDB = new MovieDB();
    $movieDB->actualizar($bd, $movie);

    BaseMySql::close($bd);

    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
