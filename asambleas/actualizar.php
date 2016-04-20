<?php

// CREANDO MI CONEXION

include_once('../conexion/config.php');

/**
* 
*/
class NuevoRegistro extends Conexion{

public $id_asamblea;
public $fecha;
public $lugar;
public $asistencia;
public $acuerdos;

function __construct($id_asamblea,$fecha, $lugar, $asistencia, $acuerdos){

$this->id_asamblea=$id_asamblea;
$this->fecha=$fecha;
$this->lugar=$lugar;
$this->asistencia=$asistencia;
$this->acuerdos=$acuerdos;
}
/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

/*if(isset($_POST["id_asamblea"])){
	$id_asam=$_POST["id_asamblea"];*/

	public function actualiza(){

    $conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();

		$consulta = "UPDATE asambleas SET fecha_asamblea='$this->fecha', lugar_asamblea='$this->lugar', asistencia='$this->asistencia', nacuerdos='$this->acuerdos' where id_asamblea=$this->id_asamblea";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}


	public function inserta(){

/*elseif (isset($_POST["fecha"])){
	$fecha=$_POST["fecha"];*/

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();

		$consulta = "INSERT into asambleas values('', '$this->fecha', '$this->lugar', '$this->asistencia', '$this->acuerdos'";


			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
	}

/*}elseif (isset($_GET["borrar"])){
	$id_asam=$_GET["borrar"];*/

	public function borra(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();

	$consulta = "DELETE from asambleas where id_asamblea=$this->id_asamblea ";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											
			}else{

				header("Location: ../plantilla/noplantilla-principal.php");
				}
	}

}

?>