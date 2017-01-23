<?php namespace APP\Utils;

class Sanitize
{

    public static function sanitizeInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

}

/*
COMENTARIOS GENERALES:

*/