$(document).ready(function () {

    $("#loginForm").submit(function (evt) {                                                       /*Accion Boton Login*/
        evt.preventDefault();
        $.ajax({                                                                       /*Se envia peticion*/
            url     : "./Controllers/baseController.php",
            type    : 'POST',
            dataType: 'json',
            data    : {
                action: "empleadoLogin",
                userName: $("#loginFormUserName").val(),
                password: $("#loginFormPassword").val()
            }
        }).done(function (data) {            /*Se recibe respuesta*/

            console.log(data); //TODO
            if (data.success) {

                window.top.location.href = "./inicio.php";

            } else {						                                        //En caso de error, mensaje de error
                $("#errorLoginMensaje").html(data.error);
                $("#errorLogin").removeClass('out');                  //carga varias vece el main, lo agrega mas de una vez (uns funcion que solo se llame una vez) //TODO
                $("#errorLogin").addClass('in');
            }
        });
        return false;
    });

    $(".fadeDadOut").click( function (evt) {

        $(this).parent().removeClass('in');
        $(this).parent().addClass('out');

    });

});