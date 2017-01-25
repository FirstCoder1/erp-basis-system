<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";    //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php";        //Inclusión de archivo para Autoload de las clases

\APP\Autoload::run();                        //Arranca Autoload

use \APP\Models\Empleado;
use App\Utils\Log;

class Empleados {
    public static function login( $userName, $password){

        $miEmpleado = new Empleado();
        $miEmpleado->set( "userName", $userName);
        $miEmpleado->set( "password", $password);

        $empleados = $miEmpleado->buscar();
        $salida = array();

        if ($empleados){
            $salida["success"] = true ; //TODO
        }else{
            $salida["success"] = false;
            $salida["error"] = "Datos incorrectos";
        }

        return $salida; //TODO
    }
}

/*
COMENTARIOS GENERALES:
- TODO - revisar cifrado
- TODO - Revisar estado.
*/