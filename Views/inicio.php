<?php

	require_once __DIR__."/../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
	require_once __DIR__."/../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
	\APP\Autoload::run();					//Arranca Autoload
	\APP\Config\Sesion::checkOnModulo();

 ?>

 <!DOCTYPE html>
<html> 
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="descripcionHome">
		<meta name="keywords" content="keywordsHome">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title><?php echo APPNAME ?> - Inicio </title>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"
				integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
				crossorigin="anonymous"></script>
	</head>

	<body>
		<h4>Inicio</h4>
		<h5>Bienvenido a la aplicación</h5>
		<p>Por el momento la aplicación continua creciendo y no hay mucha información por mostrar aquí, sin embargo se te hacemos las siguientes sugerencias:</p>
		<ul>
			<li>Ocupa Google Chrome.</li>
			
		</ul>

		<script>
			$(document).ready(function() {

				var timeOut = (<?php echo SESSIONTIMEOUT ?>*60+1)*1000;
				var timer = setInterval(redirect, timeOut);

				window.onload = resetTimer;
				document.onmousemove = resetTimer;
				document.onkeypress = resetTimer;

				function redirect() {
					window.top.location.href = "../index.php";
				}

				function resetTimer() {
					$(this).parents().css('background-color', '#000000');
					clearInterval(timer);
					timer = setInterval(redirect, timeOut);
				}
			})
		</script>
	</body>

</html>

<!--
COMENTARIOS GENERALES

- Falta refrescar la pantalla con un timer del fin de sesion sin afectar al padre.

-->
