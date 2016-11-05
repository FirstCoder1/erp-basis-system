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
	<title><?php echo APPNAME ?> - Control de clientes </title>
</head>

<body>
<h4>Control de clientes</h4>

<h5>Agregar cliente:</h5>
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
		Estado Civil: 			<select name="estadoCivil" required>
			<option></option>
			<option value"Casado">Casado</option>
			<option value"Soltero">Soltero</option>
			<option value"Divorciado">Divorciado</option>
			<option value"Otro">Otro</option>
		</select>
		CURP: 					<input type="text" name="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" title="Solo letras y números (no signos), 18 caracteres." required>
		Email: 					<input type="email" name="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" required>

		<input type="reset" value="Borrar Todo">
		<input type="submit" value="Agregar Empleado">
		<span id="exitoErrorAgregarEmpleadoForm" class="error"></span>
	</fieldset>
</form>


<h5>Buscar y modificar cliente:</h5>

<form id="buscarEmpleadoForm" autocomplete="off">
	<fieldset>
		ID de Cliente: 		<input type="number" name="idEmpleadoBus" min="0" step="1" placeholder="0">
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
		stado Civil: 			<select name="estadoCivilBus" required>
			<option></option>
			<option value"Casado">Casado</option>
			<option value"Soltero">Soltero</option>
			<option value"Divorciado">Divorciado</option>
			<option value"Otro">Otro</option>
		</select>
		CURP: 					<input type="text" name="curpBus" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" style="text-transform: uppercase;" pattern="[A-Z0-9-]{0,18}" title="Solo letras y números (no signos), 18 caracteres." >
		Email: 					<input type="test" name="emailBus" placeholder="xxxxx@yyyyy.zzz" maxlength="128" style="text-transform: lowercase;" >
		Fecha de Alta: 			<input type="datetime-local" step=1 name="fechaAltaBus"  >

		<input type="reset" value="Borrar Todo" >
		<input type="submit" value="Agregar Empleado" id="boton" style="visibility: hidden;">
	</fieldset>
</form>

<br>Resultado de la busqueda:<br>

<span id="respuestaBuscarEmpleado"></span>

<h5>Modificar Cliente:</h5>
<span id="exitoErrorModificarEmpleadoFillForm" class="error"></span>
<form id="modificarEmpleadoForm" autocomplete="off" onsubmit="modificarEmpleado(); return false;" >
	<fieldset id="modificarEmpleadoFieldset" disabled>

		ID de Cliente: 		<input type="number" name="idEmpleado" min="0" step="1" placeholder="0" required  >
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
		Estado Civil: 			<input type="radio" name="estadoCivil" value="Casado" required> Casado
		<input type="radio" name="estadoCivil" value="Soltero"> Soltero
		<input type="radio" name="estadoCivil" value="Divorciado"> Divorciado
		<input type="radio" name="estadoCivil" value="Otro"> Otro
		CURP: 					<input type="text" name="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" title="Solo letras y números (no signos), 18 caracteres." required>
		Email: 					<input type="email" name="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" required>
		Fecha de Alta: 			<input type="datetime-local" step=1 name="fechaAlta" required  >
		<input type="radio" name="estado" value="0" > Inactivo
		<input type="submit" value="Modificar Empleado">
		<span id="exitoErrorModificarEmpleadoForm" class="error"></span>
	</fieldset>
</form>

<span id="testing"></span>




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