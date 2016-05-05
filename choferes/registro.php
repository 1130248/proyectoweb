<br>
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/choferes.png"></center>
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

if (isset($_GET['id_chof'])){

if (isset($_POST['nombre'])){
$nombre="and nombre_chofer LIKE '%".$_POST["nombre"]."%'";
$nombres=$_POST["nombre"];
}else{
$nombre="";
$nombres="";
}

}else{
if (isset($_POST['nombre'])){
$nombre="where nombre_chofer LIKE '%".$_POST["nombre"]."%'";
$nombres=$_POST["nombre"];
}else{
$nombre="";
$nombres="";
}

}

?>
    <div >
        
            <center>

            <!-- formulario de busquedas -->

            <div  class="form-style-10">
            <form method="post" action="#">
            
            <div class="inner-wrap">
                <label>Nombre<input type="text" name="nombre" value="<?php echo $nombres?>" required=""></label>
            </div>
<center><button value="1" name="env" class="boton"><span>Buscar</span></button></center>
</form></div>

<!-- FIN del formulario de busquedas -->

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
	  <th>Licencia</th>
	  <th>Vencimiento</th>
	  <th>Opciones</th>";
echo "</tr>";

include_once('registro2.php');
$tablas = new Tablas($nombre);
$tabla = $tablas->choferes();

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

 $mysqli->set_charset("utf8");

$consulta = "SELECT * FROM choferes";
$resultado = $mysqli->query($consulta);

($fila = $resultado->fetch_row());

if (isset($_GET['id_chof'])){?>

		<center>
			  <a data-toggle="modal" data-target="#exampleModal" data-whatever="0"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 10%;"><span>Agregar</span></button></a></center>

<?php

}else{

?>

<br>
<br>
<center>

<a data-toggle="modal" data-target="#exampleModal" data-whatever="0" data-whatever2="0"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 10%;"><span>Agregar</span></button></a></center>
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
          var dataString = 'id_chof=' + recipient;

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