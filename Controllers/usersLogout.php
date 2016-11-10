<?php namespace APP\Controllers;

require_once __DIR__ . "/../Config/Constantes.php";    //Inclusión de las constantes y funciones globales
require_once __DIR__ . "/../Autoload.php";        //Inclusión de archivo para Autoload de las clases

\APP\Autoload::run();                        //Arranca Autoload

use APP\Models\Conexion;
use APP\Models\Registro;

$con = new Conexion();			//Creando objeto conexión
$conn = $con->getConnection();

$registro = new Registro();

session_start();

$registro->set("idEmpleado", $_SESSION["idEmpleado"] );
$registro->set("tipo", "Login" );
$registro->set("descripcion", "Cierre de sesión." );

$registro->insert($conn);

session_destroy();

header("Location: ../index.php");

/*
COMENTARIOS GENERALES;

- Generar registro de cierre de sesión 

*/

 ?>