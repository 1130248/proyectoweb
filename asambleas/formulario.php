<?php
// CREANDO MI CONEXION
include_once('../conexion/config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();


if (isset($_GET['id_asam'])){
	$id_asamblea=$_GET['id_asam'];

	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM asambleas where id_asamblea=$id_asamblea";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();

$s="";
$id_asamblea=$fila[0];
$lugar_asamblea=$fila[1];
$fecha_asamblea=$fila[2];



}else{

$s="s";
$id_asamblea="";
$lugar_asamblea="";
$fecha_asamblea="";


}


include_once('actualizar.php');

if(isset($_POST["id_asamblea"])){
$insertando=new  NuevoRegistro($_POST["id_asamblea"],$_POST["lugar"],$_POST["fecha"]);
$insertando->actualiza();

}

if(isset($_POST["id_asambleas"])){
$insertando=new  NuevoRegistro($_POST["id_asambleas"],$_POST["lugar"],$_POST["fecha"]);
$insertando->inserta();
	

}elseif (isset($_GET["borrar"])){

$insertando=new  NuevoRegistro($_GET["borrar"],0,0);
$insertando->borra();

}
?>


<div class="form-registro">
		<br>
		<h1>*>>>> Datos <<<<*</h1>
		<br>
		
		<form method="post" action="#">
			
			<div class="formulario">
		        <label>Lugar:  <input type="text" name="lugar" value="<?php echo $lugar_asamblea?>" require=""></label>
		        <label>Fecha:  <input type="date" name="fecha" value="<?php echo  $fecha_asamblea?>" require=""></label>
		        
		        <input type="hidden" name="id_asamblea<?php echo $s;?>" value="<?php echo  $id_asamblea;?>">
		       
		    </div>
		    <br>
		    <br>
		    <br>
		    <br>
		    <br>
		   
	<center><button value="1"  name="env" class="boton"><span>Aceptar</span></button></center>
			
		</form>
					</div>
					<br>
					<br>