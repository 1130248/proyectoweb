<!--
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0 
 
 
  
    * variables publicas
    * @static id_chofer, nombre, apellido, direccion, telefono, correo, licencia, vencimiento.

 -->


<?php

// CREANDO MI CONEXION

include_once('../conexion/config.php');

class NuevoRegistro extends Conexion{

	public $id_chofer;
	public $nombre;
	public $apellido;
	public $direccion;
	public $telefono;
	public $correo;
	public $licencia;
	public $vencimiento;
/*echo $nombre;
echo $apellido;
echo $direccion;
echo $telefono;
echo $correo;
echo $unidades;*/


/**
    * funcion constructor

    id_chofer, nombre, apellido, direccion, telefono, correo, licencia, vencimiento. 
    */

function __construct($id_chofer,$nombre,$apellido,$direccion,$telefono,$correo,$licencia,$vencimiento){

	$this->id_chofer=$id_chofer;
	$this->nombre=$nombre;
	$this->apellido=$apellido;
	$this->direccion=$direccion;
	$this->telefono=$telefono;
	$this->correo=$correo;
	$this->licencia=$licencia;
	$this->vencimiento=$vencimiento;

}

	/*if(isset($_POST["id_chofer"])){
		$id_chof=$_POST["id_chofer"];*/

		/**
    * funcion actualizar choferes
    * @static id_chofer, nombre, apellido, direccion, telefono, correo, licencia, vencimiento.
    */

		public function actualiza(){

   		 $conexionSacadatos = new Conexion();
    	 $linkSacadatos = $conexionSacadatos->con();
    	  $linkSacadatos->set_charset("utf8");

		$consulta = "UPDATE choferes SET nombre_chofer='$this->nombre', apellido_chofer='$this->apellido', direccion='$this->direccion', telefono='$this->telefono',correo='$this->correo', licencia_tipo='$this->licencia', licencia_venc='$this->vencimiento' where id_chofer=$this->id_chofer";

		if ($linkSacadatos->query($consulta)){
			header("Location: plantilla.php");

		}else{

			/*echo "jajaja";*/
			header("Location: ../plantilla/noplantilla-principal.php");
		}
	}

	/*elseif (isset($_POST["nombre"])){
		$nombre=$_POST["nombre"];*/

		/**
    * funcion insertar choferes
    * @static id_chofer, nombre, apellido, direccion, telefono, correo, licencia, vencimiento.
    */

public function inserta(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
   		$linkSacadatos->set_charset("utf8");

		$consulta = "INSERT into choferes values('', '$this->nombre', '$this->apellido', '$this->direccion', '$this->telefono', '$this->correo', '$this->licencia', '$this->vencimiento') ";

		if ($linkSacadatos->query($consulta)){
			header("Location: plantilla.php");

		}else{

			header("Location: ../plantilla/noplantilla-principal.php");
		}
}

	/*}elseif (isset($_GET["borrar"])){
		$id_chof=$_GET["borrar"];*/
/**
    * funcion borrar choferes
    * @static id_chofer.
    */


	public function borra(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();


		$consulta = "DELETE from choferes where id_chofer=$this->id_chofer";

		if ($linkSacadatos->query($consulta)){
			header("Location: plantilla.php");

		}else{

			header("Location: ../plantilla/noplantilla-principal.php");
		}
	 }

}
	?>