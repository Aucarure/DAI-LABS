<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

require_once 'includes/conexion.php';

// Verificar si se recibe un ID de usuario válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $usuario_id = $_GET['id'];
    $bd = Conexion::conectar();
    $stmt = $bd->prepare("SELECT id, nombre, correo, rol FROM usuarios WHERE id = ?");
    $stmt->execute([$usuario_id]);
    $usuario = $stmt->fetch();

    // Si no existe el usuario, redirigir al dashboard de admin
    if (!$usuario) {
        header("Location: admin_dashboard.php");
        exit();
    }
} else {
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Detalle Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header text-center"><h3>Detalles del Usuario</h3></div>
        <div class="card-body">
            <p><strong>Nombre:</strong> <?= $usuario['nombre'] ?></p>
            <p><strong>Correo:</strong> <?= $usuario['correo'] ?></p>
            <p><strong>Rol:</strong> <?= $usuario['rol'] === 'admin' ? 'Administrador' : 'Usuario Normal' ?></p>
        </div>
        <div class="card-footer text-center">
            <a href="admin_dashboard.php" class="btn btn-secondary">Volver al panel de administración</a>
        </div>
    </div>
</div>
</body>
</html>
