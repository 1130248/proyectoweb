<img class="img-titulo" src="../Imagenes/propietarios.png">

<?php

include_once('../conexion/config.php');

$estilo="prop";
echo "<table id=".$estilo." border=0>";
echo "<tr>";

echo "<th>Id</th>
	  <th>Nombre</th>
	  <th>Apellido</th>
	  <th>Dirección</th>
	  <th>Telefono</th>
	  <th>E_mail</th>
	  <th>Unidades</th>
	  <th>Opciones</th>";
echo "</tr>";




$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

$consulta = "SELECT * FROM propietarios";
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
		      <td><center>
			  <a href=plantilla-actualizar-propietarios.php?id_prop=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=actualizar-propietarios.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
		echo "</tr>";

	}
echo "</table>";

echo "<br>";

?>

<a href="plantilla-actualizar-propietarios.php"><button type="submit" class="boton" style="margin-bottom: 30%;"><span>Agregar</span></button></a>
