$(function() {
    $("#tra_gencve").select2();
    $("#tra_graestcve").select2();
    $("#tra_delcve").select2();
    $("#tra_tipcon").select2();

    /*Agregar funciones jquery validator*/
    $.validator.addMethod(
        "RFC",
        function(value, element) {
            if (value !== "") {
                var patt = new RegExp(
                    "^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$"
                );
                return patt.test(value);
            } else {
                return false;
            }
        },
        "Ingrese un RFC valido"
    );
    $.validator.addMethod(
        "CURP",
        function(value, element) {
            if (value !== "") {
                var patt = new RegExp(
                    "^[A-Z][A,E,I,O,U,X][A-Z]{2}[0-9]{2}[0-1][0-9][0-3][0-9][M,H][A-Z]{2}[B,C,D,F,G,H,J,K,L,M,N,Ñ,P,Q,R,S,T,V,W,X,Y,Z]{3}[0-9,A-Z][0-9]$"
                );
                return patt.test(value);
            } else {
                return false;
            }
        },
        "Ingrese una CURP valido"
    );

    $("#tra_catcve").select2({
        escapeMarkup: function(markup) {
            return markup;
        },
        placeholder: "nombre ...",
        ajax: {
            url: laraveljs.path + "/select/items/categorias",
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
            url: laraveljs.path + "/select/items/adscripciones",
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
        rules: {
            tra_rfc: {
                RFC: true
            },
            tra_curp: {
                CURP: true
            }
        },
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
