<?php
require_once 'includes/init.php';  // Incluir el archivo de sesión
require_once 'includes/conexion.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    try {
        $bd = Conexion::conectar();
        $stmt = $bd->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch();

        if ($usuario && $usuario['password'] === hash('sha256', $clave)) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir según el rol
            header("Location: " . ($usuario['rol'] === 'admin' ? 'admin_dashboard.php' : 'usuario_dashboard.php'));
            exit();
        } else {
            $_SESSION['error'] = "Credenciales incorrectas.";
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
