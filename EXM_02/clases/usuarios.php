<?php
require_once 'conexion.php';

$conexion = conectar();

try {
    $stmt = $conexion->query("SELECT nombre FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Lista de usuarios registrados:</h2><ul>";
    foreach ($usuarios as $usuario) {
        echo "<li>" . htmlspecialchars($usuario['nombre']) . "</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo "Error al consultar usuarios: " . $e->getMessage();
}
?>
