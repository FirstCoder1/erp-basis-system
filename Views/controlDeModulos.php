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
	<title><?php echo APPNAME ?> - Control de módulos </title>
</head>

<body>
<h4>Control de modulos</h4>


<h5>Buscar empleado:</h5>

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

<table>
	<tbody>
	<tr>
		<td>Opciones</td>

		<th>ID</th>

		<th>Nombre</th>
		<th>Ap. Paterno</th>
		<th>Ap. Materno</th>

	</tr>
	<tr><td><button type="button" onclick="modificarEmpleadoFillForm(55);">Modificar</button></td>
		<td>55</td>
		<td>Alan</td>
		<td>De</td>
		<td>De</td>

	</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(54);">Modificar</button></td>
		<td>54</td>
		<td>zzzzzxF</td>
		<td>yyyyyy</td>
		<td>xxxxxx</td>

	</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(53);">Modificar</button></td>
		<td>53</td>
		<td>Bbbbuu</td>
		<td>Bbbbb</td>
		<td>Ccccc</td>

	</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(3);">Modificar</button></td>
		<td>3</td>
		<td>Beatriz </td>
		<td>Urriolagoitia</td>
		<td>Sosa</td>

	</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(2);">Modificar</button></td>
		<td>2</td>
		<td>María Fernanda</td>
		<td>Picazo</td>
		<td>Chavez</td>

	</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(1);">Modificar</button></td>
		<td>1</td>
		<td>Oscar</td>
		<td>Camacho</td>
		<td>Urriolagoitia</td>

	</tr></tbody></table>

<h5>Modificar Empleado:</h5>
<span id="exitoErrorModificarEmpleadoFillForm" class="error"></span>

<form id="buscarEmpleadoForm" autocomplete="off">
	<fieldset>
		ID de Empleado: 		<input type="number" name="idEmpleadoBus" min="0" step="1" placeholder="0">
		Nombre: 				<input type="text" name="nombreBus" placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
		Apellido Paterno: 		<input type="text" name="apPaternoBus" placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
		Apellido Materno: 		<input type="text" name="apMaternoBus" placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >

		<input type="checkbox" name="estadoCivil" value="Casado" required> Control de Empleados
		<input type="checkbox" name="estadoCivil" value="Casado" required> Control de Accesos
		<input type="checkbox" name="estadoCivil" value="Casado" required> Registros
		<input type="checkbox" name="estadoCivil" value="Casado" required> Control de Modulos
		<input type="checkbox" name="estadoCivil" value="Casado" required> Control de Clientes

		<input type="reset" value="Borrar Todo" >
		<input type="submit" value="Aceptar" id="boton">
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