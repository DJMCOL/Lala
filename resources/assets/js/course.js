$('.buyCourseGo').click(function () {
    swal({
        text: "Espere un momento",
        icon: imageURL_2,
        button: false,
        closeOnClickOutside: false,
    });
    var id = this.id;
    $.ajax({
        url: https + "/buyCourse",
        method: "POST",
        data: {
            id: this.id,
            action: "buyCourse"
        },
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
});
