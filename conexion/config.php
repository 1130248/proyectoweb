<?php

/**
* 
*/
/**
* 
*/
class Conexion{

	public function con(){

		global $mysqli;	

		$servidor="localhost";
		$us="root";
		$contra="";
		$bd="routesystem23";

		$mysqli = new mysqli($servidor,$us,$contra, $bd);

		/* verificar la conexión */
		if (mysqli_connect_errno()) {
		printf("Falló la conexión failed: %s\n", $mysqli->connect_error);
		exit();
	}

	return $mysqli;
}
}

	
?>