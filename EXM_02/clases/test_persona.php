<?php
require_once 'Persona.php';

$persona = new Persona("Carlos", "carlos@example.com");

echo $persona->saludar(); // Método 1
echo "<br>";
$persona->mostrarDatos(); // Método 2 (imprime los datos)
?>
