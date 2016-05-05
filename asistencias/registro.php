<br>
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/asistencias.png"></center>
<br>
<br>



<?php

// mi conexion

$mysqli = new mysqli("localhost","root", "", "routesystem23");

/*Comprobar la conexion*/

if (mysqli_connect_errno()) {
	printf("Fallo la conexion: %s\n", mysqli_connect_error());
exit();

}
//$mysqli->set_charset("utf8");
$estilo="prop";

echo "<table id=".$estilo." border=0>";
echo "<tr>";

echo "<th>Id</th>
	  <th>Nombre</th>
	  <th>Asistidas</th>
	  <th>Inasistidas</th>";

echo "</tr>";



$consulta = "SELECT * FROM propietarios";
$resultado = $mysqli->query($consulta);

	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>

		      <td><center> <a href=plantilla-tablas.php?id_ac=".$fila[0]."><img src=../imagenes/asistida.png width=35 height=35 /></a></td>
		    </center> 
		   <td><center><a href=plantilla-tablas.php?id_ac=".$fila[0]."&id_asam=".$fila[0]."><img src=../imagenes/noasistida.png width=35 height=35 /></center></td>

		    

	  ";
		echo "</tr>";

	}
echo "</table>";

echo "<br>";

?>
<br>
<br>
<br>