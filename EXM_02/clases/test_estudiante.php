<?php
require_once 'Estudiante.php';

$estudiante = new Estudiante("Lucía", "lucia@correo.com", "Ingeniería de Sistemas");

echo $estudiante->saludar(); // Este método fue sobrescrito (polimorfismo)
echo "<br>";
$estudiante->mostrarDatos(); // Método heredado
$estudiante->mostrarCarrera(); // Método nuevo
?>
