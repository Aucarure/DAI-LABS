<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header text-center"><h3>Registro</h3></div>
        <div class="card-body">
            <!-- Mensajes de error o éxito -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>

            <form action="registrar.php" method="post">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Correo</label>
                    <input type="email" name="correo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="clave" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button class="btn btn-success" type="submit">Registrar</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            ¿Ya tienes cuenta? <a href="index.php">Inicia sesión</a>
        </div>
    </div>
</div>
</body>
</html>
