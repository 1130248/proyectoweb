<br>
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/acuerdos.png"></center>
<br>


<a href="../graficas/plantilla-grafica-acuerdos.php"><img class="grafico" src="../imagenes/grafica.png"/></a> 

<<<<<<< HEAD
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
=======
<a href="../graficas/plantilla-grafica-acuerdos.php"><img class="grafico" src="../imagenes/grafica.png"/></a> 
>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d

<?php
include_once('../conexion/config.php');

<<<<<<< HEAD
=======


$estilo="prop";
>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d


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

<<<<<<< HEAD

include_once('registro2.php');
$tablas = new Tablas($detalle);
$tabla = $tablas->acuerdos();
           
=======
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
>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d

}

 if (isset($_GET['id_ac'])){?>


<center>
<a data-toggle="modal" data-target="#exampleModal" data-whatever="0" data-whatever2="<?php echo $id; ?>"><button type="submit" class="boton" data-target="#exampleModal" style="margin-bottom: 10%;"><span>Agregar</span></button></a></center>

<<<<<<< HEAD
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
=======
		      <td><center>";
		      if (isset($_GET['id_ac'])){
echo "<a href=plantilla-actualizar.php?id_ac=".$fila[0]."&id_asam=$id; ><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."&id_asam=$id;><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";

		      }else{

echo "<a href=plantilla-actualizar.php?id_ac=".$fila[0]."><img src=../imagenes/actualizar.png width=35 height=35 /></a><a href=plantilla-actualizar.php?borrar=".$fila[0]."><img src=../imagenes/eliminar1.png width=35 height=35  /></a>";
		      }

			  
echo "</center></td>";
		echo "</tr>";

	}
echo "</table>";

echo "<br>";
 if (isset($_GET['id_ac'])){?>

<a href="plantilla-actualizar.php?id_asam=<?php echo $id; ?>"><button type="submit" class="boton" style="margin-bottom: 30%;"><span>Agregar</span></button></a>
<?php
		      }else{ ?>

<a href="plantilla-actualizar.php"><button type="submit" class="boton" style="margin-bottom: 30%;"><span>Agregar</span></button></a>

<?php
		      }
?>
>>>>>>> 1cee32532a9fa8d9eda7b2ed59d2dfaedf427c7d
