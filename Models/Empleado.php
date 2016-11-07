<?php namespace APP\Models;


class Empleado extends BaseModel
{

    protected   $_tableName = "Empleados";
    protected   $idEmpleado;
    protected   $nombre;
    protected   $apPaterno;
    protected   $apMaterno;
    protected   $fechaDeNacimiento;
    protected   $calleNumeroDomicilio;
    protected   $coloniaDomicilio;
    protected   $delegacionMunicipioDomicilio;
    protected   $codigoPostalDomicilio;
    protected   $ciudadDomicilio;
    protected   $telefonoLocal;
    protected   $telefonoMovil;
    protected   $genero;
    protected   $estaturaM;
    protected   $estadoCivil;
    protected   $curp;
    protected   $email;
    protected   $fechaAlta;
    protected   $estado;

    public function selectone()
    {
        $sql   = "SELECT * FROM ".$this->_tableName." WHERE idEmpleado = {$this->idEmpleado}";
        $resultado = $this->con->consultaRetorno($sql);

        if ($resultado->rowCount() == 1) {

            $resultado = $resultado->fetchAll(\PDO::FETCH_CLASS, "\\APP\\Models\\Empleado");
            $empleado = $resultado[0];

            $this->nombre                       = $empleado->get("nombre");
            $this->apPaterno                    = $empleado->get("apPaterno");
            $this->apMaterno                    = $empleado->get("apMaterno");
            $this->fechaDeNacimiento            = $empleado->get("fechaDeNacimiento");
            $this->calleNumeroDomicilio         = $empleado->get("calleNumeroDomicilio");
            $this->coloniaDomicilio             = $empleado->get("coloniaDomicilio");
            $this->delegacionMunicipioDomicilio = $empleado->get("delegacionMunicipioDomicilio");
            $this->codigoPostalDomicilio        = $empleado->get("codigoPostalDomicilio");
            $this->ciudadDomicilio              = $empleado->get("ciudadDomicilio");
            $this->telefonoLocal                = $empleado->get("telefonoLocal");
            $this->telefonoMovil                = $empleado->get("telefonoMovil");
            $this->genero                       = $empleado->get("genero");
            $this->estaturaM                    = $empleado->get("estaturaM");
            $this->estadoCivil                  = $empleado->get("estadoCivil");
            $this->curp                         = $empleado->get("curp");
            $this->email                        = $empleado->get("email");
            $this->fechaAlta                    = $empleado->get("fechaAlta");
            $this->estado                       = $empleado->get("estado");

            return true;

        } else {

            return false;

        }

    }

    public function selectallvalues()
    {
        $sql = "SELECT *  FROM ".$this->_tableName." WHERE 
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

        $datos = $this->con->consultaRetorno($sql);

        return $datos;
    }

    public function insert()
    {
        $sql = "INSERT INTO ".DBNAME.".`".$this->_tableName."` 
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
			`estado`) 
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
			'{$this->estado}')";

        return $this->con->consultaSimple($sql);
    }

    public function update()
    {
        $sql = "UPDATE ".DBNAME.".`".$this->_tableName."` SET 
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
			`estado` = '{$this->estado}' 
			WHERE `".$this->_tableName."`.`idEmpleado` = '{$this->idEmpleado}'";

        return $this->con->consultaSimple($sql);
    }

    /*public function delete()
    {
        $sql = "DELETE FROM `Sprint1`.`Empleados` WHERE `empleados`.`idEmpleado` = '{$this->idEmpleado}'";
        $this->con->consultaSimple($sql);
    }*/


}

/*
COMENTARIOS GENERALES:

*/

 