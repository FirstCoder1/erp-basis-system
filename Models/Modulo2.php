<?php namespace APP\Models;

class Modulo extends BaseModelPDO
{

    protected $_tableName = "Modulos";
    protected $idEmpleado;
    protected $modulos;


    /*public function selectone()
    {
        $sql   = "SELECT * FROM Users WHERE idEmpleado = '{$this->idEmpleado}'";
        $datos = $this->con->consultaRetorno($sql);

        if (mysqli_num_rows($datos) > 0) {

            $row            = mysqli_fetch_assoc($datos);
            $this->userName = $row["userName"];
            $this->password = $row["password"];

            return true;

        } else {
            return false;
        }

    }

    public function insert()
    {
        $sql = "INSERT INTO `Sprint1`.`Users` 
			(`idEmpleado`, 
			`userName`, 
			`password`) 
			VALUES (NULL,
			'{$this->userName}',
			'{$this->password}')";
        $this->con->consultaSimple($sql);
    }

    public function delete()
    {
        $sql = "DELETE FROM `Sprint1`.`Users` WHERE `Users`.`idEmpleado` = '{$this->idEmpleado}'";
        $this->con->consultaSimple($sql);
    }

    public function update()
    {
        $sql = "UPDATE `Sprint1`.`Users` SET 
			`userName` = '{$this->userName}',
			`password` = '{$this->password}',
			WHERE `Users`.`idEmpleado` = '{$this->idEmpleado}'";
        $this->con->consultaSimple($sql);
    }*/


}