<?php 
	require_once "../Config/Constantes.php";   //Inclusión de las constantes y funciones globales
	require_once "../Config/Autoload.php"; 	//Inclusión de archivo para Autoload de las clases 
	Config\Autoload::run();					//Arranca Autoload

	$empleado = new \Models\Empleado();		//Creando objeto empleado
	$empleado->set("idEmpleado",$_POST["idEmpleado"]);

	if(!$empleado->selectone()){			//Haciendo consulta
											//En caso de error manda cero en forma de arreglo de Java-script
		echo "{resultado: 0}";				
	}else{
											//Llenando objeto den forma de arreglo de Java-script
		$resultado = "{resultado: 1";

		$resultado .= ',idEmpleado: "'.$empleado->get("idEmpleado").'"';
		$resultado .= ',nombre: "'.$empleado->get("nombre").'"';
		$resultado .= ',apPaterno: "'.$empleado->get("apPaterno").'"';
		$resultado .= ',apMaterno: "'.$empleado->get("apMaterno").'"';
		$resultado .= ',fechaDeNacimiento: "'.$empleado->get("fechaDeNacimiento").'"';
		$resultado .= ',calleNumeroDomicilio: "'.$empleado->get("calleNumeroDomicilio").'"';
		$resultado .= ',coloniaDomicilio: "'.$empleado->get("coloniaDomicilio").'"';
		$resultado .= ',delegacionMunicipioDomicilio: "'.$empleado->get("delegacionMunicipioDomicilio").'"';
		$resultado .= ',codigoPostalDomicilio: "'.$empleado->get("codigoPostalDomicilio").'"';
		$resultado .= ',ciudadDomicilio: "'.$empleado->get("ciudadDomicilio").'"';
		$resultado .= ',telefonoLocal: "'.$empleado->get("telefonoLocal").'"';
		$resultado .= ',telefonoMovil: "'.$empleado->get("telefonoMovil").'"';
		$resultado .= ',genero: "'.$empleado->get("genero").'"';
		$resultado .= ',estaturaM: "'.$empleado->get("estaturaM").'"';
		$resultado .= ',estadoCivil: "'.$empleado->get("estadoCivil").'"';
		$resultado .= ',curp: "'.$empleado->get("curp").'"';
		$resultado .= ',email: "'.$empleado->get("email").'"';
		$resultado .= ',fechaAlta: "'.str_replace(" ","T",$empleado->get("fechaAlta")).'"';
		$resultado .= ',activo: "'.$empleado->get("activo").'"';

		echo $resultado."}";				//Enviando objeto
	}

/*
COMENTARIOS GENERALES:

- Aquí no se revisa la sesión.

*/
 ?>