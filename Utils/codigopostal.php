<?php


$lugar = "San Francisco de los Romo";



$cadena = "<select name=\"codigos\">
<option value=\"20300\">San Francisco de los Romos Centro</option>
<option value=\"20300\">Campestre San Carlos</option>
<option value=\"20300\">Panamericano</option>
<option value=\"20303\">Hidalgo</option>
<option value=\"20303\">San Juan Bautista</option>
<option value=\"20303\">San Pablo</option>
<option value=\"20303\">La Margarita</option>
<option value=\"20303\">San Francisco</option>
<option value=\"20303\">La Sociedad San Juan</option>
<option value=\"20303\">La Guadalupana</option>
<option value=\"20303\">Revolución</option>
<option value=\"20303\">San José Buenavista</option>
<option value=\"20303\">Viñedos San José</option>
<option value=\"20303\">El Tirón</option>
<option value=\"20303\">La Aurora</option>
<option value=\"20303\">La Perla</option>
<option value=\"20303\">Los Cedros</option>
<option value=\"20303\">María</option>
<option value=\"20303\">Santa Isabel</option>
<option value=\"20303\">Cerrada San Francisco</option>
<option value=\"20304\">Fracción de La Trinidad II</option>
<option value=\"20304\">San Juan</option>
<option value=\"20304\">La Escondida</option>
<option value=\"20304\">Santa Bárbara</option>
<option value=\"20304\">San José del Barranco</option>
<option value=\"20304\">Parque Industrial San Francisco</option>
<option value=\"20304\">Mary</option>
<option value=\"20304\">Monserrat</option>
<option value=\"20304\">28 de Abril</option>
<option value=\"20304\">Rancho Santa Fe</option>
<option value=\"20304\">El Cardonal</option>
<option value=\"20304\">El Chamizal</option>
<option value=\"20304\">Villa de Guadalupe</option>
<option value=\"20305\">Las Carmelitas</option>
<option value=\"20305\">San Angel</option>
<option value=\"20305\">Viñedos Xoconoxtle</option>
<option value=\"20305\">Los Sabinos</option>
<option value=\"20305\">San Cristóbal</option>
<option value=\"20305\">Zacatenco</option>
<option value=\"20305\">Santa Elena</option>
<option value=\"20305\">Viñedos los Zapata</option>
<option value=\"20305\">Alfredo Soriano Lopez</option>
<option value=\"20305\">El Cortijo</option>
<option value=\"20305\">La Paz</option>
<option value=\"20305\">La Unión</option>
<option value=\"20305\">San Pedro Victoria de Arriba</option>
<option value=\"20305\">El Refugio</option>
<option value=\"20305\">Elena</option>
<option value=\"20305\">La Trinidad</option>
<option value=\"20305\">Los Gonzalez</option>
<option value=\"20305\">San Pedro Victoria de Abajo</option>
<option value=\"20305\">La Concepción</option>
<option value=\"20305\">La Gloria</option>
<option value=\"20305\">La Providencia</option>
<option value=\"20305\">El Barranco</option>
<option value=\"20305\">El Espíritu</option>
<option value=\"20305\">El Gigante</option>
<option value=\"20305\">Los Lirios</option>
<option value=\"20305\">Santa Anita</option>
<option value=\"20350\">Loretito</option>
<option value=\"20350\">Medio Kilo</option>
<option value=\"20350\">La Biznaga</option>
<option value=\"20350\">Macario J Gómez</option>
<option value=\"20350\">Rancho Seco</option>
<option value=\"20353\">La Providencia 1</option>
<option value=\"20355\">San Ramon</option>
<option value=\"20355\">La Guayana</option>
<option value=\"20355\">Urbi Villa del Vergel</option>
<option value=\"20355\">Enriqueta</option>
<option value=\"20355\">Paseos de La Providencia</option>
<option value=\"20355\">Viñedos River</option>
<option value=\"20356\">Chicalote</option>
<option value=\"20356\">Ramon Romo</option>
<option value=\"20356\">Borrotes</option>
<option value=\"20357\">Amapolas del Rio</option>
<option value=\"20357\">Rancho Nuevo 2</option>
<option value=\"20357\">El Tepetate</option>
<option value=\"20357\">Rancho Nuevo</option>
<option value=\"20357\">Ojo de Agua del Mezquite</option>
<option value=\"20358\">La Ribera</option>
<option value=\"20358\">Ex Viñedos de Guadalupe</option>
<option value=\"20358\">Puertecito de La Virgen</option>
<option value=\"20358\">Sendero de los Quetzales</option>
<option value=\"20358\">La Casita</option>
<option value=\"20358\">Valle de Aguascalientes</option>
<option value=\"20358\">Villas de San Felipe</option>
</select>";

$cadena = str_replace("<select name=\"codigos\">\n", "" , $cadena);
$cadena = str_replace("</select>", "" , $cadena);
$cadena = str_replace("<option value=\"", "_" , $cadena);
$cadena = str_replace("\">", "_" , $cadena);
$cadena = str_replace("</option>\n", "" , $cadena);
$cadena = str_replace("</option>", "" , $cadena);

$cadena = explode("_",$cadena);








$salida = "else if ($(this).find(\":selected\").val() == \"".$lugar."\"){
            $(this).closest(\".form-group-sm\").next().find(\"select\").html('' +
                '<option value=\"\">Selecciona uno</option>'+
                ";

for ($i = 1 ; $i<count($cadena); $i += 2){
    $salida .= "'<option value=\"".$cadena[$i]." - ".$cadena[$i+1]."\">".$cadena[$i]." - ".$cadena[$i+1]."</option>'+\n\t\t";
}

$salida = substr($salida, 0, -4).");
        }";

echo "<xmp>".$salida."</xmp>";

?>