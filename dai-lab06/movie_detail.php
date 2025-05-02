<?php
require_once('./layout/header.php');
require_once('./connection/BaseMySql.php');
require_once('./database/MovieDB.php');

// Verificar si se envió un ID
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$bd = BaseMySql::conexion();

$movieDB = new MovieDB();
$pelicula = $movieDB->detalle($bd, $id);

BaseMySql::close($bd);
?>

<div class="container mt-4">
    <div class="fs-1 text-center mb-4">Detalle de la Película</div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-info text-white">
                    Información completa
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> <?php echo $pelicula->getId(); ?></li>
                        <li class="list-group-item"><strong>Título:</strong> <?php echo $pelicula->getTitle(); ?></li>
                        <li class="list-group-item"><strong>Calificación:</strong> <?php echo $pelicula->getRating(); ?></li>
                        <li class="list-group-item"><strong>Premios:</strong> <?php echo $pelicula->getAwards(); ?></li>
                        <li class="list-group-item"><strong>Año de estreno:</strong> <?php echo $pelicula->getReleaseYear(); ?></li>
                        <li class="list-group-item"><strong>Duración:</strong> <?php echo $pelicula->getLength(); ?> minutos</li>
                        <li class="list-group-item"><strong>ID de Género:</strong> <?php echo $pelicula->getGenreId(); ?></li>
                    </ul>
                </div>
                <div class="card-footer text-end">
                    <a href="index.php" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('./layout/footer.php'); ?>
