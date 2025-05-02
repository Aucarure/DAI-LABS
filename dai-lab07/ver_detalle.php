<?php
require_once 'includes/init.php';
require_once 'includes/conexion.php';

if ($_SESSION['rol'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

$bd = Conexion::conectar();
$stmt = $bd->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if (!$usuario) {
    die("Usuario no encontrado.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Detalle</title>
</head>
<body>
    <h2>Detalle del Usuario</h2>
    <p>Nombre: <?= htmlspecialchars($usuario['nombre']) ?></p>
    <p>Correo: <?= htmlspecialchars($usuario['correo']) ?></p>
    <p>Rol: <?= htmlspecialchars($usuario['rol']) ?></p>
    <a href="admin_dashboard.php">Volver</a>
</body>
</html>
