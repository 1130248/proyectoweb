/**
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0 


 */

<?php
include_once('../conexion/config.php');


class  Tablas{
function __construct($nombre)
    {
    $this->nombre=$nombre;
    }
public function propietarios(){


$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM propietarios $this->nombre";
$resultado = $mysqli->query($consulta);

	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td>".$fila[3]."</td>
		      <td>".$fila[4]."</td>
		      <td>".$fila[5]."</td>



		      <td>"; 
		     $mysqli->set_charset("utf8"); 
$consulta2 = "SELECT unidades.numero_unidad FROM unidades WHERE unidades.id_propietario=".$fila[0]."";
$resultado2 = $mysqli->query($consulta2);
	while ($fila2 = $resultado2->fetch_row()) { 
		      echo $fila2[0];
		      echo " - ";}

		      echo "</td>

		    <td><center>";

		    if (isset($_GET['id_prop'])){

            echo "<a data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></button></a><a href=plantilla-actualizar-propietarios.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";

              }else{

             echo "<a data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></button></a><a href=plantilla-actualizar-propietarios.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";
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