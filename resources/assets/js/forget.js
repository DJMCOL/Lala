$('.forgetPassword').on('click',function () {
    forgetPassword('token');
});

function forgetPassword(token) {
    campo =  $('#user_login').val();
    if(!validarEmail($('#user_login').val())){
        swal({
            text: "Escriba un correo electrónico valido",
            icon: imageURL_2,
            button: "OK!",
        });
        $('#user_login').addClass('error');
        return false;
    }

    $('#user_login').removeClass('error');
    $('#user_login').val();

    swal({
        text: "Espere un momento",
        icon: imageURL_2,
        button: false,
        closeOnClickOutside: false,
    });
    $.ajax({
        url: https + "/forgetPassword",
        method: "POST",
        data: {data:campo,token:token,action:'forgetPassword'},
        success: function (data) {
            if ($.trim(data) == "1") {
                swal({
                    text: "Recibira una notificacion a su correo \n electrónico para recuperar su contraseña",
                    icon: imageURL_2,
                    button: "OK!",
                });
            }else if($.trim(data) == "2"){
                swal({
                    text: "Este usuario no se encuentra registrado",
                    icon: imageURL_2,
                    button: "OK!",
                });
            } else {
                swal({
                    text: "Error, hubo problemas",
                    icon: "warning",
                    button: "OK!",
                });
            }

        }
    });
}
function validarEmail(valor) {
    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(valor)){
        return true;
    } else {
        return false;
    }
}
