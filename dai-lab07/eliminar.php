<?php
require_once 'includes/init.php';

session_start();
if ($_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

require_once 'includes/conexion.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Verificar que el administrador no intente eliminarse a sí mismo
    if ($_SESSION['id'] === $id_usuario) {
        $_SESSION['error'] = "No puedes eliminar tu propio usuario.";
        header("Location: admin_dashboard.php");
        exit();
    }

    try {
        $bd = Conexion::conectar();
        $stmt = $bd->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id_usuario]);

        $_SESSION['success'] = "Usuario eliminado exitosamente.";
        header("Location: admin_dashboard.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error al eliminar el usuario: " . $e->getMessage();
        header("Location: admin_dashboard.php");
        exit();
    }
} else {
    $_SESSION['error'] = "ID de usuario no válido.";
    header("Location: admin_dashboard.php");
    exit();
}
