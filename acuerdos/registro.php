<img class="img-titulo" src="../Imagenes/acuerdos.png">
<br>
<br>
<br>

<a href="../graficas/plantilla-grafica-acuerdos.php"><img class="grafico" src="../imagenes/grafica.png"/></a> 

<?php
include_once('../conexion/config.php');



$estilo="prop";

echo "<table id=".$estilo." border=0>";
echo "<tr>";

echo "<th>Id</th>
	  <th>Acuerdo No.</th>
	  <th>Detalle</th>
	  <th>Asamblea</th>
	  <th>Opciones</th>";
echo "</tr>";

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
/*$id=$_GET["id_asam"];*/
if (isset($_GET['id_ac'])){
	$id_asamblea=$_GET['id_ac'];
	$asamblea=$_GET['id_ac'];
	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM asambleas where id_asamblea=$id_asamblea";
$resultado1 = $mysqli->query($consulta);
$fila1 = $resultado1->fetch_row();

$s="";
$id=$fila1[0];
 //echo $consulta;

$consulta = "SELECT * FROM acuerdos where id_asamblea=$id_asamblea";
$resultado = $mysqli->query($consulta);

}else{
$consulta = "SELECT * FROM acuerdos";
$resultado = $mysqli->query($consulta);

}

	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td>".$fila[3]."</td>

		      <td><center>";
		      if (isset($_GET['id_ac'])){
echo "<a href=plantilla-actualizar.php?id_ac=".$fila[0]."&id_asam=$id; ><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."&id_asam=$id;><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";

		      }else{

echo "<a href=plantilla-actualizar.php?id_ac=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";
		      }

			  
echo "</center></td>";
		echo "</tr>";

	}
echo "</table>";

echo "<br>";
 if (isset($_GET['id_ac'])){?>

<a href="plantilla-actualizar.php?id_asam=<?php echo $id; ?>"><button type="submit" class="boton" style="margin-bottom: 30%;"><span>Agregar</span></button></a>
<?php
		      }else{ ?>

<a href="plantilla-actualizar.php"><button type="submit" class="boton" style="margin-bottom: 30%;"><span>Agregar</span></button></a>

<?php
		      }
?>
