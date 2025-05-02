<?php
class Conexion {
    private static $host = "localhost";
    private static $db = "proyecto_dai07";
    private static $user = "root";
    private static $pass = "";
    private static $charset = "utf8mb4";

    public static function conectar() {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            return new PDO($dsn, self::$user, self::$pass, $options);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
