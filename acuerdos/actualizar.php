<?php

// CREANDO MI CONEXION

include('../conexion/config.php');

$acuerdo=$_POST["acuerdo"];
$detalle=$_POST["detalle"];
$id_asamblea=$_POST["id_asamblea"];

/*echo $acuerdo;
echo $detalle;
echo $id_asamblea;*/


if(isset($_POST["id_acuerdo"])){
	$id_ac=$_POST["id_acuerdo"];

		$consulta = "UPDATE acuerdos SET id_acuerdo='$id_ac', num_acuerdo='$acuerdo', detalle_acuerdo='$detalle', id_asamblea='$id_asamblea' where id_acuerdo=$id_ac";

			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}



elseif (isset($_POST["acuerdo"])){
	$acuerdo=$_POST["acuerdo"];
		$consulta = "INSERT into acuerdos values('', '$acuerdo', '$detalle', '$id_asamblea') ";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}

}elseif (isset($_GET["borrar"])){
	$id_ac=$_GET["borrar"];

	$consulta = "DELETE from acuerdos where id_acuerdo=$id_ac";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
}else{ header("Location: plantilla.php"); }
?>