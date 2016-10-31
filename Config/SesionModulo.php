<?php namespace Config;

	session_start();						//Revisar si hay un sesión activa actualemnte 
	if (!isset($_SESSION["idEmpleado"])){
		echo "<script type='text/javascript'>window.top.location.href = \"../index.php\";</script>";
											//Redireciona si no hay sesión activa
	}elseif ($_SESSION['timelast'] + SESSIONTIMEOUT * 60 < time()) {	
											//Revisa que no haya pasado mas de 30min
		session_destroy();
		echo "<script type='text/javascript'>window.top.location.href = \"../index.php\";</script>";
	}else{
		$_SESSION["timelast"] = time();		//Actualiza la hora del ultimo movimiento
	}
 ?>
