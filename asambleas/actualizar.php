<?php

// CREANDO MI CONEXION

include('../conexion/config.php');

$fecha=$_POST["fecha"];
$lugar=$_POST["lugar"];
$asistencia=$_POST["asistencia"];
$nacuerdos=$_POST["nacuerdos"];

/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

if(isset($_POST["id_asamblea"])){
	$id_asam=$_POST["id_asamblea"];

		$consulta = "UPDATE asambleas SET id_asamblea='$id_asam', fecha_asamblea='$fecha', lugar_asamblea='$lugar', asistencia='$asistencia', nacuerdos='$nacuerdos'

			where id_asamblea=$id_asam";

			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}



elseif (isset($_POST["fecha"])){
	$fecha=$_POST["fecha"];
		$consulta = "INSERT into asambleas values('', '$fecha', '$lugar', '$asistencia', '$nacuerdos'";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}

}elseif (isset($_GET["borrar"])){
	$id_asam=$_GET["borrar"];

	$consulta = "DELETE from asambleas where id_asamblea=$id_asam ";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
}else{ header("Location: plantilla.php"); }
?>