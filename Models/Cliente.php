<?php namespace APP\Models;


class Cliente extends BaseModel
{

    protected   $_tableName = "Clientes";
    protected   $id;
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
    protected   $estadoCivil;
    protected   $curp;
    protected   $email;
    protected   $fechaAlta;

    public function selectallvalues()
    {
        $sql = "SELECT *  FROM ".$this->_tableName." WHERE 
			`id` LIKE '{$this->id}' AND 
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
			`estadoCivil` LIKE '{$this->estadoCivil}' AND 
			`curp` LIKE '{$this->curp}' AND 
			`email` LIKE '{$this->email}' AND 
			`fechaAlta` LIKE '{$this->fechaAlta}'
			ORDER BY ".$this->_tableName.".`id` DESC";

        $datos = $this->con->consultaRetorno($sql);

        return $datos;
    }

    public function insert()
    {
        $sql = "INSERT INTO ".DBNAME.".`".$this->_tableName."` 
			(`id`, 
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
			`estadoCivil`, 
			`curp`, 
			`email`, 
			`fechaAlta`) 
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
			'{$this->estadoCivil}',
			'{$this->curp}',
			'{$this->email}',
			CURRENT_TIMESTAMP)";

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
			`estadoCivil` = '{$this->estadoCivil}', 
			`curp` = '{$this->curp}', 
			`email` = '{$this->email}', 
			`fechaAlta` = '{$this->fechaAlta}'
			WHERE `".$this->_tableName."`.`id` = '{$this->id}'";

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

 