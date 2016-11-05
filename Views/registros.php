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
	<title><?php echo APPNAME ?> - Registros </title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"
			integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			crossorigin="anonymous"></script>
</head>

<body>
<h4>Registros</h4>

<h5>Navegación accesos:</h5>

<form id="buscarEmpleadoForm" autocomplete="off">
	<fieldset>
		ID de Registro: 		<input type="number" name="idEmpleadoBus" min="0" step="1" placeholder="0">
		ID de Empleado: 		<input type="number" name="idEmpleadoBus" min="0" step="1" placeholder="0">
		Tipo: 				<input type="text" name="nombreBus" placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
		Descrición: 		<input type="textarea" name="apPaternoBus" placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
		Fecha: 		<input type="date" name="apMaternoBus" placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >

		<input type="reset" value="Borrar Todo" >
		<input type="submit" value="Agregar Empleado" id="boton" style="visibility: hidden;">
	</fieldset>
</form>

<br>Resultado de la busqueda:<br>

<table>
	<tbody>
	<tr>

		<th>ID</th>
		<th>ID Empleado</th>

		<th>Tipo</th>
		<th>Descrición</th>
		<th>Fecha</th>

	</tr>
	<tr><td>7</td>
		<td>55</td>
		<td>Modificación de empleado</td>
		<td>Usuario: Oscar Camacho, empleado modificado ID: 34</td>
		<td>2016-10-31 20:48:07</td>

	</tr><tr><td>5</td>
		<td>54</td>
		<td>Login</td>
		<td>Usuario: Oscar Camacho</td>
		<td>2016-10-31 20:47:21</td>

	</tr><tr><td>4</td>
		<td>53</td>
		<td>Cierre Sesión</td>
		<td>Usuario: Mafer Picazo</td>
		<td>2016-10-31 20:44:19</td>

	</tr><tr><td>2</td>
		<td>3</td>
		<td>Login</td>
		<td>Usuario: Mafer Picazo</td>
		<td>2016-10-31 20:44:14</td>

	</tr><tr><td>1</td>
		<td>2</td>
		<td>Cierre Sesión</td>
		<td>Usuario: Oscar Camacho</td>
		<td>2016-10-31 20:43:36</td>

	</tr><tr><td>0</td>
		<td>1</td>
		<td>Login</td>
		<td>Usuario: Oscar Camacho</td>
		<td>2016-10-31 20:42:54</td>

	</tr></tbody></table>

<span id="respuestaBuscarEmpleado"></span>






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