<?php

// CREANDO MI CONEXION

include_once('../conexion/config.php');

class NuevoRegistro extends Conexion{


public $id_castigo;
public $motivo;
public $lugar;
public $fecha;
public $dias;
public $inicio;
public $termina;
public $id_chofer;
public $id_checador;

function __construct($id_castigo, $motivo, $lugar, $fecha, $dias, $inicio, $termina, $id_chofer, $id_checador){

$this->id_castigo=$id_castigo;
$this->motivo=$motivo;
$this->lugar=$lugar;
$this->fecha=$fecha;
$this->dias=$dias;
$this->inicio=$inicio;
$this->termina=$termina;
$this->id_chofer=$id_chofer;
$this->id_checador=$id_checador;
}


	public function actualiza(){

	$conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();	
    $linkSacadatos->set_charset("utf8");
/*if(isset($_POST["id_castigo"])){
	$id_cas=$_POST["id_castigo"];*/

		$consulta = "UPDATE castigos SET motivo='$this->motivo', lugar='$this->lugar', fecha='$this->fecha', dias='$this->dias', inicio='$this->inicio', termina='$this->termina', id_chofer='$this->id_chofer', id_checador='$this->id_checador' where id_castigo=$this->id_castigo";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}



/*elseif (isset($_POST["motivo"])){
	$motivo=$_POST["motivo"];*/

	 public function inserta(){


	    $conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
   		$linkSacadatos->set_charset("utf8");
   		
		$consulta = "INSERT into castigos values('', '$this->motivo', '$this->lugar', '$this->fecha', '$this->dias', '$this->inicio', '$this->termina', '$this->id_chofer', '$this->id_checador') ";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
	}

/*}elseif (isset($_GET["borrar"])){
	$id_cas=$_GET["borrar"];*/
	public function borra(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();


	$consulta = "DELETE from castigos where id_castigo='$this->id_castigo'";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
			}else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
	}
}
?>