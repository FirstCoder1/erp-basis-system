<?php namespace APP;

require_once __DIR__."/Utils/Log.php";

use App\Utils\Log;

class Autoload
{

    public static function run()
    {
        spl_autoload_register(function ($class) {
            $class    = str_replace("APP\\", "", $class);
            $class    = str_replace("\\", DIRECTORY_SEPARATOR, $class).".php";
            $filePath = __DIR__.DIRECTORY_SEPARATOR.$class;

            Log::error($filePath);

            if (file_exists($filePath) && is_readable($filePath)) {
                require_once $filePath;
                Log::error("SI SI SI se encuentra :: ".$class);
            } else {
                Log::error("NO se encuentra :: ".$class);

                throw new \RuntimeException('Class not found!! '.$class);
            }
        });
    }

}