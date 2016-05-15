<!--
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0
-->


<?php
// CREANDO MI CONEXION
include_once('../conexion/config.php');

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();


if (isset($_GET['id_chof'])){
	$id_chofer=$_GET['id_chof'];

if ($id_chofer>0) {

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
$licencia_venc="";

}}

include_once('actualizar.php');

if(isset($_POST["id_chofer"])){
$insertando=new  NuevoRegistro($_POST["id_chofer"],$_POST["nombre"],$_POST["apellido"], $_POST["direccion"], $_POST["telefono"],$_POST["correo"],$_POST["licencia"], $_POST["vencimiento"]);
$insertando->actualiza();

}

elseif (isset($_POST["id_chofers"])){
$insertando=new  NuevoRegistro($_POST["id_chofers"],$_POST["nombre"],$_POST["apellido"], $_POST["direccion"], $_POST["telefono"],$_POST["correo"],$_POST["licencia"], $_POST["vencimiento"]);
$insertando->inserta();
	

}elseif (isset($_GET["borrar"])){

$insertando=new  NuevoRegistro($_GET["borrar"],0,0,0,0,0,0,0);
$insertando->borra();

}

?>
<center>
<div class="form-registro_mas">
		<br>
		<h1>*>>>> Datos <<<<*</h1>
		<br>
		<br>
		<form method="post" action="formulario.php">
			
			<div class="formulario">
		        <label>Nombre:  <input type="text" name="nombre" value="<?php echo $nombre_chofer?>" require=""></label>
		        <label>Apellido:  <input type="text" name="apellido" value="<?php echo  $apellido_chofer?>" require=""></label>
		        <label>Dirección: <input type="text" name="direccion" value="<?php echo $direccion?>" required=""></label>
		        <label>Telefono:  <input type="text" name="telefono" value="<?php echo $telefono?>" required=""></label>
		        <label>Correo:   <input type="text" name="correo" value="<?php echo $correo?>" required=""></label>

		 
		        <label> Licencia: <select require="" name="licencia">
				<option  value=""  disabled selected>Selecciona </option>
				<option  value="Chofer"  <?php if ($licencia_tipo =="Chofer" ){ echo "selected";} 	?>>Chofer </option>
				<option  value="Operador"  <?php if ($licencia_tipo =="Operador" ){ echo "selected";} 	?>>Operador </option>
			</select>
		</label>
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
					</div></center>
					<br>
					<br>