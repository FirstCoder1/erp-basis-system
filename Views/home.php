<?php

require_once __DIR__."/../Config/Constantes.php";    //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php";        //Inclusión de archivo para Autoload de las clases

\APP\Autoload::run();                        //Arranca Autoload

?>

<header class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#"><img src="Views/Images/home.png" alt="inicio logo" height="17px"> | Inicio</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Nombre Usuario <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>

<div id="main" class="container borde-amarillo">
    test
</div>


