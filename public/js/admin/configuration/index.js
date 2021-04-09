$(function() {});

function clear() {
    var currentToken = $('meta[name="csrf-token"]').attr("content");

    return $.ajax({
        beforeSend: function() {
            $("#modal").show();
        },
        type: "POST",
        url: laraveljs.clear,
        data: {
            _token: currentToken
        },
        dataType: "json",
        success: function(r) {
            $("#modal").hide();
            if (r.codigo == 200) {
                swal({
                    title: "Tarea programada",
                    text: r.mensaje,
                    icon: "success"
                });
            } else {
                toastr.error(r.error, "Error");
            }
        },
        error: function(ex) {
            $("#modal").hide();
            toastr.error(ex.responseText, "¡Notificación!", {
                closeButton: true
            });
        }
    });
}
