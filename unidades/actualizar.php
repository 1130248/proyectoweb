<?php

// CREANDO MI CONEXION

include_once('../conexion/config.php');

class NuevoRegistro extends Conexion{

public $placa_unidad;
public $unidad;
public $matricula;
public $modelo;
public $marca;
public $seguro;
public $id_propietario;
public $id_chofer;
/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

function __construct($placa_unidad,$unidad,$matricula,$modelo,$marca,$seguro,$id_propietario,$id_chofer){

$this->placa_unidad=$placa_unidad;
$this->unidad=$unidad;
$this->matricula=$matricula;
$this->modelo=$modelo;
$this->marca=$marca;
$this->seguro=$seguro;
$this->id_propietario=$id_propietario;
$this->id_chofer=$id_chofer;

}

/*if(isset($_POST["placa_unidad"])){
	$placa=$_POST["placa_unidad"];*/

	public function actualiza(){

    $conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();

		$consulta = "UPDATE unidades SET placa_unidad='this->placa_unidad',numero_unidad='$this->unidad', matricula_unidad='$this->matricula', modelo_unidad='$this->modelo', marca_unidad='$this->marca',vencseguro_unidad='$this->seguro',id_propietario='$this->id_propietario',id_chofer='$this->id_chofer'
			where placa_unidad='$this->placa_unidad'";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}


/*elseif (isset($_POST["unidadn"])){
	$unidadn=$_POST["unidadn"];*/

public function inserta(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();

		$consulta = "INSERT into unidades values('$this->placa_unidad', '$this->unidad', '$this->matricula', '$this->modelo', '$this->marca', '$this->seguro', '$this->id_propietario', '$this->id_chofer') ";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
			}

/*}elseif (isset($_GET["borrar"])){
	$id_prop=$_GET["borrar"];*/

public function borra(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();


	$consulta = "DELETE from unidades where placa_unidad=$this->placa_unidad";
			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");

				}else{

				header("Location: ../plantilla/noplantilla-principal.php");
				}

	 }
}
?>