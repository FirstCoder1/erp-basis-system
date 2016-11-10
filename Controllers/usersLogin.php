<?php namespace APP\Controllers;

require_once __DIR__."/../Config/Constantes.php";    //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php";        //Inclusión de archivo para Autoload de las clases

\APP\Autoload::run();                        //Arranca Autoload

use APP\Config\Sanitize;
use APP\Models\User;
use APP\Models\Empleado;
use APP\Models\Conexion;
use APP\Models\Registro;


if ($_SERVER["REQUEST_METHOD"] == "POST") {    //si se llama al index a través de un POST
    $userName = $password = "";
    $userName     = Sanitize::sanitizeInput($_POST["userName"]);    //Se limpia la entrada
    $password     = crypt(Sanitize::sanitizeInput($_POST["password"]),CRYPTKEY); //cr0k5jrG2AvAQ

		$user = new User();			//Creación de objeto User a través de los datos
        $empleado = new Empleado();			//Creando objeto empleado
        $con = new Conexion();			//Creando objeto conexión

        $conn = $con->getConnection();


        $sql = "SELECT User.idEmpleado ".
            "FROM ".$user->get("_tableName")." as User, ".$empleado->get("_tableName")." as Empleados ".
            "WHERE ".
            "User.`idEmpleado` = Empleados.`idEmpleado` AND ".

            "User.`userName` LIKE :userName AND ".
            "User.`password` LIKE :password AND ".
            "Empleados.`estado` = 1 ";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

		if($stmt->rowCount() == 1){					//Validación de usuario existente

            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
											//Se inicia sesión con id del empleado

            $registro = new Registro();
            $registro->set("idEmpleado", $resultado[0]["idEmpleado"] );
            //$registro->set("idEmpleado", $_SESSION["idEmpleado"] );
            $registro->set("tipo", "Login" );
            $registro->set("descripcion", "Inicio de sesión." );

            $registro->insert($conn);


			session_start();						//Revisar si hay un sesión activa actualmente
			$_SESSION["idEmpleado"] = $resultado[0]["idEmpleado"];
			$_SESSION["timelast"] = time(); //Se asigna la hora de la última operación

            echo json_encode(['success' => true]);

		}else{
            echo json_encode(['success' => false, 'error' => 'Datos incorrectos.']);
		}

	} else {

    json_encode(['success' => false, 'error' => 'HTTP Request Method.']);

}

//TODO - cifrar la contraseña bien, manejar error en registro, registrar intentos de log.
