<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();					//Arranca Autoload			//Arranca Autoload

use APP\Config\Sanitize;
use APP\Models\Empleado;
use APP\Models\User;
use APP\Models\Conexion;

$empleado = new Empleado();			//Creando objeto empleado
$user = new User();			//Creando objeto user
$con = new Conexion();			//Creando objeto conexión

$conn = $con->getConnection();
                                            //Llenando objeto a partir de POST
$idEmpleado = Sanitize::sanitizeInput($_POST["idEmpleado"]."%");
$nombre = Sanitize::sanitizeInput($_POST["nombre"]."%");
$apPaterno = Sanitize::sanitizeInput($_POST["apPaterno"]."%");
$apMaterno = Sanitize::sanitizeInput($_POST["apMaterno"]."%");

$sql = "SELECT Empleados.idEmpleado ,".
            "Empleados.nombre  ,".
            "Empleados.apPaterno  ,".
            "Empleados.apMaterno  ,".
            "Users.userName ".
            "FROM ".$empleado->get("_tableName")." as Empleados LEFT JOIN ".$user->get("_tableName")." as Users ".
            "ON Empleados.`idEmpleado` = Users.`idEmpleado` ".
            "WHERE ".
            "Empleados.`idEmpleado` LIKE :idEmpleado AND ".
            "Empleados.`nombre` LIKE :nombre AND ".
            "Empleados.`apPaterno` LIKE :apPaterno AND ".
            "Empleados.`apMaterno` LIKE :apMaterno  ";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':idEmpleado', $idEmpleado);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apPaterno', $apPaterno);
$stmt->bindParam(':apMaterno', $apMaterno);

$stmt->execute();

if ($stmt->rowCount() > 0) {			//Si tiene respuesta genera tabla con ellas

    $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    echo json_encode($resultado);

}else{										//Caso de no haber coincidencias manda mensaje.
    echo json_encode(['success' => false]);
}


/*
COMENTARIOS GENERALES:

- Aquí no se revisa la sesión

*/