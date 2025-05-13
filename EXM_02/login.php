<?php
session_start();
require_once 'includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $conn = conectar();
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre = ? AND correo = ?");
    $stmt->execute([$nombre, $correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['correo'] = $usuario['correo'];
        header("Location: bienvenida.php");
        exit;
    } else {
        echo "Usuario o correo incorrecto. <a href='index.php'>Volver</a>";
    }
}
?>
