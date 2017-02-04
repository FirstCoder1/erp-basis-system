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
    $(".collapseDad").click( function (evt) {

        $(this).parent().removeClass('in');

    });                                                 /*Replegar al padre*/



    function irAInicio() {
        $(".container").removeClass("in");
        $("#mainDiv").addClass("in")
        $("body").removeClass("background-blanco")
        $("body").addClass("background-morado")

    }
    function cerrarSesion() {
        window.location.href = "./cerrarsesion.php";
    }





    $(".btn-agregar").click(function (evt) {
        $(this).parent().nextAll(".form-agregar").addClass("in");
        $(this).addClass("disabled");
    });

    $(".btn-cancelar").click(function (evt) {
        $(this).closest(".form-agregar").removeClass("in");
        $(this).closest(".form-agregar").prevAll(".acciones").children(".btn-agregar").removeClass("disabled");
    });






    $.extend( true, $.fn.dataTable.defaults, {
        "scrollX": true,
        "fixedColumns": true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ filas por página",
            "zeroRecords": "Sin resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin información disponible",
            "thousands":      ",",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar:",
            "paginate": {
                "first":      "Inicio",
                "last":       "Final",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activa para ordenar la comlumna ascendente",
                "sortDescending": ": activa para ordenar la comlumna descendente"
            },
            "infoFiltered": "(filtrado de _MAX_ filas totales)"
        }
    } );                   /*Valores por default de las jQuery DataTables*/




    var empleadosTabla;
    empleadosTabla = $('#empleadosTable').DataTable({
        "select": true,
        /*"dom": '<"borde-amarillo"B><l>frtip',
        "buttons": [
            {
                text: 'Agregar',
                className: 'green',
                action: function ( e, dt, node, config ) {
                    var text = this.text();
                    this.text(function(){
                            return text === "Agregar" ? "Cancelar" : "Agregar";
                    }
                    );
                },
            },{
                text: 'Editar',
                className: 'red',
                action: function ( e, dt, node, config ) {
                    alert( 'Button Editar activated' );
                },
                enabled: false
            }
        ],*/
        "columns": [
            { "data": "nombre" },
            { "data": "apPaterno" },
            { "data": "apMaterno" },
            { "data": "fechaDeNacimiento" },
            { "data": "calleNumeroDomicilio" },
            { "data": "coloniaDomicilio" },
            { "data": "delegacionMunicipioDomicilio" },
            { "data": "codigoPostalDomicilio" },
            { "data": "ciudadDomicilio" },
            { "data": "estadoDomicilio" },
            { "data": "email" },
            { "data": "telefonoLocal" },
            { "data": "telefonoMovil" },
            { "data": "curp" },
            { "data": "fechaAlta" },
            { "data": "estadoSistema" },
            { "data": "userName" }
        ]
    });                                            /*Arranca Tabla*/

    $("#empleadosIcon").click( function (evt) {
        $("#mainDiv").removeClass("in");
        $("#empleadosDiv").addClass("in");
        $("body").removeClass("background-morado")
        $("body").addClass("background-blanco")

        $.ajax({
            url     : "./Controllers/baseController.php",
            type    : 'POST',
            dataType: 'json',
            data    : {
                action: "empleadosTodos"
            }
        }).done(function (data) {

            console.log(data);


            if (data.success) {

                console.log(data.empleadosTodos);

                empleadosTabla.rows.add(data.empleadosTodos).draw();



            } else {

                $("#errorEmpleadosMensaje").html(data.error);
                $("#errorEmpleados").addClass('in');

            }
        });


    })













    $("#clientesIcon").click( function (evt) {
        $("#mainDiv").removeClass("in");
        $("#clientesDiv").addClass("in");
    })

});