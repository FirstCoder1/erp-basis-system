<?php 
	require_once "../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
	require_once "../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases 
	\APP\Autoload::run();					//Arranca Autoload

	$empleado = new \APP\Models\Empleado();		//Creando objeto empleado
											//Llenando objeto a partir del POST
	$empleado->set("nombre",$_POST["nombre"]);
	$empleado->set("apPaterno",$_POST["apPaterno"]);
	$empleado->set("apMaterno",$_POST["apMaterno"]);
	$empleado->set("fechaDeNacimiento",$_POST["fechaDeNacimiento"]);
	$empleado->set("calleNumeroDomicilio",$_POST["calleNumeroDomicilio"]);
	$empleado->set("coloniaDomicilio",$_POST["coloniaDomicilio"]);
	$empleado->set("delegacionMunicipioDomicilio",$_POST["delegacionMunicipioDomicilio"]);
	$empleado->set("codigoPostalDomicilio",$_POST["codigoPostalDomicilio"]);
	$empleado->set("ciudadDomicilio",$_POST["ciudadDomicilio"]);
	$empleado->set("telefonoLocal",$_POST["telefonoLocal"]);
	$empleado->set("telefonoMovil",$_POST["telefonoMovil"]);
	$empleado->set("genero",$_POST["genero"]);
	$empleado->set("estaturaM",$_POST["estaturaM"]);
	$empleado->set("estadoCivil",$_POST["estadoCivil"]);
	$empleado->set("curp",$_POST["curp"]);
	$empleado->set("email",$_POST["email"]);
	$empleado->set("estado",$_POST["estado"]);

	if($empleado->insert()){				//Realizando inserción
		echo "1";							//Éxito manda 1, error manda 0
	}else{
		echo "0";
	}

/*
COMENTARIOS GENERALES:

- Aquí no se revisa la sesión.

*/
 ?>