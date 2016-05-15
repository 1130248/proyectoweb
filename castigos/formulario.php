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


if (isset($_GET['id_cas'])){
	$id_castigo=$_GET['id_cas'];

if ($id_castigo>0) {
	

	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM castigos where id_castigo=$id_castigo";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();

$s="";
$id_castigo=$fila[0];
$motivo=$fila[1];
$lugar=$fila[2];
$fecha=$fila[3];
$dias=$fila[4];
$inicio=$fila[5];
$termina=$fila[6];
$chofer=$fila[7];
$checador=$fila[8];

}else{
	
$s="s";
$id_castigo="";
$motivo="";
$lugar="";
$fecha="";
$dias="";
$inicio="";
$termina="";
$chofer="";
$checador="";

}}

include_once('actualizar.php');

if(isset($_POST["id_castigo"])){
$insertando=new  NuevoRegistro($_POST["id_castigo"],$_POST["motivo"],$_POST["lugar"], $_POST["fecha"], $_POST["dias"], $_POST["inicio"], $_POST["termina"], $_POST["id_chofer"], $_POST["id_checador"]);
$insertando->actualiza();

}

elseif (isset($_POST["id_castigos"])){
$insertando=new  NuevoRegistro($_POST["id_castigos"],$_POST["motivo"],$_POST["lugar"], $_POST["fecha"], $_POST["dias"], $_POST["inicio"], $_POST["termina"], $_POST["id_chofer"], $_POST["id_checador"]);
$insertando->inserta();
	

}elseif (isset($_GET["borrar"])){

$insertando=new  NuevoRegistro($_GET["borrar"],0,0,0,0,0,0,0,0);
$insertando->borra();

}


?>

<?php
include_once('../conexion/config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
$mysqli->set_charset("utf8");
$consulta="SELECT * from choferes";
$result= $mysqli->query($consulta);
?>

<?php
include_once('../conexion/config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
$mysqli->set_charset("utf8");
$consulta="SELECT * from checadores";
$resulta= $mysqli->query($consulta);
?>
<center>
<div class="form-registro_mas">
		<br>
		<h1>*>>>> Datos <<<<*</h1>
		<br>
		
		<form method="post" action="formulario.php">
			
			<div class="formulario">
		        <label>Motivo:  <input type="text" name="motivo" value="<?php echo $motivo?>" require=""></label>
		        <label>Lugar:  <input type="text" name="lugar" value="<?php echo  $lugar?>" require=""></label>
		        <label>Fecha: <input type="date" name="fecha" value="<?php echo $fecha?>" required=""></label>
		        <label>No. días:  <input type="number" name="dias" value="<?php echo $dias?>" required=""></label>
		        <label>F. Inicio:   <input type="date" name="inicio" value="<?php echo $inicio?>" required=""></label>
		        <label>F. Termina: <input type="date" name="termina" value="<?php echo $termina?>" required=""></label>
				<label>Chofer:   <select require="" name="id_chofer">  
					<option  value=""  disabled selected>Selecciona </option>  
    <?php    
    while ( $row = $result->fetch_array() )    
    { ?>
    
        <option value=" <?php echo $row['id_chofer'] ?> " <?php if ($chofer == $row['id_chofer'] ){ echo "selected";} 	?>>
        <?php echo $row['nombre_chofer']; ?>
        </option>
        
        <?php } ?>        </select></label>

		        
		        <label>Checador:  <select require="" name="id_checador">  
		        	<option  value=""  disabled selected>Selecciona </option>  
    <?php    
    while ( $row = $resulta->fetch_array() )    
    { ?>
    
        <option value=" <?php echo $row['id_checador'] ?> " <?php if ($checador == $row['id_checador'] ){ echo "selected";} 	?>>
        <?php echo $row['nombre_checador']; ?>
        </option>
        
        <?php }  ?>        </select></label>

		        <input type="hidden" name="id_castigo<?php echo $s;?>" value="<?php echo  $id_castigo;?>">
		       
		    </div>
		  
		  <br>
		  <br>
		   
	<center><button value="1"  name="env" class="boton"><span>Aceptar</span></button></center>
			
		</form>
					</div></center>
					<br>
					<br>
					<br>