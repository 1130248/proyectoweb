<?php
// CREANDO MI CONEXION
include_once('../conexion/config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();


if (isset($_GET['id_ac'])){
	$id_acuerdo=$_GET['id_ac'];

	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM acuerdos where id_acuerdo=$id_acuerdo";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();

$s="";
$id_acuerdo=$fila[0];
$num_acuerdo=$fila[1];
$detalle_acuerdo=$fila[2];
$id_asamblea=$fila[3];


}else{

$s="s";
$id_acuerdo="";
$num_acuerdo="";
$detalle_acuerdo="";
$id_asamblea="";

}


include_once('actualizar.php');

if(isset($_POST["id_acuerdo"])){
$insertando=new  NuevoRegistro($_POST["id_acuerdo"],$_POST["acuerdo"],$_POST["detalle"], $_POST["id_asamblea"]);
$insertando->actualiza();

}

elseif (isset($_POST["id_acuerdos"])){
$insertando=new  NuevoRegistro($_POST["id_acuerdos"],$_POST["acuerdo"],$_POST["detalle"], $_POST["id_asamblea"]);
$insertando->inserta();
	

}elseif (isset($_GET["borrar"])){

$insertando=new  NuevoRegistro($_GET["borrar"],0,0,0);
$insertando->borra();

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

		        <label>Acuerdo No.:  <input type="text" name="acuerdo" value="<?php echo $num_acuerdo?>" require=""></label>
		        <label>Detalle:  </label> <textarea name="detalle" rows="10" cols="57" require=""><?php echo $detalle_acuerdo ?> </textarea>

		        <label>Asamblea: <select name="asamblea">    
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
		  
		        <input type="hidden" name="id_acuerdo<?php echo $s;?>" value="<?php echo  $id_acuerdo;?>">
		       
		    </div>
		    <br>
		   
	<center><button value="1"  name="env" class="boton"><span>Aceptar</span></button></center>
			
		</form>
					</div>
					<br>
					<br>