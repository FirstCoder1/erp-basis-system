<?php namespace APP\Models;

class Registro extends BaseModelPDO
{

    protected $_tableName = "Registros";
    protected $idRegistro;
    protected $idEmpleado;
    protected $tipo;
    protected $fecha;
    protected $descripcion;

    public function insert($conn){

        $sql = "INSERT INTO ".DBNAME.".".$this->_tableName." (".
			"idEmpleado, ".
			"tipo, ".
			"descripcion ) ".
			"VALUES ( ".
			":idEmpleado, ".
			":tipo, ".
            ":descripcion )";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':idEmpleado', $this->idEmpleado);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':descripcion', $this->descripcion);

        return $stmt->execute();
    }

}