<?php namespace APP\Models;

use APP\Models\Conexion;
use App\Utils\Log;

class BaseModel
{
    protected $_tableName = null;

    public function set($atributo, $contenido)
    {
        $this->$atributo = $contenido;
    }
    public function get($atributo)
    {
        return $this->$atributo;
    }

    public function buscar(){
        $this->fillEmptyWithWildcard();
        $sql = $this->crearQueryBuscar();

        $stmt = Conexion::getConnection()->prepare($sql);
        $this->bindParamAll($stmt);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, get_class($this));

    }

    public function fillEmptyWithWildcard(){
        foreach ($this as $key => $value) {
            if ($value == ""){
                $this->$key = "%";
            }
        }
    }
    public function crearQueryBuscar(){
        $sql = "";
        foreach ($this as $key => $value) {
            if ($key == "_tableName"){
                $sql = "SELECT * FROM ".$value." WHERE ".$sql;
            } else {
                $sql .= $key." LIKE :".$key." AND ";
            }
        }
        return substr($sql, 0, -4);
    }
    public function bindParamAll($stmt){

        foreach ($this as $key => $value) {
            if ($key != "_tableName"){
                $stmt->bindValue(':'.$key , $value);
            }
        }

    }

}