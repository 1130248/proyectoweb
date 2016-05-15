<!--
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0

-->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/asamasistencia.png"></center>


<a href="../asambleas/plantilla.php"><img class="regreso" src="../imagenes/regresar.png"/></a>



<?php
include_once('../conexion/config.php');

$estilo="prop";

echo "<table id=".$estilo." border=1>";
echo "<tr>";


echo "
<th>&nbsp;Id &nbsp;</th>
<th>&nbsp; Nombre&nbsp; </th>
<th>&nbsp;Apellido&nbsp;</th>
<th>&nbsp;Registro&nbsp;</th>";

echo "</tr>";

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

if (isset($_GET['id_ac'])){
	$id_asamblea=$_GET['id_ac'];

	$mysqli->set_charset("utf8");

	

	$consulta = "SELECT propietarios.id_propietario, propietarios.nombre_propietario, propietarios.apellido_propietario FROM asistencias, propietarios where asistencias.id_propietario=propietarios.id_propietario and asistencias.id_asamblea=$id_asamblea";
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


		$consulta = "SELECT   propietarios.id_propietario, propietarios.nombre_propietario, propietarios.apellido_propietario FROM asistencias, propietarios where asistencias.id_propietario=propietarios.id_propietario and asistencias.id_propietario NOT IN($asambleas) GROUP BY id_propietario";

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

