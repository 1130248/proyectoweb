<?php

// CREANDO MI CONEXION

include('../conexion/config.php');

$motivo=$_POST["motivo"];
$lugar=$_POST["lugar"];
$fecha=$_POST["fecha"];
$dias=$_POST["dias"];
$inicio=$_POST["inicio"];
$termina=$_POST["termina"];
$chofer=$_POST["chofer"];
$checador=$_POST["checador"];

/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

if(isset($_POST["id_castigo"])){
	$id_cas=$_POST["id_castigo"];

		$consulta = "UPDATE castigos SET id_castigo='$id_cas', motivo='$motivo', lugar='$lugar', fecha='$fecha', dias='$dias',inicio='$inicio',termina='$termina',id_chofer='$chofer',id_checador='$checador'
			where id_castigo=$id_cas";

			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}



elseif (isset($_POST["motivo"])){
	$motivo=$_POST["motivo"];
		$consulta = "INSERT into castigos values('', '$motivo', '$lugar', '$fecha', '$dias', '$inicio', '$termina', '$chofer', '$checador') ";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}

}elseif (isset($_GET["borrar"])){
	$id_cas=$_GET["borrar"];

	$consulta = "DELETE from castigos where id_castigo=$id_cas";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
}else{ header("Location: plantilla.php"); }
?>