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
		<h4>Control de Empleados</h4>

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
	  	Código Postal: 			<input type="text" name="codigoPostalDomicilio" placeholder="XXXXXX" maxlength="8" pattern="[A-Z0-9]{6,8}" title="Solo letras mayúsculas y números (no signos), 6 - 8 caracteres." required>
	  	Ciudad: 				<input type="text" name="ciudadDomicilio" placeholder="Xxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{2,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." required>
	  	Teléfono Local: 		<input type="tel" name="telefonoLocal" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+()]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>
	  	Teléfono Movil: 		<input type="tel" name="telefonoMovil" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+()]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>
	  	Género: 				<select name="genero" required>
									<option></option>
									<option value"Hombre">Hombre</option>
									<option value"Mujer">Mujer</option>
								</select>
	  	Estatura: 				<input type="number" name="estaturaM" min="0.50" max="2.50" step=".01" placeholder="1.65" required> metros
	  	Estado Civil: 			<select name="estadoCivil" required>
									<option></option>
									<option value"Casado">Casado</option>
									<option value"Soltero">Soltero</option>
									<option value"Divorciado">Divorciado</option>
									<option value"Otro">Otro</option>
								</select>
		CURP: 					<input type="text" name="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" title="Solo letras y números (no signos), 18 caracteres." required>
  		Email: 					<input type="email" name="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" required>
  		Estado: 				<select name="estado" required>
									<option></option>
									<option value"1">Activo</option>
									<option value"0">Inactivo</option>
								</select>
			<input type="reset" value="Borrar Todo">
			<input type="submit" value="Agregar Empleado">
	  	<span id="exitoErrorAgregarEmpleadoForm" class="error"></span>
	  	</fieldset>
		</form>


		<h5>Buscar, modificar y desactivar empleado:</h5>

		<form id="buscarEmpleadoForm" autocomplete="off">
		<fieldset>
		ID de Empleado: 		<input type="number" name="idEmpleadoBus" min="0" step="1" placeholder="0">
	  	Nombre: 				<input type="text" name="nombreBus" placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
	  	Apellido Paterno: 		<input type="text" name="apPaternoBus" placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
	  	Apellido Materno: 		<input type="text" name="apMaternoBus" placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
	  	Fecha de Nacimiento: 	<input type="date" name="fechaDeNacimientoBus"  >
	  	Calle y número: 		<input type="text" name="calleNumeroDomicilioBus" placeholder="Xxxxx YYY" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Colonia: 				<input type="text" name="coloniaDomicilioBus" placeholder="Xxxxxxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Delegación o Municipio: <input type="text" name="delegacionMunicipioDomicilioBus" placeholder="Xxxxxxxxxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9-  ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >
	  	Código Postal: 			<input type="text" name="codigoPostalDomicilioBus" placeholder="XXXXXX" maxlength="8" style="text-transform: uppercase;" pattern="[a-zA-Z0-9-]{0,8}" title="Solo letras y números (no signos), 6 - 8 caracteres." >
	  	Ciudad: 				<input type="text" name="ciudadDomicilioBus" placeholder="Xxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." >
	  	Teléfono Local: 		<input type="tel" name="telefonoLocalBus" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-|+|(|)]{0,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >
	  	Teléfono Movil: 		<input type="tel" name="telefonoMovilBus" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-|+|(|)]{0,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >
	  	Género: 				<select name="generoBus" required>
									<option></option>
									<option value"Hombre">Hombre</option>
									<option value"Mujer">Mujer</option>
								</select>
	  	Estatura: 				<input type="number" name="estaturaMBus" min="0.50" max="2.50" step=".01" placeholder="1.65" > metros
	  	Estado Civil: 			<select name="estadoCivilBus" required>
									<option></option>
									<option value"Casado">Casado</option>
									<option value"Soltero">Soltero</option>
									<option value"Divorciado">Divorciado</option>
									<option value"Otro">Otro</option>
								</select>
  		CURP: 					<input type="text" name="curpBus" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" style="text-transform: uppercase;" pattern="[A-Z0-9-]{0,18}" title="Solo letras y números (no signos), 18 caracteres." >
  		Email: 					<input type="test" name="emailBus" placeholder="xxxxx@yyyyy.zzz" maxlength="128" style="text-transform: lowercase;" >
  		Fecha de Alta: 			<input type="datetime-local" step=1 name="fechaAltaBus"  >
  		Estado: 				<select name="estadoBus" required>
									<option></option>
									<option value"1">Activo</option>
									<option value"0">Inactivo</option>
								</select>
			<input type="reset" value="Borrar Todo" >
			<input type="submit" value="Agregar Empleado" id="boton" style="visibility: hidden;">
		</fieldset>
		</form>

		<br>Resultado de la busqueda:<br>
		
		<span id="respuestaBuscarEmpleado"></span>

		<h5>Modificar Empleado:</h5>
	  	<span id="exitoErrorModificarEmpleadoFillForm" class="error"></span>
		<form id="modificarEmpleadoForm" autocomplete="off" onsubmit="modificarEmpleado(); return false;" >
		<fieldset id="modificarEmpleadoFieldset" disabled>

		ID de Empleado: 		<input type="number" name="idEmpleado" min="0" step="1" placeholder="0" required  >
	  	Nombre: 				<input type="text" name="nombre" placeholder="Xxxxx" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " autofocus required>
	  	Apellido Paterno: 		<input type="text" name="apPaterno" placeholder="Yyyyy" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>
	  	Apellido Materno: 		<input type="text" name="apMaterno" placeholder="Zzzzz" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>
	  	Fecha de Nacimiento:	<input type="date" name="fechaDeNacimiento"  required>
	  	Calle y número: 		<input type="text" name="calleNumeroDomicilio" placeholder="Xxxxx YYY" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>
	  	Colonia: 				<input type="text" name="coloniaDomicilio" placeholder="Xxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>
	  	Delegación o Municipio: <input type="text" name="delegacionMunicipioDomicilio" placeholder="Xxxxxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9-  ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>
	  	Código Postal: 			<input type="text" name="codigoPostalDomicilio" placeholder="XXXXXX" maxlength="8" pattern="[A-Z0-9]{6,8}" title="Solo letras mayúsculas y números (no signos), 6 - 8 caracteres." required>
	  	Ciudad: 				<input type="text" name="ciudadDomicilio" placeholder="Xxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{2,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." required>
	  	Teléfono Local: 		<input type="tel" name="telefonoLocal" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+()]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>
	  	Teléfono Movil: 		<input type="tel" name="telefonoMovil" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+()]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>
	  	Género: 				<input type="radio" name="genero" value="Hombre" required> Hombre
  								<input type="radio" name="genero" value="Mujer"> Mujer
	  	Estatura: 				<input type="number" name="estaturaM" min="0.50" max="2.50" step=".01" placeholder="1.65" required> metros
	  	Estado Civil: 			<input type="radio" name="estadoCivil" value="Casado" required> Casado
  								<input type="radio" name="estadoCivil" value="Soltero"> Soltero
  								<input type="radio" name="estadoCivil" value="Divorciado"> Divorciado
  								<input type="radio" name="estadoCivil" value="Otro"> Otro
  		CURP: 					<input type="text" name="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" title="Solo letras y números (no signos), 18 caracteres." required>
  		Email: 					<input type="email" name="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" required>
  		Fecha de Alta: 			<input type="datetime-local" step=1 name="fechaAlta" required  >
  		Estado: 				<input type="radio" name="estado" value="1" required > Activo
  								<input type="radio" name="estado" value="0" > Inactivo
	  	<input type="submit" value="Modificar Empleado">
	  	<span id="exitoErrorModificarEmpleadoForm" class="error"></span>
	  	</fieldset>
		</form>

		<span id="testing"></span>

		<script>
			window.onload = buscarEmpleado;

			function buscarEmpleado() {
				$.ajax({
					url: "../Controllers/empleadoBuscar.php",
					type: 'POST',
					dataType: 'json',
					data: {
						idEmpleado: $('input[name="idEmpleadoBus"]').val(),
						nombre: $('input[name="nombreBus"]').val(),
						apPaterno: $('input[name="apPaternoBus"]').val(),
						apMaterno: $('input[name="apMaternoBus"]').val(),
						fechaDeNacimiento: $('input[name="fechaDeNacimientoBus"]').val(),
						calleNumeroDomicilio: $('input[name="calleNumeroDomicilioBus"]').val(),
						coloniaDomicilio: $('input[name="coloniaDomicilioBus"]').val(),
						delegacionMunicipioDomicilio: $('input[name="delegacionMunicipioDomicilioBus"]').val(),
						codigoPostalDomicilio: $('input[name="codigoPostalDomicilioBus"]').val(),
						ciudadDomicilio: $('input[name="ciudadDomicilioBus"]').val(),
						telefonoLocal: $('input[name="telefonoLocalBus"]').val(),
						telefonoMovil: $('input[name="telefonoMovilBus"]').val(),
						genero: $('select[name="generoBus"] option:selected').text(),
						estaturaM: $('input[name="estaturaMBus"]').val(),
						estadoCivil: $('select[name="estadoCivilBus"] option:selected').text(),
						curp: $('input[name="curpBus"]').val(),
						email: $('input[name="emailBus"]').val(),
						fechaAlta: $('input[name="fechaAltaBus"]').val(),
						estado: $('select[name="estadoBus"] option:selected').text()
					}
				}).done(function (data) {

					if (data.success) {
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

						var arr = $.map(data, function(el) { return el });
						for (var i = 0; i < arr.length-1; i++){
							tabla+= "<tr><td>"+
								"<button type=\"button\" onclick=\"modificarEmpleadoFillForm("+arr[i].idEmpleado+");\">Modificar</button>"+
								"</td><td>"+arr[i].idEmpleado+
								"</td><td>"+arr[i].nombre+
								"</td><td>"+arr[i].apPaterno+
								"</td><td>"+arr[i].apMaterno+
								"</td><td>"+arr[i].fechaDeNacimiento+
								"</td><td>"+arr[i].calleNumeroDomicilio+
								"</td><td>"+arr[i].coloniaDomicilio+
								"</td><td>"+arr[i].delegacionMunicipioDomicilio+
								"</td><td>"+arr[i].codigoPostalDomicilio+
								"</td><td>"+arr[i].ciudadDomicilio+
								"</td><td>"+arr[i].telefonoLocal+
								"</td><td>"+arr[i].telefonoMovil+
								"</td><td>"+arr[i].genero+
								"</td><td>"+arr[i].estaturaM+
								"</td><td>"+arr[i].estadoCivil+
								"</td><td>"+arr[i].curp+
								"</td><td>"+arr[i].email+
								"</td><td>"+arr[i].fechaAlta+
								"</td><td>"+arr[i].estado+
								"</td>";

						}
						tabla += "</table>";

						document.getElementById("respuestaBuscarEmpleado").innerHTML = tabla;
					} else {						//En caso de error, mensaje de error
						document.getElementById("respuestaBuscarEmpleado").innerHTML = "No se encontraron coincidencias con la búsqueda.";
					}
				});

			}
			
			$(document).ready(function () {
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
							document.getElementById("exitoErrorAgregarEmpleadoForm").innerHTML = "Empleado agregado con éxito.";
						} else {						//En caso de error, mensaje de error
							document.getElementById("exitoErrorAgregarEmpleadoForm").innerHTML = "Error agregando empleado.";
						}
					});
					return false;
				});

				$("#buscarEmpleadoForm").on( 'submit change keyup ', function (evt) {
					evt.preventDefault();
					buscarEmpleado();
					return false;
				});

				$("#buscarEmpleadoForm").on( 'reset ', function (evt) {
					buscarEmpleado();
				});
			});

		</script>


		<script>

			function modificarEmpleadoFillForm(idEmpleado) { //Llena el form a partir de la tabla

				var params = "idEmpleado="+idEmpleado; //Solo se envía el idEmpleado seleccionado
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					//Este If maneja que hacer con la respuesta
					if (this.readyState == 4 && this.status == 200) {
						//Genera un objeto Empleado a partir de la respuesta
						var datos = this.response;
						var arregloDatos = eval("("+datos+")");

						if(arregloDatos["resultado"] == 0){ 	//Si la respuesta es un error

							document.getElementById("exitoErrorModificarEmpleadoFillForm").innerHTML = "Error en la consulta llenando el formulario.";


						}else{						//Si no hay error llenamos formulario
							//Nos vamos el forma en la vista
							var e = document.getElementById("exitoErrorModificarEmpleadoFillForm");
							if (!!e && e.scrollIntoView) {
								e.scrollIntoView();
							}
							//Llenado de formulario
							document.getElementById("modificarEmpleadoForm").elements.namedItem("idEmpleado").value = arregloDatos["idEmpleado"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("nombre").value = arregloDatos["nombre"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("apPaterno").value = arregloDatos["apPaterno"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("apMaterno").value = arregloDatos["apMaterno"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("fechaDeNacimiento").value = arregloDatos["fechaDeNacimiento"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("calleNumeroDomicilio").value = arregloDatos["calleNumeroDomicilio"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("coloniaDomicilio").value = arregloDatos["coloniaDomicilio"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("delegacionMunicipioDomicilio").value = arregloDatos["delegacionMunicipioDomicilio"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("codigoPostalDomicilio").value = arregloDatos["codigoPostalDomicilio"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("ciudadDomicilio").value = arregloDatos["ciudadDomicilio"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("telefonoLocal").value = arregloDatos["telefonoLocal"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("telefonoMovil").value = arregloDatos["telefonoMovil"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("genero").value = arregloDatos["genero"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("estaturaM").value = arregloDatos["estaturaM"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("estadoCivil").value = arregloDatos["estadoCivil"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("curp").value = arregloDatos["curp"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("email").value = arregloDatos["email"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("fechaAlta").value = arregloDatos["fechaAlta"];
							document.getElementById("modificarEmpleadoForm").elements.namedItem("estado").value = arregloDatos["estado"];

							//Habilitamos form
							document.getElementById("modificarEmpleadoFieldset").disabled = false;
							//Deshabilitamos idEmpleado
							document.getElementById("modificarEmpleadoForm").elements.namedItem("idEmpleado").disabled = true;
							document.getElementById("exitoErrorModificarEmpleadoForm").innerHTML = "";

						}
					}
				};
				xmlhttp.open("POST","../Controllers/modificarEmpleadoFillForm.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send(params);
			}

			function modificarEmpleado() {

				var formElements=document.getElementById("modificarEmpleadoForm");
				var params="";
				for (var i=0; i<formElements.length; i++){
					if (formElements[i].type!="submit"){	//we dont want to include the submit-buttom
						if (formElements[i].type=="radio"){
							if(formElements[i].checked==true){
								params+=formElements[i].name+"="+formElements[i].value+"&";
							}
						}else{
							params+=formElements[i].name+"="+formElements[i].value+"&";
						}
					}

				}

				xmlhttp = new XMLHttpRequest();

				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						if(this.responseText == 1){

							document.getElementById("modificarEmpleadoFieldset").disabled = true;
							document.getElementById("modificarEmpleadoForm").reset();

							document.getElementById("exitoErrorModificarEmpleadoForm").innerHTML = "Empleado modificado con exito.";

							buscarEmpleado();

						}else{
							document.getElementById("exitoErrorModificarEmpleadoForm").innerHTML = "Error modificando empleado.";
						}
					}
				};
				//Datos de envío de consulta
				xmlhttp.open("POST","../Controllers/modificarEmpleado.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send(params);
			}



			function testingFunction() {			//Función de pruebas
				document.getElementById("testing").click();
			}
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