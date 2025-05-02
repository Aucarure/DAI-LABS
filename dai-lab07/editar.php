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

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    // Actualizar los datos del usuario
    $stmt = $bd->prepare("UPDATE usuarios SET nombre = ?, correo = ?, rol = ? WHERE id = ?");
    $stmt->execute([$nombre, $correo, $rol, $usuario_id]);

    $_SESSION['success'] = "Usuario actualizado correctamente.";
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header text-center"><h3>Editar Usuario</h3></div>
        <div class="card-body">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <form action="editar.php?id=<?= $usuario['id'] ?>" method="post">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?= $usuario['nombre'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Correo</label>
                    <input type="email" name="correo" class="form-control" value="<?= $usuario['correo'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Rol</label>
                    <select name="rol" class="form-control" required>
                        <option value="normal" <?= $usuario['rol'] === 'normal' ? 'selected' : '' ?>>Usuario Normal</option>
                        <option value="admin" <?= $usuario['rol'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
                    </select>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="admin_dashboard.php">Volver al panel de administración</a>
        </div>
    </div>
</div>
</body>
</html>
