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

    public function buscarClase(){
        $this->fillEmptyWithWildcard();
        $sql = $this->crearQueryBuscar();

        $stmt = Conexion::getConnection()->prepare($sql);
        $this->bindParamAll($stmt);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, get_class($this));

    }                                   /*Trabajar con la respuesta en un controlador*/
    public function buscarArreglo(){
        $this->fillEmptyWithWildcard();
        $sql = $this->crearQueryBuscar();

        $stmt = Conexion::getConnection()->prepare($sql);
        $this->bindParamAll($stmt);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

}                                  /*mandar la respuesta diractamnete como json*/

    public function agregar(){

        $sql = $this->crearQueryAgregar();

        $stmt = Conexion::getConnection()->prepare($sql);
        $this->bindParamAll($stmt);

        return $stmt->execute();

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

    public function crearQueryAgregar(){
        $sql = "";
        $values = "VALUES (";
        foreach ($this as $key => $value) {
            if ($key == "_tableName"){
                $sql = "INSERT INTO ".$value." (".$sql;
            } else {
                $sql .= $key.",";
                $values .= "'".$value."',";
            }
        }

        $sql = substr($sql,0,-1).") ";
        $values = substr($values,0,-1).");";

        return $sql.$values;
    }


}