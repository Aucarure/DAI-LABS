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
