<?php
require_once('./layout/header.php');
require_once('./connection/BaseMySql.php');
require_once('./database/GenreDB.php');


// Conexión a la base de datos
$bd = BaseMySql::conexion();


// Obtener lista de géneros para el select
$genreDB = new GenreDB();
$generos = $genreDB->listar($bd);


// Cerrar conexión
BaseMySql::close($bd);
?>


<div class="container mt-4">
    <div class="fs-1 text-center mb-4">Nueva Película</div>
   
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Ingrese los datos de la película
                </div>
                <div class="card-body">
                    <form action="movie_insert.php" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Título:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="rating" class="form-label">Calificación:</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="awards" class="form-label">Premios:</label>
                            <input type="number" class="form-control" id="awards" name="awards" min="0" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="release_year" class="form-label">Año de estreno:</label>
                            <input type="number" class="form-control" id="release_year" name="release_year" min="1900" max="2099" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="length" class="form-label">Duración (minutos):</label>
                            <input type="number" class="form-control" id="length" name="length" min="1" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="genre_id" class="form-label">Género:</label>
                            <select class="form-select" id="genre_id" name="genre_id" required>
                                <option value="">Seleccione un género</option>
                                <?php foreach ($generos as $genero): ?>
                                <option value="<?php echo $genero['genre_id']; ?>"><?php echo $genero['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                       
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('./layout/footer.php') ?>
