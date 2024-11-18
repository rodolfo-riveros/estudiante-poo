<?php
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/Estudiante.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el estudiante actual
    $sql = "SELECT * FROM estudiante WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $estudianteData = mysqli_fetch_assoc($resultado);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    // Crear instancia y actualizar estudiante
    $estudiante = new Estudiante($conexion, $nombre, $edad, $correo);
    $estudiante->actualizarEstudiante($id);

    header("Location: index.php"); // Redirige al índice después de editar
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center p-5">Editar Estudiante</h1>
    <form method="POST" class="w-50 mx-auto p-5">
        <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="hidden" class="form-control" name="id" value="<?php echo $estudianteData['id']; ?>">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $estudianteData['nombre']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" name="edad" placeholder="Edad" value="<?php echo $estudianteData['edad']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" name="correo" placeholder="Correo" value="<?php echo $estudianteData['correo']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>