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
    //alert(login_go);
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
                $("#registerForm")[0].reset();
                swal.close();
                location.href = https;
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
