<?php


if (isset($_POST['id_acuerdo'])){

$num_acuerdo=$_POST["num_acuerdo"];
$detalle_acuerdo=$_POST["detalle_acuerdo"];
$id_asamblea=$_POST["id_asamblea"];

}else{

$num_acuerdo="";
$detalle_acuerdo="";
$id_asamblea="";

}
?>

<?php

?>


<div class="form-registro">
		<br>
		<h1>*>>>> Datos <<<<*</h1>
		<br>
		<br>
		<form method="post" action="#">
			
			<div class="formulario">

		        <label>Acuerdo No.:  <input type="text" name="num_acuerdo" value="<?php echo $num_acuerdo?>" require=""></label>
		        <label>Detalle:  </label> <textarea name="detalle_acuerdo" rows="10" cols="57" require=""><?php echo $detalle_acuerdo ?> </textarea>

		        <label>Asamblea: <select name="id_asamblea">    
    <?php
    $consulta="SELECT * from asambleas";
    $result1= $mysqli->query($consulta);    
    while ( $row = $result1->fetch_array() )    
    {
        ?>
    
        <option value="<?php echo $row['id_asamblea'] ?> " ><?php echo $row['id_asamblea'] ?>
        <?php echo $row['fecha_asamblea']; ?>
        </option>
        
        <?php
    }    
    ?>        </select></label>
		  
		        <input type="hidden" name="id_acuerdo">
		    </div>
		    <br>
		   
	<center><button value="1"  name="env" class="boton"><span>Buscar</span></button></center>
			
		</form>
					</div>
					<br>
					<br>

<!-- FIN del formulario de busquedas -->

			
			<table id="prop">;
<thead>	<tr>
					<th>ID</th>
					<th>NUMERO</th>
					<th>DETALLE</th>
					<th>ASAMBLEA</th>
					<th>opciones</th>
					</tr>		

			<?php
include_once('reportes.class.php');
$tablas = new Tablas($num_acuerdo,$detalle_acuerdo,$id_asamblea);
$tabla = $tablas->acuerdos();


			?>
		</div>