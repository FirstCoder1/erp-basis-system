<?php namespace APP\Models;

use App\Utils\Log;

class Cotizacion extends BaseModel
{

    protected   $_tableName = "Cotizaciones";
    protected   $idCotizacion;
    protected   $tipoUnidad;
    protected   $precioCombustible;
    protected   $costoCombustible;
    protected   $peaje;
    protected   $sueldoChofer;
    protected   $hospedajeChofer;
    protected   $extras;
    protected   $cotizacion;
    protected   $fechaAlta;
    protected   $idViaje;

    public function cotizacionesViajes(){


        $sql = "SELECT *
                    FROM Viajes
                    INNER JOIN Cotizaciones ON Viajes.idViaje = Cotizaciones.idViaje";

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

 