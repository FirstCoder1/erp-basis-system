<?php namespace APP\Models;

use App\Utils\Log;

class Viaje extends BaseModel
{

    protected   $_tableName = "Viajes";
    protected   $idViaje;
    protected   $destinoEstado;
    protected   $destinoLugar;
    protected   $salidaFechaHora;
    protected   $regresoFechaHora;
    protected   $diasNum;
    protected   $kilometros;
    protected   $temporada;
    protected   $fechaAlta;
    protected   $idCliente;

    public function viajesClientes(){


        $sql = "SELECT *
                    FROM Clientes
                    INNER JOIN Viajes ON Clientes.idCliente = Viajes.idCliente";

        $stmt = Conexion::getConnection()->prepare($sql);

        try {
            $stmt->execute();
        } catch (\PDOException $e) {
            Log::error('Error' . $e->getMessage());
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }                                  /*mandar la respuesta diractamnete como json*/



}

/*
COMENTARIOS GENERALES:

*/

 