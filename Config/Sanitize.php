<?php namespace APP\Config; 
	
	class Sanitize{

		public static function sanitizeInput($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	} 

/*
COMENTARIOS GENERALES:

$data = mysqli_real_escape_string($data);

*/

 ?>