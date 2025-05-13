<?php
function conectar() {
    $host = 'localhost';
    $dbname = 'EXM_02'; // Tu base de datos real
    $usuario = 'root';  // o el que tengas configurado
    $clave = '';        // pon tu contraseña si aplica

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $clave);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}

?>
