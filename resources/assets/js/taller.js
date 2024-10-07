$('.buyTallerGo').click(function () {
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
            id: this.id,
            action: "buyTaller"},
        success: function (data) {
            if ($.trim(data) == "complet") {
                location.href = https + "/paypal/pay";
            } else if ($.trim(data) == "buy") {
                location.reload();
            }else if ($.trim(data) == "lleno") {
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
});
