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
		<meta name="description" content="descripcionControlClientes">
		<meta name="keywords" content="keywordsControlClientes">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title><?php echo APPNAME ?> - Control de clientes </title>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"
				integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
				crossorigin="anonymous"></script>
	</head>

	<body>
		<h4>Control de clientes</h4>

		<h5>Agregar Cliente:</h5>
		<form id="agregarForm" autocomplete="off">
		<fieldset>
	  	Nombre: 				<input type="text" 	class="nombre" placeholder="Xxxxx" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " autofocus required>
	  	Apellido Paterno: 		<input type="text" 	class="apPaterno" placeholder="Yyyyy" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>
	  	Apellido Materno: 		<input type="text" 	class="apMaterno" placeholder="Zzzzz" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " >
	  	Fecha de Nacimiento: 	<input type="date" 	class="fechaDeNacimiento"  >
	  	Calle y número: 		<input type="text" 	class="calleNumeroDomicilio" placeholder="Xxxxx YYY" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Colonia: 				<input type="text" 	class="coloniaDomicilio" placeholder="Xxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Delegación o Municipio: <input type="text" 	class="delegacionMunicipioDomicilio" placeholder="Xxxxxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9-  ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Código Postal: 			<input type="text" 	class="codigoPostalDomicilio" placeholder="XXXXXX" maxlength="8" pattern="[A-Z0-9]{5,8}" title="Solo letras mayúsculas y números (no signos), 5 - 8 caracteres." >
	  	Ciudad: 				<input type="text" 	class="ciudadDomicilio" placeholder="Xxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{2,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." >
	  	Teléfono Local: 		<input type="tel" 	class="telefonoLocal" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+() ]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >
	  	Teléfono Movil: 		<input type="tel" 	class="telefonoMovil" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+() ]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >
	  	Género: 				<select class="genero" >
									<option></option>
									<option value="Hombre">Hombre</option>
									<option value="Mujer">Mujer</option>
								</select>
	  	Estado Civil: 			<select class="estadoCivil" >
									<option></option>
									<option value="Casado">Casado</option>
									<option value="Soltero">Soltero</option>
									<option value="Divorciado">Divorciado</option>
									<option value="Otro">Otro</option>
								</select>
		CURP: 					<input type="text" class="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" title="Solo letras y números (no signos), 18 caracteres." >
  		Email: 					<input type="email" class="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" >
			<input type="reset" value="Borrar Todo">
			<input type="submit" value="Agregar Cliente">
	  	<span id="exitoErrorAgregarForm" class="error"></span>
	  	</fieldset>
		</form>


		<h5>Buscar y modificar clientes:</h5>
		<form id="buscarForm" autocomplete="off">
		<fieldset>
		ID de Cliente: 		<input type="number" class="id" min="0" step="1" placeholder="0" >
	  	Nombre: 				<input type="text" class="nombre" placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
	  	Apellido Paterno: 		<input type="text" class="apPaterno" placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
	  	Apellido Materno: 		<input type="text" class="apMaterno" placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
	  	Fecha de Nacimiento: 	<input type="date" class="fechaDeNacimiento"  >
	  	Calle y número: 		<input type="text" class="calleNumeroDomicilio" placeholder="Xxxxx YYY" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Colonia: 				<input type="text" class="coloniaDomicilio" placeholder="Xxxxxxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Delegación o Municipio: <input type="text" class="delegacionMunicipioDomicilio" placeholder="Xxxxxxxxxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9-  ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Código Postal: 			<input type="text" class="codigoPostalDomicilio" placeholder="XXXXXX" maxlength="8" style="text-transform: uppercase;" pattern="[a-zA-Z0-9-]{0,8}" title="Solo letras y números (no signos), 5 - 8 caracteres." >
	  	Ciudad: 				<input type="text" class="ciudadDomicilio" placeholder="Xxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." >
	  	Teléfono Local: 		<input type="tel" class="telefonoLocal" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-|+|(|)| ]{0,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >
	  	Teléfono Movil: 		<input type="tel" class="telefonoMovil" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-|+|(|)| ]{0,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >
	  	Género: 				<select class="genero" >
									<option></option>
									<option value="Hombre">Hombre</option>
									<option value="Mujer">Mujer</option>
								</select>
	  	Estado Civil: 			<select class="estadoCivil" >
									<option></option>
									<option value="Casado">Casado</option>
									<option value="Soltero">Soltero</option>
									<option value="Divorciado">Divorciado</option>
									<option value="Otro">Otro</option>
								</select>
  		CURP: 					<input type="text" class="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" style="text-transform: uppercase;" pattern="[A-Z0-9-]{0,18}" title="Solo letras y números (no signos), 18 caracteres." >
  		Email: 					<input type="test" class="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" style="text-transform: lowercase;" >
  		Fecha de Alta: 			<input type="datetime-local" step=1 class="fechaAlta"  >
			<input type="reset" value="Borrar Todo" >
			<input type="submit" value="Buscar Cliente" style="visibility: hidden;">
		</fieldset>
		</form>
		<br>Resultado de la busqueda:<br>
		<span id="respuestaBuscar"></span>


		<h5>Modificar Cliente:</h5>
		<form id="modificarForm" autocomplete="off" >
		<fieldset id="modificarFieldset" disabled>

		ID de Cliente: 			<input type="number" class="id" min="0" step="1" placeholder="0" required  >
	  	Nombre: 				<input type="text" class="nombre" placeholder="Xxxxx" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " autofocus required>
	  	Apellido Paterno: 		<input type="text" class="apPaterno" placeholder="Yyyyy" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>
	  	Apellido Materno: 		<input type="text" class="apMaterno" placeholder="Zzzzz" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>
	  	Fecha de Nacimiento:	<input type="date" class="fechaDeNacimiento"  required>
	  	Calle y número: 		<input type="text" class="calleNumeroDomicilio" placeholder="Xxxxx YYY" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>
	  	Colonia: 				<input type="text" class="coloniaDomicilio" placeholder="Xxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>
	  	Delegación o Municipio: <input type="text" class="delegacionMunicipioDomicilio" placeholder="Xxxxxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9-  ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>
	  	Código Postal: 			<input type="text" class="codigoPostalDomicilio" placeholder="XXXXXX" maxlength="8" pattern="[A-Z0-9]{5,8}" title="Solo letras mayúsculas y números (no signos), 5 - 8 caracteres." required>
	  	Ciudad: 				<input type="text" class="ciudadDomicilio" placeholder="Xxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{2,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." required>
	  	Teléfono Local: 		<input type="tel" class="telefonoLocal" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+() ]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>
	  	Teléfono Movil: 		<input type="tel" class="telefonoMovil" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+() ]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>
	  	Género: 				<select class="genero" >
									<option></option>
									<option value="Hombre">Hombre</option>
									<option value="Mujer">Mujer</option>
								</select>
	  	Estado Civil: 			<select class="estadoCivil" >
									<option></option>
									<option value="Casado">Casado</option>
									<option value="Soltero">Soltero</option>
									<option value="Divorciado">Divorciado</option>
									<option value="Otro">Otro</option>
								</select>
  		CURP: 					<input type="text" class="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" title="Solo letras y números (no signos), 18 caracteres." required>
  		Email: 					<input type="email" class="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" required>
  		Fecha de Alta: 			<input type="datetime-local" step=1 class="fechaAlta" required  >
	  	<input type="submit" value="Modificar Cliente">
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
					url: "../Controllers/clienteBuscar.php",
					type: 'POST',
					dataType: 'json',
					data: {
						id: 							$('#buscarForm .id').val(),
						nombre: 						$('#buscarForm .nombre').val(),
						apPaterno: 						$('#buscarForm .apPaterno').val(),
						apMaterno: 						$('#buscarForm .apMaterno').val(),
						fechaDeNacimiento: 				$('#buscarForm .fechaDeNacimiento').val(),
						calleNumeroDomicilio: 			$('#buscarForm .calleNumeroDomicilio').val(),
						coloniaDomicilio: 				$('#buscarForm .coloniaDomicilio').val(),
						delegacionMunicipioDomicilio: 	$('#buscarForm .delegacionMunicipioDomicilio').val(),
						codigoPostalDomicilio: 			$('#buscarForm .codigoPostalDomicilio').val(),
						ciudadDomicilio: 				$('#buscarForm .ciudadDomicilio').val(),
						telefonoLocal: 					$('#buscarForm .telefonoLocal').val(),
						telefonoMovil: 					$('#buscarForm .telefonoMovil').val(),
						genero: 						$('#buscarForm .genero option:selected').text(),
						estadoCivil: 					$('#buscarForm .estadoCivilBus option:selected').text(),
						curp: 							$('#buscarForm .curp').val(),
						email: 							$('#buscarForm .email').val(),
						fechaAlta: 						$('#buscarForm .fechaAlta').val(),
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
						'<th>Fecha de Nacimiento</th>'+
						'<th>Calle número Domicilio</th>'+
						'<th>Colonia Domicilio</th>'+
						'<th>Delegación/Municipio Domicilio</th>'+
						'<th>C.P. Domicilio</th>'+
						'<th>Ciudad Domicilio</th>'+
						'<th>Teléfono Local</th>'+
						'<th>Teléfono Móvil</th>'+
						'<th>Género</th>'+
						'<th>Estado civil</th>'+
						'<th>CURP</th>'+
						'<th>Email</th>'+
						'<th>Fecha de alta</th>'+
						'</tr>';

						$.each(data, function(i, obj) {
							tabla+= "<tr><td>"+
								"<button class=\"modificarFillForm\""+
									"id = \""+obj.id+"\""+
									"nombre = \""+obj.nombre+"\""+
									"apPaterno = \""+obj.apPaterno+"\""+
									"apMaterno = \""+obj.apMaterno+"\""+
									"fechaDeNacimiento = \""+obj.fechaDeNacimiento+"\""+
									"calleNumeroDomicilio = \""+obj.calleNumeroDomicilio+"\""+
									"coloniaDomicilio = \""+obj.coloniaDomicilio+"\""+
									"delegacionMunicipioDomicilio = \""+obj.delegacionMunicipioDomicilio+"\""+
									"codigoPostalDomicilio = \""+obj.codigoPostalDomicilio+"\""+
									"ciudadDomicilio = \""+obj.ciudadDomicilio+"\""+
									"telefonoLocal = \""+obj.telefonoLocal+"\""+
									"telefonoMovil = \""+obj.telefonoMovil+"\""+
									"genero = \""+obj.genero+"\""+
									"estadoCivil = \""+obj.estadoCivil+"\""+
									"curp = \""+obj.curp+"\""+
									"email = \""+obj.email+"\""+
									"fechaAlta = \""+obj.fechaAlta+"\""+
								">Modificar</button>"+
								"</td><td>"+obj.id+
								"</td><td>"+obj.nombre+
								"</td><td>"+obj.apPaterno+
								"</td><td>"+obj.apMaterno+
								"</td><td>"+obj.fechaDeNacimiento+
								"</td><td>"+obj.calleNumeroDomicilio+
								"</td><td>"+obj.coloniaDomicilio+
								"</td><td>"+obj.delegacionMunicipioDomicilio+
								"</td><td>"+obj.codigoPostalDomicilio+
								"</td><td>"+obj.ciudadDomicilio+
								"</td><td>"+obj.telefonoLocal+
								"</td><td>"+obj.telefonoMovil+
								"</td><td>"+obj.genero+
								"</td><td>"+obj.estadoCivil+
								"</td><td>"+obj.curp+
								"</td><td>"+obj.email+
								"</td><td>"+obj.fechaAlta+
								"</td>";
						});

						tabla += "</table>";
						$("#respuestaBuscar").empty().append(tabla);

					} else {						//En caso de error, mensaje de error
						$("#respuestaBuscar").empty().text("No se encontraron coincidencias con la búsqueda.");
					}
				});

			}

			$(document).ready(function () {

				buscar();

				$("#agregarForm").submit(function (evt) {
					evt.preventDefault();
					$.ajax({
						url: "../Controllers/clienteAgregar.php",
						type: 'POST',
						dataType: 'json',
						data: {
							id: 							$('#agregarForm .id').val(),
							nombre: 						$('#agregarForm .nombre').val(),
							apPaterno: 						$('#agregarForm .apPaterno').val(),
							apMaterno: 						$('#agregarForm .apMaterno').val(),
							fechaDeNacimiento: 				$('#agregarForm .fechaDeNacimiento').val(),
							calleNumeroDomicilio: 			$('#agregarForm .calleNumeroDomicilio').val(),
							coloniaDomicilio: 				$('#agregarForm .coloniaDomicilio').val(),
							delegacionMunicipioDomicilio: 	$('#agregarForm .delegacionMunicipioDomicilio').val(),
							codigoPostalDomicilio: 			$('#agregarForm .codigoPostalDomicilio').val(),
							ciudadDomicilio: 				$('#agregarForm .ciudadDomicilio').val(),
							telefonoLocal: 					$('#agregarForm .telefonoLocal').val(),
							telefonoMovil: 					$('#agregarForm .telefonoMovil').val(),
							genero: 						$('#agregarForm .genero option:selected').text(),
							estadoCivil: 					$('#agregarForm .estadoCivil option:selected').text(),
							curp: 							$('#agregarForm .curp').val(),
							email: 							$('#agregarForm .email').val(),
							fechaAlta: 						$('#agregarForm .fechaAlta').val()
						}
					}).done(function (data) {
						if (data.success) {
							document.getElementById("agregarForm").reset();
							buscar();
							document.getElementById("exitoErrorAgregarForm").innerHTML = "Cliente agregado con éxito.";
						} else {						//En caso de error, mensaje de error
							document.getElementById("exitoErrorAgregarForm").innerHTML = "Error agregando cliente.";
						}
					});
					return false;
				});

				$("#buscarForm").on( 'submit change keyup', function (evt) {
					evt.preventDefault();
					buscar();
					return false;
				});

				$("#buscarForm").on( 'reset ', function (evt) {
					buscar();
				});

				$("#respuestaBuscar").on( 'click', '.modificarFillForm', function (evt) {
					evt.preventDefault();

					var e = document.getElementById("exitoErrorModificarFillForm");
					if (!!e && e.scrollIntoView) {
						e.scrollIntoView();
					}

					$('#modificarForm .id').val($(this).attr("id"));
					$('#modificarForm .nombre').val($(this).attr("nombre"));
					$('#modificarForm .apPaterno').val($(this).attr("apPaterno"));
					$('#modificarForm .apMaterno').val($(this).attr("apMaterno"));
					$('#modificarForm .fechaDeNacimiento').val($(this).attr("fechaDeNacimiento"));
					$('#modificarForm .calleNumeroDomicilio').val($(this).attr("calleNumeroDomicilio"));
					$('#modificarForm .coloniaDomicilio').val($(this).attr("coloniaDomicilio"));
					$('#modificarForm .delegacionMunicipioDomicilio').val($(this).attr("delegacionMunicipioDomicilio"));
					$('#modificarForm .codigoPostalDomicilio').val($(this).attr("codigoPostalDomicilio"));
					$('#modificarForm .ciudadDomicilio').val($(this).attr("ciudadDomicilio"));
					$('#modificarForm .telefonoLocal').val($(this).attr("telefonoLocal"));
					$('#modificarForm .telefonoMovil').val($(this).attr("telefonoMovil"));
					$('#modificarForm .genero').val($(this).attr("genero"));
					$('#modificarForm .estadoCivil').val($(this).attr("estadoCivil"));
					$('#modificarForm .curp').val($(this).attr("curp"));
					$('#modificarForm .email').val($(this).attr("email"));
					$('#modificarForm .fechaAlta').val($(this).attr("fechaAlta").replace(" ","T"));

					$('#modificarFieldset').prop('disabled', false);
					$('#exitoErrorModificarForm').text("");

					return false;
				});

				$("#modificarForm").submit( function (evt) {
					evt.preventDefault();
					$.ajax({
						url: "../Controllers/clienteModificar.php",
						type: 'POST',
						dataType: 'json',
						data: {
							id: 							$('#modificarForm .id').val(),
							nombre: 						$('#modificarForm .nombre').val(),
							apPaterno: 						$('#modificarForm .apPaterno').val(),
							apMaterno: 						$('#modificarForm .apMaterno').val(),
							fechaDeNacimiento: 				$('#modificarForm .fechaDeNacimiento').val(),
							calleNumeroDomicilio: 			$('#modificarForm .calleNumeroDomicilio').val(),
							coloniaDomicilio: 				$('#modificarForm .coloniaDomicilio').val(),
							delegacionMunicipioDomicilio: 	$('#modificarForm .delegacionMunicipioDomicilio').val(),
							codigoPostalDomicilio: 			$('#modificarForm .codigoPostalDomicilio').val(),
							ciudadDomicilio: 				$('#modificarForm .ciudadDomicilio').val(),
							telefonoLocal: 					$('#modificarForm .telefonoLocal').val(),
							telefonoMovil: 					$('#modificarForm .telefonoMovil').val(),
							genero: 						$('#modificarForm .genero option:selected').text(),
							estadoCivil: 					$('#modificarForm .estadoCivil option:selected').text(),
							curp: 							$('#modificarForm .curp').val(),
							email: 							$('#modificarForm .email').val(),
							fechaAlta: 						$('#modificarForm .fechaAlta').val()
						}
					}).done(function (data) {
						if (data.success) {
							document.getElementById("modificarFieldset").disabled = true;
							document.getElementById("modificarForm").reset();
							buscar();
							document.getElementById("exitoErrorModificarForm").innerHTML = "Cliente modificado con éxito.";
						} else {						//En caso de error, mensaje de error
							document.getElementById("exitoErrorModificarForm").innerHTML = "Error modificando cliente.";
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

-->