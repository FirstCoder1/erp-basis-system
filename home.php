<?php namespace APP; 

	require_once "Config/Constantes.php";   //Inclusión de las constantes y funciones globales
	require_once "Config/Sesion.php";   	//Revisión de sesión
	require_once "Autoload.php"; 	//Inclusión de archivo para Autoload de las clases 
	\APP\Autoload::run();					//Arranca Autoload

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
		<title>NombreDelSistema - Home </title>
	</head>

	<body>
		<h1>Home</h1>
		<h3>Sesión de: <?php echo $empleado->get("nombre") ." ". $empleado->get("apPaterno") ?></h3>
		 <a href="./Views/inicio.php" target="modulo">Inicio</a>
		 <a href="./Views/controlDeEmpleados.php" target="modulo">Control de Empleados</a>
		 <a href="./Views/cerrarsesion.php" >Cerrar sesión</a>
		 <br>
		 <iframe  height="4000px" width="100%"src="./Views/inicio.php" name="modulo"></iframe>

	</body>

</html>