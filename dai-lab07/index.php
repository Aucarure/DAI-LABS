<?php session_start(); require_once 'includes/init.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header text-center"><h3>Iniciar Sesión</h3></div>
        <div class="card-body">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label>Correo electrónico</label>
                    <input type="email" name="correo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="clave" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Ingresar</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
        </div>
    </div>
</div>
</body>
</html>

<?php
// Redirigir al panel correspondiente si ya está logueado
if (isset($_SESSION['id'])) {
    // Verificar el rol del usuario
    if ($_SESSION['rol'] === 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: usuario_dashboard.php");
    }
    exit();
}
?>
