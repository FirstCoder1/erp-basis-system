<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();					//Arranca Autoload			//Arranca Autoload

use APP\Config\Sanitize;
use APP\Models\Modulo;
use APP\Models\Conexion;

$modulos = new Modulo();			//Creando objeto user
$con = new Conexion();			//Creando objeto conexión

$conn = $con->getConnection();
                                            //Llenando objeto a partir de POST
$idEmpleado = Sanitize::sanitizeInput($_POST["idEmpleado"]);
$modulosPost = Sanitize::sanitizeInput($_POST["modulos"]);

$sql = "INSERT INTO ".
    $modulos->get("_tableName")." (idEmpleado, modulos) ".
    "VALUES( :idEmpleado, :modulos) ".
    "ON DUPLICATE KEY UPDATE ".
    "modulos = :modulosUp";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':idEmpleado', $idEmpleado);
$stmt->bindParam(':modulos', $modulosPost);
$stmt->bindParam(':modulosUp', $modulosPost);

if ($stmt->execute()) {			//Si tiene respuesta genera tabla con ellas

    $registro = new \APP\Models\Registro();
    session_start();
    $registro->set("idEmpleado", $_SESSION["idEmpleado"] );
    $registro->set("tipo", "Modulos" );
    $registro->set("descripcion",
"Modulos modificados:
idEmpleado: ".$idEmpleado." ,userName: ".$modulosPost);

    $registro->insert($conn);

    echo json_encode(['success' => true]);

}else{										//Caso de no haber coincidencias manda mensaje.
    echo json_encode(['success' => false]);
}


/*
COMENTARIOS GENERALES:

- Aquí no se revisa la sesión

*/