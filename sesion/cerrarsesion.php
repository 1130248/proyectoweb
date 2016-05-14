<?php

    session_start();
    session_unset();  //libera todas las variables de sesión//
    session_destroy(); // Destruye toda la informacion registrada de una sesión//

    
header('location: ../plantilla/plantilla-principal.php');

?>