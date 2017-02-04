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

        $empleados = $miEmpleado->buscarClase();


        $salida = array();
        if (count($empleados) === 1){
            $miEmpleado = $empleados[0];

            //$miEmpleado->set( "password", password_hash($password,PASSWORD_DEFAULT));      //asi se hashea el password
            if (password_verify($password,$miEmpleado->get("password"))){                         //El password coincide

                if ($miEmpleado->get("estadoSistema")){                                                        //Revisar estado
                    $salida["success"] = true ;

                    session_start();                                                //Se asigna la sesion en el servidor
                    $_SESSION["idEmpleado"] = $miEmpleado->get("idEmpleado");
                    $_SESSION["timelast"] = time();

                }else{
                    $salida["success"] = false;
                    $salida["error"] = "Empleado desactivado.";
                }

            }else{
                $salida["success"] = false;
                $salida["error"] = "Contraseña incorrecta.";
            }

        }else{
            $salida["success"] = false;
            $salida["error"] = "Nombre de usuario no existe.";
        }

        return $salida;

    }

    public static function todos(){

        $miEmpleado = new Empleado();
        $empleados = $miEmpleado->buscarArreglo();

        $salida = array();
        if (count($empleados) > 0){

            $salida["success"] = true ;
            $salida["empleadosTodos"] = $empleados ;

        }else{
            $salida["success"] = false;
            $salida["error"] = "Error cargando empleados.";
        }

        return $salida;
    }
}

/*
COMENTARIOS GENERALES:
*/