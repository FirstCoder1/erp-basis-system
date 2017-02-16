<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";                     //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php";                              //Inclusión de archivo para Autoload de las clases

\APP\Autoload::run();                                                                                 //Arranca Autoload

                                                                                                         //Declaraciones
use APP\Models\CodigoPostal;
use APP\Models\Empleado;
use App\Utils\Log;

$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);                                        //Limpia entrada
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$action = $_POST["action"];
unset($_POST["action"]);

if ($action == "empleadoLogin"){

    $miEmpleado = new Empleado();
    $miEmpleado->set( "userName", $_POST["userName"]);
    echo json_encode(Empleados::login($miEmpleado, $_POST["password"]));

}

elseif ($action == "empleadosTodos"){
    echo json_encode(Empleados::todosArrelo());
}

elseif ($action == "codigosPostales_de_Estado_y_DelegacionMunicipio"){
    $miCodigoPostal = new CodigoPostal();
    $miCodigoPostal->set("estado", $_POST["estado"]);
    $miCodigoPostal->set("municipio", $_POST["municipio"]);
    echo json_encode(CodigosPostales::buscarRetornaSoloCodigosPostales($miCodigoPostal));
}

elseif ($action == "empleadoAgregar"){

    $miEmpleado = new Empleado();

    foreach ($_POST as $key => $value) {
        $miEmpleado->set($key, $value);
    }

    echo json_encode(Empleados::agregar($miEmpleado));

}

elseif ($action == "empleadoEditar"){

    $miEmpleado = new Empleado();

    foreach ($_POST as $key => $value) {
        $miEmpleado->set($key, $value);
    }

    echo json_encode(Empleados::editar($miEmpleado));

}

elseif ($action == "empleadoContraseña"){

    $miEmpleado = new Empleado();
    foreach ($_POST as $key => $value) {
        $miEmpleado->set($key, $value);
    }

    echo json_encode(Empleados::editarContraseña($miEmpleado));

}

/*
COMENTARIOS GENERALES:

    Este controlador se encarga de tomar el post, MAPEOR EL POST CON LOS OBJETOS, llamar al controlador especifico y
    formatear respuesta
*/