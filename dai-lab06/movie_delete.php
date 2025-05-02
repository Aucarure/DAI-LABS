<?php
require_once('./connection/BaseMySql.php');
require_once('./database/MovieDB.php');

// Verificamos que venga el parámetro 'id' por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexión a la base de datos
    $bd = BaseMySql::conexion();

    // Llamamos al método eliminar (a crear en MovieDB)
    $movieDB = new MovieDB();
    $movieDB->eliminar($bd, $id);

    // Cerramos conexión
    BaseMySql::close($bd);
}

// Redireccionamos al index (siempre)
header("Location: index.php");
exit();
?>
