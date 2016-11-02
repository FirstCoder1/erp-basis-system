<?php
/**
 * Created by PhpStorm.
 * User: cuculcan
 * Date: 01/11/2016
 * Time: 11:25 PM
 */

namespace APP\Models;


class BaseModel
{
    protected $con        = null;
    protected $_tableName = null;

    public function __construct()
    {
        $this->con = new Conexion();
    }

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
        $sql   = "SELECT * FROM {$this->_tableName}";
        $datos = $this->con->consultaRetorno($sql);

        return $datos;
    }
}