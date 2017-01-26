<?php namespace APP\Utils;


class Sesion
{
    public static function checkOnIndex()
    {
        session_start();						//Manejo de sesiones
        if (isset($_SESSION["idEmpleado"])){
            if(isset($_SESSION['timelast']) &&  $_SESSION['timelast'] + SESSIONTIMEOUT * 60 < time()){
                session_destroy();
            }else{
                echo "<script type='text/javascript'>window.top.location.href = \"./inicio.php\";</script>";
            }
        }

    }

}