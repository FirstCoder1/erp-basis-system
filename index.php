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

 ?>

 <!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="descripcion">
		<meta name="keywords" content="keywords">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title>NombreDelSistema - Login </title>

		<script>
			
		function login() {
												//Mete los valores del form al post		
			var formElements=document.getElementById("login");    
			var params="";
												//Iteramos por cada elemento del form
			for (var i=0; i<formElements.length; i++){
												//We dont want to include the submit-buttom
			    if (formElements[i].type!="submit"){	
			    	
			    	params+=formElements[i].name+"="+formElements[i].value+"&";
			    	
			    }	
			        
			}

			xmlhttp = new XMLHttpRequest();		//AJAX

			xmlhttp.onreadystatechange = function() {
												//Este If maneja que hacer con la respuesta
	            if (this.readyState == 4 && this.status == 200) {
	            								//Si la inserción es exitosa
	                if(this.responseText == 1){	
	                	
	                	window.top.location.href = "home.php";

			        }else{						//En caso de error, mensaje de error
			        	
	                	document.getElementById("error").innerHTML = "Datos incorrectos.";

			        }
	            }
	        };
	        									//Datos de envío de consulta
	        xmlhttp.open("POST","./Controllers/login.php",true);
	        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	        xmlhttp.send(params); 
	    }

		</script>
	</head>

	<body>
		<h1>Login</h1>
		<form id="login" autocomplete="off" onsubmit="login(); return false;">
	  	Usuario: <input type="text" name="userName" placeholder="Tu nombre de usuario" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." required autofocus >
	  	Contraseña: <input type="password" name="password" placeholder="Tu contraseña" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." required >
	  	<input type="submit" value="Iniciar sesión">
	  	<span id="error"></span>
		</form>
	</body>

</html>

<!--
COMENTARIOS GENERALES:

- Faltan validaciones y sanitización de los datos.
- Estilo class error.

-->
