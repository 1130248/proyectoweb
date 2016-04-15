<?php
// CREANDO MI CONEXION
include('../conexion/config.php');



if (isset($_GET['id_chof'])){
	$id_chofer=$_GET['id_chof'];

	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM choferes where id_chofer=$id_chofer";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();

$s="";
$id_chofer=$fila[0];
$nombre_chofer=$fila[1];
$apellido_chofer=$fila[2];
$direccion=$fila[3];
$telefono=$fila[4];
$correo=$fila[5];
$licencia_tipo=$fila[6];
$licencia_venc=$fila[7];

}else{
$s="s";
$id_chofer="";
$nombre_chofer="";
$apellido_chofer="";
$direccion="";
$telefono="";
$correo="";
$licencia_tipo="";
$licencia_tipo="";

}

?>
<div class="form-registro_mas">
		<br>
		<h1>Modificar datos</h1>
		<br>
		<br>
		<form method="post" action="actualizar.php">
			
			<div class="formulario">
		        <label>Nombre:  <input type="text" name="nombre" value="<?php echo $nombre_chofer?>" require=""></label>
		        <label>Apellido:  <input type="text" name="apellido" value="<?php echo  $apellido_chofer?>" require=""></label>
		        <label>Dirección: <input type="text" name="direccion" value="<?php echo $direccion?>" required=""></label>
		        <label>Telefono:  <input type="text" name="telefono" value="<?php echo $telefono?>" required=""></label>
		        <label>Correo:   <input type="text" name="correo" value="<?php echo $correo?>" required=""></label>
		        <label>Licencia: <input type="text" name="licencia" value="<?php echo $licencia_tipo?>" required=""></label>
		        <label>Vencimiento: <input type="date" name="vencimiento" value="<?php echo $licencia_venc?>" required=""></label>
		        <input type="hidden" name="id_chofer<?php echo $s;?>" value="<?php echo  $id_chofer;?>">
		       
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