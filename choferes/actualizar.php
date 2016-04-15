<?php

// CREANDO MI CONEXION

include('../conexion/config.php');

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];
$licencia=$_POST["licencia"];
$vencimiento=$_POST["vencimiento"];
/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

if(isset($_POST["id_chofer"])){
	$id_chof=$_POST["id_chofer"];

		$consulta = "UPDATE choferes SET id_chofer='$id_chof', nombre_chofer='$nombre', apellido_chofer='$apellido', direccion='$direccion', telefono='$telefono',correo='$correo', licencia_tipo='$licencia', licencia_venc='$vencimiento'
			where id_chofer=$id_chof";

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
		$consulta = "INSERT into choferes values('', '$nombre', '$apellido', '$direccion', '$telefono', '$correo', '$licencia', '$vencimiento') ";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}

}elseif (isset($_GET["borrar"])){
	$id_chof=$_GET["borrar"];

	$consulta = "DELETE from choferes where id_chofer=$id_chof";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
}else{ header("Location: plantilla.php"); }
?>