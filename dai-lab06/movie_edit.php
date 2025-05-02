<?php
require_once('./layout/header.php');
require_once('./connection/BaseMySql.php');
require_once('./database/MovieDB.php');
require_once('./database/GenreDB.php');

// Verificar si viene ID por GET
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$bd = BaseMySql::conexion();

// Obtener película
$movieDB = new MovieDB();
$pelicula = $movieDB->detalle($bd, $id);

// Obtener géneros
$genreDB = new GenreDB();
$generos = $genreDB->listar($bd);

BaseMySql::close($bd);
?>

<div class="container mt-4">
    <div class="fs-1 text-center mb-4">Editar Película</div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    Modifique los datos de la película
                </div>
                <div class="card-body">
                    <form action="movie_update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $pelicula->getId(); ?>">

                        <div class="mb-3">
                            <label for="title" class="form-label">Título:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $pelicula->getTitle(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Calificación:</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="<?php echo $pelicula->getRating(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="awards" class="form-label">Premios:</label>
                            <input type="number" class="form-control" id="awards" name="awards" min="0" value="<?php echo $pelicula->getAwards(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="release_year" class="form-label">Año de estreno:</label>
                            <input type="number" class="form-control" id="release_year" name="release_year" min="1900" max="2099" value="<?php echo $pelicula->getReleaseYear(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="length" class="form-label">Duración (minutos):</label>
                            <input type="number" class="form-control" id="length" name="length" min="1" value="<?php echo $pelicula->getLength(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="genre_id" class="form-label">Género:</label>
                            <select class="form-select" id="genre_id" name="genre_id" required>
                                <?php foreach ($generos as $genero): ?>
                                    <option value="<?php echo $genero['genre_id']; ?>" <?php if ($genero['genre_id'] == $pelicula->getGenreId()) echo 'selected'; ?>>
                                        <?php echo $genero['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('./layout/footer.php'); ?>
