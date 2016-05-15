<!--
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0
-->

<?php

// CREANDO MI CONEXION

include('../conexion/config.php');

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];
$unidades=$_POST["nunidades"];
/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

if(isset($_POST["id_propietario"])){
	$id_prop=$_POST["id_propietario"];

		$consulta = "UPDATE propietarios SET id_propietario='$id_prop', nombre_propietario='$nombre', apellido_propietario='$apellido', direccion='$direccion', telefono='$telefono',correo='$correo',nunidades='$unidades'
			where id_propietario=$id_prop";

			if ($mysqli->query($consulta)){
				header("Location: plantilla-propietarios.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}



elseif (isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];
		$consulta = "INSERT into propietarios values('', '$nombre', '$apellido', '$direccion', '$telefono', '$correo', '$unidades') ";
			if ($mysqli->query($consulta)){
				header("Location: plantilla-propietarios.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}

}elseif (isset($_GET["borrar"])){
	$id_prop=$_GET["borrar"];

	$consulta = "DELETE from propietarios where id_propietario=$id_prop ";
			if ($mysqli->query($consulta)){
				header("Location: plantilla-propietarios.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
}else{ header("Location: plantilla-propietarios.php"); }
?>