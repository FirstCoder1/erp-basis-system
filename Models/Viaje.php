<?php namespace APP\Models;

use App\Utils\Log;

class Viaje extends BaseModel
{

    protected   $_tableName = "Viajes";
    protected   $idViaje;
    protected   $kilometraje;
    protected   $fechaAlta;
    protected   $idCliente;

    public function viajesClientesPuntos(){

        $sql = "SET lc_time_names = 'es_MX'";

        $stmt = Conexion::getConnection()->prepare($sql);

        try {
            $stmt->execute();
        } catch (\PDOException $e) {
            Log::error('Error' . $e->getMessage());
        }

        $sql = "SELECT Clientes.idCliente, Clientes.nombre, Clientes.apPaterno, Clientes.apMaterno,
                    Viajes.idViaje, DATE_FORMAT(Viajes.fechaAlta,' %Y-%m-%d %a %H:%i') as fechaAlta,  
                    CONCAT('<table>' ,
                            GROUP_CONCAT('<tr><td>' , Puntos.n , '</td><td> ' , DATE_FORMAT(Puntos.fechaHora,'%Y-%m-%d %a') , '</td><td>' , DATE_FORMAT(Puntos.fechaHora,'%H:%i') , '</td><td class=\"fechaHora\" data=\"', DATE_FORMAT(Puntos.fechaHora,'%Y-%m-%dT%T') ,'\" >' , Puntos.estadoDireccion , '</td><td>' , Puntos.delegacionMunicipioDireccion , '</td><td>' , Puntos.codigoPostalDireccion , '</td><td>' , Puntos.coloniaDireccion , '</td><td>' , Puntos.calleNumeroDireccion , '</td><td>' , Puntos.descripcionDireccion , '</td></tr>' ORDER BY Puntos.idPunto separator ''),
                        '</table>'
                    ) as puntos
                    FROM Clientes
                    INNER JOIN Viajes ON Clientes.idCliente = Viajes.idCliente
                    INNER JOIN (
                    
                        SELECT Puntos.* , FIND_IN_SET(CONCAT(`fechaHora`,`estadoDireccion`,`delegacionMunicipioDireccion`,`codigoPostalDireccion`,`coloniaDireccion`,`calleNumeroDireccion`,`descripcionDireccion`),x) n 
                        FROM Puntos JOIN ( 
                            SELECT `idViaje` , GROUP_CONCAT(`fechaHora`,`estadoDireccion`,`delegacionMunicipioDireccion`,`codigoPostalDireccion`,`coloniaDireccion`,`calleNumeroDireccion`,`descripcionDireccion`) x 
                            FROM Puntos GROUP BY idViaje) 
                            y ON y.idViaje = Puntos.idViaje
                    
                    ) Puntos ON Viajes.idViaje = Puntos.idViaje
                    GROUP BY Viajes.idViaje;";

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

 