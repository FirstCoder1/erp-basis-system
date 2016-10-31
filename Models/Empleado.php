<?php namespace APP\Models;

require_once "Conexion.php"; //----------------QUITAR

	class Empleado{

		private $idEmpleado;
		private $nombre;
		private $apPaterno;
		private $apMaterno;
		private $fechaDeNacimiento;
		private $calleNumeroDomicilio;
		private $coloniaDomicilio;
		private $delegacionMunicipioDomicilio;
		private $codigoPostalDomicilio;
		private $ciudadDomicilio;
		private $telefonoLocal;
		private $telefonoMovil;
		private $genero;
		private $estaturaM;
		private $estadoCivil;
		private $curp;
		private $email;
		private $fechaAlta;
		private $activo;

		private $con;

		public function __construct(){
			$this->con = new \APP\Models\Conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function selectall(){

			$sql = "SELECT * FROM Empleados";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function selectone(){
			$sql = "SELECT * FROM Empleados WHERE idEmpleado = {$this->idEmpleado}";
			$datos = $this->con->consultaRetorno($sql);
			
			if (mysqli_num_rows($datos)>0) {
				
				$row = mysqli_fetch_assoc($datos);
				$this->nombre = $row["nombre"];
				$this->apPaterno = $row["apPaterno"];
				$this->apMaterno = $row["apMaterno"];
				$this->fechaDeNacimiento = $row["fechaDeNacimiento"];
				$this->calleNumeroDomicilio = $row["calleNumeroDomicilio"];
				$this->coloniaDomicilio = $row["coloniaDomicilio"];
				$this->delegacionMunicipioDomicilio = $row["delegacionMunicipioDomicilio"];
				$this->codigoPostalDomicilio = $row["codigoPostalDomicilio"];
				$this->ciudadDomicilio = $row["ciudadDomicilio"];
				$this->telefonoLocal = $row["telefonoLocal"];
				$this->telefonoMovil = $row["telefonoMovil"];
				$this->genero = $row["genero"];
				$this->estaturaM = $row["estaturaM"];
				$this->estadoCivil = $row["estadoCivil"];
				$this->curp = $row["curp"];
				$this->email = $row["email"];
				$this->fechaAlta = $row["fechaAlta"];
				$this->activo = $row["activo"];

				return true;

			}else{
				return false;
			}
		}

		public function selectallvalues(){
			$sql = "SELECT *  FROM `Empleados` WHERE 
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
			`activo` LIKE '{$this->activo}'
			ORDER BY `Empleados`.`idEmpleado` DESC";

			$datos = $this->con->consultaRetorno($sql);
			
			return $datos;
		}
		
		public function insert(){
			$sql = "INSERT INTO ".DBNAME.".`Empleados` 
			(`idEmpleado`, 
			`nombre`, 
			`apPaterno`, 
			`apMaterno`, 
			`fechaDeNacimiento`, 
			`calleNumeroDomicilio`, 
			`coloniaDomicilio`, 
			`delegacionMunicipioDomicilio`, 
			`codigoPostalDomicilio`, 
			`ciudadDomicilio`, 
			`telefonoLocal`, 
			`telefonoMovil`, 
			`genero`, 
			`estaturaM`, 
			`estadoCivil`, 
			`curp`, 
			`email`, 
			`fechaAlta`, 
			`activo`) 
			VALUES (NULL,
			'{$this->nombre}',
			'{$this->apPaterno}',
			'{$this->apMaterno}',
			'{$this->fechaDeNacimiento}',
			'{$this->calleNumeroDomicilio}',
			'{$this->coloniaDomicilio}',
			'{$this->delegacionMunicipioDomicilio}',
			'{$this->codigoPostalDomicilio}',
			'{$this->ciudadDomicilio}',
			'{$this->telefonoLocal}',
			'{$this->telefonoMovil}',
			'{$this->genero}',
			'{$this->estaturaM}',
			'{$this->estadoCivil}',
			'{$this->curp}',
			'{$this->email}',
			CURRENT_TIMESTAMP,
			'{$this->activo}')";

			return $this->con->consultaSimple($sql);
		}

		public function update(){
			$sql = "UPDATE ".DBNAME.".`Empleados` SET 
			`nombre` = '{$this->nombre}',
			`apPaterno` = '{$this->apPaterno}', 
			`apMaterno` = '{$this->apMaterno}', 
			`fechaDeNacimiento` = '{$this->fechaDeNacimiento}', 
			`calleNumeroDomicilio` = '{$this->calleNumeroDomicilio}', 
			`coloniaDomicilio` = '{$this->coloniaDomicilio}', 
			`delegacionMunicipioDomicilio` = '{$this->delegacionMunicipioDomicilio}', 
			`codigoPostalDomicilio` = '{$this->codigoPostalDomicilio}', 
			`ciudadDomicilio` = '{$this->ciudadDomicilio}', 
			`telefonoLocal` = '{$this->telefonoLocal}', 
			`telefonoMovil` = '{$this->telefonoMovil}', 
			`genero` = '{$this->genero}', 
			`estaturaM` = '{$this->estaturaM}', 
			`estadoCivil` = '{$this->estadoCivil}', 
			`curp` = '{$this->curp}', 
			`email` = '{$this->email}', 
			`fechaAlta` = '{$this->fechaAlta}',
			`activo` = '{$this->activo}' 
			WHERE `Empleados`.`idEmpleado` = '{$this->idEmpleado}'";

			return $this->con->consultaSimple($sql);
		}

		public function delete(){
			$sql = "DELETE FROM `Sprint1`.`Empleados` WHERE `empleados`.`idEmpleado` = '{$this->idEmpleado}'";
			$this->con->consultaSimple($sql);
		}


	}
/*
COMENTARIOS GENERALES:

*/
?>

 