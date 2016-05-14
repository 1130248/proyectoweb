<?php
session_start();
if($_SESSION["id"]!='')
{
include("../plantilla/encabezado2.php");

include("formulario.php");

include("../plantilla/pie1.php");

} else {

header("Location: ../plantilla/login.php?valido=No existes");	
}

?>