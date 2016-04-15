<?php
session_start();
if($_SESSION["id"]==0)
{
include("../plantilla/encabezado2.php");

include("formulario.php");

include("../plantilla/pie_mas.php");

} else {

header("Location: ../plantilla/login.php?valido=No existes");	
}

?>