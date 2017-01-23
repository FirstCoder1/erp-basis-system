<?php namespace APP\Utils;


class Sesion
{
    public static function checkOnIndex()
    {
        session_start();						//Revisar si hay un sesión activa actualmente
        if (isset($_SESSION["idEmpleado"])){
            if(isset($_SESSION['timelast']) &&  $_SESSION['timelast'] + SESSIONTIMEOUT * 60 < time()){
                session_destroy();
                echo "<script type='text/javascript'>window.top.location.href = \"./index.php\";</script>";
                //Redireciona si no hay sesión activa
            }
            //echo "<script type='text/javascript'>window.top.location.href = \"./home.php\";</script>";
            //Redireciona si hay sesión activa
        }
    }

    public static function checkOnHome()
    {

        session_start();						//Revisar si hay una sesión activa actualemnte
        if (!isset($_SESSION["idEmpleado"])){
            echo "<script type='text/javascript'>window.top.location.href = \"./index.php\";</script>";
            //Redireciona si no hay sesión activa
        }elseif ($_SESSION['timelast'] + SESSIONTIMEOUT * 60 < time()) {	//Revisa que no haya pasado mas de 30min
            session_destroy();
            echo "<script type='text/javascript'>window.top.location.href = \"./index.php\";</script>";
            //Redireciona si no hay sesión activa
        }else{
            $_SESSION["timelast"] = time();		//Actualiza la hora del ultimo movimiento
        }

    }

    public static function checkOnModulo(){
        session_start();						//Revisar si hay un sesión activa actualemnte
        if (!isset($_SESSION["idEmpleado"])){
            echo "<script type='text/javascript'>window.top.location.href = \"../index.php\";</script>";
            //Redireciona si no hay sesión activa
        }elseif ($_SESSION['timelast'] + SESSIONTIMEOUT * 60 < time()) {
            //Revisa que no haya pasado mas de 30min
            session_destroy();
            echo "<script type='text/javascript'>window.top.location.href = \"../index.php\";</script>";
        }else{
            $_SESSION["timelast"] = time();		//Actualiza la hora del ultimo movimiento
        }
    }
}