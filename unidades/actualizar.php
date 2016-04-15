<?php

// CREANDO MI CONEXION

include('../conexion/config.php');

$unidadn=$_POST["unidadn"];
$matricula=$_POST["matricula"];
$modelo=$_POST["modelo"];
$marca=$_POST["marca"];
$seguro=$_POST["seguro"];
$id_propietario=$_POST["id_propietario"];
$id_chofer=$_POST["id_chofer"];

/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

if(isset($_POST["placa_unidad"])){
	$placa=$_POST["placa_unidad"];

		$consulta = "UPDATE usuarios SET placa_unidad='$placa', numero_unidad='$unidadn', matricula_unidad='$matricula', modelo_unidad='$modelo', matricula_unidad='$marca',vencseguro_unidad='$seguro',id_propietario='$id_propietario',id_chofer='$id_chofer'
			where placa_unidad=$placa";

			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}



elseif (isset($_POST["unidadn"])){
	$unidadn=$_POST["unidadn"];
		$consulta = "INSERT into unidades values('', '$unidadn', '$matricula', '$modelo', '$marca', '$seguro', '$id_propietario', '$id_chofer') ";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}

}elseif (isset($_GET["borrar"])){
	$id_prop=$_GET["borrar"];

	$consulta = "DELETE from unidades where placa_unidad=$placa";
			if ($mysqli->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
}else{ header("Location: plantilla.php"); }
?>