<?php
session_start();

if(!isset($_SESSION['autentificado']) || $_SESSION['autentificado'] !== true){
    header("Location: login.php");
    exit;
}
?>

<h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>
<p>Esta pagina es protegia para usuarios autentificados y solo puedes verlo tú</p>