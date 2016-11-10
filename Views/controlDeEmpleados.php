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
		<meta name="description" content="descripcionControlEmpleados">
		<meta name="keywords" content="keywordsControlEmpleados">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title><?php echo APPNAME ?> - Control de empleados </title>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"
				integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
				crossorigin="anonymous"></script>
	</head>

	<body>
		<h4>Control de empleados</h4>

		<h5>Agregar Empleado:</h5>
		<form id="agregarEmpleadoForm" autocomplete="off">
		<fieldset>
	  	Nombre: 				<input type="text" name="nombre" placeholder="Xxxxx" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " autofocus required>
	  	Apellido Paterno: 		<input type="text" name="apPaterno" placeholder="Yyyyy" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>
	  	Apellido Materno: 		<input type="text" name="apMaterno" placeholder="Zzzzz" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>
	  	Fecha de Nacimiento: 	<input type="date" name="fechaDeNacimiento"  required>
	  	Calle y número: 		<input type="text" name="calleNumeroDomicilio" placeholder="Xxxxx YYY" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>
	  	Colonia: 				<input type="text" name="coloniaDomicilio" placeholder="Xxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>
	  	Delegación o Municipio: <input type="text" name="delegacionMunicipioDomicilio" placeholder="Xxxxxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9-  ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>
	  	Código Postal: 			<input type="text" name="codigoPostalDomicilio" placeholder="XXXXXX" maxlength="8" pattern="[A-Z0-9]{5,8}" title="Solo letras mayúsculas y números (no signos), 5 - 8 caracteres." required>
	  	Ciudad: 				<input type="text" name="ciudadDomicilio" placeholder="Xxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{2,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." required>
	  	Teléfono Local: 		<input type="tel" name="telefonoLocal" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+() ]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>
	  	Teléfono Movil: 		<input type="tel" name="telefonoMovil" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+() ]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>
	  	Género: 				<select name="genero" required>
									<option></option>
									<option value="Hombre">Hombre</option>
									<option value="Mujer">Mujer</option>
								</select>
	  	Estatura: 				<input type="number" name="estaturaM" min="0.50" max="2.50" step=".01" placeholder="1.65" required> metros
	  	Estado Civil: 			<select name="estadoCivil" required>
									<option></option>
									<option value="Casado">Casado</option>
									<option value="Soltero">Soltero</option>
									<option value="Divorciado">Divorciado</option>
									<option value="Otro">Otro</option>
								</select>
		CURP: 					<input type="text" name="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" title="Solo letras y números (no signos), 18 caracteres." required>
  		Email: 					<input type="email" name="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" required>
  		Estado: 				<select name="estado" required>
									<option></option>
									<option value="1">Activo</option>
									<option value="0">Inactivo</option>
								</select>
			<input type="reset" value="Borrar Todo">
			<input type="submit" value="Agregar Empleado">
	  	<span id="exitoErrorAgregarEmpleadoForm" class="error"></span>
	  	</fieldset>
		</form>


		<h5>Buscar, modificar y activar/desactivar empleado:</h5>
		<form id="buscarEmpleadoForm" autocomplete="off">
		<fieldset>
		ID de Empleado: 		<input type="number" id="idEmpleadoBus" min="0" step="1" placeholder="0" >
	  	Nombre: 				<input type="text" id="nombreBus" placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
	  	Apellido Paterno: 		<input type="text" id="apPaternoBus" placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
	  	Apellido Materno: 		<input type="text" id="apMaternoBus" placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
	  	Fecha de Nacimiento: 	<input type="date" id="fechaDeNacimientoBus"  >
	  	Calle y número: 		<input type="text" id="calleNumeroDomicilioBus" placeholder="Xxxxx YYY" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Colonia: 				<input type="text" id="coloniaDomicilioBus" placeholder="Xxxxxxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Delegación o Municipio: <input type="text" id="delegacionMunicipioDomicilioBus" placeholder="Xxxxxxxxxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9-  ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Código Postal: 			<input type="text" id="codigoPostalDomicilioBus" placeholder="XXXXXX" maxlength="8" style="text-transform: uppercase;" pattern="[a-zA-Z0-9-]{0,8}" title="Solo letras y números (no signos), 5 - 8 caracteres." >
	  	Ciudad: 				<input type="text" id="ciudadDomicilioBus" placeholder="Xxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." >
	  	Teléfono Local: 		<input type="tel" id="telefonoLocalBus" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-|+|(|)| ]{0,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >
	  	Teléfono Movil: 		<input type="tel" id="telefonoMovilBus" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-|+|(|)| ]{0,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >
	  	Género: 				<select id="generoBus" >
									<option></option>
									<option value="Hombre">Hombre</option>
									<option value="Mujer">Mujer</option>
								</select>
	  	Estatura: 				<input type="number" id="estaturaMBus" min="0.50" max="2.50" step=".01" placeholder="1.65" > metros
	  	Estado Civil: 			<select id="estadoCivilBus" >
									<option></option>
									<option value="Casado">Casado</option>
									<option value="Soltero">Soltero</option>
									<option value="Divorciado">Divorciado</option>
									<option value="Otro">Otro</option>
								</select>
  		CURP: 					<input type="text" id="curpBus" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" style="text-transform: uppercase;" pattern="[A-Z0-9-]{0,18}" title="Solo letras y números (no signos), 18 caracteres." >
  		Email: 					<input type="test" id="emailBus" placeholder="xxxxx@yyyyy.zzz" maxlength="128" style="text-transform: lowercase;" >
  		Fecha de Alta: 			<input type="datetime-local" step=1 id="fechaAltaBus"  >
  		Estado: 				<select id="estadoBus" >
									<option></option>
									<option value="1">Activo</option>
									<option value="0">Inactivo</option>
								</select>
			<input type="reset" value="Borrar Todo" >
			<input type="submit" value="Buscar Empleado" style="visibility: hidden;">
		</fieldset>
		</form>
		<br>Resultado de la busqueda:<br>
		<span id="respuestaBuscarEmpleado"></span>


		<h5>Modificar Empleado:</h5>
		<form id="modificarEmpleadoForm" autocomplete="off" >
		<fieldset id="modificarEmpleadoFieldset" disabled>

		ID de Empleado: 		<input type="number" class="idEmpleado" min="0" step="1" placeholder="0" required  >
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
	  	Estatura: 				<input type="number" class="estaturaM" min="0.50" max="2.50" step=".01" placeholder="1.65" required> metros
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
  		Estado: 				<select class="estado" >
									<option></option>
									<option value="1">Activo</option>
									<option value="0">Inactivo</option>
								</select>
	  	<input type="submit" value="Modificar Empleado">
	  	<span id="exitoErrorModificarEmpleadoForm" class="error"></span>
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

			function buscarEmpleado() {
				$.ajax({
					url: "../Controllers/empleadoBuscar.php",
					type: 'POST',
					dataType: 'json',
					data: {
						idEmpleado: $('#idEmpleadoBus').val(),
						nombre: $('#nombreBus').val(),
						apPaterno: $('#apPaternoBus').val(),
						apMaterno: $('#apMaternoBus').val(),
						fechaDeNacimiento: $('#fechaDeNacimientoBus').val(),
						calleNumeroDomicilio: $('#calleNumeroDomicilioBus').val(),
						coloniaDomicilio: $('#coloniaDomicilioBus').val(),
						delegacionMunicipioDomicilio: $('#delegacionMunicipioDomicilioBus').val(),
						codigoPostalDomicilio: $('#codigoPostalDomicilioBus').val(),
						ciudadDomicilio: $('#ciudadDomicilioBus').val(),
						telefonoLocal: $('#telefonoLocalBus').val(),
						telefonoMovil: $('#telefonoMovilBus').val(),
						genero: $('#generoBus option:selected').val(),
						estaturaM: $('#estaturaMBus').val(),
						estadoCivil: $('#estadoCivilBus option:selected').val(),
						curp: $('#curpBus').val(),
						email: $('#emailBus').val(),
						fechaAlta: $('#fechaAltaBus').val(),
						estado: $('#estadoBus option:selected').val()
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
						'<th>Estatura M+</th>'+
						'<th>Estado civil</th>'+
						'<th>CURP</th>'+
						'<th>Email</th>'+
						'<th>Fecha de alta</th>'+
						'<th>Estado en el sistema</th>'+
						'</tr>';

						$.each(data, function(i, empleado) {
							if(empleado.estado == 1){
								empleado.estado = "Activo";
							}else {
								empleado.estado = "Inactivo";
							}
							tabla+= "<tr><td>"+
								"<button class=\"modificarEmpleadoFillForm\""+
									"idEmpleado = \""+empleado.idEmpleado+"\""+
									"nombre = \""+empleado.nombre+"\""+
									"apPaterno = \""+empleado.apPaterno+"\""+
									"apMaterno = \""+empleado.apMaterno+"\""+
									"fechaDeNacimiento = \""+empleado.fechaDeNacimiento+"\""+
									"calleNumeroDomicilio = \""+empleado.calleNumeroDomicilio+"\""+
									"coloniaDomicilio = \""+empleado.coloniaDomicilio+"\""+
									"delegacionMunicipioDomicilio = \""+empleado.delegacionMunicipioDomicilio+"\""+
									"codigoPostalDomicilio = \""+empleado.codigoPostalDomicilio+"\""+
									"ciudadDomicilio = \""+empleado.ciudadDomicilio+"\""+
									"telefonoLocal = \""+empleado.telefonoLocal+"\""+
									"telefonoMovil = \""+empleado.telefonoMovil+"\""+
									"genero = \""+empleado.genero+"\""+
									"estaturaM = \""+empleado.estaturaM+"\""+
									"estadoCivil = \""+empleado.estadoCivil+"\""+
									"curp = \""+empleado.curp+"\""+
									"email = \""+empleado.email+"\""+
									"fechaAlta = \""+empleado.fechaAlta+"\""+
									"estado = \""+empleado.estado+"\""+
								">Modificar</button>"+
								"</td><td>"+empleado.idEmpleado+
								"</td><td>"+empleado.nombre+
								"</td><td>"+empleado.apPaterno+
								"</td><td>"+empleado.apMaterno+
								"</td><td>"+empleado.fechaDeNacimiento+
								"</td><td>"+empleado.calleNumeroDomicilio+
								"</td><td>"+empleado.coloniaDomicilio+
								"</td><td>"+empleado.delegacionMunicipioDomicilio+
								"</td><td>"+empleado.codigoPostalDomicilio+
								"</td><td>"+empleado.ciudadDomicilio+
								"</td><td>"+empleado.telefonoLocal+
								"</td><td>"+empleado.telefonoMovil+
								"</td><td>"+empleado.genero+
								"</td><td>"+empleado.estaturaM+
								"</td><td>"+empleado.estadoCivil+
								"</td><td>"+empleado.curp+
								"</td><td>"+empleado.email+
								"</td><td>"+empleado.fechaAlta+
								"</td><td>"+empleado.estado+
								"</td>";
						});

						tabla += "</table>";
						$("#respuestaBuscarEmpleado").empty().append(tabla);

					} else {						//En caso de error, mensaje de error
						$("#respuestaBuscarEmpleado").empty().text("No se encontraron coincidencias con la búsqueda.");
					}
				});

			}

			$(document).ready(function () {

				buscarEmpleado();

				$("#agregarEmpleadoForm").submit(function (evt) {
					evt.preventDefault();
					$.ajax({
						url: "../Controllers/empleadoAgregar.php",
						type: 'POST',
						dataType: 'json',
						data: {
							nombre: $('input[name="nombre"]').val(),
							apPaterno: $('input[name="apPaterno"]').val(),
							apMaterno: $('input[name="apMaterno"]').val(),
							fechaDeNacimiento: $('input[name="fechaDeNacimiento"]').val(),
							calleNumeroDomicilio: $('input[name="calleNumeroDomicilio"]').val(),
							coloniaDomicilio: $('input[name="coloniaDomicilio"]').val(),
							delegacionMunicipioDomicilio: $('input[name="delegacionMunicipioDomicilio"]').val(),
							codigoPostalDomicilio: $('input[name="codigoPostalDomicilio"]').val(),
							ciudadDomicilio: $('input[name="ciudadDomicilio"]').val(),
							telefonoLocal: $('input[name="telefonoLocal"]').val(),
							telefonoMovil: $('input[name="telefonoMovil"]').val(),
							genero: $('select[name="genero"] option:selected').text(),
							estaturaM: $('input[name="estaturaM"]').val(),
							estadoCivil: $('select[name="estadoCivil"] option:selected').text(),
							curp: $('input[name="curp"]').val(),
							email: $('input[name="email"]').val(),
							estado: $('select[name="estado"] option:selected').text()
						}
					}).done(function (data) {
						//console.log(data);
						if (data.success) {
							document.getElementById("agregarEmpleadoForm").reset();
							buscarEmpleado();
							document.getElementById("exitoErrorAgregarEmpleadoForm").innerHTML = "Empleado agregado con éxito.";
						} else {						//En caso de error, mensaje de error
							document.getElementById("exitoErrorAgregarEmpleadoForm").innerHTML = "Error agregando empleado.";
						}
					});
					return false;
				});

				$("#buscarEmpleadoForm").on( 'submit change keyup', function (evt) {
					evt.preventDefault();
					buscarEmpleado();
					return false;
				});

				$("#buscarEmpleadoForm").on( 'reset ', function (evt) {
					buscarEmpleado();
				});

				$("#respuestaBuscarEmpleado").on( 'click', '.modificarEmpleadoFillForm', function (evt) {
					evt.preventDefault();

					var e = document.getElementById("exitoErrorModificarEmpleadoFillForm");
					if (!!e && e.scrollIntoView) {
						e.scrollIntoView();
					}

					$('#modificarEmpleadoForm .idEmpleado').val($(this).attr("idEmpleado"));
					$('#modificarEmpleadoForm .nombre').val($(this).attr("nombre"));
					$('#modificarEmpleadoForm .apPaterno').val($(this).attr("apPaterno"));
					$('#modificarEmpleadoForm .apMaterno').val($(this).attr("apMaterno"));
					$('#modificarEmpleadoForm .fechaDeNacimiento').val($(this).attr("fechaDeNacimiento"));
					$('#modificarEmpleadoForm .calleNumeroDomicilio').val($(this).attr("calleNumeroDomicilio"));
					$('#modificarEmpleadoForm .coloniaDomicilio').val($(this).attr("coloniaDomicilio"));
					$('#modificarEmpleadoForm .delegacionMunicipioDomicilio').val($(this).attr("delegacionMunicipioDomicilio"));
					$('#modificarEmpleadoForm .codigoPostalDomicilio').val($(this).attr("codigoPostalDomicilio"));
					$('#modificarEmpleadoForm .ciudadDomicilio').val($(this).attr("ciudadDomicilio"));
					$('#modificarEmpleadoForm .telefonoLocal').val($(this).attr("telefonoLocal"));
					$('#modificarEmpleadoForm .telefonoMovil').val($(this).attr("telefonoMovil"));
					$('#modificarEmpleadoForm .genero').val($(this).attr("genero"));
					$('#modificarEmpleadoForm .estaturaM').val($(this).attr("estaturaM"));
					$('#modificarEmpleadoForm .estadoCivil').val($(this).attr("estadoCivil"));
					$('#modificarEmpleadoForm .curp').val($(this).attr("curp"));
					$('#modificarEmpleadoForm .email').val($(this).attr("email"));
					$('#modificarEmpleadoForm .fechaAlta').val($(this).attr("fechaAlta").replace(" ","T"));
					$('#modificarEmpleadoForm .estado').val(($(this).attr("estado") == "Activo")?"1":"0");

					$('#modificarEmpleadoFieldset').prop('disabled', false);
					$('#exitoErrorModificarEmpleadoForm').text("");

					return false;
				});

				$("#modificarEmpleadoForm").submit( function (evt) {
					evt.preventDefault();
					$.ajax({
						url: "../Controllers/empleadoModificar.php",
						type: 'POST',
						dataType: 'json',
						data: {
							idEmpleado: 					$('#modificarEmpleadoForm .idEmpleado').val(),
							nombre: 						$('#modificarEmpleadoForm .nombre').val(),
							apPaterno: 						$('#modificarEmpleadoForm .apPaterno').val(),
							apMaterno: 						$('#modificarEmpleadoForm .apMaterno').val(),
							fechaDeNacimiento: 				$('#modificarEmpleadoForm .fechaDeNacimiento').val(),
							calleNumeroDomicilio: 			$('#modificarEmpleadoForm .calleNumeroDomicilio').val(),
							coloniaDomicilio: 				$('#modificarEmpleadoForm .coloniaDomicilio').val(),
							delegacionMunicipioDomicilio: 	$('#modificarEmpleadoForm .delegacionMunicipioDomicilio').val(),
							codigoPostalDomicilio: 			$('#modificarEmpleadoForm .codigoPostalDomicilio').val(),
							ciudadDomicilio: 				$('#modificarEmpleadoForm .ciudadDomicilio').val(),
							telefonoLocal: 					$('#modificarEmpleadoForm .telefonoLocal').val(),
							telefonoMovil: 					$('#modificarEmpleadoForm .telefonoMovil').val(),
							genero: 						$('#modificarEmpleadoForm .genero option:selected').text(),
							estaturaM: 						$('#modificarEmpleadoForm .estaturaM').val(),
							estadoCivil: 					$('#modificarEmpleadoForm .estadoCivil option:selected').text(),
							curp: 							$('#modificarEmpleadoForm .curp').val(),
							email: 							$('#modificarEmpleadoForm .email').val(),
							fechaAlta: 						$('#modificarEmpleadoForm .fechaAlta').val(),
							estado: 						$('#modificarEmpleadoForm .estado option:selected').text()
						}
					}).done(function (data) {
						if (data.success) {
							document.getElementById("modificarEmpleadoFieldset").disabled = true;
							document.getElementById("modificarEmpleadoForm").reset();
							buscarEmpleado();
							document.getElementById("exitoErrorModificarEmpleadoForm").innerHTML = "Empleado modificado con éxito.";
						} else {						//En caso de error, mensaje de error
							document.getElementById("exitoErrorModificarEmpleadoForm").innerHTML = "Error modificando empleado.";
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