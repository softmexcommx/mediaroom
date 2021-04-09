$(function() {
    $("#recipients").select2({
        placeholder: "Seleccione un usuario",
        dropdownCssClass: "bigdrop",
        width: "element"
    });

    $("#message").summernote();

    $("#frmmenssage").submit(function(e) {
        var l = $(".ladda-button").ladda();
        e.preventDefault();

        var data = $(this).serialize();
        var url = $(this).attr("action");
        var method = $(this).attr("method");

        // clear textarea/ reset form
        $(this).trigger("reset");

        $.ajax({
            beforeSend: function() {
                l.ladda("start");
                $("#modal").show();
            },
            method: method,
            data: data,
            url: url,
            success: function(response) {
                l.ladda("stop");
                $("#modal").hide();
                if (response.codigo == 200) {
                    var thread = $(
                        "#thread_" + response.valores.message.thread_id
                    );
                    toastr.success(response.mensaje);
                    $("body")
                        .find(thread)
                        .append(response.html);
                } else {
                    toastr.error(response.error);
                }
            },
            error: function(error) {
                l.ladda("stop");
                $("#modal").hide();
                toastr.error(error);
            }
        });
    });
});
