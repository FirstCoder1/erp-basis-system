<?php namespace APP\Models;

use \PDO;

	class Conexion{

		private $con;

		public function __construct(){
            try {
                $this->con = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8", DBUSER, DBPASS); //utf8 para evitar diamantes "?"
                // set the PDO error mode to exception
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->con->setAttribute(PDO::ATTR_PERSISTENT, true);
            }
            catch(PDOException $e)
            {
                \APP\Utils\Log::error("Database connection failed: " . $e->getMessage());
            }

		}

		public function consultaSimple($sql){


			$resultado = $this->con->query($sql);

            if($resultado->errorCode() != 0000){

                \APP\Utils\Log::error("Query error: " . $resultado->errorInfo());

            }else{

                return $resultado;

            }
		}

		public function consultaRetorno($sql){

            $resultado = $this->con->query($sql);

            if($resultado->errorCode() != 0000){

                \APP\Utils\Log::error("Query error: " . $resultado->errorInfo());

            }else{

                return $resultado;

            }

		}

	}
	
/*
COMENTARIOS GENERALES:

//TODO - prepare statement

*/