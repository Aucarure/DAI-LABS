<?php
class Persona {
    public $nombre;
    public $correo;

    // Constructor
    public function __construct($nombre, $correo) {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // Método 1: saludar
    public function saludar() {
        return "Hola, soy {$this->nombre}.";
    }

    // Método 2: imprimir datos en pantalla
    public function mostrarDatos() {
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
    }
}
?>
