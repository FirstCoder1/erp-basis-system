<?php 

	require_once "../Config/Constantes.php";	//Inclusión de las constantes y funciones globales
	require_once "../Config/SesionModulo.php";	//Revisión de sesión
	require_once "../Autoload.php"; 		//Inclusión de archivo para Autoload de las clases 
	\APP\Autoload::run();						//Arranca Autoload

 ?>

 <!DOCTYPE html>
<html> 
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="descripcionControlEmpleados">
		<meta name="keywords" content="keywordsControlEmpleados">
		<meta name="author" content="Oscar Camacho Urriolagoitia">
		<title>NombreDelSistema - Control de Empleados </title>

		<script>

		window.onload = buscarEmpleado;

		function agregarEmpleado() {
												//Mete los valores del form al post		
			var formElements=document.getElementById("agregarEmpleadoForm");    
			var params="";
												//Iteramos por cada elemento del form
			for (var i=0; i<formElements.length; i++){
												//We dont want to include the submit-buttom
			    if (formElements[i].type!="submit"){	
			    								//Type radio se manejan diferente o solo se manda el último, no el seleccionado 
			    	if (formElements[i].type=="radio"){
			    		if(formElements[i].checked==true){
			    			params+=formElements[i].name+"="+formElements[i].value+"&";
			    		}
			    	}else{
			    		params+=formElements[i].name+"="+formElements[i].value+"&";
			    	}
			    }	
			        
			}

			xmlhttp = new XMLHttpRequest();		//AJAX

			xmlhttp.onreadystatechange = function() {
												//Este If maneja que hacer con la respuesta
	            if (this.readyState == 4 && this.status == 200) {
	            								//Si la inserción es exitosa
	                if(this.responseText == 1){	
	                							//Limpia el form
	                	document.getElementById("agregarEmpleadoForm").reset();
	                							//Mensaje de éxito
			        	document.getElementById("exitoErrorAgregarEmpleadoForm").innerHTML = "Empleado agregado con éxito.";
			        	buscarEmpleado();		//Recarga la tabla de búsqueda

			        }else{						//En caso de error, mensaje de error
			        	document.getElementById("exitoErrorAgregarEmpleadoForm").innerHTML = "Error agregando empleado.";
			        }
	            }
	        };
	        									//Datos de envío de consulta
	        xmlhttp.open("POST","../Controllers/agregarEmpleado.php",true);
	        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	        xmlhttp.send(params); 
	    }

	    function buscarEmpleado() {

	    	document.getElementById("boton").click(); //Valida el formulario, muestra ayuda
			
												//Mete los valores del form al post		
			var formElements=document.getElementById("buscarEmpleadoForm");    
			var params="";
												//Iteramos por cada elemento del form
			for (var i=0; i<formElements.length; i++){
												//We dont want to include the submit-buttom
			    if (formElements[i].type!="submit"){	
			    								//Type radio se manejan diferente o solo se manda el último, no el seleccionado 
			    	if (formElements[i].type=="radio"){
			    		if(formElements[i].checked==true){
			    			params+=formElements[i].name+"="+formElements[i].value+"&";
			    		}
			    	}else{
			    		params+=formElements[i].name+"="+formElements[i].value+"&";
			    	}
			    }	
			        
			}


			xmlhttp = new XMLHttpRequest(); 	//AJAX

			xmlhttp.onreadystatechange = function() {
												//Este If maneja que hacer con la respuesta
	            if (this.readyState == 4 && this.status == 200) {
	            								//Imprime tabla de resultado
	                document.getElementById("respuestaBuscarEmpleado").innerHTML = this.responseText;

	            }
	        };
	        									//Datos de envío de consulta
	        xmlhttp.open("POST","../Controllers/buscarEmpleado.php",true);
	        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	        xmlhttp.send(params); 
		}

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
						document.getElementById("modificarEmpleadoForm").elements.namedItem("activo").value = arregloDatos["activo"];

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

	</head>

	<body>
		<h4>Control de Empleados</h4>


		<h5>Agregar Empleado:</h5>
		<form id="agregarEmpleadoForm" autocomplete="off" onsubmit="agregarEmpleado(); return false;" >
		<fieldset>

	  	Nombre: <input type="text" name="nombre" placeholder="Xxxxx" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " autofocus required>

	  	Apellido Paterno: <input type="text" name="apPaterno" placeholder="Yyyyy" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>

	  	Apellido Materno: <input type="text" name="apMaterno" placeholder="Zzzzz" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>

	  	Fecha de Nacimiento: <input type="date" name="fechaDeNacimiento"  required>

	  	Calle y número: <input type="text" name="calleNumeroDomicilio" placeholder="Xxxxx YYY" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>

	  	Colonia: <input type="text" name="coloniaDomicilio" placeholder="Xxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>

	  	Delegación o Municipio: <input type="text" name="delegacionMunicipioDomicilio" placeholder="Xxxxxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9-  ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>

	  	Código Postal: <input type="text" name="codigoPostalDomicilio" placeholder="XXXXXX" maxlength="8" pattern="[A-Z0-9]{6,8}" title="Solo letras mayúsculas y números (no signos), 6 - 8 caracteres." required>

	  	Ciudad: <input type="text" name="ciudadDomicilio" placeholder="Xxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{2,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." required>

	  	Teléfono Local: <input type="tel" name="telefonoLocal" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+()]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>

	  	Teléfono Movil: <input type="tel" name="telefonoMovil" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+()]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>

	  	Género: <input type="radio" name="genero" value="Hombre" required> Hombre
  				<input type="radio" name="genero" value="Mujer"> Mujer

	  	Estatura: <input type="number" name="estaturaM" min="0.50" max="2.50" step=".01" placeholder="1.65" required> metros

	  	Estado Civil: 	<input type="radio" name="estadoCivil" value="Casado" required> Casado
  						<input type="radio" name="estadoCivil" value="Soltero"> Soltero
  						<input type="radio" name="estadoCivil" value="Divorciado"> Divorciado
  						<input type="radio" name="estadoCivil" value="Otro"> Otro

  		CURP: <input type="text" name="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" title="Solo letras y números (no signos), 18 caracteres." required>

  		Email: <input type="email" name="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" required>

  		Estado: <input type="radio" name="activo" value="1" required> Activo
  				<input type="radio" name="activo" value="0"> Inactivo

	  	<input type="reset" value="Borrar Todo">
	  	<input type="submit" value="Agregar Empleado">
	  	<span id="exitoErrorAgregarEmpleadoForm" class="error"></span>
	  	</fieldset>
		</form>



















		

		<h5>Buscar, modificar y desactivar empleado:</h5>

		<form id="buscarEmpleadoForm" autocomplete="off" onchange="buscarEmpleado();" onkeyup="buscarEmpleado();" onreset="buscarEmpleado()" onsubmit="return false;">
		<fieldset>

		ID de Empleado: <input type="number" name="idEmpleado" min="0" step="1" placeholder="0"> metros

	  	Nombre: <input type="text" name="nombre" placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >

	  	Apellido Paterno: <input type="text" name="apPaterno" placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >

	  	Apellido Materno: <input type="text" name="apMaterno" placeholder="Zzzzz" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >

	  	Fecha de Nacimiento: <input type="date" name="fechaDeNacimiento"  >

	  	Calle y número: <input type="text" name="calleNumeroDomicilio" placeholder="Xxxxx YYY" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >

	  	Colonia: <input type="text" name="coloniaDomicilio" placeholder="Xxxxxxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >

	  	Delegación o Municipio: <input type="text" name="delegacionMunicipioDomicilio" placeholder="Xxxxxxxxxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9-  ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." >

	  	Código Postal: <input type="text" name="codigoPostalDomicilio" placeholder="XXXXXX" maxlength="8" style="text-transform: uppercase;" pattern="[a-zA-Z0-9-]{0,8}" title="Solo letras y números (no signos), 6 - 8 caracteres." >

	  	Ciudad: <input type="text" name="ciudadDomicilio" placeholder="Xxxxx" maxlength="70" style="text-transform: capitalize;" pattern="[a-zA-Z0-9- ñáéíóú]{0,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." >

	  	Teléfono Local: <input type="tel" name="telefonoLocal" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-|+|(|)]{0,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >

	  	Teléfono Movil: <input type="tel" name="telefonoMovil" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-|+|(|)]{0,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." >

	  	Género: <input type="radio" name="genero" value="Hombre" > Hombre
  				<input type="radio" name="genero" value="Mujer"> Mujer

	  	Estatura: <input type="number" name="estaturaM" min="0.50" max="2.50" step=".01" placeholder="1.65" > metros

	  	Estado Civil: 	<input type="radio" name="estadoCivil" value="Casado" > Casado
  						<input type="radio" name="estadoCivil" value="Soltero"> Soltero
  						<input type="radio" name="estadoCivil" value="Divorciado"> Divorciado
  						<input type="radio" name="estadoCivil" value="Otro"> Otro

  		CURP: <input type="text" name="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" style="text-transform: uppercase;" pattern="[A-Z0-9-]{0,18}" title="Solo letras y números (no signos), 18 caracteres." >

  		Email: <input type="test" name="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" style="text-transform: lowercase;" >

  		Fecha de Alta: <input type="datetime-local" step=1 name="fechaAlta"  >

  		Estado: <input type="radio" name="activo" value="1" > Activo
  				<input type="radio" name="activo" value="0"> Inactivo

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

		ID de Empleado: <input type="number" name="idEmpleado" min="0" step="1" placeholder="0" required  > metros

	  	Nombre: <input type="text" name="nombre" placeholder="Xxxxx" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " autofocus required>

	  	Apellido Paterno: <input type="text" name="apPaterno" placeholder="Yyyyy" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>

	  	Apellido Materno: <input type="text" name="apMaterno" placeholder="Zzzzz" maxlength="35" pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*" title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " required>

	  	Fecha de Nacimiento: <input type="date" name="fechaDeNacimiento"  required>

	  	Calle y número: <input type="text" name="calleNumeroDomicilio" placeholder="Xxxxx YYY" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>

	  	Colonia: <input type="text" name="coloniaDomicilio" placeholder="Xxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>

	  	Delegación o Municipio: <input type="text" name="delegacionMunicipioDomicilio" placeholder="Xxxxxxxxxxxx" maxlength="70" pattern="[a-zA-Z0-9-  ñáéíóú]{5,70}" title="Solo letras,espacios y números (no signos), 5 - 70 caracteres." required>

	  	Código Postal: <input type="text" name="codigoPostalDomicilio" placeholder="XXXXXX" maxlength="8" pattern="[A-Z0-9]{6,8}" title="Solo letras mayúsculas y números (no signos), 6 - 8 caracteres." required>

	  	Ciudad: <input type="text" name="ciudadDomicilio" placeholder="Xxxxx" maxlength="70" pattern="[a-zA-Z0-9- ñáéíóú]{2,70}" title="Solo letras,espacios y números (no signos), 2 - 70 caracteres." required>

	  	Teléfono Local: <input type="tel" name="telefonoLocal" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+()]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>

	  	Teléfono Movil: <input type="tel" name="telefonoMovil" placeholder="(XXX)XX-XXXX-XXXX" maxlength="32" pattern="[0-9-+()]{8,32}" title="Solo números y +,-,(,) , 8 - 32 caracteres." required>

	  	Género: <input type="radio" name="genero" value="Hombre" required> Hombre
  				<input type="radio" name="genero" value="Mujer"> Mujer

	  	Estatura: <input type="number" name="estaturaM" min="0.50" max="2.50" step=".01" placeholder="1.65" required> metros

	  	Estado Civil: 	<input type="radio" name="estadoCivil" value="Casado" required> Casado
  						<input type="radio" name="estadoCivil" value="Soltero"> Soltero
  						<input type="radio" name="estadoCivil" value="Divorciado"> Divorciado
  						<input type="radio" name="estadoCivil" value="Otro"> Otro

  		CURP: <input type="text" name="curp" placeholder="XXXXXXXXXXXXXXXXXX" maxlength="18" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" title="Solo letras y números (no signos), 18 caracteres." required>

  		Email: <input type="email" name="email" placeholder="xxxxx@yyyyy.zzz" maxlength="128" required>

  		Fecha de Alta: <input type="datetime-local" step=1 name="fechaAlta" required  >

  		Estado: <input type="radio" name="activo" value="1" required > Activo
  				<input type="radio" name="activo" value="0" > Inactivo

	  	<input type="submit" value="Modificar Empleado">
	  	<span id="exitoErrorModificarEmpleadoForm" class="error"></span>
	  	</fieldset>
		</form>




		<span id="testing"></span>




	</body>

</html>

<!--
COMENTARIOS GENERALES:

-Falta revisar que el empleado tenga acceso al modulo
-Clase error
-Registro de acciones

-Manejar un mensaje de error en la búsqueda nos solo decir que es vacío

- Mas validaciones de campos con patterns
- Formatear el texto al escribir para acomodarlo al pattern
-->