<?php
include_once('../conexion/config.php');


class  Tablas{
function __construct($detalle)
	{
	$this->detalle=$detalle;
	}
public function acuerdos(){


$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
/*$id=$_GET["id_asam"];*/
if (isset($_GET['id_ac'])){
	$id_asamblea=$_GET['id_ac'];
	$asamblea=$_GET['id_ac'];
	
	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM asambleas where id_asamblea=$id_asamblea";
$resultado1 = $mysqli->query($consulta);
$fila1 = $resultado1->fetch_row();

$s="";
$id=$fila1[0];
 //echo $consulta;

$mysqli->set_charset("utf8");
$consulta = "SELECT * FROM acuerdos where id_asamblea=$id_asamblea $this->detalle";
$resultado = $mysqli->query($consulta);

//echo $consulta;
}else{
$mysqli->set_charset("utf8");	
$consulta = "SELECT * FROM acuerdos $this->detalle";
$resultado = $mysqli->query($consulta);
//echo $consulta;
}

	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td>".$fila[3]."</td>

		      <td><center>";
		      
		      if (isset($_GET['id_ac'])){
echo "<a data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]." data-whatever2=$id><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."&id_asam=$id;><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";

		   

		      }else{

echo "<a data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]." data-whatever2='0'><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";
      }

			  
echo "</center></td>";
		echo "</tr>";

	}
echo "</table>";
echo "</center>";
}

}
?>