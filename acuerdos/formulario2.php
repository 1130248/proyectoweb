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
$mysqli->set_charset("utf8");

if (isset($_GET['id_ac'])){

	$id_acuerdo=$_GET['id_ac'];

	if ($id_acuerdo>0) {
		# code...

	$mysqli->set_charset("utf8");

	$consulta = "SELECT * FROM acuerdos where id_acuerdo=$id_acuerdo";
	$resultado = $mysqli->query($consulta);
	$fila = $resultado->fetch_row();

	$s="";
	$r=0;
	$id_acuerdo=$fila[0];
	$num_acuerdo=$fila[1];
	$detalle_acuerdo=$fila[2];
	$id_asamblea=$fila[3];


}else{
	if (isset($_GET['id_asam'])){
		$asam=$_GET['id_asam'];
		if ($asam>0) {
			# code...
		
		$r=0;
		$s="s";
		$id_acuerdo="";
		$num_acuerdo="";
		$detalle_acuerdo="";
		$id_asamblea="";
		$id_asamblea=$_GET['id_asam'];

	}else{
		$r=1;
		$s="s";
		$id_acuerdo="";
		$num_acuerdo="";
		$detalle_acuerdo="";
		$id_asamblea="";
	}
}
}}

$as=$_GET['id_asam'];
$ac=$_GET['id_ac'];

if ($as>0 && $ac>0){

	include_once('actualizar1.php');
}else{
	if ($as>0 || isset($_GET['borrar'])){

		if ($as>0 && isset($_GET['borrar'])) {
include_once('actualizar1.php');
				$asam=$_GET['id_asam'];


		}else{

			if ($as>0){

				include_once('actualizar1.php');
				$asam=$_GET['id_asam'];

			}else{

				include_once('actualizar.php');
				$asam;
			}}
		}else{
			include_once('actualizar.php');
			$asam;
		}
	}
	if(isset($_POST["id_acuerdo"])){
		$insertando=new  NuevoRegistro($_POST["id_acuerdo"],$_POST["acuerdo"],$_POST["detalle"], $_POST["id_asamblea"]);
		$insertando->actualiza();

	}

	elseif (isset($_POST["id_acuerdos"])){
		$insertando=new  NuevoRegistro($_POST["id_acuerdos"],$_POST["acuerdo"],$_POST["detalle"], $_POST["id_asamblea"]);
		$insertando->inserta();


	}elseif (isset($_GET["borrar"])){

		$insertando=new  NuevoRegistro($_GET["borrar"],0,0,$asam);
		$insertando->borra();

	}

	?>

	<?php

	?>


	<div class="form-registro">
		<br>
		<h1>*>>>> Datos <<<<*</h1>
		<br>
		<br><center>
		<form method="post" action="#">

			<div class="formulario">

				<label>Acuerdo No.:  <input type="text" name="acuerdo" value="<?php echo $num_acuerdo?>" require=""></label>
				<label>Detalle:  </label> <textarea name="detalle" rows="10" cols="57" require=""><?php echo $detalle_acuerdo ?> </textarea>
				<?php
				if($r>0){
					?>
					<label>Asamblea: <select name="id_asamblea">    
						<?php
						$consulta="SELECT * from asambleas";
						$result1= $mysqli->query($consulta);    
						while ( $row = $result1->fetch_array() )    
						{
							?>

							<option value="<?php echo $row['id_asamblea'] ?> " >
								<?php echo $row['fecha_asamblea']; ?>
							</option>

							<?php
						}    
						?>        </select></label>


						<?php
					}else{
						?>
						<label>Asamblea: <select name="id_asamblea">    
							<?php
							$consulta="SELECT * from asambleas where id_asamblea=$id_asamblea";
							$result1= $mysqli->query($consulta);    
							while ( $row = $result1->fetch_array() )    
							{
								?>

								<option value="<?php echo $row['id_asamblea'] ?> " >
									<?php echo $row['fecha_asamblea']; ?>
								</option>

								<?php
							}    
							?>        </select></label>


							<?php
						}
						?>


						<input type="hidden" name="id_acuerdo<?php echo $s;?>" value="<?php echo  $id_acuerdo;?>">

					</div>
					<br>
					<br>
					<br>

					<center><button value="1"  name="env" class="boton"><span>Aceptar</span></button></center>

				</form></center>
			</div>
			<br>
			<br>
			<br>
			<br>