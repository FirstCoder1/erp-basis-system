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
		<title><?php echo APPNAME ?> - Control de accesos </title>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"
				integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
				crossorigin="anonymous"></script>
	</head>

	<body>
		<h4>Control de accesos</h4>

		<h5>Navegación accesos:</h5>

		<form id="buscarEmpleadoForm" autocomplete="off">
		<fieldset>
		ID de Empleado: 		<input type="number" name="idEmpleadoBus" min="0" step="1" placeholder="0">
	  	Nombre: 				<input type="text" name="nombreBus" placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
	  	Apellido Paterno: 		<input type="text" name="apPaternoBus" placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
	  	Apellido Materno: 		<input type="text" name="apMaternoBus" placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
	  	Nomber de Usuario: 		<input type="text" name="userNameBus" placeholder="vvvvv" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." >

			<input type="reset" value="Borrar Todo" >
			<input type="submit" value="Agregar Empleado" id="boton" style="visibility: hidden;">
		</fieldset>
		</form>

		<br>Resultado de la busqueda:<br>

		<table>
			<tbody>
			<tr>
				<td>Opciones</td>

				<th>ID</th>

				<th>Nombre</th>
				<th>Ap. Paterno</th>
				<th>Ap. Materno</th>
				<th>Nonmbre de Usuario</th>

			</tr>
			<tr><td><button type="button" onclick="modificarEmpleadoFillForm(55);">Modificar</button></td>
				<td>55</td>
				<td>Alan</td>
				<td>De</td>
				<td>De</td>
				<td>qqqqq</td>

			</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(54);">Modificar</button></td>
				<td>54</td>
				<td>zzzzzxF</td>
				<td>yyyyyy</td>
				<td>xxxxxx</td>
				<td></td>

			</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(53);">Modificar</button></td>
				<td>53</td>
				<td>Bbbbuu</td>
				<td>Bbbbb</td>
				<td>Ccccc</td>
				<td></td>

			</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(3);">Modificar</button></td>
				<td>3</td>
				<td>Beatriz </td>
				<td>Urriolagoitia</td>
				<td>Sosa</td>
				<td>bebebe</td>

			</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(2);">Modificar</button></td>
				<td>2</td>
				<td>María Fernanda</td>
				<td>Picazo</td>
				<td>Chavez</td>
				<td>faffe</td>

			</tr><tr><td><button type="button" onclick="modificarEmpleadoFillForm(1);">Modificar</button></td>
				<td>1</td>
				<td>Oscar</td>
				<td>Camacho</td>
				<td>Urriolagoitia</td>
				<td>orcar</td>

			</tr></tbody></table>
		
		<span id="respuestaBuscarEmpleado"></span>

		<h5>Modificar Empleado:</h5>
	  	<span id="exitoErrorModificarEmpleadoFillForm" class="error"></span>

		<form id="buscarEmpleadoForm" autocomplete="off">
			<fieldset>
				ID de Empleado: 		<input type="number" name="idEmpleadoBus" min="0" step="1" placeholder="0">
				Nombre: 				<input type="text" name="nombreBus" placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
				Apellido Paterno: 		<input type="text" name="apPaternoBus" placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
				Apellido Materno: 		<input type="text" name="apMaternoBus" placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
				Nomber de Usuario: 		<input type="text" name="userNameBus" placeholder="vvvvv" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." >
				Contraseña: 		<input type="text" name="userNameBus" placeholder="vvvvv" maxlength="45" pattern="[a-zA-Z0-9-]{5,45}" title="Solo letras y números (no signos), 5 - 45 caracteres." >

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