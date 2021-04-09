$(function() {
    $("#recipients").select2({
        placeholder: "Seleccione un usuario",
        dropdownCssClass: "bigdrop",
        width: "element"
    });

    $("#message").summernote();

    $("#frmmenssage").submit(function(e) {
        e.preventDefault();

        var data = $(this).serialize();
        var url = $(this).attr("action");
        var method = $(this).attr("method");

        // clear textarea/ reset form
        $(this).trigger("reset");

        $.ajax({
            beforeSend: function() {
                $("#modal").show();
            },
            method: method,
            data: data,
            url: url,
            success: function(response) {
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
                $("#modal").hide();
                toastr.error(error);
            }
        });
    });
});
