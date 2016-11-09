<?php namespace APP\Models;

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

    public function selectall()
    {
        //TODO - para todas las clases con PDO
    }
}