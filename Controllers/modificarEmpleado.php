<?php 
	require_once "../Config/Constantes.php";   //Inclusion de las constantes y funciones globales
	require_once "../Autoload.php"; 	//Inclusion de archivo para autoload de las clases 
	APP\Autoload::run();					//Arranca Autoload

	$empleado = new \APP\Models\Empleado();		//Creando objeto empleado a partir de POST
	$empleado->set("idEmpleado",$_POST["idEmpleado"]);
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
	$empleado->set("fechaAlta",str_replace("T", " ", $_POST["fechaAlta"]));
	$empleado->set("estado",$_POST["estado"]);

	if($empleado->update()){				//Hacendo consulta 
		echo "1";							//En caso de exito se mando un 1
	}else{
		echo "0";							//En caso de error se manda un 0
	}

/*
COMENTARIOS GENERALES:

- Aqui no se revisa la sesion.

*/
 ?>