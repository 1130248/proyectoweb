/**
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0 


 */


<?php

include_once('../conexion/config.php');


class  Tablas{

/**
    * funcion constructor

   num_acuerdo, detalle_acuerdo, id_asamblea. 
    */


function __construct($num_acuerdo, $detalle_acuerdo, $id_asamblea)
	{
	$this->num_acuerdo=$numero_acuerdo;
	$this->detalle_acuerdo=$detalle_acuerdo;
	$this->id_asamblea=$id_asamblea;
	}


public function acuerdos(){

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

if ($this->num_acuerdo!=="" || $this->detalle_acuerdo!=="" || $this->id_asamblea!=="" ){
 $consulta = "SELECT * FROM acuerdos where num_acuerdo='$this->num_acuerdo' and detalle_acuerdo='$this->detalle_acuerdo' or id_asamblea='$id_asamblea'";
}else{
 $consulta = "SELECT * FROM acuerdos ";
}



$resultado = $mysqli->query($consulta);
$i=0;
    while ($fila = $resultado->fetch_row()) {

$estilo="prop";

echo "<table id=".$estilo." border=0>";
echo "<tr>";
echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td>
<td><center>
<a href=plantilla-actualizar.php?id_ac=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=formulario.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
echo "</tr>";

       
 $i++;
}
echo "</table>";

}


}




?>