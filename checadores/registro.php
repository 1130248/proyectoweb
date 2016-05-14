<br>
<center><img class="img-titulo" src="../Imagenes/checadores.png"></center>


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

if (isset($_GET['id_checa'])){

if (isset($_POST['nombre'])){
$nombre="and nombre_checador LIKE '%".$_POST["nombre"]."%'";
$nombres=$_POST["nombre"];
}else{
$nombre="";
$nombres="";
}

}else{
if (isset($_POST['nombre'])){
$nombre="where nombre_checador LIKE '%".$_POST["nombre"]."%'";
$nombres=$_POST["nombre"];
}else{
$nombre="";
$nombres="";
}

}

?>
        
            <center>

            <!-- formulario de busquedas -->

            <div  class="form-style-10">
            <form method="post" action="#">
            
            <div class="inner-wrap">
                <label>Nombre<input type="text" name="nombre" value="<?php echo $nombres?>" required=""></label>
          <button value="1" name="env" class="boton buscar"><span>Buscar</span></button></center>
</form></div>  </div>

<!-- FIN del formulario de busquedas -->


<?php
include_once('../conexion/config.php');

$estilo="prop";

echo "<center>";
echo "<table id=".$estilo." border=1>";
echo "<tr>";

echo "<th>&nbsp;Id&nbsp;</th>
	  <th>&nbsp;Nombre&nbsp;</th>
	  <th>&nbsp;Apellido&nbsp;</th>
	  <th>&nbsp;Dirección&nbsp;</th>
	  <th>&nbsp;Telefono&nbsp;</th>
	  <th>&nbsp;E_mail&nbsp;</th>
	  <th>&nbsp;Estación&nbsp;</th>
	  <th>&nbsp;Entrada&nbsp;</th>
	  <th>&nbsp;Salida&nbsp;</th>
	  <th>&nbsp;Descansa&nbsp;</th>
	  <th>&nbsp;Opciones&nbsp;</th>";
echo "</tr>";

include_once('registro2.php');
$tablas = new Tablas($nombre);
$tabla = $tablas->checadores();


$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();


    $mysqli->set_charset("utf8");


$consulta = "SELECT * FROM checadores";
$resultado = $mysqli->query($consulta);

	$fila = $resultado->fetch_row();


		 if (isset($_GET['id_checa'])){?>

<br>
<center>
<a data-toggle="modal" data-target="#exampleModal" data-whatever="0"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 5%;"><span>Agregar</span></button></a></center>

<?php

}else{

?>
<br>
<center>

<a data-toggle="modal" data-target="#exampleModal" data-whatever="0" data-whatever2="0"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 5%;"><span>Agregar</span></button></a></center>
<?php
              }
?>

<!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id_checa=' + recipient;

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