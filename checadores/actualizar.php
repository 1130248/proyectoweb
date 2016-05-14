<?php

// CREANDO MI CONEXION

include_once('../conexion/config.php');

class NuevoRegistro extends Conexion{

public $id_checador;
public $nombre;
public $apellido;
public $direccion;
public $telefono;
public $correo;
public $estacion;
public $entrada;
public $salida;
public $descanso;

function __construct($id_checador,$nombre,$apellido,$direccion,$telefono,$correo,$estacion,$entrada,$salida,$descanso){

$this->id_checador=$id_checador;
$this->nombre=$nombre;
$this->apellido=$apellido;
$this->direccion=$direccion;
$this->telefono=$telefono;
$this->correo=$correo;
$this->estacion=$estacion;
$this->entrada=$entrada;
$this->salida=$salida;
$this->descanso=$descanso;
}
/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/

/*if(isset($_POST["id_checador"])){
	$id_checa=$_POST["id_checador"];*/

	public function actualiza(){

		$conexionSacadatos = new Conexion();
    	$linkSacadatos = $conexionSacadatos->con();
    	$linkSacadatos->set_charset("utf8");

		$consulta = "UPDATE checadores SET nombre_checador='$this->nombre', apellido_checador='$this->apellido', direccion='$this->direccion', telefono='$this->telefono',correo='$this->correo',estacion='$this->estacion', hora_entrada='$this->entrada', hora_salida='$this->salida',ddescanso='$this->descanso'	where id_checador=$this->id_checador";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}



/*elseif (isset($_POST["nombre"])){
	$nombre=$_POST["nombre"];*/

	public function inserta(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
   		$linkSacadatos->set_charset("utf8");

		$consulta = "INSERT into checadores values('', '$this->nombre', '$this->apellido', '$this->direccion', '$this->telefono', '$this->correo', '$this->estacion', '$this->entrada', '$this->salida', '$this->descanso') ";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				header("Location: ../plantilla/noplantilla-principal.php");
				}
	}


/*}elseif (isset($_GET["borrar"])){
	$id_checa=$_GET["borrar"];*/

	public function borra(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();

	$consulta = "DELETE from checadores where id_checador='$this->id_checador'";

			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
			
			}else{

				header("Location: ../plantilla/noplantilla-principal.php");
				}
 	}

}

?>