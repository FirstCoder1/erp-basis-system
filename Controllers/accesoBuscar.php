<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php"; 	//Inclusión de archivo para Autoload de las clases
\APP\Autoload::run();					//Arranca Autoload			//Arranca Autoload

use APP\Config\Sanitize;
use APP\Models\Empleado;
use APP\Models\User;

$empleado = new Empleado();			//Creando objeto empleado
$user = new User();			//Creando objeto empleado
                                            //Llenando objeto a partir de POST
$empleado->set("idEmpleado",Sanitize::sanitizeInput($_POST["idEmpleado"]."%"));
$empleado->set("nombre","%".Sanitize::sanitizeInput($_POST["nombre"]."%"));
$empleado->set("apPaterno","%".Sanitize::sanitizeInput($_POST["apPaterno"]."%"));
$empleado->set("apMaterno","%".Sanitize::sanitizeInput($_POST["apMaterno"]."%"));

$user->set("userName","%".Sanitize::sanitizeInput($_POST["userName"]."%"));

$sql = "SELECT *  FROM ".$empleado->." WHERE 
			`idEmpleado` LIKE '{$this->idEmpleado}' AND 
			`nombre` LIKE '{$this->nombre}' AND 
			`apPaterno` LIKE '{$this->apPaterno}' AND 
			`apMaterno` LIKE '{$this->apMaterno}' AND 
			`fechaDeNacimiento` LIKE '{$this->fechaDeNacimiento}' AND 
			`calleNumeroDomicilio` LIKE '{$this->calleNumeroDomicilio}' AND 
			`coloniaDomicilio` LIKE '{$this->coloniaDomicilio}' AND 
			`delegacionMunicipioDomicilio` LIKE '{$this->delegacionMunicipioDomicilio}' AND 
			`codigoPostalDomicilio` LIKE '{$this->codigoPostalDomicilio}' AND 
			`ciudadDomicilio` LIKE '{$this->ciudadDomicilio}' AND 
			`telefonoLocal` LIKE '{$this->telefonoLocal}' AND 
			`telefonoMovil` LIKE '{$this->telefonoMovil}' AND 
			`genero` LIKE '{$this->genero}' AND 
			`estaturaM` LIKE '{$this->estaturaM}' AND 
			`estadoCivil` LIKE '{$this->estadoCivil}' AND 
			`curp` LIKE '{$this->curp}' AND 
			`email` LIKE '{$this->email}' AND 
			`fechaAlta` LIKE '{$this->fechaAlta}' AND 
			`estado` LIKE '{$this->estado}'
			ORDER BY ".$this->_tableName.".`idEmpleado` DESC";

$resultado = $empleado->selectallvalues();		//Se realiza la consulta

if ($resultado->rowCount() > 0) {			//Si tiene respuesta genera tabla con ellas

    $resultado = $resultado->fetchAll();

    $resultado['success'] = true;

    echo json_encode($resultado);

}else{										//Caso de no haber coincidencias manda mensaje.
    echo json_encode(['success' => false]);
}


/*
COMENTARIOS GENERALES:

- Aquí no se revisa la sesión

*/