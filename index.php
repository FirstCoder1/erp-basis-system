<?php

	require_once __DIR__."/Config/Constantes.php";   //Inclusión de las constantes y funciones globales
	require_once __DIR__."/Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
	\APP\Autoload::run();					//Arranca Autoload
	//\APP\Utils\Sesion::checkOnIndex();

 ?>

 <!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="descripcion">
		<meta name="keywords" content="keywords">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title><?php echo APPNAME ?> - Login </title>

		<link rel="stylesheet" href="./Views/Style/main.css">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet"
			  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">


	</head>

	<body class="background-morado color-blanco">

		<div id="loginDiv" class="container text-center">
			<div class="row ">
				<div class="col-xs-3"></div>

				<div class="col-xs-6">
						<h1>Iniciar Sesión</h1>
						<form id="loginForm"
							  autocomplete="off">
							<div class="form-group text-left">
								Usuario:
								<input type="text"
									   id="loginUserName"
									   class="form-control"
									   placeholder="Tu nombre de usuario"
									   maxlength="45" pattern="[a-zA-Z0-9-]{5,45}"
									   title="Solo letras y números (no signos), 5 - 45 caracteres."
									   required autofocus>
							</div>
							<div class="form-group text-left">
								Contraseña:
								<input type="password"
									   id="loginPassword"
									   class="form-control"
									   placeholder="Tu contraseña"
									   maxlength="45"
									   pattern="[a-zA-Z0-9-]{5,45}"
									   title="Solo letras y números (no signos), 5 - 45 caracteres."
									   required>
							</div>
							<button class="btn btn-primary btn-lg btn-block"
								   type="submit">
								Entrar
							</button>
							<div id="errorLogin" class="alert alert-danger alert-dismissable fade out text-left">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Error! - </strong><span id="errorLoginMensaje"></span>
							</div>
						</form>
				</div>

				<div class="col-xs-3"></div>
			</div>
		</div>

		<script>
			$(document).ready(function () {
				$("#loginForm").submit(function (evt) {
					evt.preventDefault();
					$.ajax({
						url     : "./Controllers/usersLogin.php",
						type    : 'POST',
						dataType: 'json',
						data    : {
							userName: $("#loginUserName").val(),
							password: $("#loginPassword").val()
						}
					}).done(function (data) {
						console.log(data);
						if (data.success) {
							$("#loginDiv").remove();
							$(data.home).prependTo("body");

							//window.top.location.href = "home.php";
						} else {						//En caso de error, mensaje de error
							$("#errorLoginMensaje").html(data.error);
							$("#errorLogin").toggleClass('in out');
							//document.getElementById("errorLogin").innerHTML = ;
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

- ME QUEDE, TODO debe funcional impecable antes de continuar con los modulos.
- Descripción del sistema.
- Keywords del sistema.

- Estilo class error.
- Revisar estado.

-->
