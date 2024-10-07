var login_go = 1,idLogin=0;
$('.btnFormLogin').click(function () {
    Login();
});
$('#user_login').keypress(function(e) {
    if(e.which == 13) {
        Login();
    }
});
$('#pass_login').keypress(function(e) {
    if(e.which == 13) {
        Login();
    }
});
var typeLogin;
function Login() {
    $('#user_login').removeClass('error');
    $('#pass_login').removeClass('error');
    var contLogin = 1;
    if ($.trim($("#user_login").val()) == "" ) {
        contLogin = 0;
        $('#user_login').addClass('error');
    }

    if ($.trim($("#pass_login").val()) == "" ) {
        contLogin = 0;
        $('#pass_login').addClass('error');
    }

    if(contLogin == 0)
    {
        return false;
    }
    campo =  $('#user_login').val();

    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(campo)) {
        $('#user_login').removeClass('error');
    } else {
        document.getElementById("user_login").focus();
        $('#user_login').addClass('error');
        return false;
    }

    var email = $('#user_login').val();
    var password = $('#pass_login').val();
    $.ajax({
        type: "post",
        url: https + "/login",
        data: {
            email: email,
            pass: password
        },
        success: function (data) {
            if ($.trim(data) == "1") {
                if(login_go_service == 4){
                    buyService(idLogin_service);
                    return false;
                }

                if(login_go == 1) {
                    location.reload();
                }else if(login_go == 2){
                    buyCourse(idLogin);
                }else if(login_go == 3){
                    buyTaller(idLogin);
                }else{
                }
            } else {
                swal({
                    text: "" + data,
                    icon: imageURL_2,
                    button: "OK!",
                });
            }
        }
    });
}

$('.buyCourseLogin').click(function () {
    idLogin = this.id;
    login_go = 2;
});
$('.buyTallerLogin').click(function () {
    idLogin = this.id;
    login_go = 3;
});

/*
$('.buyServiceLogin').click(function () {
    idLogin = this.id;
    login_go = 4;
    alert($('#hourServiceSolic').val());
});
 */

function buyCourse(id){
    swal({
        text: "Espere un momento",
        icon: imageURL_2,
        button: false,
        closeOnClickOutside: false,
    });
    $.ajax({
        url: https + "/buyCourse",
        method: "POST",
        data: {id: id, action: "buyCourse"},
        success: function (data) {
            if ($.trim(data) == "complet") {
                location.href = https + "/paypal/pay";
            } else if ($.trim(data) == "buy") {
                location.href = https + "/curso/name/"+id;
            } else {
                swal({
                    text: "Ha ocurrido un error" + data,
                    icon: imageURL_2,
                    button: "OK!",
                });
            }
        }
    });
}

function buyTaller(id) {
    swal({
        text: "Espere un momento",
        icon: imageURL_2,
        button: false,
        closeOnClickOutside: false,
    });
    $.ajax({
        url: https + "/buyTaller",
        method: "POST",
        data: {
            id: id,
            action: "buyTaller"},
        success: function (data) {
            if ($.trim(data) == "complet") {
                location.href = https + "/paypal/pay";
            } else if ($.trim(data) == "buy") {
                location.reload();
            } else if ($.trim(data) == "lleno") {
                swal({
                    text: "Este taller se encuentra con cupo lleno",
                    icon: imageURL_2,
                    button: "OK!",
                });
            } else {
                swal({
                    text: "Ha ocurrido un error" + data,
                    icon: imageURL_2,
                    button: "OK!",
                });
            }
        }
    });
}

function buyService(id) {
    swal({
        text: "Espere un momento",
        icon: imageURL_2,
        button: false,
        closeOnClickOutside: false,
    });
    $.ajax({
        url: https + "/buyService",
        method: "POST",
        data: {
            id: id,
            date: $('#dateServiceSolic').val(),
            hour: $('#hourService').val(),
            action: "buyService"
        },
        success: function (data) {
            if ($.trim(data) == "complet") {
                location.href = https + "/paypal/pay";
            } else if ($.trim(data) == "2") {
                swal({
                    text: "'No disponibilidad en la fecha",
                    icon: imageURL_2,
                    button: "OK!",
                    dangerMode: false,
                    closeOnClickOutside: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        location.reload()
                    } else {
                        location.reload()
                    }
                });
            } else if ($.trim(data) == "3") {
                swal({
                    text: "CUPO LLENO EN ESTA HORA",
                    icon: imageURL_2,
                    button: "OK!",
                    dangerMode: false,
                    closeOnClickOutside: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        location.reload()
                    } else {
                        location.reload()
                    }
                });
            } else {
                swal({
                    text: "Ha ocurrido un error" + data,
                    icon: imageURL_2,
                    button: "OK!",
                    dangerMode: false,
                    closeOnClickOutside: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        location.reload()
                    } else {
                        location.reload()
                    }
                });
            }
        }
    });
}



//*
// REGISTER CODE
// *//
var elementsForm,contLogin;

scriptAr_r = new Array();
scriptAr_r[0] = "no";
scriptAr_r[1] = "si";
arv = scriptAr_r.toString();
$('#numberList').val(arv);

$('.btnFormRegister').click(function () {
    $('#registerForm').submit();
});

var input_eye_pass_1=0,input_eye_pass_2=0;
$('#registerForm .input_eye_pass_1').click(function () {
    if(input_eye_pass_1 == 0){
        $('#password').attr('type', 'text');
        input_eye_pass_1 = 1;
    }else{
        $('#password').attr('type', 'password');
        input_eye_pass_1 = 0;
    }
});

$('#registerForm').on('submit',function (e) {
    e.preventDefault();
    elementsForm = [
        "name",
        "phone",
        "mail",
        "password"
    ];
    for (i in scriptAr_r) {
        if(scriptAr_r[i] == 'si'){
            elementsForm.push('address'+i);
            elementsForm.push('town'+i);
            elementsForm.push('country'+i);
            elementsForm.push('state'+i);
            elementsForm.push('city'+i);
            elementsForm.push('description'+i);
        }
    }

    contLogin = validationForm(elementsForm,contLogin = 1);
    if(contLogin == 0)
    {
        swal({
            text: "Debes completar todos los datos",
            icon: imageURL_2,
            button: "OK!",
        });
        return false;
    }
    var data = $(this).serialize();
    swal({
        text: "Espere un momento",
        icon: imageURL_2,
        button: false,
        closeOnClickOutside: false,
    });
    $.ajax({
        url: https + "/registerGo",
        method: "POST",
        data: data,
        success: function (data) {
            if ($.trim(data) == "1") {
                if(login_go_service == 4){
                    buyService(idLogin_service);
                    return false;
                }

                if(login_go == 1) {
                    $("#registerForm")[0].reset();
                    swal.close();
                    location.href = https;
                }else if(login_go == 2){
                    buyCourse(idLogin);
                }else if(login_go == 3){
                    buyTaller(idLogin);
                }else{

                }
            }else if($.trim(data) == "2"){
                swal({
                    text: "Correo Electrónico ya registrado",
                    icon: imageURL_2,
                    button: "OK!",
                });
            }else {
                swal({
                    text: "Error, hubo problemas",
                    icon: imageURL_2,
                    button: "OK!",
                });
            }
        }
    });
});

function validationForm(elementsForm,contLogin)
{
    for(var i=0;i<elementsForm.length;i++){
        $('#'+elementsForm[i]).removeClass('error');
        if ( $.trim($("#"+elementsForm[i]).val()) == "" ) {
            contLogin = 0;
            $('#'+elementsForm[i]).addClass('error');
        }
    }
    return contLogin;
}

//shopping
$('.shopFormRegister').click(function () {
    $('#shopForm').submit();
});

$('#shopForm').on('submit',function (e) {
    e.preventDefault();
    elementsForm = [
        "nameShop",
        "phoneShop",
        "mailShop",
    ];

    contLogin = validationForm(elementsForm,contLogin = 1);
    if(contLogin == 0)
    {
        swal({
            text: "Debes completar todos los datos",
            icon: imageURL_2,
            button: "OK!",
        });
        return false;
    }
    var data = $(this).serialize();
    swal({
        text: "Espere un momento",
        icon: imageURL_2,
        button: false,
        closeOnClickOutside: false,
    });
    $.ajax({
        url: https + "/shopGo",
        method: "POST",
        data: data,
        success: function (data) {
            if ($.trim(data) == "1") {
                if(login_go_service == 4){
                    buyService(idLogin_service);
                    return false;
                }
                if(login_go == 1) {
                    $("#shopForm")[0].reset();
                    swal.close();
                    location.href = https;
                }else if(login_go == 2){
                    buyCourse(idLogin);
                }else if(login_go == 3){
                    buyTaller(idLogin);
                }else{

                }
            }else {
                swal({
                    text: "Error, hubo problemas",
                    icon: imageURL_2,
                    button: "OK!",
                });
            }
        }
    });
});
