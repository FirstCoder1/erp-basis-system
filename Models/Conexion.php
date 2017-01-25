<?php namespace APP\Models;

use \PDO;

	class Conexion{

        protected static $con;

		public function __construct(){
            try {
                self::$con = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8", DBUSER, DBPASS); //utf8 para evitar diamantes "?"
                // set the PDO error mode to exception
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$con->setAttribute(PDO::ATTR_PERSISTENT, true);
            }
            catch(PDOException $e)
            {
                Log::error("Database connection failed: " . $e->getMessage());
            }
		}

        public static function getConnection()
        {
            if (!self::$con) {                                                                  //new connection object.
                new Conexion();
            }
            return self::$con;
        }
/*
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

		}*/

	}
	
/*
COMENTARIOS GENERALES:

//TODO - prepare statement

*/