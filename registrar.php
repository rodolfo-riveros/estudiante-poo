<?php
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/Usuario.php');

$usuario = new Usuario($conexion);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $usuario->registrarUsuario($nombre, $email, $password);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <label for="nombre">
            Nombre:
            <input type="text" name="nombre" id="nombre">
        </label>
        <br><br>
        <label for="email">
            Email:
            <input type="email" name="email" id="email">
        </label>
        <br><br>
        <label for="password">
            Password:
            <input type="password" name="password" id="password">
        </label>
        <br><br>
        <input type="submit" value="Registrarse">
    </form>
</body>

</html>