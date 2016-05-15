<!--
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0

 -->

<br>
<br>
<center><img class="img-titulo" src="../Imagenes/asambleas.png"></center>

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
echo "<center>";
echo "<table id=".$estilo." border=1>";
echo "<tr>";

echo "<th>&nbsp;Id&nbsp;</th>
	  <th>&nbsp;Lugar&nbsp;</th>
	  <th>&nbsp;Fecha&nbsp;</th>
	  <th>&nbsp;Pase_Lista&nbsp;</th>
	  <th>&nbsp;Acuerdos&nbsp;</th>
      <th>&nbsp;Asistentes&nbsp;</th>
      <th>&nbsp;Inasistentes&nbsp;</th>
	  <th>&nbsp;Opciones&nbsp;</th>";
echo "</tr>";

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

$consulta = "SELECT * FROM asambleas";
$resultado = $mysqli->query($consulta);

	while ($fila = $resultado->fetch_row()) {


		echo "<tr>";
		echo "<td>".$fila[0]."</td>
		      <td>".$fila[1]."</td>
		      <td>".$fila[2]."</td>
		      <td><center><a href=../propietarios/plantilla-paselista-propietarios.php?id_ac=".$fila[0]."><img src=../imagenes/asistencia.png width=35 height=35 /></center></td>

		      <td><center><a href=../acuerdos/plantilla.php?id_ac=".$fila[0]."><img src=../imagenes/acuerdo.png width=35 height=35 /></center></td>

               <td><center> <a href=plantilla-tablas.php?id_ac=".$fila[0]."><img src=../imagenes/asistida.png width=35 height=35 /></a></td>
            </center> 
            
           <td><center><a href=plantilla-tablas.php?id_ac=".$fila[0]."&id_asam=".$fila[0]."><img src=../imagenes/noasistida.png width=35 height=35 /></center></td>
	
		      <td><center>";
		      ?>
			  

			  	<a data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $fila[0]; ?>"><img src=../imagenes/actualizar.png width=35 height=35 /></button></a>

			  
			  <?php 

			 echo" <a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
		echo "</tr>";

	}
echo "</table>";
echo "</table>";
echo "<br>";

?>

<br>
<br>
<center>
<a data-toggle="modal" data-target="#exampleModal" data-whatever="0"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 10%;"><span>Agregar</span></button></a></center>

<!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id_asam=' + recipient;

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

