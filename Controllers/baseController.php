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
    $miEmpleado->set("nombre", $_POST["nombre"]);
    $miEmpleado->set("apPaterno", $_POST["apPaterno"]);
    $miEmpleado->set("apMaterno", $_POST["apMaterno"]);
    $miEmpleado->set("fechaDeNacimiento", $_POST["fechaDeNacimiento"]);
    $miEmpleado->set("estadoDomicilio", $_POST["estadoDomicilio"]);
    $miEmpleado->set("delegacionMunicipioDomicilio", $_POST["delegacionMunicipioDomicilio"]);
    $miEmpleado->set("codigoPostalDomicilio", $_POST["codigoPostalDomicilio"]);
    $miEmpleado->set("coloniaDomicilio", $_POST["coloniaDomicilio"]);
    $miEmpleado->set("calleNumeroDomicilio", $_POST["calleNumeroDomicilio"]);
    $miEmpleado->set("email", $_POST["email"]);
    $miEmpleado->set("telefonoLocal", $_POST["telefonoLocal"]);
    $miEmpleado->set("telefonoMovil", $_POST["telefonoMovil"]);
    $miEmpleado->set("curp", $_POST["curp"]);
    $miEmpleado->set("estadoSistema", $_POST["estadoSistema"]);
    $miEmpleado->set("userName", $_POST["userName"]);
    echo json_encode(Empleados::agregar($miEmpleado));

}

elseif ($action == "empleadoEditar"){

    $miEmpleado = new Empleado();
    $miEmpleado->set("idEmpleado", $_POST["idEmpleado"]);
    $miEmpleado->set("nombre", $_POST["nombre"]);
    $miEmpleado->set("apPaterno", $_POST["apPaterno"]);
    $miEmpleado->set("apMaterno", $_POST["apMaterno"]);
    $miEmpleado->set("fechaDeNacimiento", $_POST["fechaDeNacimiento"]);
    $miEmpleado->set("estadoDomicilio", $_POST["estadoDomicilio"]);
    $miEmpleado->set("delegacionMunicipioDomicilio", $_POST["delegacionMunicipioDomicilio"]);
    $miEmpleado->set("codigoPostalDomicilio", $_POST["codigoPostalDomicilio"]);
    $miEmpleado->set("coloniaDomicilio", $_POST["coloniaDomicilio"]);
    $miEmpleado->set("calleNumeroDomicilio", $_POST["calleNumeroDomicilio"]);
    $miEmpleado->set("email", $_POST["email"]);
    $miEmpleado->set("telefonoLocal", $_POST["telefonoLocal"]);
    $miEmpleado->set("telefonoMovil", $_POST["telefonoMovil"]);
    $miEmpleado->set("curp", $_POST["curp"]);
    $miEmpleado->set("estadoSistema", $_POST["estadoSistema"]);
    $miEmpleado->set("userName", $_POST["userName"]);

    echo json_encode(Empleados::editar($miEmpleado));

}

elseif ($action == "empleadoContraseña"){

    $miEmpleado = new Empleado();
    $miEmpleado->set("idEmpleado", $_POST["idEmpleado"]);
    $miEmpleado->set("password", $_POST["password"]);

    echo json_encode(Empleados::editarContraseña($miEmpleado));

}

/*
COMENTARIOS GENERALES:

    Este controlador se encarga de tomar el post, MAPEOR EL POST CON LOS OBJETOS, llamar al controlador especifico y
    formatear respuesta
*/