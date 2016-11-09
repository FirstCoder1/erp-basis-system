<?php namespace APP\Models;

class Registro extends BaseModelPDO
{

    protected $_tableName = "Registros";
    protected $idRegistros;
    protected $idEmpleado;
    protected $tipo;
    protected $fecha;
    protected $descripcion;

}