<!--
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0
-->
<?php

//MI CONEXION

include('config.php');

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

include('validacion.php');

$conexion=new validacion($usuario, $contrasena);
$conexion->valida();

?>