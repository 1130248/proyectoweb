/**
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0

 */


<center><img class="img-titulo" src="../Imagenes/castigos.png"></center>

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


if (isset($_POST['fecha1'])){
 // echo $_POST["fecha1"];
$fechaadelante="and castigos.fecha>='".$_POST["fecha1"]."'";
$fecha1=$_POST["fecha1"];
if($fecha1==""){

  $fecha1="";
$fechaadelante="";
}
}else{
$fecha1="";
$fechaadelante="";
}


if (isset($_POST['fecha2'])){
 //  echo $nom=$_POST["fecha2"];
$fechaatras="and castigos.fecha<='".$_POST["fecha2"]."'";
$fecha2=$_POST["fecha2"];
if($fecha2==""){

  $fecha2="";
$fechaatras="";
}
}else{
$fecha2="";
$fechaatras="";
}


?>
        
            <center>

            <!-- formulario de busquedas -->

            <div  class="form-style-10">
            <form method="post" action="#">
            
            <div class="inner-wrap">
                <label>Fecha 1<input type="date" name="fecha1" value="<?php echo $fecha1?>" ></label>
                <br>
                 <label>Fecha 2<input type="date" name="fecha2" value="<?php echo $fecha2?>"></label>
          <button value="1" name="env" class="boton"><span>Buscar</span></button>


</form></div>  </div>
    </center>
<!-- FIN del formulario de busquedas -->


<a href="../graficas/plantilla-grafica-castigos.php"><img class="grafico" src="../imagenes/grafica.png"/></a>
<br>



<?php

include_once('../conexion/config.php');

$estilo="prop";
echo "<center>";
echo "<table id=".$estilo." border=1>";
echo "<tr>";

echo "<th>&nbsp;Id&nbsp;</th>
	  <th>&nbsp;Motivo&nbsp;</th>
	  <th>&nbsp;Lugar&nbsp;</th>
	  <th>&nbsp;Fecha&nbsp;</th>
	  <th>&nbsp;No. Dias&nbsp;</th>
	  <th>&nbsp;Fecha Inicio&nbsp;</th>
	  <th>&nbsp;Termina&nbsp;</th>
	  <th>&nbsp;Chofer&nbsp;</th>
       <th>&nbsp;Apellidos&nbsp;</th>
	  <th>&nbsp;Checador&nbsp;</th>
       <th>&nbsp;Apellidos&nbsp;</th>
	  <th>&nbsp;Opciones&nbsp;</th>";
echo "</tr>";

include_once('registro2.php');
$tablas = new Tablas($fechaadelante,$fechaatras);
$tabla = $tablas->propietarios();

		
?>
<br>
<br>
<center>
<a data-toggle="modal" data-target="#exampleModal" data-whatever="0"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 5%;"><span>Agregar</span></button></a>

<!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id_cas=' + recipient;

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