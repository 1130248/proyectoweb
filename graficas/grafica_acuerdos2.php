<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<center><img class="img-titulo" src="../Imagenes/acuerdosgraf.png"></center>


<center><a href="../acuerdos/plantilla.php"><img class="regreso" src="../imagenes/regresar.png"/></a></center>

        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="../librerias/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../librerias/amcharts/serial.js" type="text/javascript"></script>

        <script>
            var chart;

            <?php
                 include_once('../conexion/config.php');
        $conexionSacadatos = new Conexion();
        $mysqli = $conexionSacadatos->con();

     $consulta = "SELECT fecha_asamblea, COUNT(*) AS numAcuerdos FROM asambleas, acuerdos WHERE asambleas.id_asamblea=acuerdos.id_asamblea GROUP BY asambleas.fecha_asamblea";
          $resultado = $mysqli->query($consulta);

        $prefix = '';
echo "var chartData =[\n";
while ( $fila = $resultado->fetch_row() ) {
  echo $prefix . " {\n";
  echo '  "country": "' . $fila[0] . '",' . "\n";
  echo '  "visits": ' . $fila[1] . ',' . "\n";
  echo '"color": "#8A0CCF"';
  echo " }";
  $prefix = ",\n";
}
echo "\n];";

?>


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "country";
                chart.startDuration = 1;
                chart.depth3D = 50;
                chart.angle = 30;
                chart.marginRight = -45;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.gridAlpha = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "visits";
                graph.colorField = "color";
                graph.balloonText = "<b>[[category]]: [[value]]</b>";
                graph.type = "column";
                graph.lineAlpha = 0.5;
                graph.lineColor = "#FFFFFF";
                graph.topRadius = 1;
                graph.fillAlphas = 0.9;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chartCursor.valueLineEnabled = true;
                chartCursor.valueLineBalloonEnabled = true;
                chartCursor.valueLineAlpha = 1;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("chartdiv");
            });
        </script>
    
        <div id="chartdiv" style="width: 100%; height: 400px;"></div>

  
       <br>
       <br>