<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";                     //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php";                              //Inclusión de archivo para Autoload de las clases

\APP\Autoload::run();                                                                                 //Arranca Autoload

use APP\Controllers\Empleados;                                                                                //Declaraciones

$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);                                        //Limpia entrada
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$action = $_POST["action"];

if ($action == "empleadoLogin"){
    echo json_encode(Empleados::login($_POST["userName"],$_POST["password"]));
}

elseif ($action == "empleadosTodos"){
    echo json_encode(Empleados::todos());
}
