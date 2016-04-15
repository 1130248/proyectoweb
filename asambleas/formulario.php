<?php
// CREANDO MI CONEXION
include('../conexion/config.php');



if (isset($_GET['id_asam'])){
	$id_asamblea=$_GET['id_asam'];

	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM asambleas where id_asamblea=$id_asamblea";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();
$s="";
$id_asamblea=$fila[0];
$fecha_asamblea=$fila[1];
$lugar_asamblea=$fila[2];
$asistencia=$fila[3];
$nacuerdos=$fila[4];


}else{
$s="s";
$id_asamblea="";
$fecha_asamblea="";
$lugar_asamblea="";
$asistencia="";
$nacuerdos="";

}

?>
<div class="form-registro">
		<br>
		<h1>Modificar datos</h1>
		<br>
		
		<form method="post" action="actualizar.php">
			
			<div class="formulario">
		        <label>Fecha:  <input type="calendar" name="fecha" value="<?php echo $fecha_asamblea?>" require=""></label>
		        <label>Lugar:  <input type="text" name="lugar" value="<?php echo  $lugar_asamblea?>" require=""></label>
		        <label>Asistencia: <input type="number" name="asistencia" value="<?php echo $asistencia?>" required=""></label>
		        <label>No. Acuerdos:  <input type="number" name="nacuerdos" value="<?php echo $nacuerdos?>" required=""></label>
		        
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