<<<<<<< HEAD
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/asamasistencia.png"></center>
<br>

<a href="../asistencias/plantilla.php"><img class="regreso" src="../imagenes/regresar.png"/></a>
=======
<img class="img-titulo" src="../Imagenes/asambleas.png">
>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d

<?php
include_once('../conexion/config.php');

$estilo="prop";

echo "<table id=".$estilo." border=0>";
echo "<tr>";

<<<<<<< HEAD
echo "
<th>Id Asamblea</th>
<th>Lugar</th>
<th>Fecha</th>
<th>Acuerdos</th>
<th>Registro</th>";
=======
echo "<th>Id</th>
	  <th>Lugar</th>
	  <th>Fecha</th>
	  <th>Acuerdos</th>
	  <th>Opciones</th>";
>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d
echo "</tr>";

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

if (isset($_GET['id_ac'])){
	$id_propietario=$_GET['id_ac'];
<<<<<<< HEAD
	$mysqli->set_charset("utf8");

	

	$consulta = "SELECT asambleas.id_asamblea, asambleas.lugar_asamblea, asambleas.fecha_asamblea, asistencias.id_asistencia FROM asistencias, propietarios, asambleas where asistencias.id_propietario=propietarios.id_propietario  and asambleas.id_asamblea=asistencias.id_asamblea and propietarios.id_propietario=$id_propietario";
	$resultado = $mysqli->query($consulta);
	$asambleas="";

	if (isset($_GET['id_asam'])){
		$id_propietario=$_GET['id_ac'];
		$mysqli->set_charset("utf8");
		$asambleas=$asambleas."0,";
		while ($fila1 = $resultado->fetch_row()) {

			$asambleas=$asambleas.$fila1[0].",";

		}
		$asambleas=$asambleas."0";


		$consulta = "SELECT  asambleas.id_asamblea, asambleas.lugar_asamblea, asambleas.fecha_asamblea FROM asistencias, propietarios, asambleas where asistencias.id_propietario=propietarios.id_propietario  and asambleas.id_asamblea=asistencias.id_asamblea and asistencias.id_asamblea NOT IN($asambleas) GROUP BY id_asamblea";

		$resultado1 = $mysqli->query($consulta);

	}
	else{
		$resultado1 = $resultado;

	}
}



while ($fila = $resultado1->fetch_row()) {


	echo "<tr>";
	echo "<td>".$fila[0]."</td>
	<td>".$fila[1]."</td>
	<td>".$fila[2]."</td>
	<td><center><a href=../acuerdos/plantilla.php?id_ac=".$fila[0]."><img src=../imagenes/acuerdo.png width=35 height=35 /></center></td>
	

	<td><center>";
	if (isset($_GET['id_asam'])){

echo "No Asistida";
	}else{
		echo "Asistida";
	
	}
	echo "</center></td>";
	echo "</tr>";

}
=======
	$asamblea=$_GET['id_ac'];
	$mysqli->set_charset("utf8");

$consulta = "SELECT asambleas.id_asamblea, asambleas.lugar_asamblea, asambleas.fecha_asamblea FROM asistencias, propietarios, asambleas where asistencias.id_propietario=propietarios.id_propietario  and asambleas.id_asamblea=asistencias.id_asamblea and propietarios.id_propietario=$id_propietario";

$resultado = $mysqli->query($consulta);

}


	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td><center><a href=../acuerdos/plantilla.php?id_ac=".$fila[0]."><img src=../imagenes/acuerdo.png width=35 height=35 /></center></td>
	
		      
		      <td><center>
			  <a href=plantilla-actualizar.php?id_asam=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
		echo "</tr>";

	}
>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d
echo "</table>";

echo "<br>";

?>
<<<<<<< HEAD
<br>
<br>
<br>
<br>
=======

<a href="plantilla-actualizar.php"><button type="submit" class="boton" style="margin-bottom: 30%;"><span>Agregar</span></button></a>
>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d
