<?php

class Usuario{
    public $nombre, $email, $password;
    public $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }


    //metodo para crear un registro
    public function registrarUsuario($nombre, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);//sirve para hash contraseña

        $sql = "INSERT INTO `usuario`(`nombre`, `email`, `password`) VALUES ('$nombre','$email','$hashed_password')";

        if(mysqli_query($this->conexion, $sql)){
            return "Usuario registrado correctamente";
        } else{
            return "Error al registrar el usuario: " . mysqli_error($this->conexion);
        }
    }

    // Método para iniciar sesión
    public function iniciarSesion($email, $password) {
        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $resultado = mysqli_query($this->conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $usuario = mysqli_fetch_assoc($resultado);

            if (password_verify($password, $usuario['password'])) {
                return "Bienvenido, " . $usuario['nombre'];
            } else {
                return "Contraseña incorrecta.";
            }
        } else {
            return "El usuario no existe.";
        }
    }
}