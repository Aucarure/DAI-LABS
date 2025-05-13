<?php
require_once 'Persona.php';

class Estudiante extends Persona {
    public $carrera;

    // Constructor de la clase hija
    public function __construct($nombre, $correo, $carrera) {
        parent::__construct($nombre, $correo); // Llama al constructor del padre
        $this->carrera = $carrera;
    }

    // Método adicional (nuevo)
    public function mostrarCarrera() {
        echo "Carrera: " . $this->carrera . "<br>";
    }

    // Polimorfismo: sobrescribimos el método saludar
    public function saludar() {
        return "Hola, soy {$this->nombre} y estudio {$this->carrera}.";
    }
}
?>
