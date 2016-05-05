<?php

include_once('../conexion/config.php');

if (isset($_POST['checkbox'])){

$seleccionados = $_POST['checkbox'];
for($i=0; $i < count($seleccionados); $i++){


    if (isset($_GET["asamblea"])){

$asamblea=$_GET["asamblea"];
    }
}}


    $conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();

$seleccionados = $_POST['checkbox'];
for($i=0; $i < count($seleccionados); $i++){
    $prop=$seleccionados[$i];
$consulta = "INSERT INTO asistencias (`id_asistencia`, `id_propietario`, `id_asamblea`) VALUES ('', '$prop', '$asamblea');";
echo $consulta;

$resultado = $linkSacadatos->query($consulta);

}
		
			
				header("Location: plantilla.php");
				
					

?>