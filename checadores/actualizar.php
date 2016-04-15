<?php

// CREANDO MI CONEXION

include('../conexion/config.php');

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];
$estacion=$_POST["estacion"];
$hora_entrada=$_POST["entrada"];
$hora_salida=$_POST["salida"];
$ddescanso=$_POST["descanso"];

/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

if(isset($_POST["id_checador"])){
	$id_checa=$_POST["id_checador"];

		$consulta = "UPDATE checadores SET id_checador='$id_checa', nombre_checador='$nombre', apellido_checador='$apellido', direccion='$direccion', telefono='$telefono',correo='$correo',estacion='$estacion', hora_entrada='$hora_entrada', hora_salida='$hora_salida',ddescanso='$ddescanso'			

		where id_checador=$id_checa";

			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}



elseif (isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];
		$consulta = "INSERT into checadores values('', '$nombre', '$apellido', '$direccion', '$telefono', '$correo', '$estacion', '$entrada', '$salida', '$descanso') ";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}

}elseif (isset($_GET["borrar"])){
	$id_checa=$_GET["borrar"];

	$consulta = "DELETE from checadores where id_checador=$id_checa";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
}else{ header("Location: plantilla.php"); }
?>