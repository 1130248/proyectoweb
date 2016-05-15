/**
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0

 */

<?php
include_once('../conexion/config.php');


class  Tablas{
function __construct($fechaadelante,$fechaatras)
	{
	$this->fechaadelante=$fechaadelante;
		$this->fechaatras=$fechaatras;
	}
public function propietarios(){


$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
$mysqli->set_charset("utf8");
$consulta = "SELECT castigos.id_castigo, 
castigos.motivo, 
castigos.lugar, 
castigos.fecha, 
castigos.dias, 
castigos.inicio, 
castigos.termina, 
choferes.nombre_chofer,
choferes.apellido_chofer, 
checadores.nombre_checador, 
checadores.apellido_checador
FROM castigos, 
checadores, choferes where castigos.id_chofer=choferes.id_chofer 
and castigos.id_checador=checadores.id_checador $this->fechaadelante $this->fechaatras GROUP BY castigos.id_castigo";
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
		      <td>".$fila[8]."</td>
              <td>".$fila[9]."</td>
              <td>".$fila[10]."</td>

		      <td>";

		      ?>

			 <a data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $fila[0]; ?>"><img src=../imagenes/actualizar.png width=35 height=35 /></button></a>

			  
			  <?php 

			 echo"<a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
		echo "</tr>";

	}
echo "</table>";
echo "</center>";
echo "<br>";
}
}
?>