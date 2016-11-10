<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();					//Arranca Autoload			//Arranca Autoload

use APP\Config\Sanitize;
use APP\Models\Cliente;

$cliente = new Cliente();			//Creando objeto empleado
                                            //Llenando objeto a partir de POST
$cliente->set("id",Sanitize::sanitizeInput($_POST["id"]."%"));
$cliente->set("nombre","%".Sanitize::sanitizeInput($_POST["nombre"]."%"));
$cliente->set("apPaterno","%".Sanitize::sanitizeInput($_POST["apPaterno"]."%"));
$cliente->set("apMaterno","%".Sanitize::sanitizeInput($_POST["apMaterno"]."%"));
$cliente->set("fechaDeNacimiento",Sanitize::sanitizeInput($_POST["fechaDeNacimiento"]."%"));
$cliente->set("calleNumeroDomicilio","%".Sanitize::sanitizeInput($_POST["calleNumeroDomicilio"]."%"));
$cliente->set("coloniaDomicilio","%".Sanitize::sanitizeInput($_POST["coloniaDomicilio"]."%"));
$cliente->set("delegacionMunicipioDomicilio","%".Sanitize::sanitizeInput($_POST["delegacionMunicipioDomicilio"]."%"));
$cliente->set("codigoPostalDomicilio","%".Sanitize::sanitizeInput($_POST["codigoPostalDomicilio"]."%"));
$cliente->set("ciudadDomicilio","%".Sanitize::sanitizeInput($_POST["ciudadDomicilio"]."%"));
$cliente->set("telefonoLocal","%".Sanitize::sanitizeInput($_POST["telefonoLocal"]."%"));
$cliente->set("telefonoMovil","%".Sanitize::sanitizeInput($_POST["telefonoMovil"]."%"));
$cliente->set("genero","%".Sanitize::sanitizeInput($_POST["genero"]."%"));
$cliente->set("estadoCivil",Sanitize::sanitizeInput($_POST["estadoCivil"]."%"));
$cliente->set("curp","%".Sanitize::sanitizeInput($_POST["curp"]."%"));
$cliente->set("email","%".Sanitize::sanitizeInput($_POST["email"]."%"));
$cliente->set("fechaAlta",str_replace("T", " ", Sanitize::sanitizeInput($_POST["fechaAlta"])."%"));

$resultado = $cliente->selectallvalues();		//Se realiza la consulta

if ($resultado->rowCount() > 0) {			//Si tiene respuesta genera tabla con ellas

    $resultado = $resultado->fetchAll(\PDO::FETCH_ASSOC);

    echo json_encode($resultado);

}else{										//Caso de no haber coincidencias manda mensaje.
    echo json_encode(['success' => false]);
}


/*
COMENTARIOS GENERALES:

- Aquí no se revisa la sesión

*/