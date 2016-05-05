<?php

// CREANDO MI CONEXION

include_once('../conexion/config.php');

/**
* 
*/
class NuevoRegistro extends Conexion{

public $id_asamblea;
public $lugar;
public $fecha;


function __construct($id_asamblea,$lugar,$fecha){

$this->id_asamblea=$id_asamblea;
$this->lugar=$lugar;
$this->fecha=$fecha;


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

		$consulta = "UPDATE asambleas SET lugar_asamblea='$this->lugar', fecha_asamblea='$this->fecha'  where id_asamblea=$this->id_asamblea";

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

		$consulta = "INSERT into asambleas values('', '$this->lugar', '$this->fecha')";

		//echo $consulta;
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