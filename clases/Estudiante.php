<?php

require_once('/xampp/htdocs/estudiante/conexion.php');

class Estudiante{
    public $nombre, $edad, $correo;
    public $conexion;

    public function __construct($conexion, $nombre = null, $edad = null, $correo = null)
    {
        $this->conexion = $conexion;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->correo = $correo;
    }

    // Método para registrar un estudiante
    public function registrarEstudiante()
    {
        $sql = "INSERT INTO estudiante (nombre, edad, correo) VALUES ('$this->nombre', $this->edad, '$this->correo')";
        if (mysqli_query($this->conexion, $sql)) {
            echo "Estudiante registrado correctamente";
        } else {
            echo "Error al registrar el estudiante: " . mysqli_error($this->conexion);
        }
    }

    // Método para mostrar estudiantes
    public static function mostrarEstudiantes($conexion)
    {
        $sql = "SELECT * FROM estudiante";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "ID: " . $fila["id"] . " - Nombre: " . $fila["nombre"] . " - Edad: " . $fila["edad"] . " - Correo: " . $fila["correo"] . "<br>";
            }
        } else {
            echo "0 resultados";
        }
    }

    // Método para actualizar un estudiante
    public function actualizarEstudiante($id)
    {
        $sql = "UPDATE estudiante SET nombre='$this->nombre', edad=$this->edad, correo='$this->correo' WHERE id=$id";
        if (mysqli_query($this->conexion, $sql)) {
            echo "Estudiante actualizado correctamente";
        } else {
            echo "Error al actualizar el estudiante: " . mysqli_error($this->conexion);
        }
    }

    // Método para eliminar un estudiante
    public function eliminarEstudiante($id)
    {
        $sql = "DELETE FROM estudiante WHERE id=$id";
        if (mysqli_query($this->conexion, $sql)) {
            echo "Estudiante eliminado correctamente";
        } else {
            echo "Error al eliminar el estudiante: " . mysqli_error($this->conexion);
        }
    }
}
?>
