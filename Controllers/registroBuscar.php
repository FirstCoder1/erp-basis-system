<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();					//Arranca Autoload			//Arranca Autoload


use APP\Config\Sanitize;
use APP\Models\Empleado;
use APP\Models\Registro;
use APP\Models\Conexion;

$empleado = new Empleado();			//Creando objeto empleado
$registro = new Registro();			//Creando objeto user
$con = new Conexion();			//Creando objeto conexión

$conn = $con->getConnection();

                                            //Llenando objeto a partir de POST
$idRegistro = Sanitize::sanitizeInput($_POST["idRegistro"]."%");
$idEmpleado = Sanitize::sanitizeInput($_POST["idEmpleado"]."%");
$nombre = Sanitize::sanitizeInput($_POST["nombre"]."%");
$apPaterno = Sanitize::sanitizeInput($_POST["apPaterno"]."%");
$tipo = Sanitize::sanitizeInput($_POST["tipo"]."%");
$fecha = Sanitize::sanitizeInput($_POST["fecha"]."%");
$descripcion = Sanitize::sanitizeInput("%".$_POST["descripcion"]."%");

$sql = "SELECT Registros.idRegistro, ".
            "Registros.idEmpleado, ".
            "Empleados.nombre, ".
            "Empleados.apPaterno, ".
            "Empleados.apMaterno, ".
            "Registros.tipo, ".
            "Registros.fecha, ".
            "Registros.descripcion ".
            "FROM ".$registro->get("_tableName")." as Registros, ".$empleado->get("_tableName")." as Empleados ".
            "WHERE ".
            "Registros.`idEmpleado` = Empleados.`idEmpleado` AND ".

            "Registros.`idRegistro` LIKE :idRegistro AND ".
            "Registros.`idEmpleado` LIKE :idEmpleado AND ".
            "Empleados.`nombre` LIKE :nombre AND ".
            "Empleados.`apPaterno` LIKE :apPaterno AND ".
            "Registros.`tipo` LIKE :tipo  AND ".
            "Registros.`fecha` LIKE :fecha  AND ".
            "Registros.`descripcion` LIKE :descripcion ".
            "ORDER BY Registros.idRegistro DESC";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':idRegistro', $idRegistro);
$stmt->bindParam(':idEmpleado', $idEmpleado);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apPaterno', $apPaterno);
$stmt->bindParam(':tipo', $tipo);
$stmt->bindParam(':fecha', $fecha);
$stmt->bindParam(':descripcion', $descripcion);

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