<?php
require_once 'includes/init.php';

session_start();
if ($_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

require_once 'includes/conexion.php';

// Obtener todos los usuarios
$bd = Conexion::conectar();
$stmt = $bd->prepare("SELECT * FROM usuarios");
$stmt->execute();
$usuarios = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Bienvenido, <?= $_SESSION['nombre'] ?> (Administrador)</h2>
    <p>Correo: <?= $_SESSION['correo'] ?></p>
    <a href="salir.php" class="btn btn-danger">Cerrar sesión</a>

    <h3 class="mt-5">Usuarios Registrados</h3>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= $u['nombre'] ?></td>
                    <td><?= $u['correo'] ?></td>
                    <td><?= $u['rol'] ?></td>
                    <td>
                        <a href="editar.php?id=<?= $u['id'] ?>" class="btn btn-info btn-sm">Editar</a>
                        <a href="ver_detalle.php?id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Ver detalle</a>
                        <!-- Evitar eliminar el propio usuario administrador -->
                        <?php if ($_SESSION['id'] !== $u['id']): ?>
                            <a href="eliminar.php?id=<?= $u['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
