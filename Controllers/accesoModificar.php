<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();					//Arranca Autoload			//Arranca Autoload

use APP\Config\Sanitize;
use APP\Models\User;
use APP\Models\Conexion;

$user = new User();			//Creando objeto user
$con = new Conexion();			//Creando objeto conexión

$conn = $con->getConnection();
                                            //Llenando objeto a partir de POST
$idEmpleado = Sanitize::sanitizeInput($_POST["idEmpleado"]);
$userName = Sanitize::sanitizeInput($_POST["userName"]);
$password = crypt(Sanitize::sanitizeInput($_POST["password"]),CRYPTKEY);

$sql = "INSERT INTO ".
    $user->get("_tableName")." (idEmpleado, userName, password) ".
    "VALUES( :idEmpleado, :userName, :password) ".
    "ON DUPLICATE KEY UPDATE ".
    "userName = :userNameUp, password = :passwordUp";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':idEmpleado', $idEmpleado);
$stmt->bindParam(':userName', $userName);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':userNameUp', $userName);
$stmt->bindParam(':passwordUp', $password);

if ($stmt->execute()) {			//Si tiene respuesta genera tabla con ellas

    $registro = new \APP\Models\Registro();
    session_start();
    $registro->set("idEmpleado", $_SESSION["idEmpleado"] );
    $registro->set("tipo", "Accesos" );
    $registro->set("descripcion",
"Acceso modificado:
idEmpleado: ".$idEmpleado." ,userName: ".$userName);

    $registro->insert($conn);

    echo json_encode(['success' => true]);

}else{										//Caso de no haber coincidencias manda mensaje.
    echo json_encode(['success' => false]);
}


/*
COMENTARIOS GENERALES:

- Aquí no se revisa la sesión

*/