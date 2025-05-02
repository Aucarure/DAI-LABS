<?php
require_once 'includes/init.php';  // Incluir el archivo de sesión
require_once 'includes/conexion.php';// Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = hash('sha256', $_POST['clave']);

    try {
        $bd = Conexion::conectar();
        $check = $bd->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $check->execute([$correo]);

        if ($check->rowCount() > 0) {
            $_SESSION['error'] = "Correo ya registrado.";
            header("Location: registro.php");
            exit();
        }

        $stmt = $bd->prepare("INSERT INTO usuarios (nombre, correo, password, rol) VALUES (?, ?, ?, 'normal')");
        $stmt->execute([$nombre, $correo, $clave]);

        $_SESSION['success'] = "Registrado exitosamente.";
        header("Location: index.php");
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
