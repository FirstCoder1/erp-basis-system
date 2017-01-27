<?php

    require_once __DIR__."/Config/Constantes.php";                    //Inclusión de las constantes y funciones globales
    require_once __DIR__."/Autoload.php";                             //Inclusión de archivo para Autoload de las clases
    \APP\Autoload::run();                                             //Arranca Autoload

    \APP\Utils\Sesion::checkOnInicio();

    use APP\Models\Empleado;

    $miEmpleado = new Empleado();                                                                    /*Cargar empleado*/
    $miEmpleado->set("idEmpleado",$_SESSION["idEmpleado"]);
    $empleados = $miEmpleado->buscar();
    $miEmpleado = $empleados[0];

?>

<!DOCTYPE html>
<html>
<head>																							   <!--Unico head-->
    <meta charset="UTF-8">
    <meta name="description" content="descripcion">
    <meta name="keywords" content="keywords">
    <meta name="author" content="Oscar Camacho Urriolagoitia">
    <title><?php echo APPNAME ?> - Inicio </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="./Views/Style/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./Views/Style/main.css">	                                <!--Mi hoja de estilo-->


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"	                  <!--Librerias jQuery y Boostrap-->
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>																						            <!-- head-->

<body class="background-morado color-blanco">

    <div id="headerDiv" class="navbar-inverse navbar-fixed-top">			             <!--Contendor Header-->
        <div class="container-fluid">
            <ul class="nav navbar-nav">                                                    <!--Parte izquierda header-->
                <li class="active">
                    <a class="irAInicio btn-lg" href="#">
                        <span class="glyphicon glyphicon-home"></span> | Inicio
                    </a>
                </li>
            </ul>                                                 <!--Parte izquierda header-->
            <ul class="nav navbar-nav navbar-right">                                         <!--Parte derecha header-->
                <li class="dropdown">
                    <a class="dropdown-toggle btn-lg" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <?=$miEmpleado->get("nombre")." ".$miEmpleado->get("apPaterno")?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu darkerBgOnHoverDropdown-menu">
                        <li>
                            <a href="#" class="cerrarSesion">Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>                                      <!--Parte derecha header-->
        </div>
    </div>    		                    <!--Contenedor Header-->


    <div id="mainDiv" class="container"> 								                          <!--Contenedor Main-->
        <div class="row ">


            <div class="col-xs-6 col-sm-2 modulo">                                               <!--Modulo Empleados-->

                <div id="empleadosIcon" class="modulo-icon">
                    <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                </div>
                <div class="modulo-nombre">
                    Empleados
                </div>

            </div>                                            <!--Modulo Empleados-->

            <div class="col-xs-6 col-sm-2 modulo">                                               <!--Modulo Clientes-->

                <div id="clientesIcon" class="modulo-icon">
                    <i class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
                </div>
                <div class="modulo-nombre">
                    Clientes
                </div>

            </div>                                             <!--Modulo Clientes-->

            <div class="col-xs-6 col-sm-2 modulo">                                                  <!--Modulo Viajes-->

                <div id="viajesIcon" class="modulo-icon">
                    <i class="fa fa-suitcase fa-3x" aria-hidden="true"></i>                </div>
                <div class="modulo-nombre">
                    Viajes
                </div>

            </div>                                               <!--Modulo Viajes-->

            <div class="col-xs-6 col-sm-2 modulo">                                            <!--Modulo Cotizaciones-->

                <div id="cotizacionesIcon" class="modulo-icon">
                    <i class="fa fa-map-signs fa-3x" aria-hidden="true"></i>
                </div>
                <div class="modulo-nombre">
                    Cotizaciones
                </div>

            </div>                                         <!--Modulo Cotizaciones-->

            <div class="col-xs-6 col-sm-2 modulo">                                                  <!--Modulo Ventas-->

                <div id="ventasIcon" class="modulo-icon">
                    <i class="fa fa-money fa-3x" aria-hidden="true"></i>
                </div>
                <div class="modulo-nombre">
                    Ventas
                </div>

            </div>                                               <!--Modulo Ventas-->

            <div class="col-xs-6 col-sm-2 modulo">                                               <!--Modulo Registros-->

                <div id="registrosIcon" class="modulo-icon">
                    <i class="fa fa-hdd-o fa-3x" aria-hidden="true"></i>
                </div>
                <div class="modulo-nombre">
                    Registros
                </div>

            </div>                                            <!--Modulo Registros-->

            <div class="col-xs-6 col-sm-2 modulo">                                                <!--Modulo Unidades-->

                <div id="unidadesIcon" class="modulo-icon">
                    <i class="fa fa-bus fa-3x" aria-hidden="true"></i>
                </div>
                <div class="modulo-nombre">
                    Unidades
                </div>

            </div>                                             <!--Modulo Unidades-->

            <div class="col-xs-6 col-sm-2 modulo">                                                <!--Modulo Choferes-->

                <div id="choferesIcon" class="modulo-icon">
                    <i class="fa fa-tachometer fa-3x" aria-hidden="true"></i>
                </div>
                <div class="modulo-nombre">
                    Choferes
                </div>

            </div>                                            <!--Modulo Choferes-->

            <div class="col-xs-6 col-sm-2 modulo">                                            <!--Modulo Propietarios-->

                <div id="propietariosIcon" class="modulo-icon">
                    <i class="fa fa-star fa-3x" aria-hidden="true"></i>
                </div>
                <div class="modulo-nombre">
                    Propietarios
                </div>

            </div>                                        <!--Modulo Propietarios-->


        </div>

    </div>                                                       <!--Contenedor Main-->

<script src="./Views/Js/inicio.js"></script>

</body>

</html>

<!--
COMENTARIOS GENERALES:
-->














