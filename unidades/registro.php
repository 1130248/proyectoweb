<br>

<center><img class="img-titulo" src="../Imagenes/unidades.png"></center>



<!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">Cerrar</button>
                   
                </div>
                <div class="ct">
              
                </div>

            </div>
        </div>
    </div>

<!-- fin del modal -->



<?php
include_once('../conexion/config.php');


$estilo="prop";

echo "<table id=".$estilo." border=1>";
echo "<tr>";

echo "<th>&nbsp; Placa &nbsp;</th>
	  <th>&nbsp; Numero &nbsp;</th>
	  <th>&nbsp; Matrícula &nbsp;</th>
	  <th>&nbsp; Modelo &nbsp;</th>
	  <th>&nbsp; Marca &nbsp;</th>
	  <th>&nbsp; Póliza/Venc &nbsp;</th>
	  <th>&nbsp; Propietario &nbsp;</th>
      <th>&nbsp; Apellidos &nbsp;</th>
	  <th>&nbsp; Chofer &nbsp;</th>
      <th>&nbsp; Apellidos &nbsp;</th>
	  <th>&nbsp; Opciones &nbsp;</th>";
echo "</tr>";

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
$mysqli->set_charset("utf8");

$consulta = "SELECT unidades.placa_unidad, unidades.numero_unidad,
unidades.matricula_unidad,
unidades.modelo_unidad,
unidades.marca_unidad,
unidades.vencseguro_unidad,
propietarios.nombre_propietario,
propietarios.apellido_propietario,
choferes.nombre_chofer,
choferes.apellido_chofer
FROM unidades, choferes, propietarios where unidades.id_propietario=propietarios.id_propietario
and unidades.id_chofer=choferes.id_chofer group by placa_unidad";
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
		      <td><center>";
		      ?>

			  <a data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $fila[0]; ?>"><img src=../imagenes/actualizar.png width=35 height=35 /></button></a>

			  
			  <?php 

			 echo"<a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
		echo "</tr>";

	}
echo "</table>";
?>
<br>
<br>
<center><a data-toggle="modal" data-target="#exampleModal" data-whatever="-1-2-3-4-"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 5%;"><span>Agregar</span></button></a></center>


<!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'placa=' + recipient;

            $.ajax({
                type: "GET",
                url: "formulario.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
    </script>