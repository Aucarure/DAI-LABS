<?php
require_once('./layout/header.php');
require_once('./connection/BaseMySql.php');
require_once('./database/MovieDB.php');


// Conexión a la base de datos
$bd = BaseMySql::conexion();


// Obtener lista de películas
$movieDB = new MovieDB();
$peliculas = $movieDB->listar($bd);


// Cerrar conexión
BaseMySql::close($bd);
?>


<div class="container mt-4">
    <div class="fs-1 text-center mb-4">Películas</div>
   
    <div class="row mb-3">
        <div class="col text-end">
            <a href="movie_new.php" class="btn btn-primary">Nueva Película</a>
        </div>
    </div>
   
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Calificación</th>
                    <th>Premios</th>
                    <th>Año</th>
                    <th>Género</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peliculas as $pelicula): ?>
                <tr>
                    <td><?php echo $pelicula['id']; ?></td>
                    <td><?php echo $pelicula['title']; ?></td>
                    <td><?php echo $pelicula['rating']; ?></td>
                    <td><?php echo $pelicula['awards']; ?></td>
                    <td><?php echo $pelicula['release_year']; ?></td>
                    <td><?php echo $pelicula['genre_name']; ?></td>
                    <td>
                        <a href="movie_detail.php?id=<?php echo $pelicula['id']; ?>" class="btn btn-info btn-sm">Ver</a>

                        <a href="movie_edit.php?id=<?php echo $pelicula['id']; ?>" class="btn btn-warning btn-sm">Editar</a>

                        <a href="movie_delete.php?id=<?php echo $pelicula['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta película?')">Eliminar</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php require_once('./layout/footer.php') ?>
