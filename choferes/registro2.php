<?php
include_once('../conexion/config.php');


class  Tablas{
function __construct($nombre)
    {
    $this->nombre=$nombre;
    }
public function choferes(){

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

$consulta = "SELECT * FROM choferes $this->nombre";
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

		      <td><center>";
		      
            if (isset($_GET['id_checa'])){

			 echo "<a data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></button></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";

              }else{

             echo "<a data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></button></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";
            }

echo "</center></td>";
        echo "</tr>";

    }
echo "</table>";
echo "</center>";
echo "<br>";
}
}
?>