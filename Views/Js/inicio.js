$(document).ready(function () {

    $(".irAInicio").click( function (evt) {
        irAInicio();
    });                                                       /*Ir al inicio*/

    $(".cerrarSesion").click( function (evt) {
        cerrarSesion();
    });                                                   /*Cerrar sesion*/

    $(".fadeDadOut").click( function (evt) {

        $(this).parent().removeClass('in');
        $(this).parent().addClass('out');

    });                                                 /*Replegar al padre*/
    
    function irAInicio() {
        alert("Ir al inicio.");
    }
    
    function cerrarSesion() {
        alert("Cerrar sesión..");
    }

});