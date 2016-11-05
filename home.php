<?php

	require_once __DIR__."/Config/Constantes.php";   //Inclusión de las constantes y funciones globales
	require_once __DIR__."/Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
	\APP\Autoload::run();					//Arranca Autoload
	\APP\Config\Sesion::checkOnHome();

	$empleado = new \APP\Models\Empleado();		//Creando objeto empleado
	$empleado->set("idEmpleado",$_SESSION["idEmpleado"]);

	if(!$empleado->selectone()){			//Cargando datos de empleado según id
		header("Location: ./index.php");		//Redirecciona en caso de no encontrar al empleado
	}

 ?>


<!DOCTYPE html>
<html> 
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="descripcionHome">
		<meta name="keywords" content="keywordsHome">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title><?php echo APPNAME ?> - Home </title>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"
				integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
				crossorigin="anonymous"></script>

	</head>

	<body>
		<h1>Home</h1>
		<h3>Sesión de: <?php echo $empleado->get("nombre") ." ". $empleado->get("apPaterno") ?></h3>
		<a href="./Views/inicio.php" target="modulo">Inicio</a>
		<a href="./Views/controlDeEmpleados.php" target="modulo">Control de empleados</a>
		<!--<a href="./Views/controlDeAccesos.php" target="modulo">Control de accesos</a>
		<a href="./Views/registros.php" target="modulo">Registros</a>
		<a href="./Views/controlDeModulos.php" target="modulo">Control de Módulos</a>
		<a href="./Views/controlDeClientes.php" target="modulo">Control de Clientes</a>-->
		<a href="./Views/cerrarsesion.php" >Cerrar sesión</a>
		<br>
		<iframe  height="4000px" width="100%"src="./Views/inicio.php" name="modulo"></iframe>

	</body>

</html>

<!--
COMENTARIOS GENERALES

- Falta refrescar la pantalla con un timer del fin de sesion.

-->