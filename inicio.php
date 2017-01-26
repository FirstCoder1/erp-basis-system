<?php

require_once __DIR__."/../Config/Constantes.php";    //Inclusión de las constantes y funciones globales
require_once __DIR__."/../Autoload.php";        //Inclusión de archivo para Autoload de las clases

\APP\Autoload::run();                        //Arranca Autoload

?>

<header id="headerDiv" class="navbar navbar-inverse navbar-fixed-top">			 <!--Contendor Header-->
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="#">
                    <span class="glyphicon glyphicon-home"></span> | Inicio
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-user"></span> Nombre Usuario <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">Cerrar sesión</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>    		            <!--Contenedor Header-->

<div id="mainDiv" class="container borde-amarillo"> 								              <!--Contenedor Main-->
    test
</div>                                            <!--Contenedor Main-->


