<?php
// CREANDO MI CONEXION
include('../conexion/config.php');



if (isset($_GET['id_checa'])){
	$id_checador=$_GET['id_checa'];

	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM checadores where id_checador=$id_checador";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();

$s="";
$id_checador=$fila[0];
$nombre_checador=$fila[1];
$apellido_checador=$fila[2];
$direccion=$fila[3];
$telefono=$fila[4];
$correo=$fila[5];
$estacion=$fila[6];
$hora_entrada=$fila[7];
$hora_salida=$fila[8];
$ddescanso=$fila[9];

}else{
$s="s";
$id_checador="";
$nombre_checador="";
$apellido_checador="";
$direccion="";
$telefono="";
$correo="";
$estacion="";
$hora_entrada="";
$hora_salida="";
$ddescanso="";

}

?>
<div class="form-registro_mas">
		<br>
		<h1>Modificar datos</h1>
		
	
		<form method="post" action="actualizar.php">
			
			<div class="formulario">
		        <label>Nombre:  <input type="text" name="nombre" value="<?php echo $nombre_checador?>" require=""></label>
		        <label>Apellido:  <input type="text" name="apellido" value="<?php echo  $apellido_checador?>" require=""></label>
		        <label>Dirección: <input type="text" name="direccion" value="<?php echo $direccion?>" required=""></label>
		        <label>Telefono:  <input type="text" name="telefono" value="<?php echo $telefono?>" required=""></label>
		        <label>Correo:   <input type="text" name="correo" value="<?php echo $correo?>" required=""></label>
		        <label>Estación: <input type="text" name="estacion" value="<?php echo $estacion?>" required=""></label>
		        <label>Entrada:  <input type="time" name="entrada" value="<?php echo $hora_entrada?>" required=""></label>
		        <label>Salida:   <input type="time" name="salida" value="<?php echo $hora_salida?>" required=""></label>
		        <label>Dia descanso: <input type="text" name="descanso" value="<?php echo $ddescanso?>" required=""></label>


		        <input type="hidden" name="id_checador<?php echo $s;?>" value="<?php echo  $id_checador;?>">
		       
		    </div>
		    <br>
		     <br>
		      <br>
		   
	<center><button value="1"  name="env" class="boton"><span>Aceptar</span></button></center>
			
		</form>
					</div>
					<br>
					<br>