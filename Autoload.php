<?php namespace APP; 

	class Autoload{

		public static function run(){
			spl_autoload_register(function($class){
				$ruta = str_replace("APP\\", "", $class);
				$ruta = str_replace("\\", "/", $ruta) .".php";

				if (is_file($ruta)){
					require_once $ruta;
					file_put_contents('php://stderr', print_r(date("h:i:sa")."SI SI SI se encuentra :: ".$ruta, TRUE));
				}else{

					//$ruta = $ruta;

					require_once $ruta;

					file_put_contents('php://stderr', print_r(date("h:i:sa")."NO se encuentra :: ".$ruta, TRUE));
				}
			});
		}

	}

 ?>