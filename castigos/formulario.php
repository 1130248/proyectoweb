<?php
// CREANDO MI CONEXION
include('../conexion/config.php');



if (isset($_GET['id_cas'])){
	$id_castigo=$_GET['id_cas'];

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
$id_chofer=$fila[7];
$id_checador=$fila[8];

}else{
$s="s";
$id_castigo="";
$motivo="";
$lugar="";
$fecha="";
$dias="";
$inicio="";
$termina="";
$id_chofer="";
$id_checador="";

}

?>
<div class="form-registro_mas">
		<br>
		<h1>Modificar datos</h1>
		<br>
		
		<form method="post" action="actualizar.php">
			
			<div class="formulario">
		        <label>Motivo:  <input type="text" name="motivo" value="<?php echo $motivo?>" require=""></label>
		        <label>Lugar:  <input type="text" name="lugar" value="<?php echo  $lugar?>" require=""></label>
		        <label>Fecha: <input type="date" name="fecha" value="<?php echo $fecha?>" required=""></label>
		        <label>No. días:  <input type="number" name="dias" value="<?php echo $dias?>" required=""></label>
		        <label>Fecha inicio:   <input type="date" name="inicio" value="<?php echo $inicio?>" required=""></label>
		        <label>Fecha termina: <input type="date" name="termina" value="<?php echo $termina?>" required=""></label>
				<label>Chofer:   <select>    
    <?php    
    while ( $row = $result->fetch_array() )    
    {
        ?>
    
        <option value=" <?php echo $row['id_chofer'] ?> " >
        <?php echo $row['nombre_chofer']; ?>
        </option>
        
        <?php
    }    
    ?>        </select></label><br><br><br>
		        <label>Checador: <input type="text" name="checador" value="<?php echo $id_checador?>" required=""></label>

		        <input type="hidden" name="id_castigo<?php echo $s;?>" value="<?php echo  $id_castigo;?>">
		       
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