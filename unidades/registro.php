<img class="img-titulo" src="../Imagenes/unidades.png">

<?php
include_once('../conexion/config.php');

//$mysqli->set_charset("utf8");
$estilo="prop";

echo "<table id=".$estilo." border=0>";
echo "<tr>";

echo "<th> Placa </th>
	  <th> Numero </th>
	  <th> Matrícula </th>
	  <th> Modelo </th>
	  <th> Marca </th>
	  <th> Póliza/Vencimiento </th>
	  <th> Propietario </th>
	  <th> Chofer </th>
	  <th> Opciones </th>";
echo "</tr>";

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

$consulta = "SELECT * FROM unidades";
$resultado = $mysqli->query($consulta);

	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td>".$fila[3]."</td>
		      <td>".$fila[4]."</td>
		      <td>".$fila[5]."</td>
		      <td>".$fila[6]."</td>
		      <td>".$fila[7]."</td>
		      <td><center>

			  <a href=plantilla-actualizar.php?placa=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
		echo "</tr>";

	}
echo "</table>";

echo "<br>";

?>

<a href="plantilla-actualizar.php"><button type="submit" class="boton" style="margin-bottom: 30%;"><span>Agregar</span></button></a>
