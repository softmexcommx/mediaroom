$(function() {
    $("#tra_gencve").select2();
    $("#tra_graestcve").select2();
    $("#tra_delcve").select2();
    $("#tra_tipcon").select2();

    $("#tra_catcve").select2({
        escapeMarkup: function(markup) {
            return markup;
        },
        placeholder: "nombre ...",
        ajax: {
            url: "/select/items/categorias",
            data: function(params) {
                return {
                    q: params.term,
                    status: 0 // search term
                };
            },
            dataType: "json",
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.descripcion,
                            id: item.cat_cve
                        };
                    })
                };
            },
            cache: true
        }
    });

    $("#tra_adscve").select2({
        escapeMarkup: function(markup) {
            return markup;
        },
        placeholder: "nombre ...",
        ajax: {
            url: "/select/items/adscripciones",
            data: function(params) {
                return {
                    q: params.term,
                    status: 0 // search term
                };
            },
            dataType: "json",
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.descripcion,
                            id: item.ads_cve
                        };
                    })
                };
            },
            cache: true
        }
    });

    $("#frm-perfil").validate({
        submitHandler: function(form) {
            $.ajax({
                beforeSend: function() {
                    $("#modal").show();
                },
                type: $(form).attr("method"),
                url: $(form).attr("action"),
                data: $(form).serialize(),
                dataType: "json"
            })
                .done(function(r) {
                    $("#modal").hide();
                    if (r.codigo == 200) {
                        SweetAlertSuccess("¡Buen trabajo!", r.mensaje, r.url);
                    } else {
                        toastr.error(r.error, "¡Notificación!");
                    }
                })
                .fail(function(jqXHR) {
                    $("#modal").hide();
                    toastr.error(jqXHR.responseText, "Error", {
                        closeButton: true
                    });
                });

            return false;
        }
    });
});
