<body>
<br>
<br>
<br>
<fieldset>
	<legend id="titulo">Ingrese Usuario y Contraseña</legend>

	<form name="entrar" method="post" action="conexion.php">
		<div id="entrada1">
			<br>
			<br>
				<label id="usuario">Usuario</label>
				<input id="campo1" name="usuario" type="text" placeholder="Usuario" required="" class="inp" />
		</div>
		<div id="entrada2">
			<br>
			<br>
				<label id="contrasena">Contraseaña</label>
				<input id="campo2" name="contrasena" type="password" placeholder="Contraseña" required="" class="inp" />
			<br>
			<br>
			<br>
		</div>
		<div id="boton">
				<input id="campo3" name="enviar" type="submit" />
		</div>
		</form>
	</fieldset>
	<br>
	<br>

	<div id="imagen">
		<img src="imagenes/combi.png">

	</div>
</body>