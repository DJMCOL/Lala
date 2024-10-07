$('.openAsesoriaClick').click(function () {
    var service_id = this.id;
    //alert(service_id);
    swal({
        text: "Espere un momento",
        icon: imageURL_2,
        button: false,
        closeOnClickOutside: false,
    });
    $('.modalAsesoria .content_html').html('');
    $.ajax({
        url: https +"/getService",
        method: "POST",
        data: {
            category_id:service_id,
            action:'getService'
        },
        success: function (data) {
            if(data != ''){
                $('.modalAsesoria .content_html').html(data);
                swal.close();
            }else{
                swal.close();
                $('#modalAsesoria').close();
            }
        }
    });
});

$('.buyServiceGo').click(function () {
    swal({
        text: "Espere un momento",
        icon: imageURL_2,
        button: false,
        closeOnClickOutside: false,
    });
    var id = this.id;
    //alert(id);
    //alert($('#dateServiceSolic').val());
    //alert($('#hourService').val());
    //return false;
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
                    closeOnClickOutside: false,
                });
            } else if ($.trim(data) == "3") {
                swal({
                    text: "CUPO LLENO EN ESTA HORA",
                    icon: imageURL_2,
                    button: "OK!",
                    closeOnClickOutside: false,
                });
            } else {
                swal({
                    text: "Ha ocurrido un error" + data,
                    icon: imageURL_2,
                    button: "OK!",
                    closeOnClickOutside: false,
                });
            }
        }
    });
});
