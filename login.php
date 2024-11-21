<?php
session_start();
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/Usuario.php');

$usuario = new Usuario($conexion);

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     echo $usuario->iniciarSesion($email, $password);
// }
// 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = $_POST['password'];


    $sql = "SELECT * FROM `usuario` WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){
        $user = mysqli_fetch_assoc($resultado);

        if(password_verify($password, $user['password'])){
            $_SESSION['usuario'] = $user['nombre'];
            $_SESSION['autentificado'] = true;

            header("Location: panel.php");
            exit;
        }else{
            echo "Contraseña Incorrecta";
        }
    }else{
        echo "El usuario no existe";
    }

    echo $usuario->iniciarSesion($email, $password);
}
?>

