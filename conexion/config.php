/**
 * Ruta 23
 * @author Yanet Delgado Vergara
 * @version 1.0 
 
 
  
    * variables publicas
    * @static servidor, us, contra, bd.

 */

<?php


class Conexion{

	/**
    * funcion con
    * @static servidor, us, contra, bd.
    */

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