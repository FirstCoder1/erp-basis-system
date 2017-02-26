<?php

    require_once __DIR__."/Config/Constantes.php";                    //Inclusión de las constantes y funciones globales
    require_once __DIR__."/Autoload.php";                             //Inclusión de archivo para Autoload de las clases
    \APP\Autoload::run();                                             //Arranca Autoload

    \APP\Utils\Sesion::checkOnInicio();

    use APP\Models\Empleado;

    $miEmpleado = new Empleado();                                                                    /*Cargar empleado*/
    $miEmpleado->set("idEmpleado",$_SESSION["idEmpleado"]);
    $empleados = $miEmpleado->buscarClase();
    $miEmpleado = $empleados[0];

?>

<!DOCTYPE html>
<html>
<head>																							            <!-- head-->
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/b-1.2.4/se-1.2.0/datatables.min.css"/>



    <link rel="stylesheet" href="./Views/Style/main.css">	                                    <!--Mi hoja de estilo-->



    <script src="https://code.jquery.com/jquery-3.1.1.min.js"	                      <!--Librerias jQuery y Boostrap-->
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/b-1.2.4/se-1.2.0/datatables.min.js"></script>
    <script src="./Views/Js/jquery-dateFormat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

</head>																						            <!-- head-->

<body class="background-morado color-blanco paddingBotom50">

    <nav id="headerDiv" class="navbar-inverse navbar-fixed-top">			                     <!--Contendor Header-->
        <div class="container-fluid">
            <ul class="nav navbar-nav">                                                    <!--Parte izquierda header-->
                <li class="active">
                    <a class="irAInicio fa-lg" href="#">
                        <span class="glyphicon glyphicon-home"></span> Inicio
                    </a>
                </li>
            </ul>                                                <!--Parte izquierda header-->
            <ul class="nav navbar-nav navbar-right">                                         <!--Parte derecha header-->
                <li class="dropdown">
                    <a class="dropdown-toggle fa-lg" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <?=$miEmpleado->get("nombre")." ".$miEmpleado->get("apPaterno")?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu darkerBgOnHoverDropdown-menu">
                        <li>
                            <a href="https://www.google.com.mx/maps/" target="_blank">Google Maps</a>
                        </li>
                        <li>
                            <a href="#" class="cerrarSesion">Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>                                      <!--Parte derecha header-->
        </div>
    </nav>    		                    <!--Contenedor Header-->


    <div id="divMain" class="container collapse in"> 								              <!--Contenedor Main-->


        <div class="col-xs-6 col-sm-2 acceso">                                               <!--Modulo Empleados-->

            <div class="acceso-icon empleadosIcon" nombre="Empleados">
                <i class="fa fa-users fa-3x" aria-hidden="true"></i>
            </div>
            <div class="acceso-nombre">
                Empleados
            </div>

        </div>                                            <!--Acceso Empleados-->

        <div class="col-xs-6 col-sm-2 acceso">                                               <!--Acceso Contraseñas-->

            <div class="acceso-icon contraseñasIcon" nombre="Contraseñas">
                <i class="fa fa-key fa-3x" aria-hidden="true"></i>
            </div>
            <div class="acceso-nombre">
                Contraseñas
            </div>

        </div>                                             <!--Acceso Contraseñas-->

        <div class="col-xs-6 col-sm-2 acceso">                                               <!--Acceso Clientes-->

            <div class="acceso-icon clientesIcon" nombre="Clientes">
                <i class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
            </div>
            <div class="acceso-nombre">
                Clientes
            </div>

        </div>                                             <!--Acceso Clientes-->

        <div class="col-xs-6 col-sm-2 acceso">                                                  <!--Acceso Viajes-->

            <div class="acceso-icon viajesIcon" nombre="Viajes">
                <i class="fa fa-suitcase fa-3x" aria-hidden="true"></i>                </div>
            <div class="acceso-nombre">
                Viajes
            </div>

        </div>                                               <!--Acceso Viajes-->

        <div class="col-xs-6 col-sm-2 acceso">                                            <!--Acceso Cotizaciones-->

            <div class="acceso-icon cotizacionesIcon" nombre="Cotizaciones">
                <i class="fa fa-map-signs fa-3x" aria-hidden="true"></i>
            </div>
            <div class="acceso-nombre">
                Cotizaciones
            </div>

        </div>                                         <!--Acceso Cotizaciones-->

        <div class="col-xs-6 col-sm-2 acceso">                                                  <!--Acceso Ventas-->

            <div class="acceso-icon ventasIcon" nombre="Ventas">
                <i class="fa fa-money fa-3x" aria-hidden="true"></i>
            </div>
            <div class="acceso-nombre">
                Ventas
            </div>

        </div>                                               <!--Acceso Ventas-->

        <div class="col-xs-6 col-sm-2 acceso">                                               <!--Acceso Registros-->

            <div class="acceso-icon registrosIcon" nombre="Registros">
                <i class="fa fa-hdd-o fa-3x" aria-hidden="true"></i>
            </div>
            <div class="acceso-nombre">
                Registros
            </div>

        </div>                                            <!--Acceso Registros-->

        <div class="col-xs-6 col-sm-2 acceso">                                                <!--Acceso Unidades-->

            <div class="acceso-icon unidadesIcon" nombre="Unidades">
                <i class="fa fa-bus fa-3x" aria-hidden="true"></i>
            </div>
            <div class="acceso-nombre">
                Unidades
            </div>

        </div>                                             <!--Acceso Unidades-->

        <div class="col-xs-6 col-sm-2 acceso">                                                <!--Acceso Choferes-->

            <div class="acceso-icon choferesIcon" nombre="Choferes">
                <i class="fa fa-tachometer fa-3x" aria-hidden="true"></i>
            </div>
            <div class="acceso-nombre">
                Choferes
            </div>

        </div>                                             <!--Acceso Choferes-->

        <div class="col-xs-6 col-sm-2 acceso">                                            <!--Acceso Propietarios-->

            <div class="acceso-icon propietariosIcon" nombre="Propietarios">
                <i class="fa fa-star fa-3x" aria-hidden="true"></i>
            </div>
            <div class="acceso-nombre">
                Propietarios
            </div>

        </div>                                         <!--Acceso Propietarios-->


    </div>                                           <!--Contenedor Main-->





    <div id="divEmpleados" class="container collapse"> 				                         <!--Contenedor Empleados-->

        <div class="col-xs-12 col-sm-12 paddingCero">                                            <!--Modulo Empleados-->

            <div class="divModuloEncabezado">
                <div class="modulo-icon empleadosIcon">
                    <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                </div>
                <h2 class="floatLeft margen-izquierda15">Empleados</h2>
            </div>

            <div class="divModuloMain">

                <div class="alert alert-danger alert-dismissable collapse margen-arriba15 text-left">
                    <a class="close collapseDad">×</a>
                    <span class="alertMensaje"></span>
                </div>

                <div class="col-sm-12 acciones margen-abajo15">
                    <button type="button" class="btn-agregar btn btn-default btn-md ">Agregar Nuevo</button>
                    <button id="empleadoEditar" type="button" class="btn-editar btn-needStelect btn btn-default btn-md" disabled>Editar</button>
                </div>

                <div class="divMainForm collapse margen-abajo30">
                    <form class="form-horizontal mainFormDiv" autocomplete="off" accion="">

                        <div class="form-group-sm collapse">
                            <label class="control-label col-sm-3">ID:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control idEmpleado"
                                       placeholder="XX"
                                       maxlength="35"
                                       title="Id, no modificable por el usuario."
                                >
                            </div>
                        </div>                                        <!--idEmpelado-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">*Nombre:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control nombre"
                                       placeholder="Xxxxx"
                                       maxlength="35"
                                       pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*"
                                       title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. "
                                       autofocus
                                       required
                                >
                            </div>
                        </div>                                                     <!--nombre-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3" >*Apellido Paterno:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control apPaterno"
                                       placeholder="Yyyyy"
                                       maxlength="35"
                                       pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*"
                                       title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. "
                                       required
                                >
                            </div>
                        </div>                                                  <!--apPaterno-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3" >Apellido Materno:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control apMaterno"
                                       placeholder="Zzzzz"
                                       maxlength="35"
                                       pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*"
                                       title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " >
                            </div>
                        </div>                                                  <!--apMaterno-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Fecha de Nacimiento:</label>
                            <div class="col-sm-7">
                                <input type="date"
                                       class="form-control fechaDeNacimiento">
                            </div>
                        </div>                                          <!--fechaDeNacimiento-->

                        <!--Estado, Delegación municipio, codigo postal, colonia deben de estar juntos y en ese orden para funcionar.-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Estado:</label>
                            <div class="col-sm-7">
                                <!–– Dropdown estados de México ––>
                                <select class="form-control direccionSelectEstado estadoDomicilio">
                                    <option value="">Selecciona uno</option>
                                    <option value="Distrito Federal">Distrito Federal</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="México">México</option>
                                    <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>
                        </div>                                            <!--estadoDomicilio-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Delegación o Municipio:</label>
                            <div class="col-sm-7">
                                <select class="form-control direccionSelectDelegacionMunicipio delegacionMunicipioDomicilio" >
                                    <option value="">Primero selecciona un estado</option>
                                </select>
                            </div>
                        </div>                               <!--delegacionMunicipioDomicilio-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Código Postal:</label>
                            <div class="col-sm-7">
                                <select class="form-control direccionSelectCodigoPostal codigoPostalDomicilio">
                                    <option value="">Primero selecciona una delegación o municipio</option>
                                </select>
                            </div>
                        </div>                                      <!--codigoPostalDomicilio-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Colonia:</label>
                            <div class="col-sm-7">
                                <select class="form-control coloniaDomicilio">
                                    <option value="">Primero selecciona un codigo postal</option>
                                </select>
                            </div>
                        </div>                                           <!--coloniaDomicilio-->

                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Calle y número:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control calleNumeroDomicilio"
                                       placeholder="Xxxxx YYY"
                                       maxlength="70"
                                       pattern="[a-zA-Z0-9- ñáéíóú]{5,70}"
                                       title="Solo letras,espacios y números (no signos), 5 - 70 caracteres.">
                            </div>
                        </div>                                       <!--calleNumeroDomicilio-->

                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Email:</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control email" placeholder="xxxxx@yyyyy.zzz" maxlength="128">
                            </div>
                        </div>                                                      <!--email-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Teléfono Local:</label>
                            <div class="col-sm-7">
                                <input type="tel"
                                       class="form-control telefonoLocal"
                                       placeholder="XXXXXXXX"
                                       maxlength="32"
                                       pattern="[0-9]{8,32}"
                                       title="Solo números, sin espacios, 8 - 32 caracteres.">
                            </div>
                        </div>                                              <!--telefonoLocal-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Teléfono Movil:</label>
                            <div class="col-sm-7">
                                <input type="tel"
                                       class="form-control telefonoMovil"
                                       placeholder="XXXXXXXX" maxlength="32"
                                       pattern="[0-9]{8,32}" title="Solo números, sin espacios, 8 - 32 caracteres.">
                            </div>
                        </div>                                              <!--telefonoMovil-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">CURP:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control curp"
                                       placeholder="XXXXXXXXXXXXXXXXXX"
                                       maxlength="18"
                                       pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"
                                       title="Solo letras y números (no signos), 18 caracteres."
                                       >
                            </div>
                        </div>                                                       <!--curp-->

                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Estado en el Sistema:</label>
                            <div class="col-sm-7">
                                <select class="form-control estadoSistema">
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
                                </select>
                            </div>
                        </div>                                              <!--estadoSistema-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">*Nombre de usuario:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control userName"
                                       placeholder="xxxxx"
                                       maxlength="45"
                                       pattern="[a-zA-Z0-9-]{5,45}"
                                       title="Solo letras y números (no signos), 5 - 45 caracteres."
                                       required
                                >
                            </div>
                        </div>                                                   <!--userName-->

                        <div class="col-sm-12 margen-arriba15 margen-abajo15">
                            <button type="reset" class="btn btn-danger btn-cancelar">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </form>
                </div>

                <table class="display nowrap compact table-bordered mainTableDiv" cellspacing="0" width="100%" controller="empleadosTodos">
                    <thead>
                        <tr>
                            <th rowspan="2">Nombre</th>
                            <th colspan="2">Apellido</th>
                            <th rowspan="2">Fecha nacimiento</th>
                            <th colspan="5">Dirección</th>
                            <th rowspan="2">Email</th>
                            <th colspan="2">Teléfono</th>
                            <th rowspan="2">CURP</th>
                            <th colspan="3">Sistema</th>
                        </tr>
                        <tr>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>Calle y número</th>
                            <th>Delegación</th>
                            <th>C.P.</th>
                            <th>Colonia</th>
                            <th>Estado</th>
                            <th>Local</th>
                            <th>Movil</th>
                            <th>Alta</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>

        </div>                                  <!--Modulo Empleados-->


    </div>                                    <!--Contenedor Empleados-->

    <div id="divContraseñas" class="container collapse"> 				                   <!--Contenedor Contraseñas-->

        <div class="col-xs-12 col-sm-12 paddingCero">                                          <!--Modulo Contraseñas-->

            <div class="divModuloEncabezado">
                <div class="modulo-icon contraseñasIcon">
                    <i class="fa fa-key fa-3x" aria-hidden="true"></i>
                </div>
                <h2 class="floatLeft margen-izquierda15">Contraseñas</h2>
            </div>

            <div class="divModuloMain">

                <div class="alert alert-danger alert-dismissable collapse margen-arriba15 text-left">
                    <a class="close collapseDad">×</a>
                    <span class="alertMensaje"></span>
                </div>

                <div class="col-sm-12 acciones margen-abajo15">
                    <button id="contraseñaEditar" type="button" class="btn-editar btn-needStelect btn btn-default btn-md" disabled>Asignar contraseña</button>
                </div>


                <div class="divMainForm collapse margen-abajo30">
                    <form class="form-horizontal" autocomplete="off">

                        <div class="form-group-sm collapse">
                            <label class="control-label col-sm-3">ID:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control idEmpleado"
                                       placeholder="XX"
                                       maxlength="35"
                                       title="Id, no modificable por el usuario."
                                >
                            </div>
                        </div>
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Nombre completo:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control nombre"
                                       placeholder="Nombre completo"
                                       maxlength="35"
                                       pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*"
                                       title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. "
                                       disabled
                                >
                            </div>
                        </div>
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3" >*Nueva contraseña:</label>
                            <div class="col-sm-7">
                                <input type="password"
                                       id="loginFormPassword"
                                       class="form-control password"
                                       placeholder="Nueva contraseña"
                                       maxlength="45"
                                       pattern="[a-zA-Z0-9-]{5,45}"
                                       title="Solo letras y números (no signos), 5 - 45 caracteres."
                                       required>
                            </div>
                        </div>

                        <div class="col-sm-12 margen-arriba15 margen-abajo15">
                            <button type="reset" class="btn btn-danger btn-cancelar">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </form>
                </div>

                <table class="display nowrap compact table-bordered mainTableDiv" cellspacing="0" width="100%" controller="empleadosTodos">
                    <thead>
                        <tr>
                            <th rowspan="2">Nombre</th>
                            <th colspan="2">Apellido</th>
                            <th rowspan="2">Fecha nacimiento</th>
                            <th colspan="5">Dirección</th>
                            <th rowspan="2">Email</th>
                            <th colspan="2">Teléfono</th>
                            <th rowspan="2">CURP</th>
                            <th colspan="3">Sistema</th>
                        </tr>
                        <tr>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>Calle y número</th>
                            <th>Delegación</th>
                            <th>C.P.</th>
                            <th>Colonia</th>
                            <th>Estado</th>
                            <th>Local</th>
                            <th>Movil</th>
                            <th>Alta</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>                                  <!--Modulo Contraseñas-->


    </div>                                <!--Contenedor Contraseñas-->

    <div id="divClientes" class="container collapse"> 				                         <!--Contenedor Clientes-->

        <div class="col-xs-12 col-sm-12 paddingCero">                                            <!--Modulo Clientes-->

            <div class="divModuloEncabezado">
                <div class="modulo-icon clientesIcon">
                    <i class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
                </div>
                <h2 class="floatLeft margen-izquierda15">Clientes</h2>
            </div>

            <div class="divModuloMain">
                <div class="alert alert-danger alert-dismissable collapse margen-arriba15 text-left">
                    <a class="close collapseDad">×</a>
                    <span class="alertMensaje"></span>
                </div>

                <div class="col-sm-12 acciones margen-abajo15">
                    <button type="button" class="btn-agregar btn btn-default btn-md ">Agregar Nuevo</button>
                    <button id="clienteEditar" type="button" class="btn-editar btn-needStelect btn btn-default btn-md" disabled>Editar</button>
                </div>

                <div class="divMainForm collapse margen-abajo30">
                    <form class="form-horizontal" autocomplete="off">

                        <div class="form-group-sm collapse">
                            <label class="control-label col-sm-3">ID:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control idCliente"
                                       placeholder="XX"
                                       maxlength="35"
                                       title="Id, no modificable por el usuario."
                                >
                            </div>
                        </div>                                         <!--idCliente-->                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">*Nombre:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control nombre"
                                       placeholder="Xxxxx"
                                       maxlength="35"
                                       pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*"
                                       title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. "
                                       autofocus
                                       required
                                >
                            </div>
                        </div>                                                      <!--nombre-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3" >*Apellido Paterno:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control apPaterno"
                                       placeholder="Yyyyy"
                                       maxlength="35"
                                       pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*"
                                       title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. "
                                       required
                                >
                            </div>
                        </div>                                                  <!--apPaterno-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3" >Apellido Materno:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control apMaterno"
                                       placeholder="Zzzzz"
                                       maxlength="35"
                                       pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*"
                                       title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. " >
                            </div>
                        </div>                                                  <!--apMaterno-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Teléfono Movil:</label>
                            <div class="col-sm-7">
                                <input type="tel"
                                       class="form-control telefonoMovil"
                                       placeholder="XXXXXXXX"
                                       maxlength="32"
                                       pattern="[0-9]{8,32}"
                                       title="Solo números, sin espacios, 8 - 32 caracteres.">
                            </div>
                        </div>                                              <!--telefonoMovil-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Teléfono Local:</label>
                            <div class="col-sm-7">
                                <input type="tel"
                                       class="form-control telefonoLocal"
                                       placeholder="XXXXXXXX"
                                       maxlength="32"
                                       pattern="[0-9]{8,32}" title="Solo números, sin espacios, 8 - 32 caracteres.">
                            </div>
                        </div>                                              <!--telefonoLocal-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Email:</label>
                            <div class="col-sm-7">
                                <input type="email"
                                       class="form-control email"
                                       placeholder="xxxxx@yyyyy.zzz"
                                       maxlength="128">
                            </div>
                        </div>                                                      <!--email-->

                        <!--Estado, Delegación municipio, codigo postal, colonia deben de estar juntos y en ese orden para funcionar.-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Estado:</label>
                            <div class="col-sm-7">
                                <!–– Dropdown estados de México ––>
                                <select class="form-control direccionSelectEstado estadoDomicilio">
                                    <option value="">Selecciona uno</option>
                                    <option value="Distrito Federal">Distrito Federal</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="México">México</option>
                                    <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>
                        </div>                                            <!--estadoDomicilio-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Delegación o Municipio:</label>
                            <div class="col-sm-7">
                                <select class="form-control direccionSelectDelegacionMunicipio delegacionMunicipioDomicilio" >
                                    <option value="">Primero selecciona un estado</option>
                                </select>
                            </div>
                        </div>                               <!--delegacionMunicipioDomicilio-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Código Postal:</label>
                            <div class="col-sm-7">
                                <select class="form-control direccionSelectCodigoPostal codigoPostalDomicilio">
                                    <option value="">Primero selecciona una delegación o municipio</option>
                                </select>
                            </div>
                        </div>                                      <!--codigoPostalDomicilio-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Colonia:</label>
                            <div class="col-sm-7">
                                <select class="form-control coloniaDomicilio">
                                    <option value="">Primero selecciona un codigo postal</option>
                                </select>
                            </div>
                        </div>                                           <!--coloniaDomicilio-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Calle y número:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control calleNumeroDomicilio"
                                       placeholder="Xxxxx YYY"
                                       maxlength="70"
                                       pattern="[a-zA-Z0-9- ñáéíóú]{5,70}"
                                       title="Solo letras,espacios y números (no signos), 5 - 70 caracteres.">
                            </div>
                        </div>                                       <!--calleNumeroDomicilio-->

                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">Fecha de Nacimiento:</label>
                            <div class="col-sm-7">
                                <input type="date"
                                       class="form-control fechaDeNacimiento">
                            </div>
                        </div>                                          <!--fechaDeNacimiento-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">CURP:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control curp"
                                       placeholder="XXXXXXXXXXXXXXXXXX"
                                       maxlength="18"
                                       pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"
                                       title="Solo letras y números (no signos), 18 caracteres."
                                >
                            </div>
                        </div>                                                       <!--curp-->

                        <div class="col-sm-12 margen-arriba15 margen-abajo15">
                            <button type="reset" class="btn btn-danger btn-cancelar">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </form>
                </div>

                <table class="display nowrap compact table-bordered mainTableDiv" cellspacing="0" width="100%" controller="clientesTodos">
                    <thead>
                    <tr>
                        <th rowspan="2">Nombre</th>
                        <th colspan="2">Apellido</th>
                        <th colspan="2">Teléfono</th>
                        <th rowspan="2">Email</th>
                        <th colspan="5">Dirección</th>
                        <th rowspan="2">Fecha nacimiento</th>
                        <th rowspan="2">CURP</th>
                        <th rowspan="2">Alta en sistema</th>
                    </tr>
                    <tr>
                        <th>Paterno</th>
                        <th>Materno</th>
                        <th>Movil</th>
                        <th>Local</th>
                        <th>Estado</th>
                        <th>Delegación</th>
                        <th>C.P.</th>
                        <th>Colonia</th>
                        <th>Calle y número</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>                                  <!--Modulo Clientes-->


    </div>                                    <!--Contenedor Clientes-->

    <div id="divViajes" class="container collapse"> 				                            <!--Contenedor Viajes-->

        <div class="col-xs-12 col-sm-12 paddingCero">                                               <!--Modulo Viajes-->

            <div class="divModuloEncabezado">
                <div class="modulo-icon viajesIcon">
                    <i class="fa fa-suitcase fa-3x" aria-hidden="true"></i>
                </div>
                <h2 class="floatLeft margen-izquierda15">Viajes</h2>
            </div>

            <div class="divModuloMain">

                <div class="alert alert-danger alert-dismissable collapse margen-arriba15 text-left">
                    <a class="close collapseDad">×</a>
                    <span class="alertMensaje"></span>
                </div>

                <div class="col-sm-12 acciones margen-abajo15">
                    <button type="button" class="btn-agregar btn btn-default btn-md">Agregar Nuevo</button>
                    <button type="button" class="btn-editar btn-needStelect btn btn-default btn-md" disabled>Editar</button>
                    <button type="button" class="btn-PDF btn-needStelect btn btn-default btn-md margen-izquierda15" disabled>PDF</button>
                </div>

                <div class="divMainForm collapse col-sm-12 margen-abajo30">

                    <form class="form-horizontal" autocomplete="off">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Selecciona un cliente:
                            </div>
                            <div class="panel-body">
                                <table class="display nowrap compact table-bordered" cellspacing="0" width="100%" controller="clientesTodos">
                                    <thead>
                                    <tr>
                                        <th rowspan="2">Nombre</th>
                                        <th colspan="2">Apellido</th>
                                        <th colspan="2">Teléfono</th>
                                        <th rowspan="2">Email</th>
                                        <th colspan="5">Dirección</th>
                                        <th rowspan="2">Fecha nacimiento</th>
                                        <th rowspan="2">CURP</th>
                                        <th rowspan="2">Alta en sistema</th>
                                    </tr>
                                    <tr>
                                        <th>Paterno</th>
                                        <th>Materno</th>
                                        <th>Movil</th>
                                        <th>Local</th>
                                        <th>Estado</th>
                                        <th>Delegación</th>
                                        <th>C.P.</th>
                                        <th>Colonia</th>
                                        <th>Calle y número</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group-sm collapse">
                            <label class="control-label col-sm-3">ID:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control idViaje"
                                       placeholder="XX"
                                       maxlength="35"
                                       title="Id, no modificable por el usuario."
                                       disabled
                                >
                            </div>
                        </div>                                           <!--idViaje-->
                        <div class="form-group-sm collapse">
                            <label class="control-label col-sm-3">ID Cliente:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control idCliente"
                                       placeholder="XX"
                                       maxlength="35"
                                       title="Id, no modificable por el usuario."
                                       disabled
                                >
                            </div>
                        </div>                                         <!--idCliente-->

                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">*Nombre cliente:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control nombre"
                                       placeholder="Selecciona un cliente"
                                       maxlength="35"
                                       pattern="[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]{1}[a-zñáéíóú]*([ ][A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*"
                                       title="Iniciales en mayúsculas, solo letras y espacios, no espacios al final, 2 - 35 caracteres. "
                                       autofocus
                                       disabled
                                >
                            </div>
                        </div>                                                     <!--nombre-->
                        <div class="form-group-sm">
                            <label class="control-label col-sm-3">*Destino Estado:</label>
                            <div class="col-sm-7">
                                <!–– Dropdown estados de México ––>
                                <select class="form-control destinoEstado" required>
                                            <option value="">Selecciona uno</option>
                                            <option value="Distrito Federal">Local</option>
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Baja California">Baja California</option>
                                            <option value="Baja California Sur">Baja California Sur</option>
                                            <option value="Campeche">Campeche</option>
                                            <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                            <option value="Colima">Colima</option>
                                            <option value="Chiapas">Chiapas</option>
                                            <option value="Chihuahua">Chihuahua</option>
                                            <option value="Distrito Federal">Distrito Federal</option>
                                            <option value="Durango">Durango</option>
                                            <option value="Guanajuato">Guanajuato</option>
                                            <option value="Guerrero">Guerrero</option>
                                            <option value="Hidalgo">Hidalgo</option>
                                            <option value="Jalisco">Jalisco</option>
                                            <option value="México">México</option>
                                            <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                            <option value="Morelos">Morelos</option>
                                            <option value="Nayarit">Nayarit</option>
                                            <option value="Nuevo León">Nuevo León</option>
                                            <option value="Oaxaca">Oaxaca</option>
                                            <option value="Puebla">Puebla</option>
                                            <option value="Querétaro">Querétaro</option>
                                            <option value="Quintana Roo">Quintana Roo</option>
                                            <option value="San Luis Potosí">San Luis Potosí</option>
                                            <option value="Sinaloa">Sinaloa</option>
                                            <option value="Sonora">Sonora</option>
                                            <option value="Tabasco">Tabasco</option>
                                            <option value="Tamaulipas">Tamaulipas</option>
                                            <option value="Tlaxcala">Tlaxcala</option>
                                            <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                                            <option value="Yucatán">Yucatán</option>
                                            <option value="Zacatecas">Zacatecas</option>
                                        </select>
                            </div>
                        </div>                                              <!--destinoEstado-->
                        <div class="form-group-sm clearfix">
                            <label class="control-label col-sm-3">Destino Lugar:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control destinoLugar"
                                       placeholder="Agrega un lugar"
                                       maxlength="35"
                                       pattern="[a-zA-Z0-9- ñáéíóú]{5,70}"
                                       title="Solo letras,espacios y números (no signos), 5 - 70 caracteres."
                                >
                            </div>
                        </div>                                      <!--destinoLugar-->


                        <div class="puntos">
                            <div class="panel panel-default margen-arriba15 panelPrimero">
                                <div class="panel-heading">
                                    Itinerario:
                                </div>
                                <div class="panel-body">
                                    <div class="punto">

                                        <div class="form-group-sm">
                                            <label class="control-label col-sm-3">*Fecha:</label>
                                            <div class="col-sm-7">
                                                <input type="date"
                                                       class="form-control fecha"
                                                       required>
                                            </div>
                                        </div>                                      <!--fecha-->
                                        <div class="form-group-sm">
                                            <label class="control-label col-sm-3">Hora:</label>
                                            <div class="col-sm-7">
                                                <input type="time"
                                                       class="form-control hora"
                                                       step="300"
                                                >
                                            </div>
                                        </div>                                       <!--hora-->

                                        <!--Estado, Delegación municipio, codigo postal, colonia deben de estar juntos y en ese orden para funcionar.-->
                                        <div class="form-group-sm">
                                            <label class="control-label col-sm-3">Estado:</label>
                                            <div class="col-sm-7">
                                                <!–– Dropdown estados de México ––>
                                                <select class="form-control direccionSelectEstado estadoDireccion">
                                                    <option value="">Selecciona uno</option>
                                                    <option value="Distrito Federal">Distrito Federal</option>
                                                    <option value="Aguascalientes">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                    <option value="Campeche">Campeche</option>
                                                    <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                                    <option value="Colima">Colima</option>
                                                    <option value="Chiapas">Chiapas</option>
                                                    <option value="Chihuahua">Chihuahua</option>
                                                    <option value="Durango">Durango</option>
                                                    <option value="Guanajuato">Guanajuato</option>
                                                    <option value="Guerrero">Guerrero</option>
                                                    <option value="Hidalgo">Hidalgo</option>
                                                    <option value="Jalisco">Jalisco</option>
                                                    <option value="México">México</option>
                                                    <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                                    <option value="Morelos">Morelos</option>
                                                    <option value="Nayarit">Nayarit</option>
                                                    <option value="Nuevo León">Nuevo León</option>
                                                    <option value="Oaxaca">Oaxaca</option>
                                                    <option value="Puebla">Puebla</option>
                                                    <option value="Querétaro">Querétaro</option>
                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                                    <option value="Sinaloa">Sinaloa</option>
                                                    <option value="Sonora">Sonora</option>
                                                    <option value="Tabasco">Tabasco</option>
                                                    <option value="Tamaulipas">Tamaulipas</option>
                                                    <option value="Tlaxcala">Tlaxcala</option>
                                                    <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                                                    <option value="Yucatán">Yucatán</option>
                                                    <option value="Zacatecas">Zacatecas</option>
                                                </select>
                                            </div>
                                        </div>                            <!--estadoDireccion-->
                                        <div class="form-group-sm">
                                            <label class="control-label col-sm-3">Delegación o Municipio:</label>
                                            <div class="col-sm-7">
                                                <select class="form-control direccionSelectDelegacionMunicipio delegacionMunicipioDireccion" >
                                                    <option value="">Primero selecciona un estado</option>
                                                </select>
                                            </div>
                                        </div>               <!--delegacionMunicipioDireccion-->
                                        <div class="form-group-sm">
                                            <label class="control-label col-sm-3">Código Postal:</label>
                                            <div class="col-sm-7">
                                                <select class="form-control direccionSelectCodigoPostal codigoPostalDireccion">
                                                    <option value="">Primero selecciona una delegación o municipio</option>
                                                </select>
                                            </div>
                                        </div>                      <!--codigoPostalDireccion-->
                                        <div class="form-group-sm">
                                            <label class="control-label col-sm-3">Colonia:</label>
                                            <div class="col-sm-7">
                                                <select class="form-control coloniaDireccion">
                                                    <option value="">Primero selecciona un codigo postal</option>
                                                </select>
                                            </div>
                                        </div>                           <!--coloniaDireccion-->
                                        <div class="form-group-sm">
                                            <label class="control-label col-sm-3">Calle y número:</label>
                                            <div class="col-sm-7">
                                                <input type="text"
                                                       class="form-control calleNumeroDireccion"
                                                       placeholder="Xxxxx YYY"
                                                       maxlength="70"
                                                       pattern="[a-zA-Z0-9- .,ñáéíóú]{5,70}"
                                                       title="Solo letras,espacios y números (no signos), 5 - 70 caracteres.">
                                            </div>
                                        </div>                       <!--calleNumeroDireccion-->

                                        <div class="form-group-sm">
                                            <label class="control-label col-sm-3">Referencia:</label>
                                            <div class="col-sm-7">
                                                <input type="text"
                                                       class="form-control descripcionDireccion"
                                                       placeholder="Detalles sobre el lugar"
                                                       maxlength="300"
                                                       pattern="{5,70}"
                                                       title=" 5 - 70 caracteres.">
                                            </div>
                                        </div>                       <!--descripcionDireccion-->


                                    </div>
                                </div>
                                <div class="panel-footer text-right">
                                    <button type="button" class="btn btn-default btn-xs agregarPunto">Agregar punto</button>
                                </div>
                            </div>
                        </div>


                        <div class="form-group-sm ">
                            <label class="control-label col-sm-3">Kilometros:</label>
                            <div class="col-sm-7">
                                <input type="text"
                                       class="form-control kilometros"
                                       placeholder="Totales del viaje"
                                       maxlength="35"
                                       pattern="[0-9]{1,70}"
                                       title="Solo números (no espscios), 1 - 70 caracteres."
                                >
                            </div>
                        </div>                                                <!--kilometros-->



                        <div class="col-sm-12 margen-arriba15 margen-abajo15">
                            <button type="submit" class="btn .btn-lg btn-block btn-success">Guardar</button>
                            <button type="reset" class="btn .btn-lg btn-block btn-danger btn-cancelar">Cancelar</button>
                        </div>

                    </form>

                </div>

                <table class="display nowrap compact table-bordered mainTableDiv" cellspacing="0" width="100%" controller="todosViajesClientesPuntos">
                    <thead>
                    <tr>
                        <th colspan="2">Viaje</th>
                        <th colspan="3">Cliente</th>
                        <th rowspan="2">Destino</th>
                        <th rowspan="2">Itinerario</th>
                        <th rowspan="2">Kilometros</th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Fecha Alta</th>
                        <th>Nombre</th>
                        <th>Paterno</th>
                        <th>Materno</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>

        </div>                                  <!--Modulo Viajes-->


    </div>                                          <!--Contenedor Viajes-->





    <script src="./Views/Js/inicio.js"></script>

</body>

</html>

<!--
COMENTARIOS GENERALES:

-->














