<?php
require_once 'includes/init.php';

require_once 'includes/conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    try {
        $bd = Conexion::conectar();
        $stmt = $bd->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($usuario && $usuario['password'] === hash('sha256', $clave)) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir según el rol del usuario
            if ($usuario['rol'] === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: usuario_dashboard.php");
            }
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
