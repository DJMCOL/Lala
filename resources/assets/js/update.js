var elementsForm,contLogin;

$('.btnFormUpdate').click(function () {
    $('#formUpdate').submit();
});

$('#formUpdate').on('submit',function (e) {
    e.preventDefault();
    elementsForm = [
        "nameUpdate",
        "phoneUpdate",
        "mailUpdate",
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
        url: https + "/updateGo",
        method: "POST",
        data: data,
        success: function (data) {
            if ($.trim(data) == "1") {
                $("#formUpdate")[0].reset();
                swal.close();
                location.href = https + '/perfil';
            }else{
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
