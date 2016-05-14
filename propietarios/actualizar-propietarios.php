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

function __construct($id, $nombre, $apellido, $direccion, $telefono, $correo){

	$this->id=$id;
	$this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->direccion=$direccion;
    $this->telefono=$telefono;
    $this->correo=$correo;
  
}

public function actualiza(){

	$conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();	
    $linkSacadatos->set_charset("utf8");


/*if(isset($_POST["id_propietario"])){
	$id_prop=$_POST["id_propietario"];*/

		$consulta = "UPDATE propietarios SET nombre_propietario='$this->nombre', apellido_propietario='$this->apellido', direccion='$this->direccion', telefono='$this->telefono',correo='$this->correo' where id_propietario='$this->id'";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla-propietarios.php");
											}
			else{
			 header("Location: ../plantilla/noplantilla-principal.php");
				}
}

    public function inserta(){

/*elseif (isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];*/
	$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
   		$linkSacadatos->set_charset("utf8");
   		
		$consulta = "INSERT into propietarios values('', '$this->nombre', '$this->apellido', '$this->direccion', '$this->telefono', '$this->correo') ";

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

	$consulta = "DELETE from propietarios where id_propietario='$this->id'";
			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla-propietarios.php");
											}
			else{
				
			header("Location: ../plantilla/noplantilla-principal.php");
				}

 }
}
?>