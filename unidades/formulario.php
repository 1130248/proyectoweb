<?php
// CREANDO MI CONEXION
include_once('../conexion/config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();


if (isset($_GET['placa'])){
	$placa_unidad=$_GET['placa'];

	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM unidades where placa_unidad='$placa_unidad'";

$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();

$s="";
$id=$fila[0];
$placa_unidad=$fila[0];
$numero_unidad=$fila[1];
$matricula_unidad=$fila[2];
$modelo_unidad=$fila[3];
$marca_unidad=$fila[4];
$vencseguro_unidad=$fila[5];
$id_propietario=$fila[6];
$id_chofer=$fila[7];

}else{
$s="s";
$id="";
$placa_unidad="";
$numero_unidad="";
$matricula_unidad="";
$modelo_unidad="";
$marca_unidad="";
$vencseguro_unidad="";
$id_propietario="";
$id_chofer="";

}

include_once('actualizar.php');

if(isset($_POST["id"])){

$insertando=new  NuevoRegistro($_POST["placa_unidad"],$_POST["unidad"],$_POST["matricula"], $_POST["modelo"], $_POST["marca"],$_POST["seguro"],$_POST["id_propietario"], $_POST["id_chofer"],$_POST["id"]);
$insertando->actualiza();

}

elseif (isset($_POST["ids"])){
$insertando=new  NuevoRegistro($_POST["placa_unidad"],$_POST["unidad"],$_POST["matricula"], $_POST["modelo"], $_POST["marca"],$_POST["seguro"],$_POST["id_propietario"], $_POST["id_chofer"],0);
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
$consulta="SELECT * from propietarios";
$result= $mysqli->query($consulta);
?>

<?php
include_once('../conexion/config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
$mysqli->set_charset("utf8");
$consulta="SELECT * from choferes";
$resulta= $mysqli->query($consulta);
?>

<div class="form-registro_mas">
		<br>
		<h1>*>>>> Datos <<<<*</h1>
		<br>
		<br>
		<form method="post" action="#">
			
			<div class="formulario">

				<label>Placa:  <input type="text" name="placa_unidad" value="<?php echo $placa_unidad?>" require=""></label>
				<label>Unidad No.: <input type="number" name="unidad" value="<?php echo $numero_unidad?>" required=""></label>
		        <label>Matricula:  <input type="text" name="matricula" value="<?php echo $matricula_unidad?>" require=""></label>
		        <label>Modelo:  <input type="text" name="modelo" value="<?php echo  $modelo_unidad?>" require=""></label>
		        <label>Marca: <input type="text" name="marca" value="<?php echo $marca_unidad?>" required=""></label>
		        <label>Venc. Póliza:  <input type="date" name="seguro" value="<?php echo $vencseguro_unidad?>" required=""></label>
		   
		       

    <label> Propietario: <select require="" name="id_propietario">
				<option  value=""  >Selecciona </option>
				<?PHP
				while ($fila = $result->fetch_row()){
					
					echo "<option value='".$fila['0']."'> ".$fila['1']."</option>";
				}
				?>
			</select>
		</label>

 <label> Chofer: <select require="" name="id_chofer">
				<option  value=""  >Selecciona </option>
				<?PHP
				while ($fila = $resulta->fetch_row()){
					
					echo "<option value='".$fila['0']."'> ".$fila['1']."</option>";
				}
				?>
			</select>
		</label>
		        <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $placa_unidad;?>">
		       
		    </div>
		    <br>
		    <br>
		    <br>
		    <br>
		    
		   
	<center><button value="1"  name="env" class="boton"><span>Aceptar</span></button></center>
			
		</form>
					</div>
					<br>
					<br>