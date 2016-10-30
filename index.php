<?php namespace APP; 

	require_once "Config/Constantes.php";   //Inclusión de las constantes y funciones globales
	require_once "Autoload.php"; 	//Inclusión de archivo para Autoload de las clases 
	\APP\Autoload::run();					//Arranca Autoload

	session_start();						//Revisar si hay un sesión activa actualmente 
	if (isset($_SESSION["idEmpleado"])){
		if(isset($_SESSION['timelast']) &&  $_SESSION['timelast'] + SESSIONTIMEOUT * 60 < time()){
			session_destroy();
			header("Location: ./index.php");
		}	
		header("Location: ./home.php");		//Redireciona
	}

	$error = "";							//Variable de manejo de error, Datos incorrectos

	if ($_SERVER["REQUEST_METHOD"] == "POST") {	//si se llama al index a través de un POST
		$userName = $password = "";
		$userName = \APP\Config\Sanitize::sanitizeInput($_POST["userName"]);	//Se limpia la entrada TODO-Validación
		$password = \APP\Config\Sanitize::sanitizeInput($_POST["password"]);

		$user = new \APP\Models\Users();			//Creación de objeto User a través de los datos
		$user->set("userName", $userName);
		$user->set("password", $password);

		if($user->check()){					//Validación de usuario existente
											//Se inicia sesión con id del empleado
			$_SESSION["idEmpleado"] = $user->get('idEmpleado');
			
			$_SESSION["timelast"] = time(); //Se asigna la hora de la última operación 
			
			header("Location: ./home.php");	//Redireciona

		}else{
			$error = "Datos incorrectos.";	//Genera alerta de error
		}

	}

 ?>

 <!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="descripcion">
		<meta name="keywords" content="keywords">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title>NombreDelSistema - Login </title>
	</head>

	<body>
		<form action="index.php" method="post" autocomplete="off">
	  	Usuario: <input type="text" name="userName" placeholder="Tu nombre de usuario" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." required autofocus >
	  	Contraseña: <input type="password" name="password" placeholder="Tu contraseña" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." required >
	  	<input type="submit" value="Iniciar sesión">
	  	<span class="error"><?php echo $error ?></span>
		</form>
	</body>

</html>

<!--
COMENTARIOS GENERALES:

- ERROR MAYUSCULAS MINUSCULAS USERNAME AND PASS

- Faltan validaciones y sanitización de los datos.
- Estilo class error.

-->
