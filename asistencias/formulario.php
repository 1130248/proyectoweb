/**
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0

 */

<?php
// CREANDO MI CONEXION
include_once('../conexion/config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
	
//include_once('actualizar.php');
if (isset($_GET["borrar"])){
$id_propietario=$_GET["id_ac"];
echo $id_propietario;
$id_prop=$_GET["borrar"];

	$consulta = "DELETE from asistencias where id_asistencia=$id_prop ";
			if ($mysqli->query($consulta)){
				header("Location: plantilla-tablas.php?id_ac=$id_propietario");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
}else{
header("Location: plantilla.php");
}
?>
