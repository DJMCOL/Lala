let elementsForm,contLogin = 1;

function validationForm(elementsForm,contLogin)
{
  for(let i=0;i<elementsForm.length;i++){
    if ( $.trim($("#"+elementsForm[i]).val()) == "" ) {
      contLogin = 0;
    }
  }
  return contLogin;
}
function validarEmail(valor) {
  if (/^\w+([\.-]?\w+)*@(?:|hotmail|outlook|yahoo|live|gmail|gutand)\.(?:|com|es)+$/.test(valor)){
    return true;
  } else {
    return false;
  }
}

$('.btnSubscribeMob').click(function () {
  grecaptcha.ready(function() {
    grecaptcha.execute('6LfRdtwZAAAAAGAsZTr769WArVkDxPg3hV2MFeU7', {action: 'submit'}).then(function(token) {
      $('#formSubscribeMob').prepend('<input type="hidden" name="token" value="' + token + '">');
      $('#formSubscribeMob').submit();
    });
  });
  //$('#formSubscribeMob').submit();
});

$('#formSubscribeMob').on('submit',function (e) {
  e.preventDefault();
  elementsForm = [
    "mailSubscribe",
  ];

  contLogin = validationForm(elementsForm,contLogin = 1);
  if(contLogin == 0)
  {
    swal({
      text: "Debes digitar todos los datos requeridos",
      icon: 'warning',
      button: "OK",
    });
    return false;
  }
  if(!validarEmail($('#mailSubscribeMob').val())){
    swal({
      text: "Debes digitar un correo valido",
      icon: "warning",
      button: "OK!",
    });
    $('#mailSubscribeMob').addClass('error');
    return false;
  }
  let data = $(this).serialize();
  swal({
    text: "Espere un momento",
    icon: false,
    button: false,
    closeOnClickOutside: false,
  });
  $.ajax({
    url: https + '/subscribeMob',
    method: "POST",
    data: data,
    success: function (data) {
      if ($.trim(data) == "1") {
        $("#formSubscribeMob")[0].reset();
        swal({
          text: "El mensaje ha sido enviado",
          icon: "success",
          timer: 3000,
          button: "OK",
        });
      }else {
        swal({
          text: "Error, hubo problemas",
          icon: "warning",
          timer: 3000,
          button: "OK!",
        });
      }
    }
  });
});
