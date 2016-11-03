<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();					//Arranca Autoload

use APP\Config\Sanitize;
use APP\Models\Empleado;

$empleado = new Empleado();		//Creando objeto empleado
                                        //Llenando objeto a partir del POST
$empleado->set("nombre",Sanitize::sanitizeInput($_POST["nombre"])); //TODO - sanitize
$empleado->set("apPaterno",Sanitize::sanitizeInput($_POST["apPaterno"]));
$empleado->set("apMaterno",Sanitize::sanitizeInput($_POST["apMaterno"]));
$empleado->set("fechaDeNacimiento",Sanitize::sanitizeInput($_POST["fechaDeNacimiento"]));
$empleado->set("calleNumeroDomicilio",Sanitize::sanitizeInput($_POST["calleNumeroDomicilio"]));
$empleado->set("coloniaDomicilio",Sanitize::sanitizeInput($_POST["coloniaDomicilio"]));
$empleado->set("delegacionMunicipioDomicilio",Sanitize::sanitizeInput($_POST["delegacionMunicipioDomicilio"]));
$empleado->set("codigoPostalDomicilio",Sanitize::sanitizeInput($_POST["codigoPostalDomicilio"]));
$empleado->set("ciudadDomicilio",Sanitize::sanitizeInput($_POST["ciudadDomicilio"]));
$empleado->set("telefonoLocal",Sanitize::sanitizeInput($_POST["telefonoLocal"]));
$empleado->set("telefonoMovil",Sanitize::sanitizeInput($_POST["telefonoMovil"]));
$empleado->set("genero",Sanitize::sanitizeInput($_POST["genero"]));
$empleado->set("estaturaM",Sanitize::sanitizeInput($_POST["estaturaM"]));
$empleado->set("estadoCivil",Sanitize::sanitizeInput($_POST["estadoCivil"]));
$empleado->set("curp",Sanitize::sanitizeInput($_POST["curp"]));
$empleado->set("email",Sanitize::sanitizeInput($_POST["email"]));
$empleado->set("estado",Sanitize::sanitizeInput("testing"));

if($empleado->insert()){				//Realizando inserción
    echo json_encode(['success' => true]);
}else{
    echo json_encode(['success' => false, 'error' => 'Error agregando empleado..']);
}

/*
COMENTARIOS GENERALES:

- Aquí no se revisa la sesión.

*/