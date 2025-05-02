<?php
require_once 'includes/init.php';
require_once 'includes/conexion.php';

if ($_SESSION['rol'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$bd = Conexion::conectar();
$stmt = $bd->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Panel de Admin</h2>
    <a href="salir.php" class="btn btn-danger">Cerrar sesión</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                    <td><?= htmlspecialchars($usuario['correo']) ?></td>
                    <td><?= htmlspecialchars($usuario['rol']) ?></td>
                    <td>
                        <a href="ver_detalle.php?id=<?= $usuario['id'] ?>" class="btn btn-info">Ver Detalle</a>
                        <a href="editar.php?id=<?= $usuario['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="eliminar.php?id=<?= $usuario['id'] ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
