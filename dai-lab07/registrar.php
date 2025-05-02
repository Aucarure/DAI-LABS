<?php
require_once 'includes/conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = hash('sha256', $_POST['clave']); // Aseguramos que la contraseña se guarde de forma segura

    try {
        $bd = Conexion::conectar();
        
        // Comprobamos si ya existe un usuario con ese correo
        $check = $bd->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $check->execute([$correo]);

        if ($check->rowCount() > 0) {
            $_SESSION['error'] = "Correo ya registrado.";
            header("Location: registro.php");
            exit();
        }

        // Insertamos el nuevo usuario con rol 'normal'
        $stmt = $bd->prepare("INSERT INTO usuarios (nombre, correo, password, rol) VALUES (?, ?, ?, 'normal')");
        $stmt->execute([$nombre, $correo, $clave]);

        $_SESSION['success'] = "Registrado exitosamente.";
        header("Location: index.php"); // Redirigimos al login después de registrarse
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage()); // Manejamos errores de la base de datos
    }
}
?>
