$(function() {
    $("body").toggleClass("mini-navbar");

    $("#frm-setting").validate({
        rules: {
            iva: {
                required: true
            },
            holidayBonus: {
                required: true
            },
            sundayBonus: {
                required: true
            },
            uma: {
                required: true
            },
            minumSalary: {
                required: true
            }
        },
        submitHandler: function(form) {
            var l = $(".ladda-button").ladda();
            $.ajax({
                beforeSend: function() {
                    l.ladda("start");
                },
                type: $(form).attr("method"),
                url: $(form).attr("action"),
                data: $(form).serialize(),
                dataType: "json"
            }).done(function(r) {
                l.ladda("stop");
                if (r.codigo == "200") {
                    SweetAlertSuccess("¡Buen trabajo!", r.mensaje, r.url);
                } else {
                    toastr.error(r.error, "¡Notificación!");
                }
            });
            return false;
        }
    });
});
