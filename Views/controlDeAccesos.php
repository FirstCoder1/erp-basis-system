<?php

require_once __DIR__."/../Config/Constantes.php";	//Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 		//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();						//Arranca Autoload
\APP\Config\Sesion::checkOnModulo();
 ?>

 <!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="descripcionControlAcesos">
		<meta name="keywords" content="keywordsControlAcesos">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title><?php echo APPNAME ?> - Control de accesos </title>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"
				integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
				crossorigin="anonymous"></script>
	</head>

	<body>
		<h4>Control de accesos</h4>

		<h5>Navegación accesos:</h5>
		<form id="navegarAccesoForm" autocomplete="off">
		<fieldset>
		ID de Empleado: 		<input type="number" 	class="idEmpleado" min="0" step="1" placeholder="0">
	  	Nombre: 				<input type="text" 		class="nombre"      placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
	  	Apellido Paterno: 		<input type="text" 		class="apPaterno"   placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
	  	Apellido Materno: 		<input type="text" 		class="apMaterno"   placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
			<input type="reset" value="Borrar Todo" >
			<input type="submit" value="Buscar Acceso" style="visibility: hidden;">
		</fieldset>
		</form>
		<br>Resultado de la busqueda:<br>
		<span id="respuestaNavegarAcceso"></span>


		<h5>Modificar Acceso:</h5>
		<form id="modificarAccesoForm" autocomplete="off">
			<fieldset id="modificarAccesoFieldset" >
				ID de Empleado: 	<input type="number" 	class="idEmpleado" min="0" step="1" placeholder="0" disabled >
				Nombre: 			<input type="text" 		class="nombre" 		placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." disabled >
				Apellido Paterno: 	<input type="text" 		class="apPaterno" 	placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." disabled >
				Apellido Materno: 	<input type="text" 		class="apMaterno" 	placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." disabled >
				Usuario: 			<input type="text" 		class="userName" 	placeholder="Nuevo username" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." required autofocus disabled >
				Contraseña: 		<input type="password" 	class="password" 	placeholder="Nueva contraseña" 		maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." required disabled >
				<input type="submit" class="submit" value="Modificar Acceso" disabled>
				<span id="exitoErrorModificarAccesoForm" class="error"></span>
			</fieldset>
		</form>


		<script>

			var timeOut = (<?php echo SESSIONTIMEOUT ?>*60+1)*1000;
			var timer = setInterval(redirect, timeOut);

			window.onload = resetTimer;
			document.onmousemove = resetTimer;
			document.onkeypress = resetTimer;

			function redirect() {
				window.top.location.href = "../index.php";
			}

			function resetTimer() {
				clearInterval(timer);
				timer = setInterval(redirect, timeOut);
			}

			function buscarAcceso() {
				$.ajax({
					url: "../Controllers/accesoBuscar.php",
					type: 'POST',
					dataType: 'json',
					data: {
						idEmpleado:	$('#navegarAccesoForm .idEmpleado').val(),
						nombre: 	$('#navegarAccesoForm .nombre').val(),
						apPaterno: 	$('#navegarAccesoForm .apPaterno').val(),
						apMaterno: 	$('#navegarAccesoForm .apMaterno').val(),
					}
				}).done(function (data) {
					if (data.success != false) {
						var tabla = '<table>'+
							'<tr>'+
							'<td>Opciones</th>'+
							'<th>ID</th>'+
							'<th>Nombre</th>'+
							'<th>Ap. Paterno</th>'+
							'<th>Ap. Materno</th>'+
							'<th>Nombre de Usuario</th>';

						$.each(data, function(i, acceso) {
							tabla+= "<tr><td>"+
								"<button class=\"modificarAccesoFillForm\""+
								"idEmpleado = \""+acceso.idEmpleado+"\""+
								"nombre = \""+acceso.nombre+"\""+
								"apPaterno = \""+acceso.apPaterno+"\""+
								"apMaterno = \""+acceso.apMaterno+"\""+
								"userName = \""+((acceso.userName == null)?"":acceso.userName)+"\""+
								">Modificar</button>"+
								"</td><td>"+acceso.idEmpleado+
								"</td><td>"+acceso.nombre+
								"</td><td>"+acceso.apPaterno+
								"</td><td>"+acceso.apMaterno+
								"</td><td>"+((acceso.userName == null)?"-":acceso.userName)+
								"</td>";
						});
						tabla += "</table>";
						$("#respuestaNavegarAcceso").empty().append(tabla);

					} else {						//En caso de error, mensaje de error
						$("#respuestaNavegarAcceso").empty().text("No se encontraron coincidencias con la búsqueda.");
					}

				});

			}

			$(document).ready(function () {

				buscarAcceso();

				$("#navegarAccesoForm").on( 'submit change keyup', function (evt) {
					evt.preventDefault();
					buscarAcceso();
					return false;
				});

				$("#navegarAccesoForm").on( 'reset ', function (evt) {
					buscarAcceso();
				});

				$("#respuestaNavegarAcceso").on( 'click', '.modificarAccesoFillForm', function (evt) {
					evt.preventDefault();

					var e = document.getElementById("exitoErrorModificarAccesoFillForm");
					if (!!e && e.scrollIntoView) {
						e.scrollIntoView();
					}

					$('#modificarAccesoForm .idEmpleado').val($(this).attr("idEmpleado"));
					$('#modificarAccesoForm .nombre').val($(this).attr("nombre"));
					$('#modificarAccesoForm .apPaterno').val($(this).attr("apPaterno"));
					$('#modificarAccesoForm .apMaterno').val($(this).attr("apMaterno"));
					$('#modificarAccesoForm .userName').val($(this).attr("userName"));

					$('#modificarAccesoForm .userName').prop('disabled', false);
					$('#modificarAccesoForm .password').prop('disabled', false);
					$('#modificarAccesoForm .submit').prop('disabled', false);
					$('#exitoErrorModificarAccesoForm').text("");

					return false;
				});

				$("#modificarAccesoForm").submit( function (evt) {
					evt.preventDefault();
					$.ajax({
						url: "../Controllers/accesoModificar.php",
						type: 'POST',
						dataType: 'json',
						data: {
							idEmpleado: $('#modificarAccesoForm .idEmpleado').val(),
							userName: 	$('#modificarAccesoForm .userName').val(),
							password:	$('#modificarAccesoForm .password').val(),
						}
					}).done(function (data) {
						if (data.success) {
							$('#modificarAccesoForm .userName').prop('disabled', true);
							$('#modificarAccesoForm .password').prop('disabled', true);
							$('#modificarAccesoForm .submit').prop('disabled', true);
							document.getElementById("modificarAccesoForm").reset();
							buscarAcceso();
							document.getElementById("exitoErrorModificarAccesoForm").innerHTML = "Acceso modificado con éxito.";
						} else {						//En caso de error, mensaje de error
							document.getElementById("exitoErrorModificarAccesoForm").innerHTML = "Error modificando acceso.";
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

- Clase error
- Falta refrescar la pantalla con un timer del fin de sesion sin afectar al padre.


-Registro de acciones

-Manejar un mensaje de error en la búsqueda nos solo decir que es vacío

- Mas validaciones de campos con patterns
- Formatear el texto al escribir para acomodarlo al pattern
-->