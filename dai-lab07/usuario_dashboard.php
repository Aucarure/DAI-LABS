<?php
require_once 'includes/init.php';

session_start();
// Validar que el usuario esté logueado y tenga rol 'normal'
if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'normal') {
    header("Location: index.php");
    exit();
}
?>

<h2>Bienvenido, Usuario: <?= $_SESSION['nombre'] ?></h2>
<p>Correo: <?= $_SESSION['correo'] ?></p>
<a href="salir.php">Cerrar sesión</a>
