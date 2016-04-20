<img class="img-titulo" src="../Imagenes/asambleas.png">

<?php
include_once('../conexion/config.php');

$estilo="prop";

echo "<table id=".$estilo." border=0>";
echo "<tr>";

echo "<th>Id</th>
	  <th>Fecha</th>
	  <th>Lugar</th>
	  <th>Asistencia</th>
	  <th>Acuerdos</th>
	  <th>Opciones</th>";
echo "</tr>";

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

$consulta = "SELECT * FROM asambleas";
$resultado = $mysqli->query($consulta);

	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td>".$fila[3]."</td>
		      <td><a href=../acuerdos/plantilla.php?id_asam=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></td>
	
		      <td><center>
			  <a href=plantilla-actualizar.php?id_asam=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
		echo "</tr>";

	}
echo "</table>";

echo "<br>";

?>

<a href="plantilla-actualizar.php"><button type="submit" class="boton" style="margin-bottom: 30%;"><span>Agregar</span></button></a>
