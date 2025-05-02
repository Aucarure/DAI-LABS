<?php
require_once('./connection/BaseMySql.php');
require_once('./model/Movie.php');
require_once('./database/MovieDB.php');


// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    $awards = $_POST['awards'];
    $release_year = $_POST['release_year'];
    $length = $_POST['length'];
    $genre_id = $_POST['genre_id'];
   
    // Crear objeto Movie (el primer parámetro es el ID que será asignado por la BD)
    $movie = new Movie(0, $title, $rating, $awards, $release_year, $length, $genre_id);
   
    // Conexión a la base de datos
    $bd = BaseMySql::conexion();
   
    // Insertar película
    $movieDB = new MovieDB();
    $movieDB->agregar($bd, $movie);
   
    // Cerrar conexión
    BaseMySql::close($bd);
   
    // Redireccionar a la página principal
    header("Location: index.php");
    exit();
} else {
    // Si no se envió por POST, redireccionar
    header("Location: movie_new.php");
    exit();
}
?>
