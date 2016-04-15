<?php
session_start();
if (isset($_SESSION['id'])){ 
//echo "La sesión existe ..."; 
} else {
header("location: noRuta23.php?nosession");

}




	
?> 