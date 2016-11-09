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
	<meta name="description" content="descripcionRegistros">
	<meta name="keywords" content="keywordsControlRegistros">
	<meta name="author" content="Oscar Camacho Urriolagoitia">
	<title><?php echo APPNAME ?> - Registros </title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"
			integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			crossorigin="anonymous"></script>
</head>

<body>
<h4>Registros</h4>

<h5>Navegación accesos:</h5>
<form id="navegarForm" autocomplete="off">
	<fieldset>
		ID de Registro:     <input type="number"    class="idRegistro" min="0" step="1" placeholder="0">
		ID de Empleado:     <input type="number"    class="idEmpleado" min="0" step="1" placeholder="0">
        Nombre: 		    <input type="text" 		class="nombre"      placeholder="Xxxxx" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." autofocus >
        Apellido Paterno:   <input type="text" 		class="apPaterno"   placeholder="Yyyyy" maxlength="35" style="text-transform: capitalize;" pattern="[a-zA-Z ñáéíóú]{0,35}" title="Solo letras y espacios, 2 - 35 caracteres." >
        Tipo: 			    <input type="text"      class="tipo"        placeholder="Tipo de registro" maxlength="45" style="text-transform: capitalize;" >
        Fecha: 		        <input type="date"      class="fecha" >
        Descrición: 	    <textarea rows="4" cols="40" class="descripcion" form="navegarForm" placeholder="Descripción del registro..." style="text-transform: capitalize;"></textarea>
		<input type="reset" value="Borrar Todo" >
		<input type="submit" value="Buscar Aceso" style="visibility: hidden;">
	</fieldset>
</form>
<br>Resultado de la busqueda:<br>
<span id="respuestaNavegar"></span>

<script>

    var timeOut = (<?php echo SESSIONTIMEOUT ?>*60+1)*1000;
    var timer = setInterval(redirect, timeOut);

    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;

    function redirect() {
        window.top.location.href = "../index.php";
    }  //Sesión

    function resetTimer() {    //Sesión
        clearInterval(timer);
        timer = setInterval(redirect, timeOut);
    }

    function buscar() {
        $.ajax({
            url: "../Controllers/registroBuscar.php",
            type: 'POST',
            dataType: 'json',
            data: {
                idRegistro:	    $('#navegarForm .idRegistro').val(),
                idEmpleado:	    $('#navegarForm .idEmpleado').val(),
                nombre: 	    $('#navegarForm .nombre').val(),
                apPaterno: 	    $('#navegarForm .apPaterno').val(),
                tipo:   	    $('#navegarForm .tipo').val(),
                fecha:  	    $('#navegarForm .fecha').val(),
                descripcion:    $('#navegarForm .descripcion').val()
            }
        }).done(function (data) {
            console.log(data);
            /*if (data.success != false) {
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
            }*/

        });

    }

    $(document).ready(function () {

        buscar();

        $("#navegarForm").on( 'submit change keyup', function (evt) {
            evt.preventDefault();
            buscar();
            return false;
        });

        $("#navegarForm").on( 'reset ', function (evt) {
            buscar();
        });

        $("#respuestaNavegarAcceso").on( 'click', '.modificarAccesoFillForm', function (evt) {  //TODO ----- aqui me quede!!!!!
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
                    buscar();
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


- Registro de acciones


-->