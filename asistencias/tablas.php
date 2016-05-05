<br>
<br>
<center><img class="img-titulo" src="../Imagenes/asamasistencia.png"></center>
<br>

<a href="../asistencias/plantilla.php"><img class="regreso" src="../imagenes/regresar.png"/></a>

<?php
include_once('../conexion/config.php');

$estilo="prop";

echo "<table id=".$estilo." border=0>";
echo "<tr>";

echo "
<th>Id Asamblea</th>
<th>Lugar</th>
<th>Fecha</th>
<th>Acuerdos</th>
<th>Registro</th>";
echo "</tr>";

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

if (isset($_GET['id_ac'])){
	$id_propietario=$_GET['id_ac'];
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
echo "</table>";

echo "<br>";

?>
<br>
<br>
<br>
<br>