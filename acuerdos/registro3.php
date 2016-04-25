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
$id=$_GET["id_asamblea"];

$consulta = "SELECT * FROM acuerdos where id_asamblea=$id";
$resultado = $mysqli->query($consulta);



	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td>".$fila[3]."</td>

		      <td><center>
			  <a href=plantilla-actualizar.php?id_ac=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
		echo "</tr>";

	}
echo "</table>";

echo "<br>";

?>

<a href="plantilla-actualizar.php?id_asam=<?php echo $id; ?>"><button type="submit" class="boton" style="margin-bottom: 30%;"><span>Agregar</span></button></a>
