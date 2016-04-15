<?php

// CREANDO MI CONEXION

include_once('../conexion/config.php');

class NuevoRegistro extends Conexion{

public $id;
public $nombre;
public $apellido;
public $direccion;
public $telefono;
public $correo;
public $unidades;
/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

function __construct($id, $nombre, $apellido, $direccion, $telefono, $correo, $unidades){

	$this->id=$id;
	$this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->direccion=$direccion;
    $this->telefono=$telefono;
    $this->correo=$correo;
    $this->unidades=$unidades;
}

public function actualiza(){

	$conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();		

/*if(isset($_POST["id_propietario"])){
	$id_prop=$_POST["id_propietario"];*/

		$consulta = "UPDATE propietarios SET nombre='$this->nombre', apellido='$this->apellido', direccion='$this->direccion', telefono='$this->telefono',correo='$this->correo',unidades='$this->unidades'
			where id=$this->id";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla-propietarios.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
}

    public function inserta(){

/*elseif (isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];*/
	$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();

		$consulta = "INSERT into propietarios values('', '$this->nombre', '$this->apellido', '$this->direccion', '$this->telefono', '$this->correo', '$this->unidades') ";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla-propietarios.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
	}
public function borra(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
/*}elseif (isset($_GET["borrar"])){
	$id_prop=$_GET["borrar"];*/

	$consulta = "DELETE from propietarios where id=$this->id";
			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla-propietarios.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}

 }
}
?>