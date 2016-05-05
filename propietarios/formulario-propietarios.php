<?php
// CREANDO MI CONEXION
include_once('../conexion/config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();






if (isset($_GET['id_prop'])){
	$id=$_GET['id_prop'];

if ($id>0) {

	$mysqli->set_charset("utf8");
	
$consulta = "SELECT * FROM propietarios where id_propietario=$id";

$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();

$s="";
$id_propietario=$fila[0];
$nombre_propietario=$fila[1];
$apellido_propietario=$fila[2];
$direccion=$fila[3];
$telefono=$fila[4];
$correo=$fila[5];


}else{
$s="s";
$id_propietario="";
$nombre_propietario="";
$apellido_propietario="";
$direccion="";
$telefono="";
$correo="";


}}

include_once('actualizar-propietarios.php');

if(isset($_POST["id_propietario"])){
$insertando=new  NuevoRegistro($_POST["id_propietario"],$_POST["nombre"],$_POST["apellido"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"]);
$insertando->actualiza();

}

elseif (isset($_POST["id_propietarios"])){
$insertando=new  NuevoRegistro($_POST["ids"],$_POST["nombre"],$_POST["apellido"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"]);
$insertando->inserta();
	

}elseif (isset($_GET["borrar"])){

$insertando=new  NuevoRegistro($_GET["borrar"],0,0,0,0,0);
$insertando->borra();

}else{  //header("Location: ejemplo2.php");
}

?>
<center>
<div class="form-registro">
		<br>
		<h1>*>>>> Datos <<<<*</h1>
		<br>
		<form method="post" action="formulario-propietarios.php">
			
			<div class="formulario">
		        <label>Nombre:  <input type="text" name="nombre" value="<?php echo $nombre_propietario?>" require=""></label>
		        <label>Apellido:  <input type="text" name="apellido" value="<?php echo  $apellido_propietario?>" require=""></label>
		        <label>Dirección: <input type="text" name="direccion" value="<?php echo $direccion?>" required=""></label>
		        <label>Telefono:  <input type="text" name="telefono" value="<?php echo $telefono?>" required=""></label>
		        <label>Correo:   <input type="text" name="correo" value="<?php echo $correo?>" required=""></label>
		       <!-- <label>Unidades: <input type="number" name="nunidades" value="<?php echo $nunidades?>" required=""></label>-->
		        <input type="hidden" name="id_propietario<?php echo $s;?>" value="<?php echo  $id_propietario;?>">
		       
		    </div>
		    <br>
		    <br>

		   
	<button value="1"  name="env" class="boton"><span>Aceptar</span></button>
			
		</form>
					</div></center>
					<br>
					<br>