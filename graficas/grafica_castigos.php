
<br>
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/castigosgraf.png"></center>
<br>
<br>
<br>

<a href="../castigos/plantilla.php"><img class="regreso" src="../imagenes/regresar.png"/></a>


        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="../librerias/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../librerias/amcharts/pie.js" type="text/javascript"></script>

        <script>
            var chart;
            var legend;

           <?php
                 include_once('../conexion/config.php');
        $conexionSacadatos = new Conexion();
        $mysqli = $conexionSacadatos->con();

     $consulta = "SELECT nombre_chofer, COUNT(*) AS Castigos_chofer FROM choferes, castigos WHERE choferes.id_chofer=castigos.id_chofer GROUP BY castigos.id_chofer";
          $resultado = $mysqli->query($consulta);

        $prefix = '';
echo "var chartData =[\n";
while ( $fila = $resultado->fetch_row() ) {
  echo $prefix . " {\n";
  echo '  "id_propietario": "' . $fila[0] . '",' . "\n";
  echo '  "nombre_propietario": ' . $fila[1] . ',' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n];";

?>


            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "id_propietario";
                chart.valueField = "nombre_propietario";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;

                // WRITE
                chart.write("chartdiv");
            });
        </script>

        <div id="chartdiv" style="width: 100%; height: 400px;"></div>
       <br>
        <br>
        <br>
        <br>
        <br>