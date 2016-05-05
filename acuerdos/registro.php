<br>
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/acuerdos.png"></center>
<br>


<!-- Modal -->
<center>
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
</center>
<!-- fin del modal -->

<?php

if (isset($_GET['id_ac'])){

if (isset($_POST['detalle'])){
$detalle="and detalle_acuerdo LIKE '%".$_POST["detalle"]."%'";
$detalles=$_POST["detalle"];
}else{
$detalle="";
$detalles="";
}

}else{
if (isset($_POST['detalle'])){
$detalle="where detalle_acuerdo LIKE '%".$_POST["detalle"]."%'";
$detalles=$_POST["detalle"];
}else{
$detalle="";
$detalles="";
}

}

?>
    <div >
        
            <center>

            <!-- formulario de busquedas -->
            <div  class="form-style-10">
            <form method="post" action="#">
            
            <div class="inner-wrap">
                <label>Detalle<input type="text" name="detalle" value="<?php echo $detalles?>" required=""></label>
            </div>
<center><button value="1" name="env" class="boton"><span>Buscar</span></button></center>
</form></div>

<!-- FIN del formulario de busquedas -->

<a href="../graficas/plantilla-grafica-acuerdos.php"><img class="grafico" src="../imagenes/grafica.png"/></a> 


<?php
include_once('../conexion/config.php');




$estilo="prop";



$estilo="prop";
echo "<center>";
echo "<table id=".$estilo." border=0>";
echo "<tr>";

echo "<th>Id</th>
	  <th>Acuerdo No.</th>
	  <th>Detalle</th>
	  <th>Asamblea</th>
	  <th>Opciones</th>";
echo "</tr>";



include_once('registro2.php');
$tablas = new Tablas($detalle);
$tabla = $tablas->acuerdos();
           

$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
/*$id=$_GET["id_asam"];*/
if (isset($_GET['id_ac'])){
	$id_asamblea=$_GET['id_ac'];
	$asamblea=$_GET['id_ac'];
	$mysqli->set_charset("utf8");

$consulta = "SELECT * FROM asambleas where id_asamblea=$id_asamblea";
$resultado1 = $mysqli->query($consulta);
$fila1 = $resultado1->fetch_row();

$s="";
$id=$fila1[0];
 //echo $consulta;

$consulta = "SELECT * FROM acuerdos where id_asamblea=$id_asamblea";
$resultado = $mysqli->query($consulta);

}else{
$consulta = "SELECT * FROM acuerdos";
$resultado = $mysqli->query($consulta);


}

 if (isset($_GET['id_ac'])){?>


<center>
<a data-toggle="modal" data-target="#exampleModal" data-whatever="0" data-whatever2="<?php echo $id; ?>"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 10%;"><span>Agregar</span></button></a></center>


<?php
		      }else{ ?>

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
          var recipient2 = button.data('whatever2') 
          var modal = $(this);

          var dataString ='id_ac='+ recipient +'&id_asam=' + recipient2;

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

		     