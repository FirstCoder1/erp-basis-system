<?php namespace APP\Controllers;
	require_once "../Config/Constantes.php";   	//Inclusión de las constantes y funciones globales
	require_once "../Autoload.php"; 		//Inclusión de archivo para Autoload de las clases 
	\APP\Autoload::run();						//Arranca Autoload

	$empleado = new \APP\Models\Empleado();			//Creando objeto empleado
												//Llenando objeto a partir de POST
	$empleado->set("idEmpleado",$_POST["idEmpleado"]."%");
	$empleado->set("nombre","%".$_POST["nombre"]."%");
	$empleado->set("apPaterno",$_POST["apPaterno"]."%");
	$empleado->set("apMaterno","%".$_POST["apMaterno"]."%");
	$empleado->set("fechaDeNacimiento",$_POST["fechaDeNacimiento"]."%");
	$empleado->set("calleNumeroDomicilio","%".$_POST["calleNumeroDomicilio"]."%");
	$empleado->set("coloniaDomicilio","%".$_POST["coloniaDomicilio"]."%");
	$empleado->set("delegacionMunicipioDomicilio","%".$_POST["delegacionMunicipioDomicilio"]."%");
	$empleado->set("codigoPostalDomicilio","%".$_POST["codigoPostalDomicilio"]."%");
	$empleado->set("ciudadDomicilio","%".$_POST["ciudadDomicilio"]."%");
	$empleado->set("telefonoLocal","%".$_POST["telefonoLocal"]."%");
	$empleado->set("telefonoMovil","%".$_POST["telefonoMovil"]."%");
												//Type radio se trata diferente, puede no estar incluido en POST
	if (isset($_POST["genero"])) {				
		$empleado->set("genero",$_POST["genero"]."%");
	}else{
		$empleado->set("genero","%");
	}
	$empleado->set("estaturaM",$_POST["estaturaM"]."%");
	if (isset($_POST["estadoCivil"])) {
		$empleado->set("estadoCivil",$_POST["estadoCivil"]."%");
	}else{
		$empleado->set("estadoCivil","%");
	}
	$empleado->set("curp","%".$_POST["curp"]."%");
	$empleado->set("email","%".$_POST["email"]."%");
	$empleado->set("fechaAlta",str_replace("T", " ", $_POST["fechaAlta"])."%");
	if (isset($_POST["estado"])) {
		$empleado->set("estado",$_POST["estado"]."%");
	}else{
		$empleado->set("estado","%");
	}

	$datos = $empleado->selectallvalues();		//Se realiza la consulta

	if (mysqli_num_rows($datos)>0) {			//Si tiene respuesta genera tabla con ellas
												//Encabezado
		$respuesta = '<table>'.
			'<tr>'.
				'<td>Opciones</th>'.
				'<th>ID</th>'.
				'<th>Nombre</th>'. 
				'<th>Ap. Paterno</th>'. 
				'<th>Ap. Materno</th>'. 
				'<th>Fecha de Nacimiento</th>'. 
				'<th>Calle número Domicilio</th>'. 
				'<th>Colonia Domicilio</th>'. 
				'<th>Delegación/Municipio Domicilio</th>'. 
				'<th>C.P. Domicilio</th>'. 
				'<th>Ciudad Domicilio</th>'. 
				'<th>Teléfono Local</th>'. 
				'<th>Teléfono Móvil</th>'. 
				'<th>Género</th>'. 
				'<th>Estatura M.</th>'. 
				'<th>Estado civil</th>'. 
				'<th>CURP</th>'. 
				'<th>Email</th>'. 
				'<th>Fecha de alta</th>'. 
				'<th>Estado en el sistema</th>'. 
			'</tr>';

        //TODO también puedes usar fetch_object(Empleado::class)
	    while($row = $datos->fetch_assoc()) {	//Itera cada fila
	        $respuesta .= "<tr><td>".			
	        									//Agrega un botón con el idEMpleado en caso de querer modificar ese Empleado
	        "<button type=\"button\" onclick=\"modificarEmpleadoFillForm(".$row["idEmpleado"].");\">Modificar</button>".
	        "</td><td>".$row["idEmpleado"].
	        "</td><td>".$row["nombre"].
	        "</td><td>".$row["apPaterno"].
	        "</td><td>".$row["apMaterno"].
	        "</td><td>".$row["fechaDeNacimiento"].
	        "</td><td>".$row["calleNumeroDomicilio"].
	        "</td><td>".$row["coloniaDomicilio"].
	        "</td><td>".$row["delegacionMunicipioDomicilio"].
	        "</td><td>".$row["codigoPostalDomicilio"].
	        "</td><td>".$row["ciudadDomicilio"].
	        "</td><td>".$row["telefonoLocal"].
	        "</td><td>".$row["telefonoMovil"].
	        "</td><td>".$row["genero"].
	        "</td><td>".$row["estaturaM"].
	        "</td><td>".$row["estadoCivil"].
	        "</td><td>".$row["curp"].
	        "</td><td>".$row["email"].
	        "</td><td>".$row["fechaAlta"].
	        "</td><td>".$row["estado"].
	        "</td>";
	    }

	    $respuesta.="</table>";

	    echo $respuesta;						//Envía la respuesta con la tabla

	}else{										//Caso de no haber coincidencias manda mensaje.
		echo "<br>&emsp;No se encontraron coincidencias con su búsqueda.<br>";
	}


/*
COMENTARIOS GENERALES:

- Aquí no se revisa la sesión
- Buscar empleado puede tomar mucho tiempo ya en Internet, cambiar a botón en vez de onkeyup.
- Manejar un error ademas de campos vacíos.

*/
 ?>