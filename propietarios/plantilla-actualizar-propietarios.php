<?php
session_start();
if($_SESSION["id"]==0)
{
include("../plantilla/encabezado2.php");

include("formulario-propietarios.php");

include("../plantilla/pie1.php");

} else {

header("Location: ../plantilla/login.php?valido=No existes");	
}

?>