<body>
<br>
<br>
<br>
<fieldset>
<?php if(isset($_GET["error"])) echo "<a href=\"Ruta23.php\"> E r r o r       Regresar </a> "
?>
	<legend id="titulo">Ingrese Usuario y Contraseña</legend>
<img id="combi" src="../imagenes/combi2.png">
			

	
	<form name="entrar" method="post" action="../conexion/valida.php">

<?php

if (isset($_GET["nosession"])) echo "tu usuario y contraseña son incorrectos";

?>		
		<div id="entrada">
				<div id="us"><label id="usuario">Usuario</label>
				<br>
				<input id="campo1" name="usuario" type="text" placeholder="Usuario" required="" class="inp" /></div>
		
				<div id="con"><label id="contrasena">Contraseaña</label>
				<br>
				<input id="campo2" name="contrasena" type="password" placeholder="Contraseña" required="" class="inp" /></div>
	
				<input id="campo3" name="enviar" type="submit" />
		</div>	
		</form>
		<br>
		<br>
		<br>

	</fieldset>
	<br>
	<br>

	
</body>