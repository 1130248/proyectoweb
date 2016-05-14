/ **
 * Demostración de etiquetas
 *  @author  Yanet Delgado Vergara
 *  @version  1.0 versión de esta etiqueta se analiza
 * /
 
<?php

// CREANDO MI CONEXION

include_once('../conexion/config.php');

class NuevoRegistro{

public $id_acuerdo;
public $acuerdo;
public $detalle;
public $id_asamblea;

/*echo $acuerdo;
echo $detalle;
echo $id_asamblea;*/

function __construct($id_acuerdo, $acuerdo, $detalle, $id_asamblea){

	$this->id_acuerdo=$id_acuerdo;
	$this->acuerdo=$acuerdo;
	$this->detalle=$detalle;
	$this->id_asamblea=$id_asamblea;
}

/*if(isset($_POST["id_acuerdo"])){
	$id_ac=$_POST["id_acuerdo"];*/

	public function actualiza(){

    $conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();
 	$linkSacadatos->set_charset("utf8");

		$consulta = "UPDATE acuerdos SET num_acuerdo='$this->acuerdo', detalle_acuerdo='$this->detalle', id_asamblea=$this->id_asamblea where id_acuerdo=$this->id_acuerdo";
//echo $consulta;
			if ($linkSacadatos->query($consulta)){
				header("Location: plantilla.php");
											}
			else{
				/*echo "jajaja";*/
				  header("Location: ../plantilla/noplantilla-principal.php");
				}
					}

/*elseif (isset($_POST["acuerdo"])){
	$acuerdo=$_POST["acuerdo"];*/

	public function inserta(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
		$linkSacadatos->set_charset("utf8");

		$consulta = "INSERT into acuerdos values('', '$this->acuerdo', '$this->detalle', '$this->id_asamblea') ";
	//	echo $consulta;	
			if ($linkSacadatos->query($consulta)){
			header("Location: plantilla.php");
											}
			else{
			header("Location: ../plantilla/noplantilla-principal.php");
				}
			}

public function borra(){

		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
 

	$consulta = "DELETE from acuerdos where id_acuerdo='$this->id_acuerdo'";
//echo $consulta;
			if ($linkSacadatos->query($consulta)){

	header("Location: plantilla.php");
				
			}else{
				
	header("Location: ../plantilla/noplantilla-principal.php");
				}

}
}

?>