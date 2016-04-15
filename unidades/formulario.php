<?php
// CREANDO MI CONEXION
include('../conexion/config.php');



if (isset($_GET['placa'])){
	$placa_unidad=$_GET['placa'];

	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM unidades where placa_unidad=$placa_unidad";
$resultado = $mysqli->query($consulta);

$fila = $resultado->fetch_row();

$s="";
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
$placa_unidad="";
$numero_unidad="";
$matricula_unidad="";
$modelo_unidad="";
$marca_unidad="";
$vencseguro_unidad="";
$id_propietario="";
$id_chofer="";

}

?>


<div class="form-registro_mas">
		<br>
		<h1>Modificar datos</h1>
		<br>
		<br>
		<form method="post" action="actualizar.php">
			
			<div class="formulario">

				<label>Placa:  <input type="text" name="placa" value="<?php echo $placa_unidad?>" require=""></label>
				<label>Unidad No.: <input type="number" name="unidadn" value="<?php echo $numero_unidad?>" required=""></label>
		        <label>Matricula:  <input type="text" name="matricula" value="<?php echo $matricula_unidad?>" require=""></label>
		        <label>Modelo:  <input type="text" name="modelo" value="<?php echo  $modelo_unidad?>" require=""></label>
		        <label>Marca: <input type="text" name="marca" value="<?php echo $marca_unidad?>" required=""></label>
		        <label>Venc. Póliza:  <input type="date" name="vencimiento_seguro" value="<?php echo $vencseguro_unidad?>" required=""></label>
		    <?php
		    include('../conexion/config.php');
		    $mysqli->set_charset("utf8");
		    $consulta="SELECT * from propietarios";
		    $result= $mysqli->query($consulta);
		    ?>

		        <label>Propietario:   <select>    
    <?php    
    while ($row = $result->fetch_array()){
    ?>
        <option value="<?php echo $row['id_propietario'] ?>">
        <?php echo $row['nombre_propietario']; ?>
        </option>
        <?php
    }    
    ?>       	</select></label>


            <?php
            include('../conexion/config.php');
            $mysqli->set_charset("utf8");
            $consulta="SELECT * from choferes";
            $result= $mysqli->query($consulta);
            ?>

		        <label>Chofer: <select>    
    <?php    
    while ($row = $result->fetch_array()){
        ?>
    
        <option value=" <?php echo $row['id_chofer'] ?> " >
        <?php echo $row['nombre_chofer']; ?>
        </option>
        <?php
    }    
    ?>        </select></label>
		        <input type="hidden" name="placa_unidad<?php echo $s;?>" value="<?php echo  $placa_unidad;?>">
		       
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