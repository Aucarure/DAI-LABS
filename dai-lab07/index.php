<?php
require_once 'includes/init.php';  // Incluir el archivo de sesión

// Aquí puedes verificar si ya está iniciada una sesión y redirigir si es necesario
if (isset($_SESSION['id'])) {
    header('Location: usuario_dashboard.php');  // Redirigir si ya está logueado
    exit();
}
?>
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
