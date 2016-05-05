<br>
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/propietarios.png"></center>
<br>
<br>
<br>

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
echo "<table id=".$estilo." border=0>";
echo "<tr>";

echo "<th>Id</th>
	  <th>Nombre</th>
	  <th>Apellido</th>
	  <th>Dirección</th>
	  <th>Telefono</th>
	  <th>E_mail</th>
	  <th>Unidades</th>
	  <th>Opciones</th>";
echo "</tr>";




$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

$consulta = "SELECT * FROM propietarios";
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
$consulta2 = "SELECT unidades.numero_unidad FROM unidades WHERE unidades.id_propietario=".$fila[0]."";
$resultado2 = $mysqli->query($consulta2);
	while ($fila2 = $resultado2->fetch_row()) { 
		      echo $fila2[0];
		      echo " - ";}

		      echo "</td>

		    <td><center>";

		    ?>

			  <a data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $fila[0]; ?>"><img src=../imagenes/actualizar.png width=35 height=35 /></button></a>

			  
			  <?php 

			 echo" <a href=plantilla-actualizar-propietarios.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>
</center></td>";
		echo "</tr>";

	}
echo "</table>";

echo "<br>";

?>
<br>
<br>
<center><a data-toggle="modal" data-target="#exampleModal" data-whatever="0"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 10%;"><span>Agregar</span></button></a></center>


<!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id_prop=' + recipient;

            $.ajax({
                type: "GET",
                url: "formulario-propietarios.php",
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
