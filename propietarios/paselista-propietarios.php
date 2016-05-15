/**
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0 


 */
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="../asambleas/plantilla.php"><img class="regreso" src="../imagenes/regresar.png"/></a>
<center><img class="img-titulo" src="../Imagenes/asambleas.png"></center>


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
$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM propietarios";
$resultado = $mysqli->query($consulta);
echo "<form method=\"post\"action=\"../asambleas/guardarasistencias.php?asamblea=$id\"> ";
	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td>"; 
		      $mysqli->set_charset("utf8");
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
?>

<br>
<br>
<center><button type="submit" class="boton" style="margin-bottom: 5%;"><span>Guardar</span></button></center>
</form>

