<?php

require_once __DIR__."/../Config/Constantes.php";	//Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 		//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();						//Arranca Autoload
\APP\Config\Sesion::checkOnModulo();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="descripcionControlModulos">
	<meta name="keywords" content="keywordsControlModulos">
	<meta name="author" content="Oscar Camacho Urriolagoitia">
	<title><?php echo APPNAME ?> - Control de módulos </title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"
			integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			crossorigin="anonymous"></script>
</head>

<body>
<h4>Control de módulos</h4>


<h5>Buscar empleado:</h5>

<form id="buscarForm" autocomplete="off">
	<fieldset>
		ID de Empleado: 		<input type="number" 	class="idEmpleado" min="0" step="1" placeholder="0">
		Nombre: 				<input type="text" 		class="nombre" 		placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
		Apellido Paterno: 		<input type="text" 		class="apPaterno" 	placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
		Apellido Materno: 		<input type="text" 		class="apMaterno" 	placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
		<input type="reset" value="Borrar Todo" >
		<input type="submit" value="Buscar Empleado" id="boton" style="visibility: hidden;">
	</fieldset>
</form>
<br>Resultado de la busqueda:<br>
<span id="respuestaNavegar"></span>

<h5>Modificar módulos:</h5>
<span id="exitoErrorModificarFillForm" class="error"></span>
<form id="modificarForm" autocomplete="off" >
	<fieldset id="modificarFieldset">
		ID de Empleado: 		<input type="number" 	class="idEmpleado" min="0" step="1" placeholder="0" disabled>
		Nombre: 				<input type="text" 		class="nombre" placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres."  disabled>
		Apellido Paterno: 		<input type="text" 		class="apPaterno" placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." disabled>
		Apellido Materno: 		<input type="text" 		class="apMaterno" placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." disabled>

		<input type="checkbox" class="controlEmpleados" disabled> Control de Empleados </input>
		<input type="checkbox" class="controlAccesos" 	disabled> Control de Accesos </input>
		<input type="checkbox" class="registros" 		disabled> Registros </input>
		<input type="checkbox" class="controlModulos" 	disabled> Control de Modulos </input>
		<input type="checkbox" class="controlClientes" 	disabled> Control de Clientes </input>

		<input type="submit" class="submit" value="Modificar módulos" disabled>
		<span id="exitoErrorModificarForm" class="error"></span>

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

	function buscar() {
		$.ajax({
			url: "../Controllers/moduloBuscar.php",
			type: 'POST',
			dataType: 'json',
			data: {
				idEmpleado:	$('#buscarForm .idEmpleado').val(),
				nombre: 	$('#buscarForm .nombre').val(),
				apPaterno: 	$('#buscarForm .apPaterno').val(),
				apMaterno: 	$('#buscarForm .apMaterno').val(),
			}
		}).done(function (data) {
			if (data.success != false) {
				var tabla = '<table>'+
					'<tr>'+
					'<td>Opciones</th>'+
					'<th>ID</th>'+
					'<th>Nombre</th>'+
					'<th>Ap. Paterno</th>'+
					'<th>Ap. Materno</th>';

				$.each(data, function(i, obj) {
					tabla+= "<tr><td>"+
						"<button class=\"modificarFillForm\""+
						"idEmpleado = \""+obj.idEmpleado+"\""+
						"nombre = \""+obj.nombre+"\""+
						"apPaterno = \""+obj.apPaterno+"\""+
						"apMaterno = \""+obj.apMaterno+"\""+
						"modulos = \""+obj.modulos+"\""+
						">Modificar</button>"+
						"</td><td>"+obj.idEmpleado+
						"</td><td>"+obj.nombre+
						"</td><td>"+obj.apPaterno+
						"</td><td>"+obj.apMaterno+
						"</td>";
				});
				tabla += "</table>";
				$("#respuestaNavegar").empty().append(tabla);

			} else {						//En caso de error, mensaje de error
				$("#respuestaNavegar").empty().text("No se encontraron coincidencias con la búsqueda.");
			}

		});

	}

	$(document).ready(function () {

		buscar();

		$("#buscarForm").on( 'submit change keyup', function (evt) {
			evt.preventDefault();
			buscar();
			return false;
		});

		$("#buscarForm").on( 'reset ', function (evt) {
			buscar();
		});

		$("#respuestaNavegar").on( 'click', '.modificarFillForm', function (evt) {

			evt.preventDefault();

			/*var e = document.getElementById("exitoErrorModificarFillForm");
			if (!!e && e.scrollIntoView) {
				e.scrollIntoView();
			}*/

			$('#modificarForm .idEmpleado').val($(this).attr("idEmpleado"));
			$('#modificarForm .nombre').val($(this).attr("nombre"));
			$('#modificarForm .apPaterno').val($(this).attr("apPaterno"));
			$('#modificarForm .apMaterno').val($(this).attr("apMaterno"));
			$('#modificarForm .controlEmpleados').prop('checked', (($(this).attr("modulos").charAt(0) == 1)? true:false) );
			$('#modificarForm .controlAccesos').prop('checked', (($(this).attr("modulos").charAt(1) == 1)? true:false));
			$('#modificarForm .registros').prop('checked', (($(this).attr("modulos").charAt(2) == 1)? true:false) );
			$('#modificarForm .controlModulos').prop('checked', (($(this).attr("modulos").charAt(3) == 1)? true:false) );
			$('#modificarForm .controlClientes').prop('checked', (($(this).attr("modulos").charAt(4) == 1)? true:false) );


			$('#modificarForm .controlEmpleados').prop('disabled', false);
			$('#modificarForm .controlAccesos').prop('disabled', false);
			$('#modificarForm .registros').prop('disabled', false);
			$('#modificarForm .controlModulos').prop('disabled', false);
			$('#modificarForm .controlClientes').prop('disabled', false);

			$('#modificarForm .submit').prop('disabled', false);
			$('#exitoErrorModificarForm').text("");

			return false;
		});

		$("#modificarForm").submit( function (evt) {
			evt.preventDefault();

			$modulos = "";

			if($('#modificarForm .controlEmpleados').prop('checked')){$modulos+="1";}else{$modulos+="0";};
			if($('#modificarForm .controlAccesos').prop('checked')){$modulos+="1";}else{$modulos+="0";};
			if($('#modificarForm .registros').prop('checked')){$modulos+="1";}else{$modulos+="0";};
			if($('#modificarForm .controlModulos').prop('checked')){$modulos+="1";}else{$modulos+="0";};
			if($('#modificarForm .controlClientes').prop('checked')){$modulos+="1";}else{$modulos+="0";};

			$.ajax({
				url: "../Controllers/moduloModificar.php",
				type: 'POST',
				dataType: 'json',
				data: {
					idEmpleado: $('#modificarForm .idEmpleado').val(),
					modulos: 	$modulos
				}
			}).done(function (data) {
				if (data.success) {
					$('#modificarForm .controlEmpleados').prop('disabled', true);
					$('#modificarForm .controlAccesos').prop('disabled', true);
					$('#modificarForm .registros').prop('disabled', true);
					$('#modificarForm .controlModulos').prop('disabled', true);
					$('#modificarForm .controlClientes').prop('disabled', true);
					$('#modificarForm .submit').prop('disabled', true);
					document.getElementById("modificarForm").reset();
					buscar();
					document.getElementById("exitoErrorModificarForm").innerHTML = "Modulos modificados con éxito.";
				} else {						//En caso de error, mensaje de error
					document.getElementById("exitoErrorModificarForm").innerHTML = "Error modificando modulos.";
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