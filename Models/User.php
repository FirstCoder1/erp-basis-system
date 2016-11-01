<?php namespace APP\Models;

	class User{

		private $idEmpleado;
		private $userName;
		private $password;

		private $con;

		public function __construct(){
			$this->con = new \APP\Models\Conexion(); //TODO ---------------------------
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function selectall(){
			$sql = "SELECT * FROM Users";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function selectone(){
			$sql = "SELECT * FROM Users WHERE idEmpleado = '{$this->idEmpleado}'";
			$datos = $this->con->consultaRetorno($sql);
			
			if (mysqli_num_rows($datos)>0) {
				
				$row = mysqli_fetch_assoc($datos);
				$this->userName = $row["userName"];
				$this->password = $row["password"];

				return true;

			}else{
				return false;
			}

		}
		
		public function insert(){
			$sql = "INSERT INTO `Sprint1`.`Users` 
			(`idEmpleado`, 
			`userName`, 
			`password`) 
			VALUES (NULL,
			'{$this->userName}',
			'{$this->password}')";
			$this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM `Sprint1`.`Users` WHERE `Users`.`idEmpleado` = '{$this->idEmpleado}'";
			$this->con->consultaSimple($sql);
		}

		public function update(){
			$sql = "UPDATE `Sprint1`.`Users` SET 
			`userName` = '{$this->userName}',
			`password` = '{$this->password}',
			WHERE `Users`.`idEmpleado` = '{$this->idEmpleado}'";
			$this->con->consultaSimple($sql);
		}



		public function check(){
			$sql = "SELECT * FROM Users WHERE 
			BINARY userName LIKE '{$this->userName}' AND 
			BINARY password LIKE '{$this->password}'";
			$datos = $this->con->consultaRetorno($sql);

			if (mysqli_num_rows($datos)>0) {
				
				$row = mysqli_fetch_assoc($datos);
				$this->idEmpleado = $row["idEmpleado"];

				return true;

			}else{
				return false;
			}

		}

	}



 ?>