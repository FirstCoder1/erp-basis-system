<?php

	require_once __DIR__."/Config/Constantes.php";   //Inclusión de las constantes y funciones globales
	require_once __DIR__."/Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
	\APP\Autoload::run();					//Arranca Autoload
	\APP\Config\Sesion::checkOnIndex();

 ?>

 <!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="descripcion">
		<meta name="keywords" content="keywords">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title><?php echo APPNAME ?> - Login </title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
	</head>

	<body>
		<h1>Login</h1>
        <form id="login" autocomplete="off">
	  	Usuario: <input type="text" name="userName" placeholder="Tu nombre de usuario" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." required autofocus >
	  	Contraseña: <input type="password" name="password" placeholder="Tu contraseña" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." required >
	  	<input type="submit" value="Iniciar sesión">
	  	<span id="error"></span>
		</form>

		<script>
			$(document).ready(function () {
				$("#login").submit(function (evt) {
					evt.preventDefault();
					$.ajax({
						url     : "./Controllers/usersLogin.php",
						type    : 'POST',
						dataType: 'json',
						data    : {
							userName: $('input[name="userName"]').val(),
							password: $('input[name="password"]').val()
						}
					}).done(function (data) {
						//console.log(data);
						if (data.success) {
							window.top.location.href = "home.php";
						} else {						//En caso de error, mensaje de error
							document.getElementById("error").innerHTML = data.error;
						}
					});
					return false;
				});
			});

		</script>

	</body>

</html>

<!--
COMENTARIOS GENERALES:

- Estilo class error.
- Descripción del sistema.
- Keywords del sistema.

-->
