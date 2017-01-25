<?php

	require_once __DIR__."/Config/Constantes.php";  //Inclusión de las constantes y funciones globales
	require_once __DIR__."/Autoload.php"; 			//Inclusión de archivo para Autoload de las clases
	\APP\Autoload::run();							//Arranca Autoload

	\APP\Utils\Sesion::checkOnIndex();				//TODO - por ahora no hay sesión

 ?>

 <!DOCTYPE html>
<html>
	<head>																							   <!--Unico head-->
		<meta charset="UTF-8">
		<meta name="description" content="descripcion">
		<meta name="keywords" content="keywords">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title><?php echo APPNAME ?> - Login </title>

		<link rel="stylesheet" href="./Views/Style/main.css">	<!--Mi hoja de estilo-->

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"	<!--Librerias jQuery y Boostrap-->
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet"
			  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>																						   <!--Unico head-->

	<body class="background-morado color-blanco">

		<div id="loginDiv" class="container text-center">									<!--Contenerdor del Login-->
			<div class="row ">
				<div class="col-xs-3"></div>

				<div class="col-xs-6">
                    <h1>Iniciar Sesión</h1>
                    <form id="loginForm"
                          autocomplete="off">
                        <div class="form-group text-left">
                            Usuario:
                            <input type="text"
                                   id="loginFormUserName"
                                   class="form-control"
                                   placeholder="Tu nombre de usuario"
                                   maxlength="45" pattern="[a-zA-Z0-9-]{5,45}"
                                   title="Solo letras y números (no signos), 5 - 45 caracteres."
                                   required autofocus>
                        </div>
                        <div class="form-group text-left">
                            Contraseña:
                            <input type="password"
                                   id="loginFormPassword"
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
                        <div id="errorLogin"
                             class="alert alert-danger alert-dismissable fade out margen-arriba text-left">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error! - </strong><span id="errorLoginMensaje"></span>
                        </div>
                    </form>
				</div>

				<div class="col-xs-3"></div>
			</div>
		</div> 								 <!--Contenedor del Login-->


		<script>
			$(document).ready(function () {

				$("#loginForm").submit(function (evt) {                                           /*Accion Boton Login*/
					evt.preventDefault();
					$.ajax({                                                                       /*Se envia peticion*/
						url     : "./Controllers/baseController.php",
						type    : 'POST',
						dataType: 'json',
						data    : {
                            action: "empleadoLogin",
							userName: $("#loginFormUserName").val(),
							password: $("#loginFormPassword").val()
						}
					}).done(function (data) {/*Se recibe respuesta*/ //TODO

					console.log(data);

                    if (data.success) {
                        $("#loginDiv").remove();
                        //$(data.home).prependTo("body");

                        //window.top.location.href = "home.php";
                    } else {						//En caso de error, mensaje de error
                        $("#errorLoginMensaje").html(data.error);
                        $("#errorLogin").toggleClass('in out');
                        //document.getElementById("errorLogin").innerHTML = ; //carga varias vece el main, lo agrega mas de una vez (uns funcion que solo se llame una vez)
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



-->
