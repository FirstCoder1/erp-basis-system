<?php namespace APP\Controllers;


require_once __DIR__."/../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();					//Arranca Autoload

use APP\Config\Sanitize;
use APP\Models\Cliente;


$cliente = new Cliente();		//Creando objeto empleado a partir de POST
$cliente->set("id",Sanitize::sanitizeInput($_POST["id"]));
$cliente->set("nombre",Sanitize::sanitizeInput($_POST["nombre"]));
$cliente->set("apPaterno",Sanitize::sanitizeInput($_POST["apPaterno"]));
$cliente->set("apMaterno",Sanitize::sanitizeInput($_POST["apMaterno"]));
$cliente->set("fechaDeNacimiento",Sanitize::sanitizeInput($_POST["fechaDeNacimiento"]));
$cliente->set("calleNumeroDomicilio",Sanitize::sanitizeInput($_POST["calleNumeroDomicilio"]));
$cliente->set("coloniaDomicilio",Sanitize::sanitizeInput($_POST["coloniaDomicilio"]));
$cliente->set("delegacionMunicipioDomicilio",Sanitize::sanitizeInput($_POST["delegacionMunicipioDomicilio"]));
$cliente->set("codigoPostalDomicilio",Sanitize::sanitizeInput($_POST["codigoPostalDomicilio"]));
$cliente->set("ciudadDomicilio",Sanitize::sanitizeInput($_POST["ciudadDomicilio"]));
$cliente->set("telefonoLocal",Sanitize::sanitizeInput($_POST["telefonoLocal"]));
$cliente->set("telefonoMovil",Sanitize::sanitizeInput($_POST["telefonoMovil"]));
$cliente->set("genero",Sanitize::sanitizeInput($_POST["genero"]));
$cliente->set("estadoCivil",Sanitize::sanitizeInput($_POST["estadoCivil"]));
$cliente->set("curp",Sanitize::sanitizeInput($_POST["curp"]));
$cliente->set("email",Sanitize::sanitizeInput($_POST["email"]));
$cliente->set("fechaAlta",str_replace("T", " ", Sanitize::sanitizeInput($_POST["fechaAlta"])));

if($cliente->update()){				//Hacendo consulta

    $con = new \APP\Models\Conexion();			//Creando objeto conexión
    $conn = $con->getConnection();

    $registro = new \APP\Models\Registro();
    session_start();
    $registro->set("idEmpleado", $_SESSION["idEmpleado"] );
    $registro->set("tipo", "Cliente" );
    $registro->set("descripcion",
"Cliente modificado:
ID: ".$cliente->get("id")." Nombre: ".$cliente->get("nombre")." ".$cliente->get("apPaterno")." ".$cliente->get("apMaterno"));

    $registro->insert($conn);

    echo json_encode(['success' => true]);
}else{
    echo json_encode(['success' => false, 'error' => 'Error modificando empleado.']);
}

/*
COMENTARIOS GENERALES:

- Aqui no se revisa la sesion.

*/