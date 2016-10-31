<?php namespace Config;

	session_start();						//Revisar si hay una sesión activa actualemnte 
	if (!isset($_SESSION["idEmpleado"])){
		header("Location: ./index.php");		//Redireciona si no hay sesión activa
	}elseif ($_SESSION['timelast'] + SESSIONTIMEOUT * 60 < time()) {	//Revisa que no haya pasado mas de 30min
		session_destroy();
		header("Location: ./index.php");
	}else{
		$_SESSION["timelast"] = time();		//Actualiza la hora del ultimo movimiento
	}

 ?>