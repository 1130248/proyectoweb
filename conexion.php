<?php
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


$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

$query =  "SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'";
$result = $mysqli->query($query);

$row = $result->fetch_row();

$rowcount=mysqli_num_rows($result);


 $variable=$row[2];

if($rowcount==0){
echo "ACCESO DENEGADO el usuario  y la contraseña no esta en la base de datos.";
}elseif ($rowcount>=1) {
//	echo "Bienvenido eres ". $usuario." y tu contraseña es ".$contrasena."...!";
header("Location:encabezado2.php");
}

?>
