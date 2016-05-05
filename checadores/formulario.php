<?php
// CREANDO MI CONEXION
include_once('../conexion/config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();


if (isset($_GET['id_checa'])){
	$id_checador=$_GET['id_checa'];

if ($id_checador>0) {

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

}}

include_once('actualizar.php');

if(isset($_POST["id_checador"])){
$insertando=new  NuevoRegistro($_POST["id_checador"],$_POST["nombre"],$_POST["apellido"], $_POST["direccion"], $_POST["telefono"],$_POST["correo"],$_POST["estacion"], $_POST["entrada"],$_POST["salida"], $_POST["descanso"]);
$insertando->actualiza();

}

elseif (isset($_POST["id_checadors"])){
$insertando=new  NuevoRegistro($_POST["id_checadors"],$_POST["nombre"],$_POST["apellido"], $_POST["direccion"], $_POST["telefono"],$_POST["correo"],$_POST["estacion"], $_POST["entrada"],$_POST["salida"], $_POST["descanso"]);
$insertando->inserta();
	

}elseif (isset($_GET["borrar"])){

$insertando=new  NuevoRegistro($_GET["borrar"],0,0,0,0,0,0,0,0,0);
$insertando->borra();

}

?>

<center>
<div class="form-registro_mas">
		<br>
		<h1>*>>>> Datos <<<<*</h1>
		
	
		<form method="post" action="formulario.php">
			
			<div class="formulario">
		        <label>Nombre:  <input type="text" name="nombre" value="<?php echo $nombre_checador?>" require=""></label>
		        <label>Apellido:  <input type="text" name="apellido" value="<?php echo  $apellido_checador?>" require=""></label>
		        <label>Dirección: <input type="text" name="direccion" value="<?php echo $direccion?>" required=""></label>
		        <label>Telefono:  <input type="text" name="telefono" value="<?php echo $telefono?>" required=""></label>
		        <label>Correo:   <input type="text" name="correo" value="<?php echo $correo?>" required=""></label>
		        <label>Estación: <input type="text" name="estacion" value="<?php echo $estacion?>" required=""></label>
		        <label>Entrada:  <input type="time" name="entrada" value="<?php echo $hora_entrada?>" required=""></label>
		        <label>Salida:   <input type="time" name="salida" value="<?php echo $hora_salida?>" required=""></label>
		       
		        <label>Dia descanso: <select require="" name="descanso">
				<option  value=""  >Selecciona </option>

				<option  value="domingo" name="domingo">Domingo </option>
				<option  value="lunes"  name="lunes">Lunes </option>
				<option  value="martes"  name="martes">Martes </option>
				<option  value="miercoles" name="miercoles" >Miercoles </option>
				<option  value="jueves" name="jueves" >Jueves </option>
				<option  value="viernes" name="viernes" >Viernes </option>
				<option  value="sabado" name="sabado" >Sábado </option>

			</select>
		</label>

		        <input type="hidden" name="id_checador<?php echo $s;?>" value="<?php echo  $id_checador;?>">
		       
		    </div>
		    
		   <br>
		   <br>
		   
	<button value="1"  name="env" class="boton"><span>Aceptar</span></button>
			
		</form>
					</div></center>
					<br>
					<br>