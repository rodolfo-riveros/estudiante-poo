<?php
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/Estudiante.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crear instancia y eliminar estudiante
    $estudiante = new Estudiante($conexion);
    $estudiante->eliminarEstudiante($id);

    header("Location: index.php"); // Redirige al índice después de eliminar
}
?>