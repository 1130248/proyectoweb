<<<<<<< HEAD
<br>
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/asambleas.png"></center>
<br>
<br>
<br>
=======
<img class="img-titulo" src="../Imagenes/asambleas.png">

>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d
<?php

include_once('../conexion/config.php');
$id=$_GET["id_ac"];
$estilo="prop";
echo "<table id=".$estilo." border=0>";
echo "<tr>";

echo "<th>Id</th>
	  <th>Nombre</th>
	  <th>Apellido</th>
	  <th>Fecha</th>
	  <th>Asistencia</th>";
echo "</tr>";




$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

$consulta = "SELECT * FROM propietarios";
$resultado = $mysqli->query($consulta);
echo "<form method=\"post\"action=\"../asambleas/guardarasistencias.php?asamblea=$id\"> ";
	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td>"; 
    $consulta2="SELECT asambleas.fecha_asamblea from asambleas WHERE asambleas.id_asamblea=$id";
    $resultado2=$mysqli->query($consulta2);
    $fila2=$resultado2->fetch_row(); 
       echo $fila2[0];
    echo "</td>


		      <td width=30 height=25>

<div align=center>

<input type=\"checkbox\" name=\"checkbox[]\" value=\"".$fila[0]."\"/>

</div>

</label></td>";
		echo "</tr>";

	}
echo "</table>";

echo "<br>";

?>
<<<<<<< HEAD
<br>
<br>
<center><button type="submit" class="boton" style="margin-bottom: 10%;"><span>Guardar</span></button></center>

</form>
<br>
<br>
=======

<button type="submit" class="boton" style="margin-bottom: 30%;"><span>Guardar</span></button>

</form>
>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d
