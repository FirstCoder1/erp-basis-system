<?php namespace APP\Models;

//TODO Read it http://php.net/manual/es/book.pdo.php
//http://php.net/manual/es/pdo.connections.php
	class Conexion{

		private $datos = array(
			"host" => DBHOST,
			"user" => DBUSER,
			"pass" => DBPASS,
			"db" => DBNAME
		);

		private $con;

		public function __construct(){
			$this->con = new \mysqli(
				$this->datos['host'],
				$this->datos['user'],
				$this->datos['pass'],
				$this->datos['db']
				);
			$this->con->set_charset("utf8");		//utf8 para evitar diamentes "?"
		}

		public function consultaSimple($sql){
			$resultado = $this->con->query($sql);
			return $resultado;
		}

		public function consultaRetorno($sql){
			$datos = $this->con->query($sql);
			return $datos;
		}

	}
	
/*
COMENTARIOS GENERALES:



*/
 ?>